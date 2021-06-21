@extends('eshop::customer.layouts.master', ['title' =>  __('Edit address')])

@section('main')
    <div class="container-fluid bg-pink-500">
        <div class="container pt-4">
            <div class="row py-4">
                <div class="col fs-3 text-light">{{ user()->fullName }}</div>
            </div>
        </div>
    </div>

    @include('eshop::customer.account.partials.account-navbar')

    <div class="container-fluid py-4">
        <div class="container">
            <h1 class="fs-4 fw-normal mb-4">{{ __("Edit address") }}</h1>

            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <form method="post" action="{{ route('account.addresses.update', [app()->getLocale(), $address]) }}" @if(session('success')) x-data x-init="$dispatch('toast-notification', {type: 'success', title: '{{ session('success') }}', content: '', autohide: true})" @endif>
                        @csrf
                        @method('put')

                        <div class="d-grid gap-3">
                            <x-bs::input.floating-label for="first-name" label="{{ __('Name') }}">
                                <x-bs::input.text name="first_name" :value="old('first_name', $address->first_name)" error="first_name" id="first-name" placeholder="{{ __('Name') }}"/>
                            </x-bs::input.floating-label>

                            <x-bs::input.floating-label for="last-name" label="{{ __('Surname') }}">
                                <x-bs::input.text name="last_name" :value="old('last_name', $address->last_name)" error="last_name" id="last-name" placeholder="{{ __('Surname') }}"/>
                            </x-bs::input.floating-label>

                            <div class="row">
                                <div class="col">
                                    <x-bs::input.floating-label for="street" label="{{ __('Street') }}">
                                        <x-bs::input.text name="street" :value="old('street', $address->street)" error="street" id="street" placeholder="{{ __('Street') }}"/>
                                    </x-bs::input.floating-label>
                                </div>

                                <div class="col-4">
                                    <x-bs::input.floating-label for="street-no" label="{{ __('Street no') }}">
                                        <x-bs::input.text name="street_no" :value="old('street_no', $address->street_no)" error="street_no" id="street-no" placeholder="{{ __('Street no') }}"/>
                                    </x-bs::input.floating-label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <x-bs::input.floating-label for="city" label="{{ __('City') }}">
                                        <x-bs::input.text name="city" :value="old('city', $address->city)" error="city" id="city" placeholder="{{ __('City') }}"/>
                                    </x-bs::input.floating-label>
                                </div>

                                <div class="col-4">
                                    <x-bs::input.floating-label for="postcode" label="{{ __('Postcode') }}">
                                        <x-bs::input.text name="postcode" :value="old('postcode', $address->postcode)" error="postcode" id="postcode" placeholder="{{ __('Postcode') }}"/>
                                    </x-bs::input.floating-label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <x-bs::input.floating-label for="province" label="{{ __('Province') }}">
                                        <x-bs::input.text name="province" :value="old('province', $address->province)" error="province" id="province" placeholder="{{ __('Province') }}"/>
                                    </x-bs::input.floating-label>
                                </div>

                                <div class="col">
                                    <x-bs::input.floating-label for="country" label="{{ __('Country') }}">
                                        <x-bs::input.select name="country_id" error="country_id" id="country">
                                            <option disabled selected>{{ __("Country") }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" @if(old('country_id', $address->country_id) == $country->id) selected @endif>{{ $country->name }}</option>
                                            @endforeach
                                        </x-bs::input.select>
                                    </x-bs::input.floating-label>
                                </div>
                            </div>

                            <x-bs::input.floating-label for="floor" label="{{ __('Floor') }}">
                                <x-bs::input.text name="floor" :value="old('floor', $address->floor)" error="floor" id="floor" placeholder="{{ __('Floor') }}"/>
                            </x-bs::input.floating-label>

                            <x-bs::input.floating-label for="phone" label="{{ __('Phone') }}">
                                <x-bs::input.text name="phone" :value="old('phone', $address->phone)" error="phone" id="phone" placeholder="{{ __('phone') }}"/>
                            </x-bs::input.floating-label>

                            <x-bs::button.primary type="submit">{{ __("Save") }}</x-bs::button.primary>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
