<?php


namespace App\Repository;


use App\Events\CartStatusChanged;
use App\Models\Cart\Cart;
use App\Models\Cart\CartProduct;
use App\Models\Cart\CartStatus;
use App\Models\Product\Product;
use App\Repository\Contracts\CartContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CartRepository implements CartContract
{
    public function updateCart(mixed $cart): void
    {
        if ($cart->isDirty('shipping_fee') || $cart->isDirty('payment_fee')) {
            $cart->total = $this->calculateTotal($cart);
        }

        $cart->save();
    }

    public function deleteCart(mixed $cart): void
    {
        if (is_numeric($cart)) {
            $cart = Cart::findOrFail($cart);
        }

        if ($cart->status_id !== NULL && $cart->isSubmitted()) {
            $status = $cart->status;
            if ($status->hasCapturedStocks()) {
                $this->releaseStocks($cart->id);
            }
        }

        $cart->delete();
    }

    public function deleteCarts(array $ids): void
    {
        $carts = Cart::whereKey($ids)->with('status')->get();
        foreach ($carts as $cart) {
            $this->deleteCart($cart);
        }
    }

    public function attachCartProduct(mixed $cart, CartProduct $cart_product): void
    {
        $this->attachProduct($cart, $cart_product->product_id, $cart_product->quantity, $cart_product->price, $cart_product->compare_price, $cart_product->discount, $cart_product->vat);
    }

    public function attachProduct(mixed $cart, int $product_id, int $quantity, float $price, float $compare_price, float $discount, float $vat): void
    {
        if (is_numeric($cart)) {
            $cart = Cart::find($cart);
        }

        $data = compact('quantity', 'price', 'compare_price', 'discount', 'vat');

        $cart->products()->syncWithoutDetaching([$product_id => $data]);

        $this->updateTotal($cart);

        if ($cart->isSubmitted()) {
            $status = $cart->status()->sole();
            if ($status->isCapturingStocks()) {
                $this->decrementProductStock($product_id, $quantity);
            }
        }
    }

    public function attachProducts(mixed $cart, array|Collection $product_ids_quantities): void
    {
        if (is_numeric($cart)) {
            $cart = Cart::find($cart);
        }

        if (is_array($product_ids_quantities)) {
            $product_ids_quantities = collect($product_ids_quantities);
        }

        $products = Product::whereKey($product_ids_quantities->keys())
            ->get(['id', 'price', 'compare_price', 'discount', 'vat']);

        $sync = collect($product_ids_quantities)
            ->map(function ($quantity, $productId) use ($products) {
                $product = $products->find($productId);
                return $product
                    ? [
                        'quantity'      => $quantity,
                        'price'         => $product->price,
                        'compare_price' => $product->compare_price,
                        'discount'      => $product->discount,
                        'vat'           => $product->vat
                    ]
                    : NULL;
            })
            ->filter()
            ->all();

        $cart->products()->syncWithoutDetaching($sync);
        $this->updateTotal($cart);

        if ($cart->isSubmitted()) {
            $status = $cart->status()->sole();
            if ($status->isCapturingStocks()) {
                foreach ($products as $product) {
                    $this->decrementProductStock($product['id'], $product['quantity']);
                }
            }
        }
    }

    public function updateCartItem(CartProduct $cartProduct): void
    {
        $cartProduct->save();

        $cart = $cartProduct->relationLoaded('cart')
            ? $cartProduct->cart
            : $cartProduct->cart()->sole();

        $this->updateTotal($cart);

        if ($cart->status_id && $cartProduct->isDirty('quantity')) {
            $status = $cart->status()->sole();
            if ($status->isCapturingStocks()) {
                $prevQty = $cartProduct->getOriginal('quantity');
                $this->decrementProductStock($cartProduct->product_id, $cartProduct->quantity - $prevQty);
            }
        }
    }

    public function deleteCartItems(Cart $cart, ...$product_ids): void
    {
        if (empty($product_ids)) {
            return;
        }

        if ($cart->isSubmitted()) {
            $status = $cart->status()->sole();
            if ($status->isCapturingStocks()) {
                $cartProducts = CartProduct::findMany($product_ids);
                foreach ($cartProducts as $cartProduct) {
                    $this->incrementProductStock($cartProduct->product_id, $cartProduct->quantity);
                }
            }
        }
        $cart->products()->detach($product_ids);
        $this->updateTotal($cart);
    }

    public function restoreCartItems(Cart $cart, ...$productIds): void
    {
        if (empty($productIds)) {
            return;
        }

        if ($cart->status_id) {
            $status = $cart->status()->sole();
            if ($status->hasCapturedStocks()) {
                $cartProducts = CartProduct::findMany($productIds);
                foreach ($cartProducts as $cartProduct) {
                    $this->decrementProductStock($cartProduct->product_id, $cartProduct->quantity);
                }
            }
        }

        CartProduct::withTrashed()->where('cart_id', $cart->id)->whereIn('product_id', $productIds)->restore();
        $this->updateTotal($cart);
    }

    public function deleteCartItemsPermanently(Cart $cart, ...$productIds): void
    {
        if (empty($productIds)) {
            return;
        }

        CartProduct::withTrashed()->where('cart_id', $cart->id)->whereIn('product_id', $productIds)->forceDelete();
        $this->updateTotal($cart);
    }

    public function updateQuantity(mixed $cart, mixed $product_id, int $quantity): void
    {
        if (is_numeric($cart)) {
            $cart = Cart::findOrFail($cart);
        }

        $cart->products()->updateExistingPivot($product_id, ['quantity' => $quantity]);
        $this->updateTotal($cart);

        if ($cart->isSubmitted() && $cart->status->hasCapturedStocks()) {
            $prevQty = $cart->products()->wherePivot('product_id', $product_id)->first()->quantity;
            $this->decrementProductStock($product_id, $quantity - $prevQty);
        }
    }

    public function updateTotal(Cart $cart): bool
    {
        $cart->total = $this->calculateTotal($cart);
        return $cart->save();
    }

    public function resetProductPrices(mixed $cart): bool
    {
        if (is_numeric($cart)) {
            $cart = Cart::findOrFail($cart);
        }

        $dirty = false;
        foreach ($cart->products()->get() as $product) {
            if ($product->price === 0) {
                $product->pivot->delete();
                $dirty = true;
                continue;
            }

            $product->pivot->price = $product->price;
            $product->pivot->compare_price = $product->compare_price;
            $product->pivot->discount = $product->discount;
            $product->pivot->vat = $product->vat;

            if ($product->pivot->isDirty()) {
                $dirty = true;
            }

            $product->pivot->save();
        }

        if ($dirty) {
            $this->updateTotal($cart);
        }

        return $dirty;
    }

    public function calculateTotal(Cart $cart): float
    {
        return $this->getProductsTotal($cart) + $cart->total_fees;
    }

    public function getProductsTotal(Cart $cart): float
    {
        return $cart->products()->sum(DB::raw('ROUND(cart_product.quantity * cart_product.price * (1 - cart_product.discount), 2)'));
    }

    public function captureStocks(int $cart_id): void
    {
        $items = CartProduct::where('cart_id', $cart_id)->select('product_id', 'quantity')->get();
        foreach ($items as $item) {
            $this->decrementProductStock($item->product_id, $item->quantity);
        }
    }

    public function releaseStocks(int $cart_id): void
    {
        $items = CartProduct::where('cart_id', $cart_id)->select('product_id', 'quantity')->get();
        foreach ($items as $item) {
            $this->incrementProductStock($item->product_id, $item->quantity);
        }
    }

    public function setDiscount(Cart $cart, float $discount, ?array $cart_item_id = NULL): void
    {
        $query = empty($cart_item_id)
            ? CartProduct::where('cart_id', $cart->id)
            : CartProduct::whereKey($cart_item_id);

        $query->update(['discount' => $discount]);
        $this->updateTotal($cart);
    }

    public function incrementProductStock(int $product_id, float $stock_amount): void
    {
        if ($stock_amount !== .0) {
            Product::query()->whereKey($product_id)->increment('stock', $stock_amount);
        }
    }

    public function decrementProductStock(int $product_id, float $stock_amount): void
    {
        if ($stock_amount !== .0) {
            Product::query()->whereKey($product_id)->decrement('stock', $stock_amount);
        }
    }

    public function setBulkCartStatus(CartStatus $status, array $cart_ids): void
    {
        $carts = Cart::with('status')->findMany($cart_ids);
        foreach ($carts as $cart) {
            $this->updateCartStatus($cart, $status, $status->notify);
        }
    }

    public function updateCartStatus(Cart $cart, CartStatus $currentStatus, bool $notifyCustomer = false, ?string $notesToCustomer = null): void
    {
        $previous_status = CartStatus::findOrFail($cart->status_id);
        $cart->status()->associate($currentStatus);
        $cart->save();

        if ($this->shouldCaptureProductStocks($previous_status, $currentStatus)) {
            $this->captureStocks($cart->id);
        } elseif ($this->shouldReleaseProductStocks($previous_status, $currentStatus)) {
            $this->releaseStocks($cart->id);
        }

        if ($notifyCustomer) {
            event(new CartStatusChanged($cart, $currentStatus, $notesToCustomer));
        }
    }

    public function shouldCaptureProductStocks(CartStatus $previousStatus, CartStatus $currentStatus): bool
    {
        return $currentStatus->isCapturingStocks() && ($previousStatus === NULL || $previousStatus->isReleasingStocks());
    }

    public function shouldReleaseProductStocks(CartStatus $previousStatus, CartStatus $currentStatus): bool
    {
        return $currentStatus->isReleasingStocks() && ($previousStatus === NULL || $previousStatus->isCapturingStocks());
    }

    public function setVoucher(Cart|int $cart, ?string $voucher): bool
    {
        if ($cart instanceof Cart) {
            $cart->voucher = $voucher;
            return $cart->save();
        }

        return Cart::whereKey($cart)->update(['voucher' => $voucher]);
    }

    public function resetStatus(int|Cart $cart): CartStatus
    {
        if (is_numeric($cart)) {
            $cart = Cart::find($cart);
        }
        $status = CartStatus::find(1);
        $this->updateCartStatus($cart, CartStatus::find(1));
        return $status;
    }
}
