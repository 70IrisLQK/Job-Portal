<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageTerm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PageTermController extends Controller
{
    public const PUBLIC_PATH = 'upload/terms/';

    public function pageTerm()
    {
        $getTerm = PageTerm::first();

        return view('admin.pages.page_setting.page_term', compact('getTerm'));
    }
    public function updatePageTerm(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getTerm = PageTerm::findOrFail($id);

        $pathName = $getTerm->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(PageTermController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getTerm->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getTerm->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Term Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}