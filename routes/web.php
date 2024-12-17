<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BabyneedsController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::view('/our-story', 'user.our-story')->name('our.story');

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/babyneed', function () {
    return view('pages.plp');
})->name('plp');

Route::get('/babyneed/{i}', function () {
    return view('pages.pdp');
})->name('pdp');

Route::get('/profile', function () {
    return view('pages.profile'); // Menampilkan view 'resources/views/halaman.blade.php'
});

Route::view('/our-story', 'user.our-story')->name('our.story');
