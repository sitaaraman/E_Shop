<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();

        $invoiceCount = Invoice::where(
            'customer_id',
            session('customer_id')
        )->count();

        return view('customer.dashboard', compact(
            'products',
            'invoiceCount'
        ));
    }
}
