@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Homepage Content</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-homepage', [$getHomePage->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getHomePage->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Short Title *</label>
                                            <textarea rows="4" type="text" class="form-control" name="short_title">{{ $getHomePage->short_title }}</textarea>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Job Title *</label>
                                                    <input type="text" class="form-control" name="job_title"
                                                        value="{{ $getHomePage->job_title }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Job Locaiton *</label>
                                                    <input type="text" class="form-control" name="job_location"
                                                        value="{{ $getHomePage->job_location }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Job Category *</label>
                                                    <input type="text" class="form-control" name="job_category"
                                                        value="{{ $getHomePage->job_category }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Search *</label>
                                                    <input type="text" class="form-control" name="search"
                                                        value="{{ $getHomePage->search }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Display *</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                <option {{ $getHomePage->status == 0 ? 'selected' : '' }} value="0">
                                                    Inactive</option>
                                                <option {{ $getHomePage->status == 1 ? 'selected' : '' }} value="1">
                                                    Active</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Seo Title</label>
                                            <input type="text" class="form-control" name="seo_title"
                                                value="{{ $getHomePage->seo_title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Seo Description</label>
                                            <textarea class="form-control" placeholder="Leave a seo description here" id="floatingTextarea2" style="height: 100px"
                                                name="seo_description">{{ $getHomePage->seo_description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Homepage Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/homepages/' . $getHomePage->background) }}"
                                                alt="" class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Homepage</button>
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
