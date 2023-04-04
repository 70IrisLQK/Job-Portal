<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\PageFAQ;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class FAQController extends Controller
{
    public function index(Request $request)
    {
        $listFAQs = FAQ::take(6)->latest('id')->get();
        $getFAQ = PageFAQ::first();

        $this->generateSEO($request, $getFAQ);
        return view('frontend.pages.faq', compact('listFAQs', 'getFAQ'));
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