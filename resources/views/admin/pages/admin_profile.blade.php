@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-profile', [$getAdmin->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ asset('upload/avatars/' . $getAdmin->avatar) }}" alt=""
                                            class="profile-photo w_100_p" id="show_image">
                                        <input type="file" class="form-control mt_10" name="image" id="image">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $getAdmin->name }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Email *</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $getAdmin->email }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="new_password">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update</button>
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
