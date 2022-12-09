<?php

use Illuminate\Support\Facades\Route;

// In livewire we use only one route for all product methods.
Route::get('/', App\Http\Controllers\Product::class)->name('Product');
Route::get('/view-product/{productid}', App\Http\Controllers\ViewProduct::class)->name('ViewProduct');
Route::get('/whishlistproduct', App\Http\Controllers\Whishlistproduct::class)->name('whishlistproduct');


// Admin Module
Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
    'password.request' => false,
    'password.reset' => false
]);
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', App\Http\Controllers\Dashboard::class)->name('dashboard');
});
