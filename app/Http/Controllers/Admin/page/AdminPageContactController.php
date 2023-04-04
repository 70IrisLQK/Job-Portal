<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\PageContact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPageContactController extends Controller
{
    public const PUBLIC_PATH = 'upload/';

    public function pageContact()
    {
        $getContact = PageContact::first();
        return view('admin.pages.page_setting.page_contact', compact('getContact'));
    }

    public function updatePageContact(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'map_code' => ['required'],
            'seo_title' => ['max:255'],
            'seo_description' => ['max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getContact = PageContact::findOrFail($id);

        $pathName = $getContact->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPageContactController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getContact->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getContact->update(
            [
                'title' => $request->title,
                'map_code' => $request->map_code,
                'description' => $request->description,
                'image' => $pathName,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Contact Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}