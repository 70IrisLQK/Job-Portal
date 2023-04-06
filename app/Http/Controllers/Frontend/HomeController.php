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
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $listCategories = Category::withCount('jobs')->orderBy('name', 'ASC')->take(12)->get();
        $getHomepage = HomePage::first();
        $listWhyChoose = WhyChoose::take(3)->latest('id')->get();
        $listTestimonials = Testimonial::take(2)->latest('id')->get();
        $listPosts = Post::take(3)->latest('id')->get();
        $listLocation = JobLocation::orderBy('name', 'asc')->get();

        $featuredJobs = Jobs::where('is_featured', 1)->latest('id')->take(6)->get();

        $this->generateSEO($getHomepage, $request);

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

    public function generateSEO($getHomepage, $request)
    {
        $url = $request->url();
        $img = url('upload/seo_image.png');
        SEOTools::setTitle('FindJob - ' . $getHomepage->title  . ' Jobs in Ho Chi Minh & Ha Noi | FindJob');
        SEOTools::setDescription($getHomepage->short_title);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }
}