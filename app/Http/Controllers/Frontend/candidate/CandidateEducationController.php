<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateEducation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $listEducation = CandidateEducation::where('candidate_id', $candidateId)->latest('id')->take(3)->get();
        return view('frontend.pages.candidate.candidate_education', compact('listEducation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.candidate.candidate_education_add');
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
            'level' => ['required', 'max:255'],
            'institute' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'passing_year' => ['required', 'max:255'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;

        CandidateEducation::create([
            'level' => $request->level,
            'institute' => $request->institute,
            'degree' => $request->degree,
            'candidate_id' => $candidateId,
            'passing_year' => $request->passing_year,
        ]);

        $notification = array(
            'message' => 'Create Education Successfully.',
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
        $getEducation = CandidateEducation::find($id);
        return view('frontend.pages.candidate.candidate_education_edit', compact('getEducation'));
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
            'level' => ['required', 'max:255'],
            'institute' => ['required', 'max:255'],
            'degree' => ['required', 'max:255'],
            'passing_year' => ['required', 'max:255'],
        ]);

        CandidateEducation::updateOrCreate(['id' => $id], [
            'level' => $request->level,
            'institute' => $request->institute,
            'degree' => $request->degree,
            'passing_year' => $request->passing_year,
        ]);

        $notification = array(
            'message' => 'Update Education Successfully.',
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
        CandidateEducation::destroy($id);

        $notification = array(
            'message' => 'Delete Education Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}