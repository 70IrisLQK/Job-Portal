<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CompanyRegisterController extends Controller
{
    public function companyRegister(Request $request)
    {
        $request->validate([
            "company_name" => ['required', 'max:255'],
            "person_name" => ['required', 'max:255'],
            "username" => ['required', 'max:255', 'unique:companies'],
            "email" => ['required', 'max:255', 'email', 'unique:companies'],
            "password" => ['required', 'max:255', 'min:6'],
            "confirm_password" => ['required', 'max:255', 'same:password', 'min:6'],
        ]);

        $token = Str::random(10);
        $slug = Str::slug($request->company_name);

        Company::updateOrCreate(['slug', $slug], [
            "company_name" => $request->company_name,
            "slug" => $slug,
            "person_name" => $request->person_name,
            "username" => $request->username,
            "email" => $request->email,
            'token' => $token,
            "password" => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        $resetLink = url('company/verify-account/' . $token . '/' . $request->email);
        $subject = 'Company Verify Account';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $resetLink . '">Click here</a>';

        Mail::to($request->email)->send(new WebsiteEmail($subject, $message));

        $notification = [
            'message' => 'An email sent to your email.
            You must have to check and click on the confirm link to verify account',
            'alert-type' => 'success',
        ];

        return redirect('login')->with($notification);
    }

    public function verifyAccount($token, $email)
    {
        $getCompany = Company::where('token', $token)->where('email', $email)->first();

        $getCompany->status = 1;
        $getCompany->token = '';
        $getCompany->updated_at = Carbon::now();
        $getCompany->save();

        $notification = [
            'message' => 'Account Verify Successfully',
            'alert-type' => 'success',
        ];

        return redirect('login')->with($notification);
    }
}