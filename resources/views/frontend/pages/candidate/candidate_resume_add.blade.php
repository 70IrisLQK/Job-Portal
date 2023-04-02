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
                    <a href="{{ route('resume.index') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        See
                        All</a>
                    <form action="{{ route('resume.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Name *</label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">File *</label>
                                <div class="form-group">
                                    <input type="file" name="file" value="{{ old('file') }}" />
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
