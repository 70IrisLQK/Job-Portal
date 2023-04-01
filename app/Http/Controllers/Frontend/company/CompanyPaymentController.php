<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyPaymentController extends Controller
{
    public function payment()
    {
        $currentPlan = Order::with('package')->where('company_id', Auth::guard('company')
            ->user()->id)->where('currently_active', 1)->latest('id')->first();

        $listPackages = Package::all();

        return view('frontend.pages.company.company_payment', compact('currentPlan', 'listPackages'));
    }
}