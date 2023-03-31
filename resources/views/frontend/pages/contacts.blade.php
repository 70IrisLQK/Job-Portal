@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/contacts/' . $getContact->image) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getContact->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="contact-form">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Message</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="map">
                        {!! $getContact->map_code !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
