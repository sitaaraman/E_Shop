<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;

use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use App\Http\Controllers\Customer\DashboardController as CustomerDashboardController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;

/*
|--------------------------------------------------------------------------
| MIDDLEWARE
|--------------------------------------------------------------------------
*/
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\CustomerAuth;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/login');
})->name('home');

/*
|--------------------------------------------------------------------------
| CUSTOMER AUTH
|--------------------------------------------------------------------------
*/
Route::get('/login',     [CustomerAuthController::class, 'loginForm'])->name('customer.login');
Route::post('/login',    [CustomerAuthController::class, 'login'])->name('customer.login.post');
Route::get('/register',  [CustomerAuthController::class, 'registerForm'])->name('customer.register');
Route::post('/register', [CustomerAuthController::class, 'register'])->name('customer.register.post');
Route::get('/logout',    [CustomerAuthController::class, 'logout'])->name('customer.logout');

/*
|--------------------------------------------------------------------------
| CUSTOMER PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(CustomerAuth::class)->group(function () {

    Route::get('/customer/dashboard', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    // Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboard']);

    Route::get('/customer/profile',          [ProfileController::class, 'edit'])->name('customer.profile');
    Route::post('/customer/profile/update',  [ProfileController::class, 'update'])->name('customer.profile.update');

    // Cart
    Route::get('/cart',           [CartController::class, 'index'])->name('customer.cart');
    Route::get('/cart/add/{id}',  [CartController::class, 'add'])->name('customer.cart.add');
    Route::get('/cart/increase/{id}', [CartController::class, 'increase'])->name('customer.cart.increase');
    Route::get('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('customer.cart.decrease');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('customer.cart.remove');

    // Orders & Invoices
    Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('customer.place.order');
    Route::get('/checkout',           [OrderController::class, 'checkout'])->name('customer.checkout');
    Route::get('/customer/invoices',  [OrderController::class, 'invoices'])->name('customer.invoices');
    Route::get('/customer/invoice/{id}', [OrderController::class, 'invoiceDetail'])->name('customer.invoice.detail');
    Route::get('/invoice/pdf/{id}',   [OrderController::class, 'invoicePdf'])->name('customer.invoice.pdf');
});

/*
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login',  [AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN PROTECTED ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(AdminAuth::class)->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Products
    Route::get('/products',             [ProductController::class, 'index'])->name('admin.products');
    Route::get('/product/create',        [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store',        [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}',     [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}',  [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}',   [ProductController::class, 'delete'])->name('admin.product.delete');

    // Invoices
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('admin.invoices');
    Route::get(
        '/invoice/status/{id}/{status}',
        [InvoiceController::class, 'updateStatus']
    )->name('admin.invoice.status.update');
});

