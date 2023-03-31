@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('{{ asset('upload/posts/' . $getPageBlog->image) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getPageBlog->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="blog">
        <div class="container">
            <div class="row">
                @foreach ($listBlogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset('upload/posts/' . $blog->image) }}" alt="">
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route('blogs.show', [$blog->id]) }}">{{ $blog->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>
                                        {{ $blog->short_description }}
                                    </p>
                                </div>
                                <div class="button">
                                    <a href="{{ route('blogs.show', [$blog->id]) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
