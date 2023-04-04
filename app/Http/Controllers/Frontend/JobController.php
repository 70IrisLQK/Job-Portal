<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Category;
use App\Models\Experience;
use App\Models\Gender;
use App\Models\JobLocation;
use App\Models\Jobs;
use App\Models\PageJob;
use App\Models\Salary;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Artesaos\SEOTools\Facades\SEOTools;

class JobController extends Controller
{
    public function jobs(Request $request)
    {
        $getPage = PageJob::first();

        $getCategory = Category::all();
        $getJobLocation = JobLocation::all();
        $getType = Type::all();
        $getExperience = Experience::all();
        $getGender = Gender::all();
        $getSalary = Salary::all();

        $title = $request->title;
        $location = $request->job_location_id;
        $category = $request->job_category_id;
        $type = $request->job_type_id;
        $experience = $request->job_experience_id;
        $gender = $request->job_gender_id;
        $salary = $request->job_salary_id;

        $getJobs = Jobs::with(
            'category',
            'location',
            'salary',
            'type',
            'company'
        )->latest('id');

        if ($title != null) {
            $getJobs->where('title', 'LIKE', '%' . $title . '%');
        }

        if ($location != null) {
            $getJobs->where('job_location_id', $location);
        }

        if ($category != null) {
            $getJobs->where('job_category_id', $category);
        }

        if ($type != null) {
            $getJobs->where('job_type_id', $type);
        }
        if ($experience != null) {
            $getJobs->where('job_experience_id', $experience);
        }
        if ($gender != null) {
            $getJobs->where('job_gender_id', $gender);
        }
        if ($salary != null) {
            $getJobs->where('job_salary_range_id', $salary);
        }

        $getJobs = $getJobs->paginate(6)->appends($request->all());

        $this->generateSEO($request, $getPage);

        return view('frontend.pages.jobs', compact(
            'getJobs',
            'getCategory',
            'getJobLocation',
            'getType',
            'getExperience',
            'getGender',
            'getSalary',
            'title',
            'location',
            'category',
            'type',
            'experience',
            'gender',
            'salary',
            'getPage'
        ));
    }

    public function jobDetail($slug)
    {
        $getJob = Jobs::with(
            'category',
            'location',
            'salary',
            'type',
            'company',
            'experience',
            'gender'
        )->where('slug', $slug)->first();
        $getJobsRelate = Jobs::with(
            'category',
            'location',
            'salary',
            'type',
            'company'
        )
            ->where('job_category_id', $getJob->job_category_id)
            ->whereNotIn('slug', [$slug])
            ->take(2)
            ->latest('id')
            ->get();

        return view('frontend.pages.job_detail', compact('getJob', 'getJobsRelate'));
    }

    public function jobSendmail(Request $request)
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

    public function generateSEO($request, $getPage)
    {
        $url = $request->url();
        $img = url('upload/' . $getPage->seo_image);

        SEOTools::setTitle($getPage->seo_title);
        SEOTools::setDescription($getPage->seo_description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }
}