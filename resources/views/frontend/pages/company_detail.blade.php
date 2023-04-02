@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top page-top-job-single page-top-company-single" style="background-image: url('uploads/banner.jpg')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="uploads/logo1.png" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $getCompany->company_name }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">{{ $getCompany->industry->name }}</div>
                                <div class="location">{{ $getCompany->location->name }}</div>
                                <div class="email">{{ $getCompany->email }}</div>
                                <div class="phone">{{ $getCompany->phone }}</div>
                            </div>
                            <div class="special">
                                <div class="type">{{ $getCompany->jobs_count }} Open Positions</div>
                                @if (isset($getCompany->facebook) ||
                                        isset($getCompany->twitter) ||
                                        isset($getCompany->linkedin) ||
                                        isset($getCompany->instagram))
                                    <div class="social">
                                        <ul>
                                            @if (isset($getCompany->facebook))
                                                <li>
                                                    <a href="{{ $getCompany->facebook }}" target="_blank"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                            @endif
                                            @if (isset($getCompany->twitter))
                                                <li>
                                                    <a href="{{ $getCompany->twitter }}" target="_blank"><i
                                                            class="fab fa-twitter"></i></a>
                                                </li>
                                            @endif
                                            @if (isset($getCompany->linkedin))
                                                <li>
                                                    <a href="{{ $getCompany->linkedin }}" target="_blank"><i
                                                            class="fab fa-linkedin-in"></i></a>
                                                </li>
                                            @endif
                                            @if (isset($getCompany->instagram))
                                                <li>
                                                    <a href="{{ $getCompany->instagram }}" target="_blank"><i
                                                            class="fab fa-instagram"></i></a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            About Company
                        </h2>
                        {!! $getCompany->description !!}
                    </div>
                    @if (isset($getCompany->oh_mon) ||
                            isset($getCompany->oh_tue) ||
                            isset($getCompany->oh_wed) ||
                            isset($getCompany->oh_thu) ||
                            isset($getCompany->oh_fri) ||
                            isset($getCompany->oh_sat) ||
                            isset($getCompany->oh_sun))
                        <div class="left-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Opening Hours
                            </h2>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>{{ $getCompany->oh_mon }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>{{ $getCompany->oh_tue }}</td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>{{ $getCompany->oh_wed }}</td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>{{ $getCompany->oh_thu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>{{ $getCompany->oh_fri }}</td>
                                        </tr>
                                        <tr>
                                            <td>Saturday</td>
                                            <td>{{ $getCompany->oh_sat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sunday</td>
                                            <td>{{ $getCompany->oh_sun }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    @if ($companyPhoto->count())
                        <div class="left-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Photos
                            </h2>
                            <div class="photo-all">
                                <div class="row">
                                    @foreach ($companyPhoto as $photo)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a href="{{ asset('upload/companies/' . $photo->photo) }}"
                                                    class="magnific">
                                                    <img src="{{ asset('upload/companies/' . $photo->photo) }}"
                                                        alt="" />
                                                    <div class="icon">
                                                        <i class="fas fa-plus"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($companyVideo->count())
                        <div class="left-item">
                            <h2>
                                <i class="fas fa-file-invoice"></i>
                                Videos
                            </h2>
                            <div class="video-all">
                                <div class="row">
                                    @foreach ($companyVideo as $video)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="item">
                                                <a class="video-button"
                                                    href="http://www.youtube.com/watch?v={{ $video->video }}">
                                                    <img src="http://img.youtube.com/vi/{{ $video->video }}/0.jpg"
                                                        alt="" />
                                                    <div class="icon">
                                                        <i class="far fa-play-circle"></i>
                                                    </div>
                                                    <div class="bg"></div>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Open Positions
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    @foreach ($getCompany->jobs as $job)
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="uploads/logo1.png" alt="" />
                                                </div>
                                                <div class="text">
                                                    <h3>
                                                        <a
                                                            href="{{ route('jobs.detail', [$job->slug]) }}">{{ $job->title }}</a>
                                                    </h3>
                                                    <div class="detail-1 d-flex justify-content-start">
                                                        <div class="category">
                                                            {{ $job->category->name }}
                                                        </div>
                                                        <div class="location">
                                                            {{ $job->location->name }}
                                                        </div>
                                                    </div>
                                                    <div class="detail-2 d-flex justify-content-start">
                                                        <div class="date">
                                                            {{ $job->created_at->diffForHumans() }}
                                                        </div>
                                                        <div class="budget">
                                                            {{ $job->salary->name }}
                                                        </div>
                                                        @if (date('Y-m-d') > $job->deadline)
                                                            <div class="expired">
                                                                Expired
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="special d-flex justify-content-start">
                                                        @if ($job->is_featured == 1)
                                                            <div class="featured">
                                                                Featured
                                                            </div>
                                                        @endif
                                                        <div class="type">
                                                            {{ $job->type->name }}
                                                        </div>
                                                        @if ($job->urgent == 1)
                                                            <div class="urgent">
                                                                Urgent
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Company Overview
                        </h2>
                        <div class="summary">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><b> Contact Person:</b></td>
                                        <td>{{ $getCompany->contact_person }}</td>
                                    </tr>
                                    <tr>
                                        <td><b> Category:</b></td>
                                        <td>{{ $getCompany->industry->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>$getCompany->email</td>
                                    </tr>
                                    <tr>
                                        <td><b>Phone:</b></td>
                                        <td>$getCompany->phone</td>
                                    </tr>
                                    <tr>
                                        <td><b>Address:</b></td>
                                        <td>
                                            {{ $getCompany->address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Country:</b></td>
                                        <td>{{ $getCompany->country }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Website:</b></td>
                                        <td>{{ $getCompany->website }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Company Size:</b>
                                        </td>
                                        <td>{{ $getCompany->size->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Founded On:</b>
                                        </td>
                                        <td>{{ $getCompany->founded->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        <div class="location-map">
                            {!! $getCompany->map_code !!}
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Contact Company
                        </h2>
                        <div class="enquery-form">
                            <form action="{{ route('companies.contact') }}" method="post">
                                @csrf
                                @include('frontend.components.display_error')
                                <div class="mb-3">
                                    <input type="text" name="fullname" class="form-control" placeholder="Full Name"
                                        value="{{ old('fullname') }}" />
                                </div>
                                <div class="mb-3">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Email Address" value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                        value="{{ old('phone') }}" />
                                </div>
                                <div class="mb-3">
                                    <textarea name="message" class="form-control h-150" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
