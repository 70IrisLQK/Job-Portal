<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PagePricing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class PagePricingController extends Controller
{
    public const PUBLIC_PATH = 'upload/pricing/';

    public function pagePricing()
    {
        $getPricing = PagePricing::first();

        return view('admin.pages.page_setting.page_pricing', compact('getPricing'));
    }
    public function updatePagePricing(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'max:100'],
            'description' => ['required', 'max:255'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getPricing = PagePricing::findOrFail($id);

        $pathName = $getPricing->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(PagePricingController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getPricing->image;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getPricing->update(
            [
                'title' => $request->title,
                'description' => $request->description,
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