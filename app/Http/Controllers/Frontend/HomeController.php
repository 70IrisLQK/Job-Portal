<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listCategories = Category::take(12)->get();
        $getHomepage = HomePage::first();
        $listWhyChoose = WhyChoose::take(3)->get();
        return view(
            'frontend.pages.index',
            compact('listCategories', 'getHomepage', 'listWhyChoose')
        );
    }

    public function jobs()
    {
        return view('frontend.pages.jobs');
    }
}