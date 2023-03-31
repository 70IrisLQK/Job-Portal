@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Add New Package</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('packages.store') }}" method="post">
                                @csrf
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Package Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Package Price *</label>
                                            <input type="text" class="form-control" name="price"
                                                value="{{ old('price') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Package Days *</label>
                                            <input type="text" class="form-control" name="days"
                                                value="{{ old('days') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Package Display Time *</label>
                                            <input type="text" class="form-control" name="display_time"
                                                value="{{ old('display_time') }}">
                                        </div>



                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Total allow Job *</label>
                                                    <input type="text" class="form-control" name="total_allowed_job"
                                                        value="{{ old('total_allowed_job') }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Total allow Feature Job *</label>
                                                    <input type="text" class="form-control"
                                                        name="total_allowed_featured_jobs"
                                                        value="{{ old('total_allowed_featured_jobs') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Total allow Photo *</label>
                                                    <input type="text" class="form-control" name="total_allowed_photos"
                                                        value="{{ old('total_allowed_photos') }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="mb-4">
                                                    <label class="form-label">Total allow Video *</label>
                                                    <input type="text" class="form-control" name="total_allowed_videos"
                                                        value="{{ old('total_allowed_videos') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Add Package</button>
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
