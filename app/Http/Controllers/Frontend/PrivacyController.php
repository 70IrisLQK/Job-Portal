<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PagePrivacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $getPrivacy = PagePrivacy::first();

        return view('frontend.pages.privacy', compact('getPrivacy'));
    }
}
