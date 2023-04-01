<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PagePricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    public function index()
    {
        $listPackages = Package::latest()->take(3)->get();
        $getPricing = PagePricing::first();
        return view('frontend.pages.pricing', compact('listPackages', 'getPricing'));
    }
}
