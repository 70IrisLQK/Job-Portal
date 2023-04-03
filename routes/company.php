<?php

use App\Http\Controllers\Frontend\company\CompanyApplicationController;
use App\Http\Controllers\Frontend\company\CompanyController;
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

        // Order
        Route::get('orders', [CompanyPaymentController::class, 'orders'])->name('company.orders');

        // Profile
        Route::get('edit-profile', [CompanyController::class, 'editProfile'])->name('company.edit-profile');
        Route::put('update-profile/{id}', [CompanyController::class, 'updateProfile'])->name('company.update-profile');

        // Photo
        Route::get('photos', [CompanyController::class, 'photos'])->name('company.photos');
        Route::post('photos/submit', [CompanyController::class, 'photoSubmit'])->name('company.photos-submit');
        Route::get('photos/delete/{id}', [CompanyController::class, 'photoDelete'])->name('company.photos-delete');

        // Video
        Route::get('videos', [CompanyController::class, 'videos'])->name('company.videos');
        Route::post('videos/submit', [CompanyController::class, 'videoSubmit'])->name('company.videos-submit');
        Route::get('videos/delete/{id}', [CompanyController::class, 'videoDelete'])->name('company.videos-delete');

        //Edit Password
        Route::get('edit/password', [CompanyController::class, 'editPassword'])->name('company.edit-password');
        Route::put('update/password', [CompanyController::class, 'updatePassword'])->name('company.update-password');

        // Job route
        Route::get('all/jobs', [CompanyController::class, 'jobs'])->name('company.jobs');
        Route::get('jobs', [CompanyController::class, 'createJob'])->name('company.create-job');
        Route::post('store/jobs', [CompanyController::class, 'storeJob'])->name('company.store-job');
        Route::get('edit/jobs/{id}', [CompanyController::class, 'editJob'])->name('company.edit-job');
        Route::put('update/jobs/{id}', [CompanyController::class, 'updateJob'])->name('company.update-job');
        Route::get('destroy/jobs/{id}', [CompanyController::class, 'destroyJob'])->name('company.delete-job');

        // Application route
        Route::get('application', [CompanyApplicationController::class, 'index'])->name('company.application');
        Route::get('application/detail/{id}', [CompanyApplicationController::class, 'applicationDetail'])->name('application.detail');
        Route::post('application/change-status', [CompanyApplicationController::class, 'applicationChangeStatus'])->name('application.change-status');
    });
});