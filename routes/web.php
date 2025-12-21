<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductWebController;
use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ForgotPasswordController;
use App\Http\Controllers\Customer\ProfileController;
use App\Http\Controllers\Customer\AddressController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes - Session + CSRF
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products', [ProductWebController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductWebController::class, 'show'])->name('products.show');

// Categories
Route::get('/categories', [CategoryWebController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryWebController::class, 'show'])->name('categories.show');

Route::middleware('guest')->group(function () {

    // halaman login
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    // submit login (INI YANG TADI HILANG)
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.submit');
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Auth (Views only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
});

// Logout (FORM + CSRF)
Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Customer
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])
    ->prefix('customer')
    ->name('customer.')
    ->group(function () {

        Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
        Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
        Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
        Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
        Route::post('/addresses/{id}/set-default', [AddressController::class, 'setDefault'])->name('addresses.default');

        Route::get('/cart', [CartController::class, 'index'])->name('cart');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders');
        Route::get('/orders/{orderNumber}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{orderNumber}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

        Route::get('/orders/{orderNumber}/payment', [PaymentController::class, 'show'])->name('payment.show');
        Route::post('/orders/{orderNumber}/payment', [PaymentController::class, 'verify'])->name('payment.verify');
});
