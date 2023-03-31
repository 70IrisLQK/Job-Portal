@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Management Post</h1>
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
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Short Description</th>
                                            <th>Description</th>
                                            <th>View</th>
                                            <th>User Created</th>
                                            <th>Image</th>
                                            <th>View Detail</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listPosts as $key => $post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->slug }}</td>
                                                <td>{{ Str::limit($post->short_description, 50, '...') }}</td>
                                                <td>{!! Str::limit($post->description, 50, '...') !!}</td>
                                                <td>{{ $post->view }}</td>
                                                <td>{{ $post->created_by }}</td>
                                                <td>
                                                    <img src="{{ asset('upload/posts/' . $post->image) }}"
                                                        style="width: 100px;height: 100px;">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $post->id }}">
                                                        View Detail
                                                    </button>
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('posts.edit', [$post->id]) }}"
                                                        class="btn btn-success bt-sm">Update</a>
                                                    <form action="{{ route('posts.destroy', [$post->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger bt-sm"
                                                            onclick="return confirm('Are you sure?')" value="Delete" />
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Post Detail
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Title</label></div>
                                                                    <div class="col-md-8">{{ $post->title }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Slug</label></div>
                                                                    <div class="col-md-8">{{ $post->slug }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">Short
                                                                            Description</label></div>
                                                                    <div class="col-md-8">
                                                                        {{ Str::limit($post->short_description, 100, '...') }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label
                                                                            class="form-label">Description</label></div>
                                                                    <div class="col-md-8">
                                                                        {!! Str::limit($post->description, 100, '...') !!}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            View</label></div>
                                                                    <div class="col-md-8">{{ $post->view }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            User Created</label></div>
                                                                    <div class="col-md-8">{{ $post->created_by }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label
                                                                            class="form-label">Image</label></div>
                                                                    <div class="col-md-8">
                                                                        <img src="{{ asset('upload/posts/' . $post->image) }}"
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
