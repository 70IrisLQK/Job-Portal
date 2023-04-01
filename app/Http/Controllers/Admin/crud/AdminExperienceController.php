<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listExperiences = Experience::all();
        return view('admin.pages.experience.list_experience', compact('listExperiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.experience.add_experience');
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
        ]);

        Experience::create(
            [
                'name' => $request->name,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Created Experience Successfully.',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getExperienceById = Experience::find($id);
        return view('admin.pages.experience.edit_experience', compact('getExperienceById'));
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
        ]);

        Experience::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request->name,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Updated Experience Successfully.',
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
        Experience::destroy($id);

        $notification = array(
            'message' => 'Deleted Experience Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}