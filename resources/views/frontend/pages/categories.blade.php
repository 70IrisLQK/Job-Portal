@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('{{ asset('upload/categories/' . $getCategory->image) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getCategory->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="job-category">
        <div class="container">
            <div class="row">
                @foreach ($listCategories as $category)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="icon">
                                <i class="{{ $category->icon }}"></i>
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <p>({{ $category->jobs_count }} Open Positions)</p>
                            <a href="{{ url('jobs?job_category_id=' . $category->id) }}"></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
