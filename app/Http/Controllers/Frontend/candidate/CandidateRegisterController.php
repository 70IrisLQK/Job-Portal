<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Candidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CandidateRegisterController extends Controller
{
    public function candidateRegister(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:255'],
            "username" => ['required', 'max:255', 'unique:candidates'],
            "email" => ['required', 'max:255', 'email', 'unique:candidates'],
            "password" => ['required', 'max:255', 'min:6'],
            "confirm_password" => ['required', 'max:255', 'same:password', 'min:6'],
        ]);

        $token = Str::random(10);

        Candidate::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            'token' => $token,
            "password" => Hash::make($request->password),
            'created_at' => Carbon::now()
        ]);

        $resetLink = url('candidate/verify-account/' . $token . '/' . $request->email);
        $subject = 'Candidate Verify Account';
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
        $getCandidate = Candidate::where('token', $token)->where('email', $email)->first();

        $getCandidate->status = 1;
        $getCandidate->token = '';
        $getCandidate->updated_at = Carbon::now();
        $getCandidate->save();

        $notification = [
            'message' => 'Account Verify Successfully',
            'alert-type' => 'success',
        ];

        return redirect('login')->with($notification);
    }
}