<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateHomeController extends Controller
{
    public function dashboard()
    {
        $totalApply = 0;
        $totalApprove = 0;
        $totalReject = 0;

        $totalApply = CandidateApply::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Applied')->count();
        $totalApprove = CandidateApply::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Approved')->count();
        $totalReject = CandidateApply::where('candidate_id', Auth::guard('candidate')->user()->id)->where('status', 'Reject')->count();

        return view('frontend.pages.candidate.candidate_dashboard', compact(
            'totalApply',
            'totalApprove',
            'totalReject',
        ));
    }
}