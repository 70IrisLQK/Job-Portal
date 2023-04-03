@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner7.jpg') }})">
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
                    <a href="{{ route('award.index') }}}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        See
                        All</a>
                    <form action="{{ route('award.update', [$getAward->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Title *</label>
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $getAward->title }}" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Description *</label>
                                <div class="form-group">
                                    <textarea name="description" class="form-control h-100" cols="30" rows="10">{{ $getAward->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Date *</label>
                                <div class="form-group">
                                    <input type="text" name="date" class="form-control datepicker"
                                        value="{{ $getAward->date ? $getAward->date : date('Y-m-d') }}" />
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
