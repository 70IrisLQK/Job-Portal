<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripeController extends Controller
{
    public function stripe(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));

        $getPackageById = Package::where('id', $request->package_id)->first();

        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $getPackageById->name
                        ],
                        'unit_amount' => $getPackageById->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company.stripe-success'),
            'cancel_url' => route('company.stripe-cancel'),
        ]);


        session()->put('package_id', $getPackageById->id);
        session()->put('package_price', $getPackageById->price);
        session()->put('package_days', $getPackageById->days);

        return redirect()->away($response->url);
    }

    public function success()
    {
        $data['currently_active'] = 0;
        Order::where('company_id', Auth::guard('company')->user()->id)->update($data);

        $days = session()->get('package_days');
        $newOrder = new Order();
        $newOrder->company_id = Auth::guard('company')->user()->id;
        $newOrder->package_id = session()->get('package_id');
        $newOrder->order_no = time();
        $newOrder->paid_amount = session()->get('package_price');
        $newOrder->payment_method = 'Stripe';
        $newOrder->start_date = date('Y-m-d');
        $newOrder->expire_date = date('Y-m-d', strtotime("+$days days"));
        $newOrder->currently_active = 1;
        $newOrder->save();

        $notification = [
            'message' => "Payment is successful!",
            'alert-type' => 'success',
        ];

        return redirect()->route('company.payment')->with($notification);
    }

    public function cancel()
    {
        $notification = [
            'message' => 'Payment is cancelled. Please try again.',
            'alert-type' => 'error',
        ];
        return redirect()->route('company.payment')->with($notification);
    }
}