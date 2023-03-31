<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPackages = Package::latest()->get();
        return view('admin.pages.package.list_package', compact('listPackages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.package.add_package',);
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
            'price' => ['required', 'max:255'],
            'days' => ['required', 'max:255'],
            'display_time' => ['required', 'max:100'],
            'total_allowed_job' => ['max:255'],
            'total_allowed_photos' => ['max:255'],
            'total_allowed_featured_jobs' => ['max:255'],
            'total_allowed_videos' => ['max:255'],
        ]);

        Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'days' => $request->days,
            'display_time' => $request->display_time,
            'total_allowed_job' => $request->total_allowed_job,
            'total_allowed_photos' => $request->total_allowed_photos,
            'total_allowed_featured_jobs' => $request->total_allowed_featured_jobs,
            'total_allowed_videos' => $request->total_allowed_videos,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Created Package Successfully.',
            'alert-type' => 'success'
        ];

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
        $getPackage = Package::find($id);
        return view('admin.pages.package.edit_package', compact('getPackage'));
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
            'price' => ['required', 'max:255'],
            'days' => ['required', 'max:255'],
            'display_time' => ['required', 'max:100'],
            'total_allowed_job' => ['max:255'],
            'total_allowed_photos' => ['max:255'],
            'total_allowed_featured_jobs' => ['max:255'],
            'total_allowed_videos' => ['max:255'],
        ]);

        Package::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'price' => $request->price,
            'days' => $request->days,
            'display_time' => $request->display_time,
            'total_allowed_job' => $request->total_allowed_job,
            'total_allowed_photos' => $request->total_allowed_photos,
            'total_allowed_featured_jobs' => $request->total_allowed_featured_jobs,
            'total_allowed_videos' => $request->total_allowed_videos,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Updated Package Successfully.',
            'alert-type' => 'success'
        ];

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
        Package::destroy($id);

        $notification = [
            'message' => 'Deleted Package Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}