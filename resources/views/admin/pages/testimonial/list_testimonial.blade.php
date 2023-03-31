@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Management Testimonial</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="example1">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Comment</th>
                                            <th>Image</th>
                                            <th>View Detail</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listTestimonials as $key => $testimonial)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ Str::limit($testimonial->description, 50, '...') }}</td>
                                                <td>{{ Str::limit($testimonial->comment, 40, '...') }}</td>
                                                <td>
                                                    <img src="{{ asset('upload/testimonials/' . $testimonial->image) }}"
                                                        style="width: 100px;height: 100px;">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $testimonial->id }}">
                                                        View Detail
                                                    </button>
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('testimonials.edit', [$testimonial->id]) }}"
                                                        class="btn btn-success bt-sm">Update</a>
                                                    <form action="{{ route('testimonials.destroy', [$testimonial->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger bt-sm"
                                                            onclick="return confirm('Are you sure?')" value="Delete" />
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $testimonial->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Testimonial Detail
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Name</label></div>
                                                                    <div class="col-md-8">{{ $testimonial->name }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label
                                                                            class="form-label">Description</label></div>
                                                                    <div class="col-md-8">
                                                                        {{ Str::limit($testimonial->description, 100, '...') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label
                                                                            class="form-label">Comment</label></div>
                                                                    <div class="col-md-8">
                                                                        {{ Str::limit($testimonial->comment, 100, '...') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label
                                                                            class="form-label">Image</label></div>
                                                                    <div class="col-md-8">
                                                                        <img src="{{ asset('upload/testimonials/' . $testimonial->image) }}"
                                                                            style="width: 100px;height: 100px;">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
