<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// frontend routes
Route::get('/', [HomeController::class, 'index'])
    ->name('frontend.index');

// user routes
require __DIR__.'/route-user.php';
require __DIR__.'/auth-user.php';

// backend routes
require __DIR__.'/route-admin.php';