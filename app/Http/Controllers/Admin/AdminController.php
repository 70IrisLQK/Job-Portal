<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.admin_dashboard');
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
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error_message', 'Invalid email or password.');
        }
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();
        return view('admin.pages.admin_login');
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

        session()->put('success', 'Send Link Reset Password Successfully.');

        return redirect()->route('admin.login');
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

        $notifications = [
            'message' => 'Reset Password Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->route('admin.login')->with($notifications);
    }
}