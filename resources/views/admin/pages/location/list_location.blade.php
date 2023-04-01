@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Management Location</h1>
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
                                            <th>View Detail</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listLocations as $key => $location)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $location->name }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $location->id }}">
                                                        View Detail
                                                    </button>
                                                </td>
                                                <td class="pt_10 pb_10 d-flex">
                                                    <a href="{{ route('locations.edit', [$location->id]) }}"
                                                        class="btn btn-success">Update</a>
                                                    <form action="{{ route('locations.destroy', [$location->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you sure?')" value="Delete" />
                                                        {{-- <a href="" class="btn btn-danger"
                                                            onClick="return confirm('Are you sure?');">Delete</a> --}}
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $location->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Location
                                                                    Detail
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Name</label></div>
                                                                    <div class="col-md-8">{{ $location->name }}</div>
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
