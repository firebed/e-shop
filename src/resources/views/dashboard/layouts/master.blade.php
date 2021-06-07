<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @stack('meta')

    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous"/>

    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.6.0/dist/autoNumeric.min.js"></script>

    <link href="{{ asset('vendor/eshop/css/dashboard/app.css') }}" rel="stylesheet">
    @stack('header_scripts')
    @livewireStyles

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="container-fluid bg-light">
<div class="row">
    @include('eshop::dashboard.layouts.navigation')

    <div class="col">
        <main class="row">
            <div class="col-12 bg-white shadow-sm sticky-lg-top d-flex justify-content-between align-items-center px-4" style="height: 3.5rem">
                <div></div>
                <div>User</div>
            </div>

            @yield('main')
        </main>
    </div>
</div>

<x-bs::notification.toast/>
<x-bs::notification.dialog/>

<script src="{{ asset('vendor/eshop/js/dashboard/app.js') }}"></script>
@stack('footer_scripts')
@livewireScripts
</body>
</html>
