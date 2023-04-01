<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\PageFAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index()
    {
        $listFAQs = FAQ::take(6)->get();
        $getFAQ = PageFAQ::first();

        return view('frontend.pages.faq', compact('listFAQs', 'getFAQ'));
    }
}
