<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageBlog;
use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $listBlogs = Post::latest('id')->take(6)->get();
        $getPageBlog = PageBlog::first();

        $this->generateSEO($request, $getPageBlog);
        return view('frontend.pages.blogs', compact('listBlogs', 'getPageBlog'));
    }

    public function show(Request $request, $slug)
    {
        $getPostById = Post::where("slug", $slug)->first();
        $getPostById->increment('view', 1);

        $this->generateBlogSEO($request, $getPostById);

        return view('frontend.pages.post', compact('getPostById'));
    }

    public function generateSEO($request, $getPage)
    {
        $url = $request->url();
        $img = url('upload/' . $getPage->seo_image);
        $title = $getPage->seo_title;
        $description = Str::replace('<p>', '', $getPage->seo_description);

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }

    public function generateBlogSEO($request, $blogDetail)
    {
        $url = $request->url();
        $img = url('upload/' . $blogDetail->seo_image);
        $title = $blogDetail->title;
        $description = Str::replace('<p>', '', $blogDetail->description);
        $description = Str::limit($blogDetail->description, 150, '');

        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }
}