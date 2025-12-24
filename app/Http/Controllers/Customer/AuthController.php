<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (session()->has('customer_id')) {
            return redirect()->route('customer.dashboard');
        }
        return view('customer.login');
    }

    public function registerForm()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        $customer = Customer::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        session(['customer_id' => $customer->id]);
        return redirect()->route('customer.dashboard');
    }

    public function login(Request $request)
    {
        $customer = Customer::where('email', $request->email)->first();

        if ($customer && Hash::check($request->password, $customer->password)) {
            session(['customer_id' => $customer->id]);
            return redirect()->route('customer.dashboard');
        }

        return back()->with('error', 'Invalid login credentials');
    }

    public function logout()
    {
        session()->forget(['customer_id', 'cart']);
        return redirect()->route('customer.login');
    }
}
