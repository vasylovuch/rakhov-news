<?php

use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Route;


Route::get('sellit', [SellController::class, 'index'])->name('sellit.index');
Route::get('sell', [SellController::class, 'create'])->name('create.sellit');
Route::post('sell', [SellController::class, 'store'])->name('store.sellit');


