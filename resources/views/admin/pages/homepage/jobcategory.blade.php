@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Homepage Job Category</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-job-category', [$getHomePage->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="job_category_title"
                                                value="{{ $getHomePage->job_category_title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Short Title *</label>
                                            <textarea rows="4" type="text" class="form-control" name="job_category_short_title">{{ $getHomePage->job_category_short_title }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Display *</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                <option {{ $getHomePage->job_category_status == 0 ? 'selected' : '' }}
                                                    value="0">
                                                    Inactive</option>
                                                <option {{ $getHomePage->job_category_status == 1 ? 'selected' : '' }}
                                                    value="1">
                                                    Active</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Job Category</button>
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
