<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        return view('customer.product-show', [
            'product' => Product::findOrFail($id)
        ]);
    }
}
