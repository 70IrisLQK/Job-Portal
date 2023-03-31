<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
{
    public const PUBLIC_PATH = 'upload/testimonials/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTestimonials = Testimonial::all();
        return view('admin.pages.testimonial.list_testimonial', compact('listTestimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.testimonial.add_testimonial');
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
            'description' => ['required', 'max:255'],
            'comment' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(TestimonialController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);
        }

        Testimonial::create([
            'name' => $request->name,
            'description' => $request->description,
            'comment' => $request->comment,
            'image' => $pathName,
        ]);

        $notification = [
            'message' => 'Create Testimonial Successfully.',
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
        $getTestimonialById = Testimonial::find($id);
        return view('admin.pages.testimonial.edit_testimonial', compact('getTestimonialById'));
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
            'description' => ['required', 'max:255'],
            'comment' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);


        $getTestimonial = Testimonial::findOrFail($id);
        $pathName = $getTestimonial->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(TestimonialController::PUBLIC_PATH);
            Image::make($image)->resize(300, 300)->save($path . $pathName);

            $imageExist = $getTestimonial->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        Testimonial::updateOrCreate(['id' => $id], [
            'name' => $request->name,
            'description' => $request->description,
            'comment' => $request->comment,
            'image' => $pathName,
        ]);

        $notification = [
            'message' => 'Updated Testimonial Successfully.',
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

        $getTestimonial = Testimonial::findOrFail($id);
        $imageExist = $getTestimonial->image;

        $path = public_path(TestimonialController::PUBLIC_PATH  . $imageExist);
        if (file_exists($path)) {
            unlink($path);
        }

        $getTestimonial->delete();

        $notification = [
            'message' => 'Delete Testimonial Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}