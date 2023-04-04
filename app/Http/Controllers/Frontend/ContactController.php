<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\PageContact;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $getContact = PageContact::first();

        $this->generateSEO($request, $getContact);
        return view('frontend.pages.contacts', compact('getContact'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email'],
            'message' => ['required'],
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        $notification = [
            'message' => 'Create Contact Successfully.',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }


    public function generateSEO($request, $getPage)
    {
        $url = $request->url();
        $img = url('upload/' . $getPage->seo_image);

        SEOTools::setTitle($getPage->seo_title);
        SEOTools::setDescription($getPage->seo_description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::setCanonical($url);
        SEOTools::opengraph()->addProperty('type', 'articles');
        SEOTools::twitter()->setSite('@FindJob');
        SEOTools::jsonLd()->addImage($img);
    }
}