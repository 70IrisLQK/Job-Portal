@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner8.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Experience List</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('experience.create') }}" class="btn btn-primary btn-sm mb-2"><i
                            class="fas fa-plus"></i>
                        Add Item</a>
                    @if (!$listExperience->count())
                        <div>
                            <span class="text-danger">No result data found</span>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Company</th>
                                        <th>Designation</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($listExperience as $experience)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $experience->company }}</td>
                                            <td>{{ $experience->description }}</td>
                                            <td>{{ $experience->start_date }}</td>
                                            <td>{{ $experience->end_date }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('experience.edit', [$experience->id]) }}"
                                                    class="btn btn-warning btn-sm text-white"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('experience.destroy', [$experience->id]) }}"
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
