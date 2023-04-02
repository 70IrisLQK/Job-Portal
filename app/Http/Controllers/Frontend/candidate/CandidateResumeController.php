<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CandidateResumeController extends Controller
{
    public const PUBLIC_PATH = 'upload/resumes/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $listResume = CandidateResume::where('candidate_id', $candidateId)->latest('id')->take(3)->get();
        return view('frontend.pages.candidate.candidate_resume', compact('listResume'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.candidate.candidate_resume_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'file' => ['required', 'mimes:pdf,doc,docx'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $pathName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(CandidateResumeController::PUBLIC_PATH), $pathName);
        }

        CandidateResume::create([
            'name' => $request->name,
            'file' => $pathName,
            'candidate_id' => $candidateId
        ]);

        $notification = array(
            'message' => 'Create Resume Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getResume = CandidateResume::find($id);
        return view('frontend.pages.candidate.candidate_resume_edit', compact('getResume'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'file' => ['mimes:pdf,doc,docx'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;
        $getResume = CandidateResume::find($id);

        $pathName = $getResume->file;

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $pathName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path(CandidateResumeController::PUBLIC_PATH), $pathName);

            $fileExist = $getResume->file;
            $path = public_path(CandidateResumeController::PUBLIC_PATH . $fileExist);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        CandidateResume::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'file' => $pathName,
            'candidate_id' => $candidateId
        ]);

        $notification = array(
            'message' => 'Update Resume Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getResume = CandidateResume::find($id);

        $fileExist = $getResume->file;
        $path = public_path(CandidateResumeController::PUBLIC_PATH . $fileExist);
        if (file_exists($path)) {
            unlink($path);
        }

        CandidateResume::destroy($id);

        $notification = array(
            'message' => 'Delete Resume Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}