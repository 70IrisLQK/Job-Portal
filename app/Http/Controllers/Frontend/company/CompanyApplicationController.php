<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Candidate;
use App\Models\CandidateApply;
use App\Models\CandidateAward;
use App\Models\CandidateEducation;
use App\Models\CandidateResume;
use App\Models\CandidateSkill;
use App\Models\CandidateWorkExperience;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CompanyApplicationController extends Controller
{
    public function index()
    {
        $listJobApply = [];

        $getJob = Jobs::where('company_id', Auth::guard('company')->user()->id)->first();

        if (isset($getJob)) {
            $listJobApply = CandidateApply::with('candidate')->where('job_id', $getJob->id)->get();
        }

        return view('frontend.pages.company.company_applications_list', compact('listJobApply'));
    }

    public function applicationDetail($id)
    {
        $getCandidateResume = Candidate::where('id', $id)->first();

        $candidateEducation = CandidateEducation::where('candidate_id', $id)->get();
        $candidateWorkExperience = CandidateWorkExperience::where('candidate_id', $id)->get();
        $candidateSkill = CandidateSkill::where('candidate_id', $id)->get();
        $candidateAward = CandidateAward::where('candidate_id', $id)->get();
        $candidateResume = CandidateResume::where('candidate_id', $id)->get();
        return view('frontend.pages.company.company_application_detail', compact(
            'getCandidateResume',
            'candidateEducation',
            'candidateWorkExperience',
            'candidateSkill',
            'candidateAward',
            'candidateResume',
        ));
    }

    public function applicationChangeStatus(Request $request)
    {
        $getApplication = CandidateApply::with('candidate')->where('candidate_id', $request->candidate_id)
            ->where('job_id', $request->job_id)->first();
        $getApplication->status = $request->change_status;
        $getApplication->save();

        $candidateEmail = $getApplication->candidate->email;

        if ($request->status == 'Approved') {
            // Send link
            $resetLink = route('company.application');

            $subject = 'Congratulation! Your application approved';
            $message = 'Please check the detail: <br>';
            $message .= '<a href="' . $resetLink . '">Click here!</a>';

            Mail::to($candidateEmail)->send(new WebsiteEmail($subject, $message));
        }

        $notification = [
            'message' => 'Change status application success Job Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}