<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('customer.profile', [
            'customer' => Customer::find(session('customer_id'))
        ]);
    }

    public function update(Request $request)
    {
        Customer::find(session('customer_id'))
            ->update($request->only('name', 'phone'));

        return back()->with('success', 'Profile updated');
    }
}
