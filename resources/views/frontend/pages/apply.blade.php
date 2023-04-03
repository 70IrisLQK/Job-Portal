@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('{{ asset('upload/banner1.jpg') }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Apply for: {{ $getJob->title }}</h2>
                    <div class="button">
                        <a href="{{ route('jobs.detail', [$getJob->slug]) }}" class="btn btn-primary btn-sm">See Job
                            Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="job-apply">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="apply-form">
                        <form action="{{ route('apply.store', [$getJob->slug]) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="mb-1">Cover Letter *</label>
                                <textarea name="cover_letter" class="form-control" rows="3"></textarea>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    Confirm Apply
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
