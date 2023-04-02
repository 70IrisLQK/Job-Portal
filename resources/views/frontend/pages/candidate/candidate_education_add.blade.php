@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
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
                    <a href="{{ route('education.index') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        See
                        All</a>
                    <form action="{{ route('education.store') }}" method="post">
                        @csrf
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Education Level *</label>
                                <div class="form-group">
                                    <input type="text" name="level" class="form-control" value="{{ old('level') }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Institute *</label>
                                <div class="form-group">
                                    <input type="text" name="institute" class="form-control"
                                        value="{{ old('institute') }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Degree *</label>
                                <div class="form-group">
                                    <input type="text" name="degree" class="form-control" value="{{ old('degree') }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Passing Year *</label>
                                <div class="form-group">
                                    <input type="text" name="passing_year" class="form-control"
                                        value="{{ old('passing_year') }}" />
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
