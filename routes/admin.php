<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\WhyChooseController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'adminLogin'])->name('admin.login');
    Route::post('login-submit', [AdminController::class, 'adminLoginSubmit'])->name('admin.login-submit');
    Route::get('forget-password', [AdminController::class, 'adminForgetPassword'])->name('admin.forget-password');
    Route::post('forget-password-submit', [AdminController::class, 'adminForgetPasswordSubmit'])->name('admin.forget-password-submit');
    Route::get('reset-password/{token}/{email}', [AdminController::class, 'adminResetPassword']);
    Route::post('reset-password-submit', [AdminController::class, 'adminResetPasswordSubmit'])->name('admin.reset-password-submit');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('profile/{id}', [AdminController::class, 'showProfile'])->name('admin.profile');
        Route::post('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
        Route::put('update-profile/{id}', [AdminController::class, 'updateProfile'])->name('admin.update-profile');

        // Setting home
        // Homepage
        Route::get('homepage/setting', [HomePageController::class, 'homePage'])->name('admin.homepage');
        Route::put('homepage/{id}', [HomePageController::class, 'updateHomePage'])->name('admin.update-homepage');
        //Job Category
        Route::get('homepage/job-category', [HomePageController::class, 'jobCategory'])->name('admin.job-category');
        Route::put('job-category/{id}', [HomePageController::class, 'updateJobCategory'])->name('admin.update-job-category');
        //Why choose us
        Route::get('homepage/why-choose', [HomePageController::class, 'whyChoose'])->name('admin.why-choose');
        Route::put('why-choose/{id}', [HomePageController::class, 'updateWhyChoose'])->name('admin.update-why-choose');
        //Feature job
        Route::get('homepage/feature-job', [HomePageController::class, 'featureJob'])->name('admin.feature-job');
        Route::put('feature-job/{id}', [HomePageController::class, 'updateFeatureJob'])->name('admin.update-feature-job');
        //Testimonial
        Route::get('homepage/testimonial', [HomePageController::class, 'testimonial'])->name('admin.testimonial');
        Route::put('testimonial/{id}', [HomePageController::class, 'updateTestimonial'])->name('admin.update-testimonial');

        // Category route
        Route::resource('categories', CategoryController::class);

        // Category route
        Route::resource('chooses', WhyChooseController::class);

        // Testimonial route
        Route::resource('testimonials', TestimonialController::class);
    });
});