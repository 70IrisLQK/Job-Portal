@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('{{ asset('upload/' . $getPage->image) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getPage->title }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="job-filter">
                        <form method="get" action="{{ route('jobs.listing') }}" id="form__submit">
                            <div class="widget">
                                <h2>Job Title</h2>
                                <input type="text" name="title" value="{{ $title }}" class="form-control"
                                    placeholder="Search Titles ..." />
                            </div>

                            <div class="widget">
                                <h2>Job Location</h2>
                                <select name="job_location_id" class="form-control select2">
                                    <option value="">
                                        Job Location
                                    </option>
                                    @foreach ($getJobLocation as $item)
                                        <option @if ($location == $item->id) selected @endif
                                            value="{{ $item->id }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="widget">
                                <h2>Job Category</h2>
                                <select name="job_category_id" class="form-control select2">
                                    <option value="">
                                        Job Category
                                    </option>
                                    @foreach ($getCategory as $item)
                                        <option @if ($category == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Type</h2>
                                <select name="job_type_id" class="form-control select2">
                                    <option value="">
                                        Job Type
                                    </option>
                                    @foreach ($getType as $item)
                                        <option @if ($type == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Experience</h2>
                                <select name="job_experience_id" class="form-control select2">
                                    <option value="">
                                        Experience
                                    </option>
                                    @foreach ($getExperience as $item)
                                        <option @if ($experience == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Gender</h2>
                                <select name="job_gender_id" class="form-control select2">
                                    <option value="">
                                        Gender
                                    </option>
                                    @foreach ($getGender as $item)
                                        <option @if ($gender == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Salary Range</h2>
                                <select name="job_salary_id" class="form-control select2">
                                    <option value="">
                                        Salary Range
                                    </option>
                                    @foreach ($getSalary as $item)
                                        <option @if ($salary == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-button">
                                <a type="submit" class="btn  btn-sm" onclick="submitForm()">
                                    <i class="fas fa-search"></i> Filter
                                </a>
                            </div>
                        </form>

                        <div class="advertisement">
                            <a href="https://github.com/70IrisLQK" target="_blank"><img
                                    src="{{ asset('upload/advertisements/' . $getAdvertisement->job_listing_ad) }}"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search
                                        Result for Job Listing
                                    </div>
                                </div>

                                @if (!$getJobs->count())
                                    <div class="text-danger">No result data found</div>
                                @else
                                    @foreach ($getJobs as $job)
                                        @php
                                            $companyId = $job->company->id;
                                            $orderData = \App\Models\Order::where('company_id', $companyId)
                                                ->where('currently_active', 1)
                                                ->first();
                                            if (isset($orderData) && date('Y-m-d') > $orderData->expire_date) {
                                                continue;
                                            }
                                        @endphp
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('upload/companies/' . $job->company->logo) }}"
                                                        alt="{{ $job->title }}" />
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
                                                        @if ($job->is_urgent == 1)
                                                            <div class="urgent">
                                                                Urgent
                                                            </div>
                                                        @endif
                                                    </div>
                                                    @if (!Auth::guard('company')->check())
                                                        <div class="bookmark">

                                                            @if (Auth::guard('candidate')->check())
                                                                @php
                                                                    $count = \App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)
                                                                        ->where('job_id', $job->id)
                                                                        ->count();
                                                                    if ($count > 0) {
                                                                        $bookmarkStatus = 'active';
                                                                    } else {
                                                                        $bookmarkStatus = '';
                                                                    }
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $bookmarkStatus = '';
                                                                @endphp
                                                            @endif
                                                            <a href="{{ route('candidate.bookmark', [$job->id]) }}"><i
                                                                    class="fas fa-bookmark {{ $bookmarkStatus }}"></i></a>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="col-md-12 d-flex">
                                        {{ $getJobs->appends($_GET)->links() }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
