<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);

Route::get('/user/home', [UserController::class, 'index'])->name('user.home');
Route::get('/user/profile', [UserController::class, 'profile'])->name('user.profile');
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

