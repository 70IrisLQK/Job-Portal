@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
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
                    <h4>Current Plan</h4>
                    <div class="row box-items mb-4">
                        <div class="col-md-4">
                            <div class="box1">
                                @if (isset($currentPlan))
                                    <h4>${{ $currentPlan->paid_amount }}</h4>
                                    <p>{{ $currentPlan->package->name }}</p>
                                @else
                                    <span class="text-danger">No plan is available</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- <h4>Upgrade Plan (Make Payment)</h4> --}}
                    <h4>Choose Plan & Make Payment</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <form action="{{ route('company.paypal') }}" method="post">
                                        @csrf
                                        <td class="w-200">
                                            <select name="package_id" class="form-control select2">
                                                @foreach ($listPackages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }} -
                                                        ${{ $package->price }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Pay with Paypal</button>
                                        </td>
                                    </form>

                                </tr>
                                <tr>
                                    <form action="{{ route('company.stripe') }} " method="post">
                                        @csrf
                                        <td class="w-200">
                                            <select name="package_id" class="form-control select2">
                                                @foreach ($listPackages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }} -
                                                        ${{ $package->price }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-primary">Pay with Stripe</button>
                                        </td>
                                    </form>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
