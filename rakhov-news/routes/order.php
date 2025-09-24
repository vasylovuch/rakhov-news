<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;


Route::middleware('auth')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/create/{id}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');
});


