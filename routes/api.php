<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->group(function () {
    // Cart API
    Route::get('/cart', [CartController::class, 'index'])->name('api.cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('api.cart.store');
    
    // Orders API
    Route::post('/orders/checkout', [OrderController::class, 'checkout'])->name('api.orders.checkout');
});
