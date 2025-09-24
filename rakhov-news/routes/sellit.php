<?php

use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
Route::get('/sellit/create', [SellController::class, 'create'])->name('create.sellit');
Route::post('/sellit', [SellController::class, 'store'])->name('sellit.store');
Route::get('/sellit/my', [SellController::class, 'my'])->name('sellit.my');
});

Route::get('/sellit', [SellController::class, 'index'])->name('sellit.index');


