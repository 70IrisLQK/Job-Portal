<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class FrontendPricingController extends Controller
{
    public function index()
    {
        $listPackages = Package::latest()->take(3)->get();
        return view('frontend.pages.pricing', compact('listPackages'));
    }
}