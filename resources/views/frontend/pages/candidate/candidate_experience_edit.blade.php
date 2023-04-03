@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner8.jpg') }})">
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
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('experience.index') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-plus"></i> See
                        All</a>
                    <form action="{{ route('experience.update', [$getExperience->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Company *</label>
                                <div class="form-group">
                                    <input type="text" name="company" class="form-control"
                                        value="{{ $getExperience->company }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description *</label>
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control"
                                        value="{{ $getExperience->description }}" />
                                </div>
                            </div>
                            <div class="col-md-12
                                        mb-3">
                                <label for="">Start Date *</label>
                                <div class="form-group">
                                    <input type="text"
                                        value="{{ $getExperience->start_date ? $getExperience->start_date : date('Y-m-d') }}"
                                        name="start_date" class="form-control datepicker" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">End Date *</label>
                                <div class="form-group">
                                    <input type="text"
                                        value="{{ $getExperience->end_date ? $getExperience->end_date : date('Y-m-d') }}"
                                        name="end_date" class="form-control datepicker" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
