<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\FrontendBlogController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\FrontEndFAQController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs', [HomeController::class, 'jobs']);
Route::get('/categories', [FrontendCategoryController::class, 'index']);
Route::get('/faqs', [FrontEndFAQController::class, 'index']);
Route::get('/blogs', [FrontendBlogController::class, 'index']);
Route::get('/blogs/{id}', [FrontendBlogController::class, 'show'])->name('blogs.show');