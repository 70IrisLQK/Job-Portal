@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Plan Name</th>
                                    <th>Price</th>
                                    <th>Order Date</th>
                                    <th>Expire Date</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>
                                </tr>
                                @foreach ($listOrders as $key => $order)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $order->package->name }}</td>
                                        <td>${{ $order->paid_amount }}</td>
                                        <td>{{ $order->start_date }}</td>
                                        <td>{{ $order->expire_date }}</td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            @if ($order->currently_active == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
