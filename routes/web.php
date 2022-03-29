<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/fleet', 'fleet')->name('fleet');
Route::view('/orders', 'orders')->name('orders');


require __DIR__ . '/auth.php';
