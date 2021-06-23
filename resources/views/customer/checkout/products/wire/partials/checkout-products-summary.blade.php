<div wire:loading.class="opacity-75" class="col-12 col-md-auto w-md-25r align-self-start sticky-md-top position-relative">
    <div wire:loading class="position-absolute start-50 top-50 translate-middle">
        <em class="fa fa-fan fa-spin text-primary fs-5"></em>
    </div>

    <div wire:loading class="position-absolute start-50 top-50 translate-middle">
        <em class="fa fa-fan fa-spin text-primary fs-5"></em>
    </div>

    <div class="d-grid bg-white gap-3 p-3 rounded border" id="cart-summary" style="font-size: .91rem !important; border-top: 3px solid #d31f75 !important">
        <h2 class="fs-5 mb-0">{{ __('Cart summary') }}</h2>

        <div class="d-grid gap-2 text-gray-700">
            <div class="d-flex align-items-start">
                <div class="text-secondary">{{ __('Products value') }}</div>
                <div class="w-6r ms-auto text-end">{{ format_currency($order->products_value) }}</div>
            </div>

            @if($order->shippingAddress)
                <div wire:key="shipping-fee" class="d-flex align-items-start">
                    <div class="text-secondary">{{ __('Shipping fee for') }} <span class="text-blue-500">{{ $order->shippingAddress->city_or_country }}</span></div>

                    <div class="w-6r ms-auto text-end d-grid">
                        <span>{{ format_currency($order->shipping_fee) }}</span>
                        @if($lastShipping && $order->shipping_fee < $lastShipping->fee)
                            <s class="text-danger lh-sm">{{ format_currency($lastShipping->fee) }}</s>
                        @endif
                    </div>
                </div>
            @endif

            @if($order->payment_fee > 0)
                <div wire:key="payment-fee" class="d-flex align-items-start">
                    <div class="text-secondary">{{ __($order->paymentMethod->name) }}</div>
                    <div class="w-6r ms-auto text-end" id="payment-fee">{{ format_currency($order->payment_fee) }}</div>
                </div>
            @endif

            <hr class="text-secondary my-2">

            @if($lastShipping && $order->shipping_fee < $lastShipping->fee)
                <div wire:key="active-discounts" class="text-primary d-flex align-items-center">
                    <em class="fas fa-check-circle me-2"></em> @choice('order.shipping_discount', $order->shipping_fee)
                </div>
            @endif

            @if($nextShipping)
                <div wire:key="next-discounts" class="text-secondary">
                    @choice('order.shipping_discount_until', $nextShipping->fee, ['value' => format_currency($nextShipping->cart_total - $order->products_value)])
                </div>
                <x-bs::progress :value="$order->products_value/$nextShipping->cart_total*100" height=".7rem"/>
            @endif

            @if($nextShipping !== NULL || ($lastShipping && $order->shipping_fee < $lastShipping->fee))
                <hr wire:key="hr" class="text-secondary my-2">
            @endif

            <div class="d-flex align-items-center fw-bold fs-5">
                <div>{{ __('Total') }}</div>
                <div class="w-6r ms-auto text-end" id="order-total">{{ format_currency($order->total) }}</div>
            </div>
        </div>

        @guest
            <a wire:loading.class="disabled" data-bs-toggle="modal" data-bs-target="#login-modal" href="#" class="btn btn-primary">{{ __('Checkout') }} <em class="fas fa-arrow-right ms-3"></em></a>
        @else
            <a wire:loading.class="disabled" href="{{ route('checkout.details.edit', app()->getLocale()) }}" class="btn btn-primary">{{ __('Checkout') }} <em class="fas fa-arrow-right ms-3"></em></a>
        @endguest
    </div>
</div>
