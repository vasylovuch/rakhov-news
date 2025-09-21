<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\NewsController;

    Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

    Route::middleware('auth')->group(function () {
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');

    Route::post('news', [NewsController::class, 'store'])->name('news.store');

    Route::get('news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/{news}', [NewsController::class, 'update'])->name('news.update');

    Route::delete('news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
