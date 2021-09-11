<?php

namespace Eshop\Controllers\Dashboard\Intl;

use Eshop\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class CountryPaymentMethodController extends Controller
{
    public function __invoke(): Renderable
    {
        return view('eshop::dashboard.intl.country-payment-methods');
    }
}