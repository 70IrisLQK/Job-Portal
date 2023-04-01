<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OtherItems;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $otherItem = OtherItems::first();
        return view('frontend.pages.login', compact('otherItem'));
    }
}