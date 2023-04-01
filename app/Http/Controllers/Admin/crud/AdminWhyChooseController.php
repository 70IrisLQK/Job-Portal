<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\WhyChoose;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminWhyChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listChooses = WhyChoose::all();
        return view('admin.pages.whychoose.list_whychoose', compact('listChooses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.whychoose.add_whychoose');
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
            'title' => ['required', 'max:20'],
            'icon' => ['required', 'max:20'],
            'description' => ['required', 'max:100'],
        ]);

        WhyChoose::create(
            [
                'title' => $request->title,
                'icon' => $request->icon,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Created WhyChoose Successfully.',
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
        $getWhyChooseById = WhyChoose::find($id);
        return view('admin.pages.whychoose.edit_whychoose', compact('getWhyChooseById'));
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
            'title' => ['required', 'max:20'],
            'icon' => ['required', 'max:20'],
            'description' => ['required', 'max:100'],
        ]);

        WhyChoose::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'title' => $request->title,
                'icon' => $request->icon,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Updated WhyChoose Successfully.',
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
        WhyChoose::destroy($id);

        $notification = array(
            'message' => 'Deleted WhyChoose Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
