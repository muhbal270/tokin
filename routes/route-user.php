<?php

use App\Http\Controllers\Frontend\GameController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\SuccessController;
use App\Http\Controllers\Frontend\TransactionController;
use Illuminate\Support\Facades\Route;

// middleware merupakan pengaman untuk memastikan hanya pengguna yang sudah login yang bias mengakses route ini
Route::middleware('auth')->group( function (){

// products route
Route::get('/product', [GameController::class, 'index'])
    ->name('frontend.products.index');

// orders route
Route::get('/order', [OrderController::class, 'index'])
    ->name('frontend.orders.index');

Route::post('/order/checkout/{slug}', [OrderController::class, 'store'])
    ->name('frontend.orders.store');

// transactions route
Route::get('/transaksi', [TransactionController::class, 'index'])
    ->name('frontend.transactions.index');

// payments route
Route::get('/payment', [PaymentController::class, 'index'])
    ->name('frontend.payments.index');

// success route
Route::get('/sukses', [SuccessController::class, 'index'])
    ->name('frontend.success.index');

// Route untuk mengunggah bukti pembayaran
Route::get('/payment/upload/{order}', [TransactionController::class, 'showUploadForm'])
    ->name('frontend.transactions.upload.form');

// Route untuk mengunggah bukti pembayaran
Route::post('/payment/upload/{order}', [TransactionController::class, 'uploadPaymentProof'])
    ->name('frontend.transactions.upload.proof');
});