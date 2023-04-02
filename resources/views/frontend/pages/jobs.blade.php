@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Job Listing</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="job-filter">
                        <form method="get" action="{{ route('jobs.listing') }}">
                            <div class="widget">
                                <h2>Job Title</h2>
                                <input type="text" name="" value="{{ $title }}" class="form-control"
                                    placeholder="Search Titles ..." />
                            </div>

                            <div class="widget">
                                <h2>Job Location</h2>
                                <select name="job_location_id" class="form-control select2">
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
                                    @foreach ($getCategory as $item)
                                        <option @if ($category == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Job Type</h2>
                                <select name="job_type_id" class="form-control select2">
                                    @foreach ($getType as $item)
                                        <option @if ($type == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Experience</h2>
                                <select name="job_experience_id" class="form-control select2">
                                    @foreach ($getExperience as $item)
                                        <option @if ($experience == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Gender</h2>
                                <select name="job_gender_id" class="form-control select2">
                                    @foreach ($getGender as $item)
                                        <option @if ($gender == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="widget">
                                <h2>Salary Range</h2>
                                <select name="job_salary_id" class="form-control select2">
                                    @foreach ($getSalary as $item)
                                        <option @if ($salary == $item->id) selected @endif
                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-button">
                                <button type="submit" class="btn btn-sm">
                                    <i class="fas fa-search"></i> Filter
                                </button>
                            </div>
                        </form>

                        <div class="advertisement">
                            <a href=""><img src="uploads/ad-2.png" alt="" /></a>
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
                                                        @if ($job->urgent == 1)
                                                            <div class="urgent">
                                                                Urgent
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="bookmark">
                                                        <a href=""><i class="fas fa-bookmark active"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="col-md-12">
                                    {{ $getJobs->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
