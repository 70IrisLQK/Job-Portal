<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PagePrivacy;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PrivacyController extends Controller
{
    public function index(Request $request)
    {
        $getPrivacy = PagePrivacy::first();
        $this->generateSEO($request, $getPrivacy);
        return view('frontend.pages.privacy', compact('getPrivacy'));
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