@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page Privacy </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-page-privacy', [$getPrivacy->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getPrivacy->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea id="default" name="description">{{ $getPrivacy->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Privacy Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/privacies/' . $getPrivacy->image) }}" alt=""
                                                class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Page Privacy</button>
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
