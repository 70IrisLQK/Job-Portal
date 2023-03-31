@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Add New Post</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ old('title') }}">
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Short Description *</label>
                                            <textarea class="form-control" placeholder="Leave a short description here" id="floatingTextarea2" style="height: 100px"
                                                name="short_description">{{ old('short_description') }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea id="default" name="description">{{ old('description') }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Image *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/no_image.jpg') }}" alt=""
                                                class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Add Post</button>
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
