<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

// Admin Side Routes
Route::resource('/products', ProductController::class);
Route::resource('/order', OrderController::class);
Route::resource('/payment', PaymentController::class);
Route::resource('/shipping', ShippingController::class);

// Order-specific custom route
Route::get('/order/send-email/{to}/{id}', [OrderController::class, 'sendEmail'])
    ->name('order.send-email');
// User Side Routes
Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/home', [UserController::class, 'index'])->name('user.home');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-address', [UserController::class, 'updateAddress'])->name('profile.updateAddress');
    Route::get('/checkout', [UserController::class, 'checkout'])->name('user.checkout');

    // Shop Routes
    Route::get('/shop', [ShopController::class, 'index'])->name('user.shop');
    Route::get('/shop/query', [ShopController::class, 'query'])->name('user.shop.query');


    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart');
    Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('user.cart.add');
    Route::delete('/cart/remove/{cartDetailId}', [CartController::class, 'destroy'])->name('user.cart.remove');
    Route::put('/cart/update/{cartDetailId}', [CartController::class, 'update'])->name('user.cart.update');
    Route::get('/shop/product-details/{productID}', [ProductController::class, 'product_detail'])->name('user.shop.product-detail');

});

// Product Details (Outside Prefix Groups)

// Invoice Route
Route::get('/invoice', [UserController::class, 'invoice'])->name('layouts.invoice');
