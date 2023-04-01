<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteEmail;
use App\Models\Candidate;
use App\Models\OtherItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CandidateForgerPasswordController extends Controller
{
    public function index()
    {
        $otherItem = OtherItems::first();
        return view('frontend.pages.candidate.candidate_forget_password', compact('otherItem'));
    }

    public function candidateForgetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255'],
            ]
        );

        $email = $request->email;
        //Check email doesn't exist
        $getCandidateById = Candidate::where('email', $email)->first();
        if (!$getCandidateById) {
            return redirect()->back()->with('error_message', 'The requested user ' . $email . ' could not be found.');
        }

        // Create token
        $token = Str::random(10);
        $getCandidateById->token = $token;
        $getCandidateById->save();

        // Send link
        $resetLink = url('candidate/reset-password/' . $token . '/' . $email);

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

    public function candidateResetPassword($token, $email)
    {
        $getCandidate = Candidate::where('token', $token)
            ->where('email', $email)
            ->first();

        if (!$getCandidate) {
            return redirect()->route('candidate.login');
        }

        return view('frontend.pages.candidate.candidate_reset_password', compact('getCandidate'));
    }

    public function candidateResetPasswordSubmit(Request $request)
    {
        $request->validate(
            [
                'password' => ['required', 'min:6', 'same:confirm_password'],
                'confirm_password' => ['required', 'min:6'],
            ]
        );

        $getCandidate = Candidate::where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$getCandidate) {
            return redirect('login')->with('User dose not exist');
        }

        $getCandidate->password = Hash::make($request->password);
        $getCandidate->save();

        $notification = array(
            'message' => 'Reset Password Successfully.',
            'alert-type' => 'success'
        );

        return redirect('login')->with($notification);
    }
}