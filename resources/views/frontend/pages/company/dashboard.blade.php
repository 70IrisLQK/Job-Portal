@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <h3>{{ Auth::guard('company')->user()->name }}</h3>
                    <p>See all the statistics at a glance:</p>

                    <div class="row box-items">
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>{{ $totalOpenJob }}</h4>

                                <p>Open Jobs</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="box3">
                                <h4>{{ $totalFeaturedJob }}</h4>
                                <p>Featured Jobs</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-5">Recent Jobs</h3>
                    @if (!$getJobs->count())
                        <span class="text-danger">
                            No rencent job.
                        </span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Job Title</th>
                                        <th>Category</th>
                                        <th>Featured</th>
                                        <th>Urgent</th>
                                    </tr>
                                    @foreach ($getJobs as $job)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $job->title }}</td>
                                            <td>{{ $job->category->name }}</td>
                                            <td>
                                                @if ($job->is_featured == 1)
                                                    <span class="badge bg-success">Featured</span>
                                                @else
                                                    <span class="badge bg-danger">Not Featured</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($job->is_urgent == 1)
                                                    <span class="badge bg-success">Featured</span>
                                                @else
                                                    <span class="badge bg-danger">Not Featured</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
