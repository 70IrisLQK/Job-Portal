<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\CandidateApply;
use App\Models\CandidateBookmark;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class CandidateController extends Controller
{
    public const PUBLIC_PATH = 'upload/candidates/';

    public function editProfile()
    {
        $getProfile = Candidate::find(Auth::guard('candidate')->user()->id);
        return view('frontend.pages.candidate.candidate_edit_profile', compact('getProfile'));
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            "image" => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2000'],
            "name" => ['required', 'max:255'],
            "description" => ['required', 'max:255'],
            "biography" => ['required'],
            "email" => ['required', 'max:255', 'email'],
            "phone" => ['required', 'max:255'],
            "country" => ['required', 'max:255'],
            "address" => ['required', 'max:255'],
            "state" => ['required', 'max:255'],
            "city" => ['required', 'max:255'],
            "zip_code" => ['required', 'max:255'],
            "date_of_birth" => ['required'],
            'website' => ['url']
        ]);

        $getCandidate = Candidate::findOrFail($id);

        $pathName = $getCandidate->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(CandidateController::PUBLIC_PATH);
            Image::make($image)->resize(300, 300)->save($path . $pathName);

            $imageExist = $getCandidate->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        Candidate::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request->name,
                'description' => $request->description,
                'email' => $request->email,
                'image' => $pathName,
                'bio' => $request->biography,
                'phone' => $request->phone,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zip_code' => $request->zip_code,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'date_of_birth' => $request->date_of_birth,
                'website' => $request->website,
            ]
        );

        $notification = [
            'message' => 'Updated Profile Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function editPassword()
    {
        return view('frontend.pages.candidate.candidate_change_password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'max:255', 'min:6'],
            'confirm_password' => ['required', 'max:255', 'min:6', 'same:password'],
        ]);

        Candidate::updateOrCreate(
            [
                'id' => Auth::guard('candidate')->user()->id
            ],
            [
                'password' => Hash::make($request->password),
            ]
        );

        $notification = [
            'message' => 'Updated Password Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function bookmark($id)
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $existingBookmark = CandidateBookmark::where('candidate_id', $candidateId)->where('job_id', $id)->count();
        if ($existingBookmark > 0) {
            $notification = [
                'message' => 'This Job already bookmark.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        CandidateBookmark::create([
            'candidate_id' => $candidateId,
            'job_id' => $id
        ]);

        $notification = [
            'message' => 'This Job bookmark Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function bookmarks()
    {
        $candidateId = Auth::guard('candidate')->user()->id;
        $getBookmark = CandidateBookmark::with('job')->where('candidate_id', $candidateId)->latest('id')->get();

        return view('frontend.pages.candidate.candidate_bookmarked_jobs', compact('getBookmark'));
    }

    public function deleteBookmark($id)
    {
        CandidateBookmark::destroy($id);

        $notification = [
            'message' => 'This Job bookmark delete Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function apply($id)
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $existingBookmark = CandidateApply::where('candidate_id', $candidateId)
            ->where('job_id', $id)->count();

        if ($existingBookmark > 0) {
            $notification = [
                'message' => 'You have already apply on this job.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        $getJob = Jobs::find($id);
        $jobId = $id;

        return view('frontend.pages.apply', compact('jobId', 'getJob'));
    }

    public function applyStore(Request $request, $id)
    {
        CandidateApply::create([
            'candidate_id' => Auth::guard('candidate')->user()->id,
            'job_id' => $id,
            'status' => 'Applied',
            'cover_letter' => $request->cover_letter,
        ]);

        $getJob = Jobs::find($id);

        $notification = [
            'message' => 'Apply this job successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('jobs.detail', [$getJob->slug])->with($notification);
    }

    public function index()
    {
        $listCandidate = CandidateApply::with('job')->where('candidate_id', Auth::guard('candidate')->user()->id)->get();
        return view('frontend.pages.candidate.candidate_applied_jobs', compact('listCandidate'));
    }
}