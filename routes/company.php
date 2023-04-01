<?php

use App\Http\Controllers\Frontend\company\CompanyForgerPasswordController;
use App\Http\Controllers\Frontend\company\CompanyHomeController;
use App\Http\Controllers\Frontend\company\CompanyLoginController;
use App\Http\Controllers\Frontend\company\CompanyRegisterController;
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
    });
});