<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\PagePrivacy;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPagePrivacyController extends Controller
{
    public const PUBLIC_PATH = 'upload/privacies/';

    public function pagePrivacy()
    {
        $getPrivacy = PagePrivacy::first();

        return view('admin.pages.page_setting.page_privacy', compact('getPrivacy'));
    }
    public function updatePagePrivacy(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getPrivacy = PagePrivacy::findOrFail($id);

        $pathName = $getPrivacy->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPagePrivacyController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getPrivacy->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getPrivacy->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Privacy Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
