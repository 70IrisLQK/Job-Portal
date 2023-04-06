@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top page-top-job-single"
        style="background-image: url('{{ asset('upload/' . $getJob->company->banner) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 job job-single">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('upload/companies/' . $getJob->company->logo) }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>{{ $getJob->title }}</h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">{{ $getJob->category->name }}</div>
                                <div class="location">{{ $getJob->location->name }}</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">{{ $getJob->created_at->diffForHumans() }}</div>
                                <div class="budget">{{ $getJob->salary->name }}</div>

                                @if (date('Y-m-d') > $getJob->deadline)
                                    <div class="expired">
                                        Expired
                                    </div>
                                @endif
                            </div>
                            <div class="special d-flex justify-content-start">
                                @if ($getJob->is_featured == 1)
                                    <div class="featured">
                                        Featured
                                    </div>
                                @endif
                                <div class="type">
                                    {{ $getJob->type->name }}
                                </div>
                                @if ($getJob->urgent == 1)
                                    <div class="urgent">
                                        Urgent
                                    </div>
                                @endif
                            </div>
                            @if (!Auth::guard('company')->user())
                                <div class="apply">
                                    @if (date('Y-m-d') <= $getJob->deadline)
                                        <a href="{{ route('candidate.apply', [$getJob->slug]) }}"
                                            class="btn btn-primary">Apply Now</a>
                                    @endif

                                    <a class="btn btn-primary save-job"
                                        href="{{ route('candidate.bookmark', [$getJob->id]) }}">Bookmark</a>

                                </div>
                            @endif
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
                            Description
                        </h2>
                        <p>
                            {!! $getJob->description !!}
                        </p>
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Job Responsibilities
                        </h2>
                        {!! $getJob->responsibility !!}
                    </div>
                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Skills and Abilities
                        </h2>
                        {!! $getJob->skill !!}
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Educational Qualification
                        </h2>
                        {!! $getJob->education !!}
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Benefits
                        </h2>
                        {!! $getJob->benefit !!}
                    </div>

                    <div class="left-item">
                        <div class="apply">
                            @if (!Auth::guard('company')->check())
                                @if (date('Y-m-d') <= $getJob->deadline)
                                    <a href="{{ route('candidate.apply', [$getJob->slug]) }}" class="btn btn-primary">Apply
                                        Now</a>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="left-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Related Jobs
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">
                                    @foreach ($getJobsRelate as $job)
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
                                                        @if ($job->is_urgent == 1)
                                                            <div class="urgent">
                                                                Urgent
                                                            </div>
                                                        @endif
                                                    </div>
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
                                                    @if (Auth::guard('candidate')->check())
                                                        <div class="bookmark">
                                                            <a href="{{ route('candidate.bookmark', [$job->id]) }}"><i
                                                                    class="fas fa-bookmark {{ $bookmarkStatus }}"></i></a>
                                                        </div>
                                                    @endif
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
                            Job Summary
                        </h2>
                        <div class="summary">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td>
                                            <b>Published On:</b>
                                        </td>
                                        <td>{{ $getJob->created_at->diffForHumans() }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Deadline:</b></td>
                                        <td>{{ $getJob->deadline }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Vacancy:</b></td>
                                        <td>{{ $getJob->vacancy }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Category:</b></td>
                                        <td>{{ $getJob->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Location:</b></td>
                                        <td>{{ $getJob->location->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Salary Range:</b>
                                        </td>
                                        <td>{{ $getJob->salary->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>Experience:</b>
                                        </td>
                                        <td>{{ $getJob->experience->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Type:</b></td>
                                        <td>{{ $getJob->type->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender:</b></td>
                                        <td>{{ $getJob->gender->name }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Enquery Form
                        </h2>
                        <div class="enquery-form">
                            <form action="{{ route('jobs.send_mail') }}" method="post">
                                @csrf
                                @include('frontend.components.display_error')
                                <input type="hidden" name="job_title" value="{{ $getJob->title }}" />
                                <div class="mb-3">
                                    <input type="text" name='fullname' class="form-control" placeholder="Full Name" />
                                </div>
                                <div class="mb-3">
                                    <input type="email" name='email' class="form-control" placeholder="Email Address" />
                                </div>
                                <div class="mb-3">
                                    <input type="text" name='phone' class="form-control" placeholder="Phone Number" />
                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control h-150" name='message' rows="3" placeholder="Message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        <div class="location-map">
                            {!! $getJob->company->map_code !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
