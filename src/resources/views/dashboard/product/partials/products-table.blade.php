<x-bs::table>
    <thead>
    <tr class="table-light text-nowrap">
        <x-bs::table.heading class="w-1r rounded-top">
            <x-bs::input.checkbox wire:model="selectAll" id="select-all"/>
        </x-bs::table.heading>
        <x-bs::table.heading class="w-6r">{{ __("Graphics") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">{{ __("Product") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('SKU')" :direction="$sortField === 'SKU' ? $sortDirection : null">{{ __("SKU") }}</x-bs::table.heading>
        <x-bs::table.heading>{{ __("Manufacturer") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('stock')" :direction="$sortField === 'stock' ? $sortDirection : null">{{ __("Stock") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('variants_count')" :direction="$sortField === 'variants_count' ? $sortDirection : null">{{ __("Variants") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('price')" :direction="$sortField === 'price' ? $sortDirection : null">{{ __("Price") }}</x-bs::table.heading>
        <x-bs::table.heading sortable wire:click.prevent="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null" class="rounded-top">{{ __("Created at") }}</x-bs::table.heading>
    </tr>
    </thead>

    <tbody>
    @foreach($products as $product)
        <tr wire:key="row-{{ $product->id }}" wire:loading.class.delay="opacity-50" wire:target="sortBy, category, manufacturer, name">
            <td>
                <x-bs::input.checkbox wire:model="selected" id="product-{{ $product->id}}" value="{{ $product->id }}"/>
            </td>
            <td>
                <div class="ratio ratio-1x1">
                    @if($product->image && $src = $product->image->url('sm') )
                        <img class="w-auto h-auto mh-100 mw-100 rounded" src="{{ $src }}" alt="{{ $product->name }}">
                    @endif
                </div>
            </td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="d-flex flex-column text-decoration-none">
                    <span>{{ $product->name }}</span>
                    <small class="text-secondary">{{ $product->category->name }}</small>
                </a>
            </td>
            <td>{{ $product->sku }}</td>
            <td>{{ $product->manufacturer->name ?? '' }}</td>
            <td>@if($product->has_variants) {{ format_number($product->variants_sum_stock) }} @else {{ format_number($product->stock) }} @endif</td>
            <td>@if($product->has_variants){{ $product->variants_count }}@endif</td>
            <td>
                @if($product->has_variants)
                    @if($product->variants_min_price === $product->variants_max_price)
                        {{ format_currency($product->variants_min_price) }}
                    @else($product->has_variants)
                        {{ format_currency($product->variants_min_price) }} - {{ format_currency($product->variants_max_price) }}
                    @endif
                @else
                    {{ format_currency($product->price) }}
                @endif
            </td>
            <td>{{ $product->created_at->format('d/m/y') }}</td>
        </tr>
    @endforeach
    </tbody>

    <caption>
        <div class="d-flex justify-content-between align-items-center px-2">
            <div class="small">{{ __('pagination.showing', ['first' => $products->firstItem() ?? 0, 'last' => $products->lastItem() ?? 0, 'total' => $products->total()]) }}</div>

            {{ $products->onEachSide(1)->links() }}
        </div>
    </caption>
</x-bs::table>
