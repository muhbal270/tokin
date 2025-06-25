<?php

use App\Http\Controllers\Backend\ProductController;
use League\Uri\UriTemplate\Template;
use App\Http\Controllers\Backend\TemplateController;
use App\Http\Controllers\Backend\DashboardController;

Route::middleware(['admin'])->group(function () {
    // Route ini hanya bisa diakses oleh pengguna yang sudah login sebagai admin
    // jika pengguna belum login atau bukan admin, maka akan diarahkan ke halaman login atau halaman lain yang ditentukan

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('backend.dashboard');

    // Route untuk halaman produk
    Route::get('/admin/product', [ProductController::class, 'index'])
        ->name('backend.product.index');

});
