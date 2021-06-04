<div class="container">
    <h3 class="fs-5 border-bottom mb-3 py-3">{{ __("Variants") }}</h3>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xxl-5 g-4">
        @foreach($variants as $variant)
            <div class="col" wire:key="variant-{{ $variant->id }}">
                <div class="card h-100 position-relative">
                    @if($variant->discount > 0)
                        <div class="position-absolute p-2 fs-6 badge bg-yellow-500" style="z-index: 2000; top:10px; right: 10px;">{{ format_percent(-$variant->discount) }}</div>
                    @endif
                    <div class="card-body d-grid gap-3">
                        <a class="text-decoration-none text-dark d-grid gap-2" href="{{ route('customer.products.show', [app()->getLocale(), $categorySlug, $variant->slug]) }}">
                            @if($variant->image)
                                <div class="ratio ratio-1x1">
                                    <img src="{{ $variant->image->url('sm') }}" alt="{{ $variant->variant_values }}" class="img-middle">
                                </div>
                            @endif

                            <div class="d-grid">
                                <div class="fw-500">{{ $variant->options->pluck('pivot.value')->join(' ') }}</div>

                                @if($variant->sku !== NULL && $variant->variant_values !== $variant->sku)
                                    <small class="text-secondary">{{ __('Code') }}: {{ $variant->sku }}</small>
                                @endif
                            </div>

                            <div class="d-flex align-items-baseline mt-auto">
                                <div class="fs-5 fw-500">{{ format_currency($variant->netValue) }}</div>
                                @if($variant->discount > 0)
                                    <span class="text-secondary ms-3 text-decoration-line-through">{{ format_currency($variant->price) }}</span>
                                @endif
                            </div>
                        </a>

                        <div class="d-grid mt-auto">
                            @if($variant->available)
                                <button wire:click="addToCart({{ $variant->id }})" wire:loading.attr="disabled" wire:target="addToCart({{ $variant->id }})" type="button" class="btn btn-green">
                                    <em wire:loading.remove wire:target="addToCart({{ $variant->id }})" class="fa fa-shopping-basket"></em>
                                    <em wire:loading wire:target="addToCart({{ $variant->id }})" class="fa fa-spinner fa-spin"></em>
                                    <span>{{ __("Add to cart") }}</span>
                                </button>
                            @else
                                <button class="btn btn-danger" disabled>{{ __("Out of stock") }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
