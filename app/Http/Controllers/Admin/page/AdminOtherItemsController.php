<?php

namespace App\Http\Controllers\Admin\page;

use App\Http\Controllers\Controller;
use App\Models\OtherItems;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminOtherItemsController extends Controller
{
    public function edit()
    {
        $getOtherItem = OtherItems::first();

        return view('admin.pages.page_setting.other_item', compact('getOtherItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'login_page_heading' => ['required', 'max:255'],
            'login_page_title' => ['max:255'],
            'login_page_seo_description' => ['max:255'],
            'register_page_heading' => ['required', 'max:255'],
            'register_page_title' => ['max:255'],
            'register_page_seo_description' => ['required', 'max:255'],
            'forget_password_page_heading' => ['required', 'max:255'],
            'forget_password_page_title' => ['max:255'],
            'forget_password_page_seo_description' => ['max:255'],
        ]);

        $getOtherItem = OtherItems::findOrFail($id);

        $getOtherItem->update(
            [
                'login_page_heading' => $request->login_page_heading,
                'login_page_title' => $request->login_page_title,
                'login_page_seo_description' => $request->login_page_seo_description,
                'register_page_heading' => $request->register_page_heading,
                'register_page_title' => $request->register_page_title,
                'register_page_seo_description' => $request->register_page_seo_description,
                'forget_password_page_heading' => $request->forget_password_page_heading,
                'forget_password_page_title' => $request->forget_password_page_title,
                'forget_password_page_seo_description' => $request->forget_password_page_seo_description,
                'updated_at' => Carbon::now()
            ]
        );

        $notification = [
            'message' => 'Update Other Items Successfully.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
