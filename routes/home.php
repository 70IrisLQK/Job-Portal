<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\FrontendBlogController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\FrontEndFAQController;
use App\Http\Controllers\Frontend\FrontendPrivacyController;
use App\Http\Controllers\Frontend\FrontendTermController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Route index
Route::get('/', [HomeController::class, 'index']);

// Route jobs
Route::get('/jobs', [HomeController::class, 'jobs']);

// Route category
Route::get('/categories', [FrontendCategoryController::class, 'index']);

// Route faqs
Route::get('/faqs', [FrontEndFAQController::class, 'index']);

// Route blogs
Route::get('/blogs', [FrontendBlogController::class, 'index']);
Route::get('/blogs/{id}', [FrontendBlogController::class, 'show'])->name('blogs.show');

// Route terms
Route::get('/terms', [FrontendTermController::class, 'index']);

// Route privacy
Route::get('/privacy', [FrontendPrivacyController::class, 'index']);