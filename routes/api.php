<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserApiController;

Route::apiResource('users', UserApiController::class);
Route::post('login', [UserController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
}); // No auth middleware

Route::get('test', function(){
    return response()->json(['message' => 'API is working!',]);
});