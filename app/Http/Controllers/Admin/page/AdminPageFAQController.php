<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\PageFAQ;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPageFAQController extends Controller
{
    public const PUBLIC_PATH = 'upload/';

    public function pageFAQ()
    {
        $getFAQ = PageFAQ::first();

        return view('admin.pages.page_setting.page_faq', compact('getFAQ'));
    }
    public function updatePageFAQ(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'seo_title' => ['max:255'],
            'seo_description' => ['max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getFAQ = PageFAQ::findOrFail($id);

        $pathName = $getFAQ->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPageFAQController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getFAQ->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getFAQ->update(
            [
                'title' => $request->title,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page FAQ Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}