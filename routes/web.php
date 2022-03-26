<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders', 'index')->name('orders');
});

Route::view('/fleet', 'fleet')->name('fleet');

require __DIR__ . '/auth.php';
