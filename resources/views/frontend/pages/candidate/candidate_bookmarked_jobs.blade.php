@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner4.jpg') }})">
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
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Job Title</th>
                                    <th class="w-100">Detail</th>
                                </tr>
                                @foreach ($getBookmark as $bookmark)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $bookmark->job->title }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('jobs.detail', [$bookmark->job->slug]) }}"
                                                class="btn btn-primary btn-sm text-white mx-1"><i
                                                    class="fas fa-eye"></i></a>
                                            <form action="{{ route('bookmark.destroy', [$bookmark->id]) }}" method="POST">
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
