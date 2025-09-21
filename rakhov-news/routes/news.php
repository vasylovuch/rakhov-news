<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;


Route::get('news/about', [NewsController::class, 'about'])->name('news.about');

// Публічні маршрути
Route::get('news', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');

// Захищені маршрути для авторизованих
Route::middleware(['auth'])->group(function () {
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
});

// Маршрут для гостей
    Route::get('/choose', [NewsController::class, 'choose'])->name('choose');
