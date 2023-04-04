<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\PagePricing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminPagePricingController extends Controller
{
    public const PUBLIC_PATH = 'upload/';

    public function pagePricing()
    {
        $getPricing = PagePricing::first();

        return view('admin.pages.page_setting.page_pricing', compact('getPricing'));
    }
    public function updatePagePricing(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'seo_title' => ['max:255'],
            'seo_description' => ['max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getPricing = PagePricing::findOrFail($id);

        $pathName = $getPricing->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminPagePricingController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getPricing->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getPricing->update(
            [
                'title' => $request->title,
                'seo_title' => $request->seo_title,
                'seo_description' => $request->seo_description,
                'image' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Page Pricing Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}