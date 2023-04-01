<?php

use App\Http\Controllers\Frontend\candidate\CandidateForgerPasswordController;
use App\Http\Controllers\Frontend\candidate\CandidateHomeController;
use App\Http\Controllers\Frontend\candidate\CandidateLoginController;
use App\Http\Controllers\Frontend\candidate\CandidateRegisterController;
use Illuminate\Support\Facades\Route;

// Auth
Route::prefix('candidate')->group(function () {
    Route::post('register', [CandidateRegisterController::class, 'candidateRegister'])->name('candidate.register');
    Route::get('verify-account/{token}/{email}', [CandidateRegisterController::class, 'verifyAccount']);

    Route::post('login', [CandidateLoginController::class, 'candidateLogin'])->name('candidate.login');

    Route::get('forget-password', [CandidateForgerPasswordController::class, 'index']);
    Route::post('forget-password-submit', [CandidateForgerPasswordController::class, 'candidateForgetPasswordSubmit'])->name("candidate.forget-password-submit");

    Route::get('reset-password/{token}/{email}', [CandidateForgerPasswordController::class, 'candidateResetPassword']);
    Route::post('reset-password', [CandidateForgerPasswordController::class, 'candidateResetPasswordSubmit'])->name('candidate.reset-password');

    Route::middleware(['candidate'])->group(function () {
        Route::get('dashboard', [CandidateHomeController::class, 'dashboard'])->name('candidate.dashboard');
        Route::post('logout', [CandidateLoginController::class, 'logout'])->name('candidate.logout');
    });
});