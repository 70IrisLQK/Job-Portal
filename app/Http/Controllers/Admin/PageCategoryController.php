<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PageCategoryController extends Controller
{
    public const PUBLIC_PATH = 'upload/categories/';

    public function pageCategory()
    {
        $getCategory = PageCategory::first();
        return view('admin.pages.page_setting.page_category', compact('getCategory'));
    }

    public function updatePageCategory(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getCategory = PageCategory::findOrFail($id);

        $pathName = $getCategory->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(PageCategoryController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getCategory->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getCategory->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Category Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}