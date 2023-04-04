@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Video</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <h4>Add Video</h4>
                    <form action="{{ route('company.videos-submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <input type="text" name="video" class="form-control" placeholder="Video Code">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-sm" value="Submit">
                            </div>
                        </div>
                    </form>

                    <h4 class="mt-4">Existing Videos</h4>
                    <div class="video-all">
                        <div class="row">
                            @foreach ($getVideos as $video)
                                <div class="col-md-6 col-lg-3">
                                    <div class="item">
                                        <a class="video-button" href="http://www.youtube.com/watch?v={{ $video->video }}">
                                            <img src="http://img.youtube.com/vi/{{ $video->video }}/0.jpg" alt="">
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <br>
                                    <a href="{{ route('company.videos-delete', [$video->id]) }}"
                                        class="btn btn-danger btn-sm mb-4">Delete</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
