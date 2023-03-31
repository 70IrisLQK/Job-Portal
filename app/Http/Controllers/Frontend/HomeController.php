<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\Testimonial;
use App\Models\WhyChoose;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $listCategories = Category::take(12)->get();
        $getHomepage = HomePage::first();
        $listWhyChoose = WhyChoose::take(3)->get();
        $listTestimonials = Testimonial::take(2)->get();
        return view(
            'frontend.pages.index',
            compact(
                'listCategories',
                'getHomepage',
                'listWhyChoose',
                'listTestimonials'
            )
        );
    }

    public function jobs()
    {
        return view('frontend.pages.jobs');
    }
}