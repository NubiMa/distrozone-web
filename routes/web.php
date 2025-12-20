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
| Web Routes - For Blade Views
|--------------------------------------------------------------------------
*/

// Public routes (Guest)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products
Route::get('/products', [ProductWebController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductWebController::class, 'show'])->name('products.show');

// Categories
Route::get('/categories', [CategoryWebController::class, 'index'])->name('categories.index');
Route::get('/categories/{slug}', [CategoryWebController::class, 'show'])->name('categories.show');

// Temporary static pages
Route::get('/shop', function() {
    return view('guest.shop');
})->name('shop');

Route::get('/collections', function() {
    return view('guest.collections');
})->name('collections');

Route::get('/about', function() {
    return view('guest.about');
})->name('about');

Route::get('/journal', function() {
    return view('guest.journal');
})->name('journal');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Guest Only)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Register
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // Forgot Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
});

// Logout (Authenticated only)
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

/*
|--------------------------------------------------------------------------
| Customer Routes (Authenticated)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function() {
        return redirect()->route('customer.profile');
    })->name('dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    
    // Addresses
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    Route::put('/addresses/{id}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/addresses/{id}', [AddressController::class, 'destroy'])->name('addresses.destroy');
    Route::post('/addresses/{id}/set-default', [AddressController::class, 'setDefault'])->name('addresses.default');
    
    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    
    // Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{orderNumber}', [OrderController::class, 'show'])->name('orders.show');
    Route::post('/orders/{orderNumber}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    
    // Payment
    Route::get('/orders/{orderNumber}/payment', [PaymentController::class, 'show'])->name('payment.show');
    Route::post('/orders/{orderNumber}/payment', [PaymentController::class, 'verify'])->name('payment.verify');
    
    // Wishlist
    Route::get('/wishlist', function() {
        return view('customer.wishlist');
    })->name('wishlist');
});

// Checkout route (needs operating hours middleware)
Route::middleware(['auth', 'role:customer'])->group(function() {
    Route::get('/checkout', function() {
        return view('guest.checkout');
    })->name('checkout');
});

/*
|--------------------------------------------------------------------------
| Cashier Routes (Authenticated)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:cashier,admin'])->prefix('cashier')->name('cashier.')->group(function () {
    Route::get('/dashboard', function() {
        return view('cashier.dashboard');
    })->name('dashboard');
    
    // Add more cashier web routes as needed
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Authenticated)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Add more admin web routes as needed
});