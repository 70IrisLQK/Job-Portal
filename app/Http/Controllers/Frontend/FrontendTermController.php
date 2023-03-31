<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageTerm;
use Illuminate\Http\Request;

class FrontendTermController extends Controller
{
    public function index()
    {
        $getTerm = PageTerm::first();

        return view('frontend.pages.terms', compact('getTerm'));
    }
}