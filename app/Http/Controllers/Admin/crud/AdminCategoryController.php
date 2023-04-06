<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Jobs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCategories = Category::all();
        return view('admin.pages.category.list_category', compact('listCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add_category');
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
            'icon' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        Category::create(
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'icon' => $request->icon,
                'description' => $request->description,
                'created_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Created Category Successfully.',
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
        $getCategoryById = Category::find($id);
        return view('admin.pages.category.edit_category', compact('getCategoryById'));
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
            'icon' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        Category::updateOrCreate(
            [
                'slug' => Str::slug($request->name),
            ],
            [
                'name' => $request->name,
                'icon' => $request->icon,
                'description' => $request->description,
                'updated_at' => Carbon::now(),
            ]
        );

        $notification = array(
            'message' => 'Updated Category Successfully.',
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
        $check = Jobs::where('job_category_id', $id)->count();

        if ($check > 0) {
            $notification = array(
                'message' => 'Deleted Category Error. Because it used in another place.',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }

        Category::destroy($id);

        $notification = array(
            'message' => 'Deleted Category Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}