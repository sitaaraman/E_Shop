<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Invoice;

class DashboardController extends Controller
{
    public function index()
    {
        $productCount  = Product::count();
        $customerCount = Customer::count();
        $invoiceCount  = Invoice::count();

        return view('admin.dashboard', compact(
            'productCount',
            'customerCount',
            'invoiceCount'
        ));
    }
}


