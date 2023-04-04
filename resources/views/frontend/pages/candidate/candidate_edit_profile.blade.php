@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner2.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Edit Profile
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.candidate.candidate_sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('candidate_update_profile', [$getProfile->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Photo</label>
                                <div class="form-group">
                                    <img src="{{ isset($getProfile->image) ? asset('upload/candidates/' . $getProfile->image) : asset('upload/no_image.jpg') }}"
                                        alt="" class="user-photo" id="show_image" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change Photo</label>
                                <div class="form-group">
                                    <input type="file" name="image" id="image" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Name *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->name ?? old('name') }}" name="name"
                                        class="form-control" placeholder="Example: Peter Johnson" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Designation *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->description ?? old('description') }}"
                                        name="description" class="form-control"
                                        placeholder="Example: Expert PHP and Laravel Developer" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Biography *</label>
                                <textarea name="biography" class="form-control editor" cols="30" rows="10">
                                    {{ $getProfile->bio ?? old('biography') }}
                                </textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->email ?? old('email') }}" name="email"
                                        class="form-control" placeholder="Example: peter@gmail.com" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->phone ?? old('phone') }}" name="phone"
                                        class="form-control" placeholder="Example: 232-232-1212" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Country *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->country ?? old('country') }}"
                                        name="country" class="form-control" placeholder="Example: Canada" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->address ?? old('address') }}"
                                        name="address" class="form-control" placeholder="Example: 34, MKC Street" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">State *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->state ?? old('state') }}" name="state"
                                        class="form-control" placeholder="Example: CA" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">City *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->city ?? old('city') }}" name="city"
                                        class="form-control" placeholder="Example: NYC" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Zip Code *</label>
                                <div class="form-group">
                                    <input type="text" value="{{ $getProfile->zip_code ?? old('zip_code') }}"
                                        name="zip_code" class="form-control" placeholder="Example: 32432" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Gender *</label>
                                <div class="form-group">
                                    <select name="gender" class="form-control select2">
                                        <option value="1" {{ asset($getProfile->gender) == 1 ? 'selected' : '' }}>
                                            Male
                                        </option>
                                        <option value="0" {{ asset($getProfile->gender) == 0 ? 'selected' : '' }}>
                                            Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Marital Status *</label>
                                <div class="form-group">
                                    <select name="marital_status" class="form-control select2">
                                        <option value="1"
                                            {{ asset($getProfile->marital_status) == 0 ? 'selected' : '' }}>Married
                                        </option>
                                        <option value="0"
                                            {{ asset($getProfile->marital_status) == 0 ? 'selected' : '' }}>Unmarried
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Date of Birth *</label>
                                <div class="form-group">
                                    <input type="text"
                                        value="{{ isset($getProfile->date_of_birth) ? $getProfile->date_of_birth : date('Y-m-d') }}"
                                        name="date_of_birth" class="form-control datepicker" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">

                                <label for="">Website</label>
                                <div class="form-group">
                                    <input type="text" name="website" class="form-control"
                                        value="{{ $getProfile->website ?? old('website') }}"
                                        placeholder="Example: https://www.peter.com" />
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update" />
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
