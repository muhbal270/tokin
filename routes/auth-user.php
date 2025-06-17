<?php

use App\Http\Controllers\Frontend\Auth\AuthController;
use App\Http\Controllers\Frontend\GameController;
use App\Http\Controllers\Frontend\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])
    ->name('frontend.auth.login');

Route::get('/register', [AuthController::class, 'register'])
    ->name('frontend.auth.register');