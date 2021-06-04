<?php

namespace App\Http\Livewire\Dashboard\Cart;

use App\Http\Livewire\Traits\TrimStrings;
use App\Models\Cart\Cart;
use App\Models\Location\PaymentMethod;
use App\Models\Location\ShippingMethod;
use App\Repository\Contracts\CartContract;
use Firebed\Livewire\Traits\SendsNotifications;
use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

class CartOverview extends Component
{
    use TrimStrings;
    use SendsNotifications;

    public Cart $cart;
    public bool $showEditingModal = false;

    protected $rules = [
        'cart.shipping_method_id' => 'required|integer',
        'cart.shipping_fee'       => 'required|numeric',
        'cart.payment_method_id'  => 'required|integer',
        'cart.payment_fee'        => 'required|numeric',
        'cart.document_type'      => 'required|string',
    ];

    protected $listeners = [
        'cart-items-created'          => '$refresh',
        'cart-items-updated'          => '$refresh',
        'cart-items-discount-updated' => '$refresh',
    ];

    public function edit(): void
    {
        $this->clearErrors();
        $this->showEditingModal = true;
    }

    private function clearErrors(): void
    {
        if ($this->getErrorBag()->isEmpty()) {
            $this->skipRender();
        } else {
            $this->resetValidation();
        }
    }

    public function cartVoucherUpdated($voucher): void
    {
        $this->cart->voucher = $voucher;
        $this->skipRender();
    }

    public function save(CartContract $contract): void
    {
        $this->validate();

        $docTypeUpdated = $this->cart->isDirty('document_type');

        $contract->updateCart($this->cart);

        if ($docTypeUpdated) {
            $this->emit('cartDocumentUpdated', $this->cart->document_type);
        }

        $this->showSuccessToast('Cart updated!');
        $this->showEditingModal = false;
    }

    public function render(): Renderable
    {
        $shippingMethods = ShippingMethod::all();
        $paymentMethods = PaymentMethod::all();

        $shippingMethod = $shippingMethods->find($this->cart->shipping_method_id);
        $paymentMethod = $paymentMethods->find($this->cart->payment_method_id);

        return view('dashboard.cart.livewire.cart-overview', compact('shippingMethods', 'paymentMethods', 'shippingMethod', 'paymentMethod'));
    }
}
