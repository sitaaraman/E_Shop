<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
    {
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($id);

        $cart[$id] = [
            'name'  => $product->product_name,
            'price' => $product->product_price,
            'qty'   => ($cart[$id]['qty'] ?? 0) + 1
        ];

        session(['cart' => $cart]);
        return back();
    }

    public function index()
    {
        return view('customer.cart', [
            'cart' => session('cart', [])
        ]);
    }

    public function increase($id)
    {
        $cart = session('cart', []);
        $cart[$id]['qty']++;
        session(['cart' => $cart]);
        // return back();
        return redirect()->route('customer.cart');
    }

    public function decrease($id)
    {
        $cart = session('cart', []);

        if ($cart[$id]['qty'] > 1) {
            $cart[$id]['qty']--;
        }

        session(['cart' => $cart]);
        return back();
    }

    public function remove($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        return back();
    }
}
