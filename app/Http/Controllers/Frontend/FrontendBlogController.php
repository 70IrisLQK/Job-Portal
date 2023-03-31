<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageBlog;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function index()
    {
        $listBlogs = Post::latest('id')->take(6)->get();
        $getPageBlog = PageBlog::first();
        return view('frontend.pages.blogs', compact('listBlogs', 'getPageBlog'));
    }

    public function show($id)
    {
        $getPostById = Post::find($id);
        return view('frontend.pages.post', compact('getPostById'));
    }
}