@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/posts/' . $getPostById->image) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getPostById->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&amp;product=inline-share-buttons"
        async="async"></script>
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="featured-photo">
                        <img src="uploads/banner1.jpg" alt="">
                    </div>
                    <div class="sub">
                        <div class="item">
                            <b><i class="fa fa-clock-o"></i></b>
                            {{ \Carbon\Carbon::parse($getPostById->created_at)->diffForHumans() }}
                        </div>
                        <div class="item">
                            <b><i class="fa fa-eye"></i></b>
                            {{ $getPostById->view }}
                        </div>
                    </div>
                    <div class="main-text">
                        {!! $getPostById->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
