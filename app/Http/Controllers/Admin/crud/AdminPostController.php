<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPostController extends Controller
{
    public const PUBLIC_PATH = 'upload/posts/';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPosts = Post::all();
        return view('admin.pages.post.list_post', compact('listPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.post.add_post');
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
            'short_description' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPostController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);
        }

        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $pathName,
            'created_by' => Auth::guard('admin')->user()->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Create Post Successfully.',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getPostById = Post::find($id);

        return view('admin.pages.post.edit_post', compact('getPostById'));
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
            'short_description' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getPostById = Post::findOrFail($id);
        $pathName = $getPostById->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPostController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getPostById->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        Post::updateOrCreate(['id' => $id], [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $pathName,
            'created_by' => Auth::guard('admin')->user()->name,
            'updated_at' => Carbon::now(),
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
        $getPostById = Post::findOrFail($id);

        $imageExist = $getPostById->image;
        $path = public_path(AdminPostController::PUBLIC_PATH);

        if (file_exists($path  . $imageExist)) {
            unlink($path . $imageExist);
        }
        $getPostById->delete();

        $notification = [
            'message' => 'Deleted Testimonial Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
