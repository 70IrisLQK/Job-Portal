<?php

namespace App\Http\Controllers\Frontend\company;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request)
    {

        $getPackageById = Package::where('id', $request->package_id)->first();

        $provider = new PayPalClient;
        $paypalToken = $provider->getAccessToken();
        $provider->setApiCredentials(config('paypal'));
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company.paypal-success'),
                "cancel_url" => route('company.paypal-cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $getPackageById->price
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {

                    session()->put('package_id', $getPackageById->id);
                    session()->put('package_price', $getPackageById->price);
                    session()->put('package_days', $getPackageById->days);

                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company.paypal-cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard('company')->user()->id)->update($data);

            $days = session()->get('package_days');
            $newOrder = new Order();
            $newOrder->company_id = Auth::guard('company')->user()->id;
            $newOrder->package_id = session()->get('package_id');
            $newOrder->order_no = time();
            $newOrder->paid_amount = session()->get('package_price');
            $newOrder->payment_method = 'PayPal';
            $newOrder->start_date = date('Y-m-d');
            $newOrder->expire_date = date('Y-m-d', strtotime("+$days days"));
            $newOrder->currently_active = 1;
            $newOrder->save();
            $notification = [
                'message' => 'Payment successfully.',
                'alert-type' => 'success',
            ];

            return redirect()->route('company.payment')->with($notification);
        }
    }

    public function cancel()
    {
        $notification = [
            'message' => 'Payment failed. Please try again.',
            'alert-type' => 'error',
        ];
        return redirect()->route('company.payment')->with($notification);
    }
}