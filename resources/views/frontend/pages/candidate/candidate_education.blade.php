@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner5.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Education List</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.candidate.candidate_sidebar')

                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('education.create') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-plus"></i>
                        Add Item</a>
                    @if (!$listEducation->count())
                        <div class="col-lg-9 col-md-12">
                            <span class="text-danger">No result data found</span>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Education Level</th>
                                        <th>Institute</th>
                                        <th>Degree</th>
                                        <th>Passing Year</th>
                                        <th class="w-125">Action</th>
                                    </tr>
                                    @foreach ($listEducation as $education)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $education->level }}</td>
                                            <td>{{ $education->institute }}</td>
                                            <td>{{ $education->degree }}</td>
                                            <td>{{ $education->passing_year }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('education.edit', [$education->id]) }}"
                                                    class="btn btn-warning btn-sm text-white mx-2"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('education.destroy', [$education->id]) }}"
                                                    method="POST">
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
                    @endif
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
