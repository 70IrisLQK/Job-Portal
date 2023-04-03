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
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('skill.index') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> See
                        All</a>
                    <form action="{{ route('skill.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Skill Name *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ old('skill_name') }}" name="skill_name"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Percentage *</label>
                                <div class="form-group">
                                    <input type="number" max="100" value="{{ old('percentage') }}" name="percentage"
                                        class="form-control" />
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
