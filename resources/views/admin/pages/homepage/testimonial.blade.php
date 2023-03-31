@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Homepage Testimonial</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-testimonial', [$getHomePage->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="testimonial_title"
                                                value="{{ $getHomePage->testimonial_title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Display *</label>
                                            <select class="form-select" aria-label="Default select example" name="status">
                                                <option {{ $getHomePage->testimonial_status == 0 ? 'selected' : '' }}
                                                    value="0">
                                                    Inactive</option>
                                                <option {{ $getHomePage->testimonial_status == 1 ? 'selected' : '' }}
                                                    value="1">
                                                    Active</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Testimonial Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/homepages/' . $getHomePage->testimonial_bg) }}"
                                                alt="" class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Testimonial</button>
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
