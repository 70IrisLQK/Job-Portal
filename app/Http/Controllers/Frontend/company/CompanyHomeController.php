<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyHomeController extends Controller
{
    public function dashboard()
    {
        return view('frontend.pages.company.dashboard');
    }
}