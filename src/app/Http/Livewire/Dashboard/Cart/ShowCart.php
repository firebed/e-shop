<?php


namespace App\Http\Livewire\Dashboard\Cart;


use App\Http\Livewire\Dashboard\Cart\Traits\AppliesBulkDiscount;
use App\Http\Livewire\Traits\TrimStrings;
use App\Models\Cart\Cart;
use App\Models\Cart\CartProduct;
use App\Repository\Contracts\CartContract;
use Firebed\Livewire\Traits\Datatable\DeletesRows;
use Firebed\Livewire\Traits\Datatable\WithCRUD;
use Firebed\Livewire\Traits\Datatable\WithSelections;
use Firebed\Livewire\Traits\SendsNotifications;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowCart extends Component
{
    use SendsNotifications;
    use TrimStrings;
    use AppliesBulkDiscount;
    use WithSelections;
    use DeletesRows;
    use WithCRUD;

    public Cart $cart;

    protected $listeners = [
        'cart-items-created'  => '$refresh',
        'cart-status-updated' => '$refresh'
    ];

    protected $rules = [
        'model.cart_id'    => ['required', 'numeric'],
        'model.product_id' => ['required', 'numeric'],
        'model.quantity'   => ['required', 'numeric', 'min:1'],
        'model.price'      => ['required', 'numeric', 'min:0'],
        'model.discount'   => ['required', 'numeric', 'between:0,1'],
    ];

    protected function makeEmptyModel(): CartProduct
    {
        return new CartProduct([
            'product_id' => "",
            'quantity'   => 1,
            'price'      => 0,
            'discount'   => 0
        ]);
    }

    protected function findModel($id): CartProduct
    {
        return CartProduct::find($id);
    }

    public function getProductsProperty(): Collection
    {
        return $this->cart->products()
            ->oldest('cart_product.created_at')
            ->with('options', 'translation', 'image', 'parent.translation')
            ->get();
    }

    protected function getModels(): Collection
    {
        return $this->products->pluck('pivot');
    }

    protected function deleteRows(): ?int
    {
        $contract = app(CartContract::class);
        return DB::transaction(function () use ($contract) {
            $result = $contract->deleteCartItems($this->cart, $this->selected);
            $this->emit('cart-items-updated');
            return $result;
        });
    }

    public function save(): void
    {
        $this->validate();

        $contract = app(CartContract::class);
        DB::transaction(fn() => $contract->updateCartItem($this->model));

        $this->showSuccessToast('Cart items saved!');
        $this->emit('cart-items-updated');
        $this->showEditingModal = false;
    }

    public function render(): Renderable
    {
        return view('dashboard.cart.livewire.show-cart', [
            'products' => $this->products,
        ]);
    }
}
