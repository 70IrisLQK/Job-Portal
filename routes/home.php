<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\FrontendCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs', [HomeController::class, 'jobs']);
Route::get('/categories', [FrontendCategoryController::class, 'index']);
Route::get('/posts/{id}', [PostController::class, 'show']);