@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>List Application</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    @if (!count($listJobApply))
                        <div>
                            <span class="text-danger">
                                No result data found
                            </span>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Current Status</th>
                                        <th>See Resume</th>
                                        <th>Cover Letter</th>
                                        <th>Change Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($listJobApply as $job)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $job->candidate->name }}</td>
                                            <td>{{ $job->candidate->email }}</td>
                                            <td>{{ $job->candidate->phone ?? 'Updating' }}</td>
                                            <td>
                                                @if ($job->status == 'Applied')
                                                    <span class="badge bg-success">Applied</span>
                                                @elseif ($job->status == 'Approved')
                                                    <span class="badge bg-primary">Approved</span>
                                                @else
                                                    <span class="badge bg-danger">Reject</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('application.detail', [$job->candidate->id]) }}"
                                                    target="_blank" class="btn btn-primary btn-sm">See Resume</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $job->id }}">
                                                    Cover Letter
                                                </button>
                                            </td>
                                            <td>
                                                <div class="mb-3">
                                                    <form action="{{ route('application.change-status') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="job_id" value="{{ $job->job_id }}" />
                                                        <input type="hidden" name="candidate_id"
                                                            value="{{ $job->candidate->id }}" />
                                                        <select class="form-control select2" name="change_status"
                                                            style="width: 100%" id=""
                                                            onchange="this.form.submit()">
                                                            <option value="">Select</option>
                                                            <option value="Approved">Approved</option>
                                                            <option value="Reject">Reject</option>
                                                        </select>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Are you sure?');">Delete</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $job->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cover Letter</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $job->cover_letter }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
