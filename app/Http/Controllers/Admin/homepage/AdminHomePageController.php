<?php

namespace App\Http\Controllers\Admin\homepage;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class AdminHomePageController extends Controller
{
    public const PUBLIC_PATH = 'upload/homepages/';
    public function homePage()
    {
        $getHomePage = HomePage::first();
        return view('admin.pages.homepage.homepage', compact('getHomePage'));
    }

    public function updateHomePage($id, Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:30'],
            'short_title' => ['required', 'max:100'],
            'job_title' => ['required', 'max:100'],
            'job_category' => ['required', 'max:100'],
            'job_location' => ['required', 'max:100'],
            'search' => ['required', 'max:100'],
            'status' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getHomepage = HomePage::findOrFail($id);
        $pathName = $getHomepage->background;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminHomePageController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getHomepage->background;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getHomepage->update(
            [
                'title' => $request->title,
                'short_title' => $request->short_title,
                'job_title' => $request->job_title,
                'job_category' => $request->job_category,
                'job_location' => $request->job_location,
                'search' => $request->search,
                'status' => intval($request->status),
                'background' => $pathName,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Homepage Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function jobCategory()
    {
        $getHomePage = HomePage::first();

        return view('admin.pages.homepage.jobcategory', compact('getHomePage'));
    }

    public function updateJobCategory($id, Request $request)
    {
        $request->validate([
            'job_category_title' => ['required', 'max:30'],
            'job_category_short_title' => ['required', 'max:100'],
            'status' => ['required'],
        ]);
        $getHomepage = HomePage::findOrFail($id);

        $getHomepage->update(
            [
                'job_category_title' => $request->job_category_title,
                'job_category_short_title' => $request->job_category_short_title,
                'job_category_status' => intval($request->status),
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Job Category Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function whyChoose()
    {
        $getHomePage = HomePage::first();

        return view('admin.pages.homepage.whychoose', compact('getHomePage'));
    }

    public function updateWhyChoose($id, Request $request)
    {
        $request->validate([
            'why_choose_title' => ['required', 'max:30'],
            'why_choose_short_title' => ['required', 'max:100'],
            'status' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getHomepage = HomePage::findOrFail($id);
        $pathName = $getHomepage->why_choose_bg;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminHomePageController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getHomepage->why_choose_bg;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getHomepage->update(
            [
                'why_choose_title' => $request->why_choose_title,
                'why_choose_short_title' => $request->why_choose_short_title,
                'why_choose_bg' => $pathName,
                'why_choose_status' => intval($request->status),
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Why Choose Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
    public function featureJob()
    {
        $getHomePage = HomePage::first();

        return view('admin.pages.homepage.featured_job', compact('getHomePage'));
    }

    public function updateFeatureJob($id, Request $request)
    {
        $request->validate([
            'feature_job_title' => ['required', 'max:30'],
            'feature_job_short_title' => ['required', 'max:100'],
            'status' => ['required'],
        ]);

        $getHomepage = HomePage::findOrFail($id);

        $getHomepage->update(
            [
                'feature_job_title' => $request->feature_job_title,
                'feature_job_short_title' => $request->feature_job_short_title,
                'feature_job_status' => intval($request->status),
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Feature Job Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function testimonial()
    {
        $getHomePage = HomePage::first();
        return view('admin.pages.homepage.testimonial', compact('getHomePage'));
    }
    public function updateTestimonial(Request $request, $id)
    {
        $request->validate([
            'testimonial_title' => ['required', 'max:30'],
            'status' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        $getHomepage = HomePage::findOrFail($id);
        $pathName = $getHomepage->testimonial_bg;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminHomePageController::PUBLIC_PATH);
            Image::make($image)->resize(1300, 866)->save($path . $pathName);

            $imageExist = $getHomepage->testimonial_bg;
            if (file_exists($path  . $imageExist)) {
                unlink($path . $imageExist);
            }
        }

        $getHomepage->update(
            [
                'testimonial_title' => $request->testimonial_title,
                'testimonial_bg' => $pathName,
                'testimonial_status' => intval($request->status),
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Testimonial Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function lastNews()
    {
        $getHomePage = HomePage::first();
        return view('admin.pages.homepage.last_news', compact('getHomePage'));
    }
    public function updateLastNews(Request $request, $id)
    {
        $request->validate([
            'latest_news_title' => ['required', 'max:30'],
            'latest_news_short_title' => ['required', 'max:100'],
            'status' => ['required'],
        ]);
        $getHomepage = HomePage::find($id);
        $getHomepage->update(
            [
                'latest_news_title' => $request->latest_news_title,
                'latest_news_short_title' => $request->latest_news_short_title,
                'latest_news_status' => intval($request->status),
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Last News Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}