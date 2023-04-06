@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/' . $getPricing->image) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getPricing->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content pricing">
        <div class="container">
            <div class="row pricing">
                @foreach ($listPackages as $package)
                    <div class="col-lg-4 mb_30">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h2 class="card-title">{{ $package->name }}</h2>
                                <h3 class="card-price">${{ $package->price }}</h3>
                                <h4 class="card-day">({{ $package->display_time }})</h4>
                                <hr>

                                <ul class="fa-ul">

                                    <li>
                                        @php
                                            if ($package->total_allowed_job == -1) {
                                                $text = 'Unlimited';
                                                $iconCode = 'fas fa-check';
                                            } elseif ($package->total_allowed_job == 0) {
                                                $text = 'No';
                                                $iconCode = 'fas fa-times';
                                            } else {
                                                $text = $package->total_allowed_job;
                                                $iconCode = 'fas fa-check';
                                            }
                                        @endphp
                                        <span class="fa-li">
                                            <i class="{{ $iconCode }}">
                                            </i>
                                        </span>

                                        {{ $text }} Job Post Allowed
                                    </li>
                                    <li>
                                        @php
                                            if ($package->total_allowed_featured_jobs == -1) {
                                                $text = 'Unlimited';
                                                $iconCode = 'fas fa-check';
                                            } elseif ($package->total_allowed_featured_jobs == 0) {
                                                $text = 'No';
                                                $iconCode = 'fas fa-times';
                                            } else {
                                                $text = $package->total_allowed_featured_jobs;
                                                $iconCode = 'fas fa-check';
                                            }
                                        @endphp
                                        <span class="fa-li"><i class="{{ $iconCode }}"></i></span>{{ $text }}
                                        Featured Job
                                    </li>
                                    <li>
                                        @php
                                            if ($package->total_allowed_photos == -1) {
                                                $text = 'Unlimited';
                                                $iconCode = 'fas fa-check';
                                            } elseif ($package->total_allowed_photos == 0) {
                                                $text = 'No';
                                                $iconCode = 'fas fa-times';
                                            } else {
                                                $text = $package->total_allowed_photos;
                                                $iconCode = 'fas fa-check';
                                            }
                                        @endphp
                                        <span class="fa-li"><i class="{{ $iconCode }}"></i></span>{{ $text }}
                                        Company Photos
                                    </li>
                                    <li>
                                        @php
                                            if ($package->total_allowed_videos == -1) {
                                                $text = 'Unlimited';
                                                $iconCode = 'fas fa-check';
                                            } elseif ($package->total_allowed_videos == 0) {
                                                $text = 'No';
                                                $iconCode = 'fas fa-times';
                                            } else {
                                                $text = $package->total_allowed_videos;
                                                $iconCode = 'fas fa-check';
                                            }
                                        @endphp
                                        <span class="fa-li"><i class="{{ $iconCode }}"></i></span>{{ $text }}
                                        Company Videos
                                    </li>
                                </ul>
                                <div class="buy">
                                    <a href="{{ url('company/payment') }}" class="btn btn-primary">
                                        Choose Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
