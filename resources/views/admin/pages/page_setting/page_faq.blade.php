@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page FAQ </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-page-faqs', [$getFAQ->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getFAQ->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea rows="4" type="text" class="form-control" name="description">{{ $getFAQ->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">FAQ Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/faqs/' . $getFAQ->image) }}" alt=""
                                                class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Page FAQ</button>
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
