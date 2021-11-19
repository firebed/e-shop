<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('meta')
    
    <meta property="og:locale" content="{{ app()->getLocale() . '_' . config('eshop.countries')[app()->getLocale()] }}" />

    <title>{{ $title }} | {{ config('app.name') }}</title>

    <link rel="preload" href="{{ asset(eshop('logo.path')) }}" as="image">
    
    @includeIf('eshop::customer.layouts.favicon')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>

    <link rel="search" type="application/opensearchdescription+xml" href="{{ asset('opensearch.xml') }}" title="Product search">

    <link href="{{ mix('dist/app.css') }}" rel="stylesheet">

    @stack('header_scripts')

    <livewire:styles/>
    <script defer src="https://unpkg.com/alpinejs@3.2.1/dist/cdn.min.js"></script>

    <x-eshop::google-analytics/>
</head>
<body>

<x-bs::toast-container id="toasts"/>

@include('eshop::customer.layouts.header')
@yield('main')
@include('eshop::customer.layouts.footer')

<x-bs::notification.toast-js/>
<x-bs::notification.dialog/>

<livewire:scripts/>

<script src="{{ mix('dist/app.js') }}"></script>
@stack('footer_scripts')
</body>
</html>
