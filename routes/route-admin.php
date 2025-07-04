<?php

use App\Models\Topup;
use League\Uri\UriTemplate\Template;
use App\Http\Controllers\Backend\BankController;
use App\Http\Controllers\Backend\TopupController;
use App\Http\Controllers\Backend\ProductController;
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

    // Route untuk halaman bank
    Route::get('/admin/bank', [BankController::class, 'index'])
        ->name('backend.bank.index');

    Route::get('/admin/bank/create', [BankController::class, 'create'])
        ->name('backend.bank.create');

    Route::get('/admin/bank/edit/{bank}', [BankController::class, 'edit'])
        ->name('backend.bank.edit');

    Route::post('/admin/bank/store', [BankController::class, 'store'])
        ->name('backend.bank.store');

    Route::put('/admin/bank/update/{bank}', [BankController::class, 'update'])
        ->name('backend.bank.update');

    Route::delete('/admin/bank/delete/{bank}', [BankController::class, 'destroy'])
        ->name('backend.bank.delete');

    // Route untuk halaman topup
    Route::get('/admin/topup', [TopupController::class, 'index'])
        ->name('backend.topup.index');

    Route::get('/admin/topup/create', [TopupController::class, 'create'])
        ->name('backend.topup.create');

    Route::post('/admin/topup/store', [TopupController::class, 'store'])    
        ->name('backend.topup.store');

    Route::get('/admin/topup/edit', [TopupController::class, 'edit'])
        ->name('backend.topup.edit');

    Route::put('/admin/topup/update', [TopupController::class, 'update'])
        ->name('backend.topup.update');

});
