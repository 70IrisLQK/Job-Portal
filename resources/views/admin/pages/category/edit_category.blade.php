@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Update Category</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('categories.update', [$getCategoryById->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $getCategoryById->name }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Icon *</label>
                                            <input type="text" class="form-control" name="icon"
                                                placeholder="Example fas fa-users" value="{{ $getCategoryById->icon }}">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Description </label>
                                            <textarea type="text" class="form-control" name="description">{{ $getCategoryById->description }}</textarea>
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
