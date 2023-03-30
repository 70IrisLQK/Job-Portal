<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('login-submit', [AdminController::class, 'adminLoginSubmit'])->name('admin.login-submit');
    Route::post('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
    Route::get('forget-password', [AdminController::class, 'adminForgetPassword'])->name('admin.forget-password');
    Route::post('forget-password-submit', [AdminController::class, 'adminForgetPasswordSubmit'])->name('admin.forget-password-submit');
    Route::get('reset-password/{token}/{email}', [AdminController::class, 'adminResetPassword']);
    Route::post('reset-password-submit', [AdminController::class, 'adminResetPasswordSubmit'])->name('admin.reset-password-submit');

    // Route::middleware()->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // });
});