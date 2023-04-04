@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page Category </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-page-categories', [$getCategory->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getCategory->title }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Category Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/' . $getCategory->image) }}"
                                                alt="" class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Seo Title</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                value="{{ $getCategory->seo_title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Seo Descriptiion</label>
                                            <input type="text" class="form-control" name="seo_description"
                                                value="{{ $getCategory->seo_description }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Page Category</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
