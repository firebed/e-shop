@extends('eshop::dashboard.layouts.master', ['title' => __("Product images")])

@section('main')
    <livewire:dashboard.product.show-product-images :productId="$productId"/>
@endsection
