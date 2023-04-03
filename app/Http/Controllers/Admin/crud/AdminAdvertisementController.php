<?php

namespace App\Http\Controllers\Admin\crud;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminAdvertisementController extends Controller
{
    public const PUBLIC_PATH = 'upload/advertisements/';
    public function edit()
    {
        $getAdvertisement = Advertisement::first();

        return view('admin.pages.page_setting.page_advertisement', compact('getAdvertisement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['mimes:png,jpg', 'max:2000'],
            'company_image' => ['mimes:png,jpg', 'max:2000'],
        ]);

        $getAdvertisement = Advertisement::findOrFail($id);

        $pathName = $getAdvertisement->job_listing_ad;
        $pathCompanyName = $getAdvertisement->company_listing_ad;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminAdvertisementController::PUBLIC_PATH);
            Image::make($image)->resize(1170, 100)->save($path . $pathName);

            $imageExist = $getAdvertisement->job_listing_ad;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }
        if ($request->hasFile('company_image')) {
            $image = $request->file('company_image');
            $pathCompanyName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminAdvertisementController::PUBLIC_PATH);
            Image::make($image)->resize(1170, 100)->save($path . $pathCompanyName);

            $imageExist = $getAdvertisement->company_listing_ad;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        Advertisement::updateOrCreate(['id' => $id], [
            'job_listing_ad' => $pathName,
            'job_listing_ad_status' => $request->job_listing_ad_status,
            'company_listing_ad' => $pathCompanyName,
            'company_listing_ad_status' => $request->company_listing_ad_status,
        ]);

        $notification = [
            'message' => 'Update Advertisement Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}