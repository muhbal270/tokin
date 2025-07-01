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

    Route::get('/admin/product/create', [ProductController::class, 'create'])
        ->name('backend.product.create');

    Route::post('/admin/product/store', [ProductController::class, 'store'])
        ->name('backend.product.store');

    Route::get('/admin/product/edit/{product}', [ProductController::class, 'edit'])
        ->name('backend.product.edit');

    Route::put('/admin/product/update/{product}', [ProductController::class, 'update'])
        ->name('backend.product.update');

    Route::delete('/admin/product/delete/{product}', [ProductController::class, 'destroy'])
        ->name('backend.product.delete');

});
