<?php

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('create', [OrderController::class, 'create'])
    ->name('orders.create');

Route::post('store', [OrderController::class, 'store'])
    ->name('orders.store');

Route::get('index', [OrderController::class, 'index'])
    ->name('orders.index');

Route::get('show/{id}', [OrderController::class, 'show'])
    ->name('orders.show');


