@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1>Management Package</h1>
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
                                            <th>Package Name</th>
                                            <th>Package Price</th>
                                            <th>Package Days</th>
                                            <th>Package Display Time</th>
                                            <th>Total allow Job</th>
                                            <th>Total allow Feature Job</th>
                                            <th>Total allow Photo</th>
                                            <th>Total allow Video</th>
                                            <th>View Detail</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listPackages as $key => $package)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $package->name }}</td>
                                                <td>{{ $package->price }}</td>
                                                <td>{{ $package->days }}</td>
                                                <td>{{ $package->display_time }}</td>
                                                <td>{{ $package->total_allowed_job }}</td>
                                                <td>{{ $package->total_allowed_featured_jobs }}</td>
                                                <td>{{ $package->total_allowed_photos }}</td>
                                                <td>{{ $package->total_allowed_videos }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal{{ $package->id }}">
                                                        View Detail
                                                    </button>
                                                </td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('packages.edit', [$package->id]) }}"
                                                        class="btn btn-success bt-sm">Update</a>
                                                    <form action="{{ route('packages.destroy', [$package->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="btn btn-danger bt-sm"
                                                            onclick="return confirm('Are you sure?')" value="Delete" />
                                                    </form>
                                                </td>
                                                <div class="modal fade" id="exampleModal{{ $package->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">
                                                                    Package Detail
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Package Name

                                                                        </label></div>
                                                                    <div class="col-md-8">{{ $package->name }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Package Price

                                                                        </label></div>
                                                                    <div class="col-md-8">{{ $package->price }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Package Days

                                                                        </label></div>
                                                                    <div class="col-md-8">{{ $package->days }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Package Display Time

                                                                        </label></div>
                                                                    <div class="col-md-8">{{ $package->display_time }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Total allow Job
                                                                        </label></div>
                                                                    <div class="col-md-8">{{ $package->total_allowed_job }}
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Total allow Feature Job
                                                                        </label></div>
                                                                    <div class="col-md-8">
                                                                        {{ $package->total_allowed_featured_jobs }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Total allow Video
                                                                        </label></div>
                                                                    <div class="col-md-8">
                                                                        {{ $package->total_allowed_videos }}</div>
                                                                </div>
                                                                <div class="form-group row bdb1 pt_10 mb_0">
                                                                    <div class="col-md-4"><label class="form-label">
                                                                            Total allow Video
                                                                        </label></div>
                                                                    <div class="col-md-8">
                                                                        {{ $package->total_allowed_photos }}</div>
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
