<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PageCategory;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $pageCategory = PageCategory::first();

        $listCategories = Category::withCount('jobs')
            ->orderBy('name', 'ASC')
            ->take(12)
            ->get();

        $this->generateSEO($request, $pageCategory);
        return view('frontend.pages.categories', compact(
            'listCategories',
            'pageCategory'
        ));
    }

    public function generateSEO($request, $getPage)
    {
        $url = $request->url();
        $img = url('upload/' . $getPage->seo_image);

        SEOTools::setTitle($getPage->seo_title);
        SEOTools::setDescription($getPage->seo_description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }
}