@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner6.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Award List</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <a href="{{ route('award.create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        Add
                        Item</a>
                    @if (!$listAward->count())
                        <div>
                            <span class="text-danger">No result data found</span>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th class="w-150">Date</th>
                                        <th class="w-100">Action</th>
                                    </tr>
                                    @foreach ($listAward as $award)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $award->title }}
                                            </td>
                                            <td>
                                                {{ $award->description }}
                                            </td>
                                            <td>{{ $award->date }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('award.edit', [$award->id]) }}"
                                                    class="btn btn-warning btn-sm text-white mx-1"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('award.destroy', [$award->id]) }}" method="POST">
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
