<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PagePricing;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class PricingController extends Controller
{
    public function index(Request $request)
    {
        $listPackages = Package::latest()->take(3)->get();
        $getPricing = PagePricing::first();

        $this->generateSEO($request, $getPricing);

        return view('frontend.pages.pricing', compact('listPackages', 'getPricing'));
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