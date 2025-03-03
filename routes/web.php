<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PaymentController;


// Ruta para la landing page del webinar
Route::get('/', [LandingController::class, 'welcome'])->name('landing.welcome');
Route::get('/register', [LandingController::class, 'index'])->name('landing.index');
Route::post('/register', [LandingController::class, 'register'])->name('landing.register');
Route::post('/process-payment', [PaymentController::class, 'store'])->name('payment.process');
Route::post('/validate-email', [PaymentController::class, 'validateEmail'])->name('validate.email');


