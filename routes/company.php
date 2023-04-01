<?php

use App\Http\Controllers\Frontend\company\CompanyForgerPasswordController;
use App\Http\Controllers\Frontend\company\CompanyHomeController;
use App\Http\Controllers\Frontend\company\CompanyLoginController;
use App\Http\Controllers\Frontend\company\CompanyPaymentController;
use App\Http\Controllers\Frontend\company\CompanyRegisterController;
use App\Http\Controllers\Frontend\company\PaypalController;
use App\Http\Controllers\Frontend\company\StripeController;
use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('company')->group(function () {
    Route::post('register', [CompanyRegisterController::class, 'companyRegister'])->name('company.register');
    Route::get('verify-account/{token}/{email}', [CompanyRegisterController::class, 'verifyAccount']);

    Route::post('login', [CompanyLoginController::class, 'companyLogin'])->name('company.login');

    Route::get('forget-password', [CompanyForgerPasswordController::class, 'index']);
    Route::post('forget-password-submit', [CompanyForgerPasswordController::class, 'companyForgetPasswordSubmit'])->name("company.forget-password-submit");

    Route::get('reset-password/{token}/{email}', [CompanyForgerPasswordController::class, 'companyResetPassword']);
    Route::post('reset-password', [CompanyForgerPasswordController::class, 'companyResetPasswordSubmit'])->name('company.reset-password');

    Route::middleware(['company'])->group(function () {
        Route::get('dashboard', [CompanyHomeController::class, 'dashboard'])->name('company.dashboard');
        Route::post('logout', [CompanyLoginController::class, 'logout'])->name('company.logout');

        // Make payment
        Route::get('payment', [CompanyPaymentController::class, 'payment'])->name('company.payment');

        Route::post('paypal/payment', [PaypalController::class, 'paypal'])->name('company.paypal');
        Route::get('paypal/success', [PaypalController::class, 'success'])->name('company.paypal-success');
        Route::get('paypal/cancel', [PaypalController::class, 'cancel'])->name('company.paypal-cancel');

        Route::post('stripe/payment', [StripeController::class, 'stripe'])->name('company.stripe');
        Route::get('stripe/success', [StripeController::class, 'success'])->name('company.stripe-success');
        Route::get('stripe/cancel', [StripeController::class, 'cancel'])->name('company.stripe-cancel');
    });
});