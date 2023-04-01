<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\Frontend\FAQController;
use App\Http\Controllers\Frontend\ForgetController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\PricingController;
use App\Http\Controllers\Frontend\PrivacyController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\TermController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Route index
Route::get('/', [HomeController::class, 'index']);

// Auth
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/forget-password', [ForgetController::class, 'index']);

// Route jobs
Route::get('/jobs', [HomeController::class, 'jobs']);

// Route category
Route::get('/categories', [CategoryController::class, 'index']);

// Route faqs
Route::get('/faqs', [FAQController::class, 'index']);

// Route blogs
Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// Route terms
Route::get('/terms', [TermController::class, 'index']);

// Route privacy
Route::get('/privacy', [PrivacyController::class, 'index']);

// Route privacy
Route::get('/contacts', [ContactController::class, 'index']);

// Route pricing
Route::get('/pricing', [PricingController::class, 'index']);

// Company
require __DIR__ . '/company.php';