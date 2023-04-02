<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateWorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateExperienceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $listExperience = CandidateWorkExperience::where('candidate_id', $candidateId)->latest('id')->take(3)->get();
        return view('frontend.pages.candidate.candidate_experience', compact('listExperience'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.candidate.candidate_experience_add');
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
            'company' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'start_date' => ['required'],
            'end_date' => ['required', 'after_or_equal:start_date'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;
        CandidateWorkExperience::create([
            'company' => $request->company,
            'description' => $request->description,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date,
            'candidate_id' => $candidateId
        ]);

        $notification = array(
            'message' => 'Create Experience Successfully.',
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
        $getExperience = CandidateWorkExperience::find($id);
        return view('frontend.pages.candidate.candidate_experience_edit', compact('getExperience'));
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
            'company' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'start_date' => ['required'],
            'end_date' => ['required', 'after_or_equal:start_date'],
        ]);

        CandidateWorkExperience::updateOrCreate(['id' => $id], [
            'company' => $request->company,
            'description' => $request->description,
            'end_date' => $request->end_date,
            'start_date' => $request->start_date,
        ]);

        $notification = array(
            'message' => 'Update Experience Successfully.',
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
        CandidateWorkExperience::destroy($id);

        $notification = array(
            'message' => 'Delete Experience Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}