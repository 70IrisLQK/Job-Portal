<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\PageContact;
use Illuminate\Http\Request;

class FrontendContactController extends Controller
{
    public function index()
    {
        $getContact = PageContact::first();
        return view('frontend.pages.contacts', compact('getContact'));
    }
}