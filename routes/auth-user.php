<?php

use App\Http\Controllers\Frontend\Auth\AuthController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
// Route inin hanya bisa diakses oleh pengguna yang belum login
// jika pengguna sudah login, maka akan diarahkan ke halaman login atau halaman lain yang ditentukan

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');
    Route::post('/login', [AuthController::class, 'login_post'])
        ->name('login.post');

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');
    Route::post('/register', [AuthController::class, 'register_post'])
        ->name('register.post');
});

Route::middleware('auth')->group (function(){
    route::post('/logout', function(){
        Auth::logout();
        toastr()->success('Berhasil logout cuyyy!');
        return redirect()->route('frontend.index');
    })->name('logout');
});