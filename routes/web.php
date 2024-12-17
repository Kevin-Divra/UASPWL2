<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
Route::post('/profile/update-address', [UserController::class, 'updateAddress'])->name('profile.updateAddress');
Route::view('/our-material', 'user.our-material')->name('our.material');


// Route::get('/plp', [ProductController::class, 'plp'])->name('plp');
Route::get('/shop', function () {
    return view('user.shop');
})->name('shop');

Route::get('/shop/details-product', function () {
    return view('user.pdp');
})->name('pdp');
Route::get('/invoice', [UserController::class, 'invoice'])->name('layouts.invoice');

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/products',  \App\Http\Controllers\ProductController::class);
// Route::get('/user/home', [UserController::class, 'index'])->name('user.home');
// Route::get('/user/profile', [\App\Http\Controllers\UserController::class, 'profile'])->name('user.profile');
// Route::get('/home', [UserController::class, 'index'])->name('home');
// Route::resource('/supplier', \App\Http\Controllers\SupplierController::class);
// Route::resource('/transaction', TransactionController::class);
// Route::get('/transaction/send-email/{to}/{id}', [TransactionController::class, 'sendEmail']);

// Route::get('/login/admin', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
// Route::post('/login/admin', [AuthController::class, 'adminLogin']);

// Route::get('/login/user', [AuthController::class, 'showUserLoginForm'])->name('user.login');
// Route::post('/login/user', [AuthController::class, 'userLogin']);


// Route::get('/plp', [ProductController::class, 'plp'])->name('plp');

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
