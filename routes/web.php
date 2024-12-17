<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});
// login regis
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//admin side
Route::resource('/products', ProductController::class);
Route::resource('/order', OrderController::class);
Route::get('/order/send-email/{to}/{id}', [OrderController::class, 'sendEmail'])->name('order.send-email');


//user side
Route::get('/user/home', [UserController::class, 'index'])->name('user.home');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
Route::put('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
Route::get('/home', [UserController::class, 'index'])->name('home');
Route::resource('/supplier', SupplierController::class);
Route::resource('/transaction', TransactionController::class);

Route::get('/transaction/send-email/{to}/{id}', [TransactionController::class, 'sendEmail'])->name('transaction.send-email');

// Login routes for admin and user
Route::get('/login/admin', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/login/admin', [AuthController::class, 'adminLogin']);
Route::get('/login/user', [AuthController::class, 'showUserLoginForm'])->name('user.login');
Route::post('/login/user', [AuthController::class, 'userLogin']);

Route::get('/plp', [ProductController::class, 'plp'])->name('plp');
Route::get('/shop', function () {
    return view('user.plp');
})->name('plp');

Route::get('/shop/details-product', function () {
    return view('user.pdp');
})->name('pdp');
Route::get('/invoice', [UserController::class, 'invoice'])->name('layouts.invoice');


// shop

// Route::get('/shop', [ShopController::class,  'index']->name('user.shop'));
// Route::get('/api/products', [ShopController::class, 'fetchProducts']);

// Halaman utama untuk menampilkan produk di /shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');

// API untuk mengambil produk dengan AJAX di /shop/fetch-products
Route::get('/shop/fetch-products', [ShopController::class, 'fetchProducts'])->name('shop.fetchProducts');

// routes/web.php
Route::get('/product/{id}', [ShopController::class, 'show'])->name('product.show');

//chart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/user/cart', [CartController::class, 'index'])->name('user.cart');
Route::get('/user/payment', [PaymentController::class, 'index'])->name('user.payment');

//payment
Route::middleware(['auth'])->group(function () {
    Route::resource('orders', OrderController::class);  // Menggunakan resource controller
});

Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

Route::post('/payment/submit', [PaymentController::class, 'submit'])->name('payment.submit');


Route::post('/payment', [PaymentController::class, 'initiate'])->name('payment.initiate');

// Menyelesaikan pembayaran (misalnya menggunakan Stripe atau gateway lain)
Route::post('/payment/complete', [PaymentController::class, 'complete'])->name('payment.complete');

// Route untuk menuju halaman pembayaran
Route::get('/payment', [OrderController::class, 'payment'])->name('payment');

// Route untuk memproses pembayaran
Route::post('/payment/complete', [PaymentController::class, 'complete'])->name('payment.complete');

// Route::get('/layouts/invoice', [\App\Http\Controllers\UserController::class, 'invoice'])->name('layouts.invoice');





// Route::get('/', function () {
//     return view('user.home');
// })->name('home');

// Route::get('/babyneed', function () {
//     return view('user.plp');
// })->name('plp');

// Route::get('/babyneed/{i}', function () {
//     return view('user.pdp');
// })->name('pdp');

// Route::get('/profile', function () {
//     return view('user.profile'); // Menampilkan view 'resources/views/halaman.blade.php'
// });

