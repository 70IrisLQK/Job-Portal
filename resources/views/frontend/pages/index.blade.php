@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="slider" style="background-image: url({{ asset('upload/homepages/' . $getHomepage->background) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <div class="text">
                            <h2>{{ $getHomepage->title }}</h2>
                            <p>
                                {{ $getHomepage->short_title }}
                            </p>
                        </div>
                        <div class="search-section">
                            <form action="{{ route('jobs.listing') }}" method="get">
                                <input type="hidden" name="type" />
                                <input type="hidden" name="experience" />
                                <input type="hidden" name="gender" />
                                <input type="hidden" name="salary" />
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <input type="text" name="title" class="form-control"
                                                    placeholder="{{ $getHomepage->job_title }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="job_location_id" class="form-select select2">
                                                    <option value="">
                                                        {{ $getHomepage->job_location }}
                                                    </option>
                                                    @foreach ($listLocation as $location)
                                                        <option value="{{ $location->id }}">
                                                            {{ $location->name }}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="job_category_id" class="form-select select2">
                                                    <option value="">
                                                        {{ $getHomepage->job_category }}
                                                    </option>
                                                    @foreach ($listCategories as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                                {{ $getHomepage->search }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $getHomepage->job_category_title }}</h2>
                        <p>
                            {{ $getHomepage->job_category_short_title }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($listCategories as $category)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="icon">
                                <i class="{{ $category->icon }}"></i>
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <p>({{ $category->jobs_count }} Open Positions)</p>
                            <a href="{{ url('jobs?job_category_id=' . $category->id) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="{{ url('categories') }}" class="btn btn-primary">See All Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose" style="background-image: url({{ asset('upload/homepages/' . $getHomepage->why_choose_bg) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Why Choose Us</h2>
                        <p>
                            Our Methods to help you build your career in
                            future
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($listWhyChoose as $item)
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $item->title }}</h2>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="job">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $getHomepage->feature_job_title }}</h2>
                        <p>{{ $getHomepage->feature_job_short_title }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($featuredJobs as $job)
                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                                <img src="{{ asset('frontend/imgs/logo1.png') }}" alt="" />
                            </div>
                            <div class="text">
                                <h3>
                                    <a href="{{ route('jobs.detail', [$job->slug]) }}">{{ $job->name }}</a>
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
                                    <div class="date">{{ $job->created_at->diffForHumans() }}
                                    </div>
                                    <div class="budget">{{ $job->salary->name }}</div>
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
                                @if (!Auth::guard('company')->check())
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
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="{{ route('jobs.listing') }}" class="btn btn-primary">See All Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial"
        style="background-image: url({{ asset('upload/testimonials/' . $getHomepage->testimonial_bg) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">{{ $getHomepage->testimonial_title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">
                        @foreach ($listTestimonials as $testimonial)
                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('upload/testimonials/' . $testimonial->image) }}"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                                <div class="description">
                                    <p>
                                        {{ $testimonial->comment }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $getHomepage->latest_news_title }}</h2>
                        <p>
                            {{ $getHomepage->latest_news_short_title }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($listPosts as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('frontend/imgs/banner1.jpg') }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('blogs.show', [$item->id]) }}">{{ $item->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {{ $item->short_description }}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('blogs.show', [$item->id]) }}" class="btn btn-primary">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
