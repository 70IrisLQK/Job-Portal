<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CandidateHomeController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.candidate.candidate_dashboard');
    }
}