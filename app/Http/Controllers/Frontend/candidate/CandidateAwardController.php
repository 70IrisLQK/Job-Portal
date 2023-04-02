<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Models\CandidateAward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateAwardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidateId = Auth::guard('candidate')->user()->id;

        $listAward = CandidateAward::where('candidate_id', $candidateId)->latest('id')->take(3)->get();
        return view('frontend.pages.candidate.candidate_Award', compact('listAward'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.pages.candidate.candidate_award_add');
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
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
        ]);

        $candidateId = Auth::guard('candidate')->user()->id;

        CandidateAward::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'candidate_id' => $candidateId
        ]);

        $notification = array(
            'message' => 'Create Award Successfully.',
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
        $getAward = CandidateAward::find($id);
        return view('frontend.pages.candidate.candidate_award_edit', compact('getAward'));
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
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'date' => ['required', 'max:255'],
        ]);

        CandidateAward::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
        ]);

        $notification = array(
            'message' => 'Update Award Successfully.',
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
        CandidateAward::destroy($id);

        $notification = array(
            'message' => 'Delete Award Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}