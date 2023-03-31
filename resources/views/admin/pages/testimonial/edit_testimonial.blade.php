@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Testimonial</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('testimonials.update', [$getTestimonialById->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $getTestimonialById->name }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description *</label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $getTestimonialById->description }}"
                                                value="{{ old('description') }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Comment *</label>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                                                name="comment">{{ $getTestimonialById->comment }}</textarea>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Image *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/testimonials/' . $getTestimonialById->image) }}"
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
