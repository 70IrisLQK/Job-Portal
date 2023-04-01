<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PageCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $listCategories = Category::latest()->take(12)->get();
        $getCategory = PageCategory::first();
        return view('frontend.pages.categories', compact('getCategory', 'listCategories'));
    }
}