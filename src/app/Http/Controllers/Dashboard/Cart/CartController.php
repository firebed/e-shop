<?php

namespace App\Http\Controllers\Dashboard\Cart;

use App\Http\Controllers\Controller;
use App\Models\Cart\Cart;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('dashboard.cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $cart
     * @return Renderable
     */
    public function show(int $cart): Renderable
    {
        $cart = Cart::findOrFail($cart);
        if (!$cart->isViewed()) {
            $cart->viewed_at = now();
            $cart->save();
        }
        return view('dashboard.cart.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cart $cart
     * @return Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Cart                     $cart
     * @return Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cart $cart
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Cart $cart): RedirectResponse
    {
        $cart->delete();
        return redirect()->route('carts.index');
    }
}
