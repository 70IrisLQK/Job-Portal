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
                    <form action="{{ route('candidate_update_password') }}" method="post">
                        @csrf
                        @method('PUT')
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Password *</label>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Confirm Password *</label>
                                <div class="form-group">
                                    <input type="password" name="confirm_password" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update" />
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
