<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/createAccount','createAccount')->middleware('guest')->name('createAccount');
    Route::post('/signIn','signIn')->middleware('guest')->name('signin');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::post('/forgotPassword','forgotPassword')->middleware('guest')->name('forgotPassword');
    Route::post('/resetPassword','resetPassword')->middleware('guest')->name('password.reset');
});

Route::controller(ProductController::class)->group(function () {
   Route::get('/search/{product}/{orderBy}', 'search')->name('search')->middleware('auth');
});
