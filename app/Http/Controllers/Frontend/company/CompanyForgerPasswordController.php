<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Company;
use App\Models\OtherItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyForgerPasswordController extends Controller
{
    public function index()
    {
        $otherItem = OtherItems::first();
        return view('frontend.pages.company.company_forget_password', compact('otherItem'));
    }

    public function companyForgetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
            ]
        );

        $email = $request->email;
        //Check email doesn't exist
        $getCompanyById = Company::where('email', $email)->first();
        if (!$getCompanyById) {
            return redirect()->back()->with('error_message', 'The requested user ' . $email . ' could not be found.');
        }

        // Create token
        $token = Str::random(10);
        $getCompanyById->token = $token;
        $getCompanyById->save();

        // Send link
        $resetLink = url('company/reset-password/' . $token . '/' . $email);

        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $resetLink . '">Click here!</a>';

        Mail::to($email)->send(new WebsiteEmail($subject, $message));

        $notification = array(
            'message' => 'Send Link Reset Password Successfully.',
            'alert-type' => 'success'
        );
        return redirect('login')->with($notification);
    }

    public function companyResetPassword($token, $email)
    {
        $getCompany = Company::where('token', $token)
            ->where('email', $email)
            ->first();

        if (!$getCompany) {
            return redirect()->route('company.login');
        }

        return view('frontend.pages.company.company_reset_password', compact('getCompany'));
    }

    public function companyResetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'min:6', 'same:confirm_password'],
                'confirm_password' => ['required', 'min:6'],
            ]
        );

        $getCompany = Company::where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$getCompany) {
            return redirect('login')->with('User dose not exist');
        }

        $getCompany->password = Hash::make($request->password);
        $getCompany->save();

        $notification = array(
            'message' => 'Reset Password Successfully.',
            'alert-type' => 'success'
        );

        return redirect('login')->with($notification);
    }
}