<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OtherItems;


class RegisterController extends Controller
{
    public function index()
    {
        $otherItem = OtherItems::first();
        return view('frontend.pages.register', compact('otherItem'));
    }
}