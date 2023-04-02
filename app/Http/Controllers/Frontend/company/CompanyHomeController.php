<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyHomeController extends Controller
{
    public function dashboard()
    {
        $companyId = Auth::guard('company')->user()->id;
        $totalOpenJob = Jobs::where('company_id', $companyId)->count();
        $totalFeaturedJob = Jobs::where('company_id', $companyId)->count();
        $getJobs = Jobs::with('category')->where('company_id', $companyId)->latest('id')->take(2)->get();
        return view('frontend.pages.company.dashboard', compact('totalOpenJob', 'totalFeaturedJob', 'getJobs'));
    }
}