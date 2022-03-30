<?php

use App\Http\Controllers\FleetController;
use App\Http\Controllers\FleetStatusController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/fleet', FleetController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/fleet-status', FleetStatusController::class)->except('store', 'destroy', 'store');

Route::get('/order-by-truck/{id}', [OrderController::class, 'get_order_by_truck']);
