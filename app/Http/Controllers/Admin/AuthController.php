<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function loginForm()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->email == 'admin@test.com' && $request->password == 'admin@123') {
            session(['admin_id' => 1]);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Invalid admin login');
    }

    public function logout()
    {
        session()->forget('admin_id');
        return redirect('/admin/login');
    }
}
