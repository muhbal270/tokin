<?php

use App\Http\Controllers\Frontend\Auth\AuthController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
// Route inin hanya bisa diakses oleh pengguna yang belum login
// jika pengguna sudah login, maka akan diarahkan ke halaman login atau halaman lain yang ditentukan
Route::get('/login', [AuthController::class, 'index'])
    ->name('login');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');
});

