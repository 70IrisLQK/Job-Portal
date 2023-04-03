@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('resume.create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        Add
                        Item</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>File</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($listResume as $resume)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $resume->name }}</td>
                                        <td>
                                            <a href="{{ url('upload/resumes/' . $resume->file) }}"
                                                target="_blank">{{ $resume->file }}</a>
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('resume.edit', [$resume->id]) }}"
                                                class="btn btn-warning btn-sm text-white mx-1"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('resume.destroy', [$resume->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    onClick="event.preventDefault(); this.closest('form').submit();return confirm('Do you want to delete it')"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
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
@endsection
