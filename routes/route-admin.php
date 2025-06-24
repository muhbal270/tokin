<?php

use App\Http\Controllers\Backend\DashboardController;

Route::middleware(['admin'])->group(function () {
    // Route ini hanya bisa diakses oleh pengguna yang sudah login sebagai admin
    // jika pengguna belum login atau bukan admin, maka akan diarahkan ke halaman login atau halaman lain yang ditentukan

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('backend.dashboard');

});
