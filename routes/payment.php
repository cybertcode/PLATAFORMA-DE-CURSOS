<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
// Para redirigir a paypal
Route::get('{course}/pay', [PaymentController::class, 'pay'])->name('pay');
Route::get('{course}/approved', [PaymentController::class, 'approved'])->name('approved');
Route::get('{course}/cancel', [PaymentController::class, 'cancel'])->name('cancel');
