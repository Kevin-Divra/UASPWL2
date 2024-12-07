<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products',  \App\Http\Controllers\ProductController::class);
Route::get('/user/home', [\App\Http\Controllers\UserController::class, 'home'])->name('user.home');
Route::get('/home', [UserController::class, 'index'])->name('home');
Route::resource('/supplier', \App\Http\Controllers\SupplierController::class);
Route::resource('/transaction', TransactionController::class);
Route::get('/transaction/send-email/{to}/{id}', [TransactionController::class, 'sendEmail']);
// Route::get('/', [AuthController::class, 'showLoginChoice'])->name('login.choice');
Route::get('/login/admin', [AuthController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/login/admin', [AuthController::class, 'adminLogin']);

Route::get('/login/user', [AuthController::class, 'showUserLoginForm'])->name('user.login');
Route::post('/login/user', [AuthController::class, 'userLogin']);


Route::get('/plp', [ProductController::class, 'plp'])->name('plp');

