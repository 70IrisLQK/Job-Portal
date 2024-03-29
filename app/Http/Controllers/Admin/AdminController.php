<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Admin;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Company;
use App\Models\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{
    public const PUBLIC_PATH = 'upload/avatars/';

    public function index()
    {
        $listJob = Jobs::get()->count();
        $listCompany = Company::get()->count();
        $listCandidate = Candidate::get()->count();

        return view('admin.pages.admin_dashboard', compact('listJob', 'listCompany', 'listCandidate'));
    }

    public function adminLogin()
    {
        return view('admin.pages.admin_login');
    }

    public function adminLoginSubmit(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', 'min:6', 'max:255'],
            ]
        );

        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($credential)) {
            $notification = array(
                'message' => 'Login Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
        } else {
            return redirect()->back()->with('error_message', 'Invalid email or password.');
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.login')->with($notification);
    }

    public function adminForgetPassword()
    {
        return view('admin.pages.admin_forget_password');
    }

    public function adminForgetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
            ]
        );

        $email = $request->email;
        //Check email doesn't exist
        $getAdminById = Admin::where('email', $email)->first();
        if (!$getAdminById) {
            return redirect()->back()->with('error_message', 'The requested user ' . $email . ' could not be found.');
        }

        // Create token
        $token = Str::random(10);
        $getAdminById->token = $token;
        $getAdminById->save();

        // Send link
        $resetLink = url('admin/reset-password/' . $token . '/' . $email);

        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $resetLink . '">Click here!</a>';

        Mail::to($email)->send(new WebsiteEmail($subject, $message));

        $notification = array(
            'message' => 'Send Link Reset Password Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.login')->with($notification);
    }

    public function adminResetPassword($token, $email)
    {
        $getAdmin = Admin::where('token', $token)
            ->where('email', $email)
            ->first();

        if (!$getAdmin) {
            return redirect()->route('admin.login');
        }

        return view('admin.pages.admin_reset_password', compact('getAdmin'));
    }

    public function adminResetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'min:6', 'same:confirm_password'],
                'confirm_password' => ['required', 'min:6'],
            ]
        );

        $getAdmin = Admin::where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$getAdmin) {
            return redirect()->route('admin.login')->with('User dose not exist');
        }

        $getAdmin->password = Hash::make($request->password);
        $getAdmin->save();

        $notification = array(
            'message' => 'Reset Password Successfully.',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.login')->with($notification);
    }

    public function showProfile($id)
    {
        $getAdmin = Admin::find($id);
        return view('admin.pages.admin_profile', compact('getAdmin'));
    }

    public function updateProfile($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'min:6'],
            'email' => ['required',  'email', 'max:255', 'min:6',],
            'new_password' => ['required', 'max:255', 'min:6'],
            'confirm_password' => ['required', 'max:255', 'min:6', 'same:new_password'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1000']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $pathName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $path = public_path(AdminController::PUBLIC_PATH);
            Image::make($image)->resize(600, 600)->save($path . $pathName);
        }
        $getAdmin = Admin::findOrFail($id);
        $imageExist = $getAdmin->avatar;

        if (file_exists($path  . $imageExist)) {
            unlink($path . $imageExist);
        }

        $getAdmin->name = $request->name;
        $getAdmin->email = $request->email;
        $getAdmin->password = Hash::make($request->new_password);
        $getAdmin->avatar = $pathName;
        $getAdmin->save();

        $notification = array(
            'message' => 'Edit Profile Successfully.',
            'alert-type' => 'success'
        );
        return view('admin.pages.admin_profile', compact('getAdmin', 'notification'));
    }
}