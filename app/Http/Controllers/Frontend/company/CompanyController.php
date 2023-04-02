<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyFounded;
use App\Models\CompanyIndustry;
use App\Models\CompanyLocation;
use App\Models\CompanyPhoto;
use App\Models\CompanySize;
use App\Models\CompanyVideo;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\JobLocation;
use App\Models\Jobs;
use App\Models\Order;
use App\Models\Package;
use App\Models\Salary;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
            "company_location_id" => $request->company_country_id,
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
    public function videos()
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

        if ($getPackage->total_allowed_videos == 0) {
            $notification = array(
                'message' => 'Your current package dose not allow to upload video.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $getVideos = CompanyVideo::where('company_id', $companyId)->latest('id')->get();
        return view('frontend.pages.company.company_video', compact('getVideos'));
    }

    public function videoSubmit(Request $request)
    {
        $companyId = Auth::guard('company')->user()->id;

        $getOrder = Order::where('company_id', $companyId)
            ->where('currently_active', 1)->first();
        $getPackage = Package::where('id', $getOrder->package_id)->first();
        $existingVideo = CompanyVideo::where('company_id', $companyId)->count();

        if ($getPackage->total_allowed_videos == $existingVideo) {
            $notification = array(
                'message' => 'Maximum number of allowed videos. So you have to upgrade your package if you want upload more video.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $request->validate([
            'video' => ['required', 'max:255']
        ]);

        CompanyVideo::create([
            'video' => $request->video,
            'created_at' => time(),
            'company_id' => $companyId
        ]);

        $notification = array(
            'message' => 'Create Video Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function videoDelete($id)
    {
        $getVideoById = CompanyVideo::findOrFail($id);

        $getVideoById->delete();

        $notification = [
            'message' => 'Deleted Video Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function editPassword()
    {
        return view('frontend.pages.company.company_edit_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'max:255', 'min:6'],
            'confirm_password' => ['required', 'max:255', 'min:6', 'same:password'],
        ]);

        $getCompany = Company::find(Auth::guard('company')->user()->id);

        $getCompany->password = Hash::make($request->password);
        $getCompany->save();

        $notification = [
            'message' => 'Update Password Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function createJob()
    {
        $companyId = Auth::guard('company')->user()->id;

        $getOrder = Order::where('company_id', $companyId)
            ->where('currently_active', 1)->first();
        $getPackage = Package::where('id', $getOrder->package_id)->first();
        $existingJob = Jobs::where('company_id', $companyId)->count();

        if ($getPackage->total_allowed_featured_jobs == $existingJob) {
            $notification = array(
                'message' => 'Maximum number of allowed jobs. So you have to upgrade your package if you want upload more job.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $jobLocation = JobLocation::orderBy('name', 'asc')->get();
        $jobCategory = Category::orderBy('name', 'asc')->get();
        $jobType = Type::orderBy('name', 'asc')->get();
        $jobExperience = Experience::orderBy('name', 'asc')->get();
        $jobSalaryRange = Salary::orderBy('name', 'asc')->get();
        $jobGender = Gender::orderBy('name', 'asc')->get();

        return view(
            'frontend.pages.company.company_job_add',
            compact(
                'jobLocation',
                'jobCategory',
                'jobType',
                'jobExperience',
                'jobSalaryRange',
                'jobGender',
            )
        );
    }

    public function storeJob(Request $request)
    {
        $companyId = Auth::guard('company')->user()->id;

        $getOrder = Order::where('company_id', $companyId)
            ->where('currently_active', 1)->first();
        $getPackage = Package::where('id', $getOrder->package_id)->first();
        $existingVideo = Jobs::where('company_id', $companyId)->count();

        if ($getPackage->total_allowed_featured_jobs == $existingVideo) {
            $notification = array(
                'message' => 'Maximum number of allowed job. So you have to upgrade your package if you want upload more job.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        $request->validate([
            "title" => ['required', 'max:255'],
            "deadline" => ['required'],
            "vacancy" => ['required', 'numeric'],
            "category_id" => ['required'],
            "location_id" => ['required'],
            "type_id" => ['required'],
            "experience_id" => ['required'],
            "gender_id" => ['required'],
            "salary_range_id" => ['required'],
            "is_featured" => ['required'],
            "is_urgent" => ['required'],
        ]);

        Jobs::updateOrCreate(
            [
                'slug' => Str::slug($request->title),
            ],
            [
                'company_id' => $companyId,
                'title' => $request->title,
                'description' => $request->description,
                'responsibility' => $request->responsibility,
                'skill' => $request->skill,
                'education' => $request->education,
                'benefit' => $request->benefit,
                'deadline' => $request->deadline,
                'vacancy' => $request->vacancy,
                'job_category_id' => $request->category_id,
                'job_location_id' => $request->location_id,
                'job_type_id' => $request->type_id,
                'job_experience_id' => $request->experience_id,
                'job_gender_id' => $request->gender_id,
                'job_salary_range_id' => $request->salary_range_id,
                'map_code' => $request->map_code,
                'is_featured' => $request->is_featured,
                'is_urgent' => $request->is_urgent,
                'created_at' => time(),
            ]
        );

        $notification = [
            'message' => 'Create Job Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function jobs()
    {
        $listJobs = Jobs::with('category')->latest()->get();
        return view('frontend.pages.company.company_all_jobs', compact('listJobs'));
    }

    public function editJob($id)
    {
        $getJobById = Jobs::find($id);
        $jobLocation = JobLocation::orderBy('name', 'asc')->get();
        $jobCategory = Category::orderBy('name', 'asc')->get();
        $jobType = Type::orderBy('name', 'asc')->get();
        $jobExperience = Experience::orderBy('name', 'asc')->get();
        $jobSalaryRange = Salary::orderBy('name', 'asc')->get();
        $jobGender = Gender::orderBy('name', 'asc')->get();
        return view('frontend.pages.company.company_edit_jobs', compact(
            'getJobById',
            'jobLocation',
            'jobCategory',
            'jobType',
            'jobExperience',
            'jobSalaryRange',
            'jobGender',
        ));
    }
    public function updateJob(Request $request, $id)
    {
        $request->validate([
            "title" => ['required', 'max:255'],
            "deadline" => ['required'],
            "vacancy" => ['required', 'numeric'],
            "category_id" => ['required'],
            "location_id" => ['required'],
            "type_id" => ['required'],
            "experience_id" => ['required'],
            "gender_id" => ['required'],
            "salary_range_id" => ['required'],
            "is_featured" => ['required'],
            "is_urgent" => ['required'],
        ]);

        $companyId = Auth::guard('company')->user()->id;

        Jobs::updateOrCreate(
            [
                'id' => $id,
                'slug' => Str::slug($request->title),
            ],
            [
                'company_id' => $companyId,
                'title' => $request->title,
                'description' => $request->description,
                'responsibility' => $request->responsibility,
                'skill' => $request->skill,
                'education' => $request->education,
                'benefit' => $request->benefit,
                'deadline' => $request->deadline,
                'vacancy' => $request->vacancy,
                'job_category_id' => $request->category_id,
                'job_location_id' => $request->location_id,
                'job_type_id' => $request->type_id,
                'job_experience_id' => $request->experience_id,
                'job_gender_id' => $request->gender_id,
                'job_salary_range_id' => $request->salary_range_id,
                'map_code' => $request->map_code,
                'is_featured' => $request->is_featured,
                'is_urgent' => $request->is_urgent,
                'created_at' => time(),
            ]
        );

        $notification = [
            'message' => 'Create Job Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function destroyJob($id)
    {
        Jobs::destroy($id);

        $notification = [
            'message' => 'Deleted Job Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function companies(Request $request)
    {
        $companyLocation = CompanyLocation::all();
        $companyIndustry = CompanyIndustry::all();
        $companySize = CompanySize::all();
        $companyFounded = CompanyFounded::all();

        $name = $request->name;
        $location = $request->location;
        $size = $request->size;
        $industry = $request->industry;
        $founded = $request->founded;

        $getCompanies = Company::with(
            'location',
            'size',
            'industry',
            'founded'
        )->withCount('jobs')
            ->latest('id');

        if ($name != null) {
            $getCompanies->where('company_name', 'LIKE', '%' . $name . '%');
        }
        if ($location != null) {
            $getCompanies->where('company_location_id', $location);
        }
        if ($size != null) {
            $getCompanies->where('company_size_id', $size);
        }
        if ($industry != null) {
            $getCompanies->where('company_industry_id', $industry);
        }
        if ($founded != null) {
            $getCompanies->where('company_founded_id', $founded);
        }

        $getCompanies = $getCompanies->paginate(6)->appends($request->all());

        return view(
            'frontend.pages.companies',
            compact(
                'companyLocation',
                'companyIndustry',
                'companySize',
                'companyFounded',
                'name',
                'location',
                'size',
                'industry',
                'founded',
                'getCompanies'
            )
        );
    }
    public function companyDetail($slug)
    {
        $getCompany = Company::with(
            'location',
            'size',
            'industry',
            'founded',
            'jobs'
        )->withCount('jobs')
            ->where('slug', $slug)
            ->first();

        $companyPhoto = CompanyPhoto::where('company_id', $getCompany->id)->get();
        $companyVideo = CompanyVideo::where('company_id', $getCompany->id)->get();

        return view('frontend.pages.company_detail', compact(
            'getCompany',
            'companyPhoto',
            'companyVideo'
        ));
    }

    public function companyContact(Request $request)
    {
        $request->validate([
            'fullname' => ['required', 'max:255'],
            'email' => ['required', 'max:255'],
            'message' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
        ]);

        $subject = 'Visitor information: ' . $request->job_title;
        $message = 'Name: ' . $request->fullname . '<br>';
        $message .= 'Email: ' . $request->email . '<br>';
        $message .= 'Phone: ' . $request->phone . '<br>';
        $message .= 'Message: ' . $request->message . '<br>';

        Mail::to($request->email)->send(new WebsiteEmail($subject, $message));

        $notification = array(
            'message' => 'Send Enquery Form Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}