<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePage;
use App\Models\JobLocation;
use App\Models\Jobs;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\WhyChoose;

class HomeController extends Controller
{
    public function index()
    {
        $listCategories = Category::withCount('jobs')->take(12)->get();
        $getHomepage = HomePage::first();
        $listWhyChoose = WhyChoose::take(3)->get();
        $listTestimonials = Testimonial::take(2)->get();
        $listPosts = Post::take(3)->get();
        $listLocation = JobLocation::latest('id')->get();

        $featuredJobs = Jobs::where('is_featured', 1)->latest('id')->take(6)->get();
        return view(
            'frontend.pages.index',
            compact(
                'listCategories',
                'getHomepage',
                'listWhyChoose',
                'listTestimonials',
                'listPosts',
                'listLocation',
                'featuredJobs'
            )
        );
    }
}