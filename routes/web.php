<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyneedsController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/babyneed', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/babyneed/{i}', function () {
    return view('pages.pdp');
})->name('pdp');

