@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page Contact </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-page-contacts', [$getContact->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Title *</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ $getContact->title }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Map Embed *</label>
                                            <textarea class="form-control" placeholder="Leave a map embed here" id="floatingTextarea2" style="height: 100px"
                                                name="map_code">{{ $getContact->map_code }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <textarea class="form-control" placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px"
                                                name="description">{{ $getContact->description }}</textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Contact Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/contacts/' . $getContact->image) }}" alt=""
                                                class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Page Contact</button>
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
