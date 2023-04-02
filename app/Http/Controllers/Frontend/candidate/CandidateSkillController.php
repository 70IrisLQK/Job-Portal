<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateSkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $listSkill = CandidateSkill::where('candidate_id', $candidateId)->latest('id')->take(3)->get();
        return view('frontend.pages.candidate.candidate_skill', compact('listSkill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.candidate.candidate_skill_add');
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
            'skill_name' => ['required', 'max:255'],
            'percentage' => ['required', 'numeric'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;

        CandidateSkill::create([
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage,
            'candidate_id' => $candidateId
        ]);

        $notification = array(
            'message' => 'Create Skill Successfully.',
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
        $getSkill = CandidateSkill::find($id);
        return view('frontend.pages.candidate.candidate_skill_edit', compact('getSkill'));
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
            'skill_name' => ['required', 'max:255'],
            'percentage' => ['required', 'numeric'],
        ]);

        CandidateSkill::updateOrCreate(['id' => $id], [
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage,
        ]);

        $notification = array(
            'message' => 'Update Skill Successfully.',
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
        CandidateSkill::destroy($id);

        $notification = array(
            'message' => 'Delete Skill Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}