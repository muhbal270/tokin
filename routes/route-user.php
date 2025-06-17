<?php

use App\Http\Controllers\Frontend\GameController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\SuccessController;
use App\Http\Controllers\Frontend\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/product', [GameController::class, 'index'])
    ->name('frontend.products.index');

Route::get('/order', [OrderController::class, 'index'])
    ->name('frontend.orders.index');

Route::get('/transaksi', [TransactionController::class, 'index'])
    ->name('frontend.transactions.index');

Route::get('/payment', [PaymentController::class, 'index'])
    ->name('frontend.payments.index');

Route::get('/sukses', [SuccessController::class, 'index'])
    ->name('frontend.success.index');