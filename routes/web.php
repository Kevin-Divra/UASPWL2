<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products',  \App\Http\Controllers\ProductController::class);
Route::resource('/supplier', \App\Http\Controllers\SupplierController::class);
Route::resource('/transaction', TransactionController::class);
Route::get('/transaction/send-email/{to}/{id}', [TransactionController::class, 'sendEmail']);
