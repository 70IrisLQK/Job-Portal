<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\PageBlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPageBlogController extends Controller
{
    public const PUBLIC_PATH = 'upload/';

    public function pageBlog()
    {
        $getBlog = PageBlog::first();
        return view('admin.pages.page_setting.page_blog', compact('getBlog'));
    }

    public function updatePageBlog(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000'],
            'seo_title' => ['max:255'],
            'seo_description' => ['max:255'],
        ]);

        $getBlog = PageBlog::findOrFail($id);

        $pathName = $getBlog->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPageBlogController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getBlog->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getBlog->update(
            [
                'title' => $request->title,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Blog Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}