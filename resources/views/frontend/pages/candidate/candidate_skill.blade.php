@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
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
                    <a href="{{ route('skill.create') }}" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i>
                        Add
                        Item</a>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Skill Name</th>
                                    <th>Percentage</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($listSkill as $skill)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $skill->skill_name }}</td>
                                        <td>{{ $skill->percentage }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('skill.edit', [$skill->id]) }}"
                                                class="btn btn-warning btn-sm text-white mx-1"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('skill.destroy', [$skill->id]) }}" method="POST">
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
