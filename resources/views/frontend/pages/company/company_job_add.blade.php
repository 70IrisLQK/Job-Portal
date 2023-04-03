@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('company.store-job') }}" method="post">
                        @csrf
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Title *</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Description</label>
                            <textarea name="description" class="form-control editor" cols="30" rows="10">{{ old('description') }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Job Responsibilities</label>
                                <textarea name="responsibility" class="form-control editor" cols="30" rows="10">{{ old('responsibility') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Skills and Abilities</label>
                                <textarea name="skill" class="form-control editor" cols="30" rows="10">{{ old('skill') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Educational Qualification</label>
                                <textarea name="education" class="form-control editor" cols="30" rows="10">{{ old('education') }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Benifits</label>
                                <textarea name="benefit" class="form-control editor" cols="30" rows="10">{{ old('benifit') }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Deadline *</label>
                                <input type="text" name="deadline" class="form-control datepicker"
                                    value="{{ old('deadline') ? old('deadline') : date('Y-m-d') }}" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Vacancy *</label>
                                <input type="number" min="1" class="form-control"
                                    value="{{ old('vacancy') ? old('vacancy') : 1 }}" name="vacancy" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Category *</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach ($jobCategory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Location *</label>
                                <select name="location_id" class="form-control select2">
                                    @foreach ($jobLocation as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Job Type *</label>
                                <select name="type_id" class="form-control select2">
                                    @foreach ($jobType as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Experience *</label>
                                <select name="experience_id" class="form-control select2">
                                    @foreach ($jobExperience as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Gender *</label>
                                <select name="gender_id" class="form-control select2">
                                    @foreach ($jobGender as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Salary Range *</label>
                                <select name="salary_range_id" class="form-control select2">
                                    @foreach ($jobSalaryRange as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="" class="form-label">Location Map</label>
                                <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ old('map_code') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Is Featured ?</label>
                                <select name="is_featured" class="form-control select2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="" class="form-label">Is Urgent ?</label>
                                <select name="is_urgent" class="form-control select2">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
