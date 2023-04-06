<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyLocation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminCompanyLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listLocations = CompanyLocation::all();
        return view('admin.pages.company.company_location.list_location', compact('listLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.company.company_location.add_location');
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

        CompanyLocation::create(
            [
                'name' => $request->name,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Created CompanyLocation Successfully.',
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
        $getCompanyLocationById = CompanyLocation::find($id);
        return view('admin.pages.company.company_location.edit_location', compact('getCompanyLocationById'));
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

        CompanyLocation::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'name' => $request->name,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Updated CompanyLocation Successfully.',
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
        $check = Company::where('company_location_id', $id)->count();

        if ($check > 0) {
            $notification = array(
                'message' => 'Deleted CompanyLocation Error. Because it used in another place.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        CompanyLocation::destroy($id);

        $notification = array(
            'message' => 'Deleted CompanyLocation Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}