<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PageCategory;
use Illuminate\Http\Request;

class FrontendCategoryController extends Controller
{
    public function index()
    {
        $listCategories = Category::latest()->take(12)->get();
        $getCategory = PageCategory::first();
        return view('frontend.pages.categories', compact('getCategory', 'listCategories'));
    }
}