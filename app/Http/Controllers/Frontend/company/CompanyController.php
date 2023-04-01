<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\CompanyFounded;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanyPhoto;
use App\Models\CompanySize;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManagerStatic as Image;

class CompanyController extends Controller
{
    public const PUBLIC_PATH = 'upload/companies/';

    public function editProfile()
    {
        $companyLocation = CompanyLocation::orderBy('name', 'asc')->get();
        $companyIndustry = CompanyIndustry::orderBy('name', 'asc')->get();
        $companySize = CompanySize::orderBy('name', 'asc')->get();
        $companyFounded = CompanyFounded::orderBy('name', 'asc')->get();
        $getCompany = Company::where('id', Auth::guard('company')->user()->id)->first();
        return view(
            'frontend.pages.company.company_profile',
            compact(
                'companyLocation',
                'companyIndustry',
                'companySize',
                'companyFounded',
                'getCompany'
            )

        );
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'company_name' => ['required', 'max:255'],
            'contact_person' => ['required', 'max:255'],
            'email' => ['required', 'max:255', Rule::unique('companies')->ignore($id)],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'website' => ['max:255', 'url'],
            'oh_mon' => ['max:255'],
            'oh_tue' => ['max:255'],
            'oh_wed' => ['max:255'],
            'oh_thu' => ['max:255'],
            'oh_fri' => ['max:255'],
            'oh_sat' => ['max:255'],
            'oh_sun' => ['max:255'],
            'facebook' => ['max:255', 'url'],
            'twitter' => ['max:255', 'url'],
            'linkedin' => ['max:255', 'url'],
            'instagram' => ['max:255', 'url'],
            'logo' => ['image', 'mimes:png,jpeg,jpg', 'max:2000'],
        ]);
        $getCompany = Company::findOrFail($id);

        $pathName = $getCompany->logo;
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(CompanyController::PUBLIC_PATH);
            Image::make($image)->resize(512, 512)->save($path . $pathName);

            $imageExist = $getCompany->logo;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        Company::updateOrCreate(['id' => $id], [
            "logo" => $pathName,
            "company_name" => $request->company_name,
            "person_name" => $request->contact_person,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "website" => $request->website,
            "country_location_id" => $request->company_country_id,
            "company_size_id" => $request->company_size_id,
            "company_founded_id" => $request->company_founded_id,
            "company_industry_id" => $request->company_industry_id,
            "description" => $request->about_company,
            "oh_mon" => $request->oh_mon,
            "oh_tue" => $request->oh_tue,
            "oh_wed" => $request->oh_wed,
            "oh_thu" => $request->oh_thu,
            "oh_fri" => $request->oh_fri,
            "oh_sat" => $request->oh_sat,
            "oh_sun" => $request->oh_sun,
            "map_code" => $request->map_code,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "linkedin" => $request->linkedin,
            "instagram" => $request->instagram,
        ]);
        $notification = array(
            'message' => 'Edit Profile Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function photos()
    {
        $companyId = Auth::guard('company')->user()->id;
        // Check if a person buy a package
        $getOrder = Order::where('company_id', $companyId)
            ->where('currently_active', 1)->first();

        if (!$getOrder) {
            $notification = array(
                'message' => 'Your must have to buy package first to access this page.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        //Check if the person has access to this page under the current package
        $getPackage = Package::where('id', $getOrder->package_id)->first();

        if ($getPackage->total_allowed_photos == 0) {
            $notification = array(
                'message' => 'Your current package dose not allow to upload photo.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $getPhotos = CompanyPhoto::where('company_id', $companyId)->latest('id')->get();
        return view('frontend.pages.company.company_photos', compact('getPhotos'));
    }

    public function photoSubmit(Request $request)
    {
        $companyId = Auth::guard('company')->user()->id;

        $getOrder = Order::where('company_id', $companyId)
            ->where('currently_active', 1)->first();
        $getPackage = Package::where('id', $getOrder->package_id)->first();
        $existingPhoto = CompanyPhoto::where('company_id', $companyId)->count();

        if ($getPackage->total_allowed_photos == $existingPhoto) {
            $notification = array(
                'message' => 'Maximum number of allowed photos. So you have to upgrade your package if you want upload more photo.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $request->validate([
            'photo' => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:2000']
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(CompanyController::PUBLIC_PATH);
            Image::make($image)->resize(512, 512)->save($path . $pathName);
        }

        CompanyPhoto::create([
            'photo' => $pathName,
            'created_at' => time(),
            'company_id' => $companyId
        ]);

        $notification = array(
            'message' => 'Create Photo Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function photoDelete($id)
    {
        $getPhotoById = CompanyPhoto::findOrFail($id);

        $imageExist = $getPhotoById->photo;
        $path = public_path(CompanyController::PUBLIC_PATH);

        if (file_exists($path  . $imageExist)) {
            unlink($path . $imageExist);
        }
        $getPhotoById->delete();

        $notification = [
            'message' => 'Deleted Photo Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}