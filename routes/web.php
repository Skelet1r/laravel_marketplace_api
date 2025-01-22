<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\get;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/createAccount','createAccount')->middleware('guest')->name('createAccount');
    Route::post('/signIn','signIn')->middleware('guest')->name('signIn');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
    Route::post('/forgotPassword','forgotPassword')->middleware('guest')->name('forgotPassword');
    Route::post('/resetPassword','resetPassword')->middleware('guest')->name('password.reset');
});

Route::controller(ProductController::class)->group(function () {
   Route::get('/search/{product}/{orderBy}', 'search')->name('search')->middleware('auth');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/getCart/{cart}', 'getCart')->name('getCart')->middleware('auth');
    Route::post('/addToCart/{id}', 'addToCart')->name('addToCart')->middleware('auth');
    Route::delete('/removeFromCart/{cartItem}', 'removeFromCart')->name('removeFromCart')->middleware('auth');
    Route::delete('/deleteCart/{cart}', 'deleteCart')->name('deleteCart')->middleware('auth');
});

Route::controller(OrderController::class)->group(function () {
    Route::post('/createOrder/{cart}', 'createOrder')->name('createOrder')->middleware('auth');
});
