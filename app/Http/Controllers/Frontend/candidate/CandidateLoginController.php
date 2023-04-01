<?php

namespace App\Http\Controllers\Frontend\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateLoginController extends Controller
{
    public function candidateLogin(Request $request)
    {
        $request->validate([
            'email' => ['required', 'max:255'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1
        ];
        if (Auth::guard('candidate')->attempt($credentials)) {
            $notification = [
                'message' => 'Login successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('candidate.dashboard')->with($notification);
        } else {
            $notification = [
                'message' => 'Login failed. Please try again.',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function logout()
    {
        Auth::guard('candidate')->logout();

        $notification = [
            'message' => 'Logout Successfully.',
            'alert-type' => 'success'
        ];

        return redirect('login')->with($notification);
    }
}