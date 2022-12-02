<tr x-data="{ cart_id: {{ $cart->id }}, number: @entangle('number'), packages: @entangle('voucher.number_of_packages'), loading: false, success: null }"
    x-on:create-voucher="         
        if (number.length > 0) {
            $event.detail.resolve()
            return
        }

        loading = true;
        success = null;
        $wire.createVoucher()
            .then(result => {
                success = result;
                success ? $event.detail.resolve() : $event.detail.reject(); 
            })
            .finally(() => loading = false)
    "
    x-on:voucher-created.window="
        if (event.detail.cart_id === cart_id) {
            number = event.detail.number
            success = true
        }
    "
    x-bind:data-voucher="number"
>
    <td><a href="{{ route('carts.show', $cart->id) }}" target="_blank">#{{ $cart->id }}</a></td>

    <td>
        <em x-show="loading" x-cloak class="fa fa-spinner fa-spin fa-sm"></em>
        <em x-show="!loading && success === true" x-cloak class="fa fa-check-circle text-success fa-sm"></em>
        <em x-show="!loading && success === false" x-cloak class="fa fa-times-circle text-danger fa-sm"></em>
        <span x-text="number"></span>
    </td>

    <td>
        <div>
            @error('courier')
            <div class="text-danger fw-500 mb-1"><em class="fa fa-exclamation-circle me-1"></em>{{ $message }}</div>
            @enderror
            <div class="fw-500">{{ $voucher['customer_name'] }}</div>
            <div class="small text-secondary">{{ $voucher['region'] }}, {{ $voucher['postcode'] }}</div>
        </div>
    </td>

    <td>
        <input type="number" x-model="packages" class="form-control">
    </td>
    
    <td>
        <img src="{{ asset('images/' . $cart->shippingMethod->courier()->icon()) }}" alt="" class="img-fluid" style="max-height: 20px; max-width: 80px">
    </td>

    <td class="text-end">{{ $voucher['weight'] }}&nbsp;kg</td>
    <td class="text-end">
        @if($voucher['cod_amount'] > 0)
            {{ format_currency($voucher['cod_amount']) }}
        @endif
    </td>
    <td>
        @if($cart->voucher === null)
            <div class="d-flex gap-1 justify-content-end">
                <button
                    @click="$wire.emitTo('dashboard.voucher.create', 'createVoucher', {{ $cart->id }}, packages)"
                    type="button"
                    class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i>
                </button>
            </div>
        @endif
    </td>
</tr>