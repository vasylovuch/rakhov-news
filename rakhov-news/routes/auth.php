<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\RegisteredUserController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\ChooseController;

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('choose', [ChooseController::class, 'choose'])->name('choose');
