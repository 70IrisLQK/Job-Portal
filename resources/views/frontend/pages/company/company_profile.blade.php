@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('company.update-profile', [$getCompany->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('frontend.components.display_error')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="">Existing Logo</label>
                                <div class="form-group">
                                    <img src="{{ asset('upload/companies/' . $getCompany->logo) }}" alt=""
                                        class="logo" id="show_image" />
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Change Logo</label>
                                <div class="form-group">
                                    <input type="file" name="logo" id="image" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Name *</label>
                                <div class="form-group">
                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Example: ABC Media Ltd." value="{{ $getCompany->company_name }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Contact Person *</label>
                                <div class="form-group">
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Example: James O'neil" value="{{ $getCompany->person_name }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Email *</label>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="Example: khanhlam.dev@gmail.com" value="{{ $getCompany->email }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Phone *</label>
                                <div class="form-group">
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Example: 0987654312" value="{{ $getCompany->phone }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Address *</label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control"
                                        placeholder="Example: 12, KBC Street, NYC, USA"
                                        value="{{ $getCompany->address }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Country *</label>
                                <div class="form-group">
                                    <select name="company_country_id" class="form-control select2">
                                        @foreach ($companyLocation as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Website</label>
                                <div class="form-group">
                                    <input type="text" name="website" class="form-control"
                                        placeholder="Example: https://www.khanhlam.com"
                                        value="{{ $getCompany->website }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Company Size *</label>
                                <div class="form-group">
                                    <select name="company_size_id" class="form-control select2">
                                        @foreach ($companySize as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Founded On *</label>
                                <div class="form-group">
                                    <select name="company_founded_id" class="form-control select2">
                                        @foreach ($companyFounded as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Industry *</label>
                                <div class="form-group">
                                    <select name="company_industry_id" class="form-control select2">
                                        @foreach ($companyIndustry as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">About Company *</label>
                                <textarea name="about_company" class="form-control editor" cols="30" rows="10">
                                {{ $getCompany->description }}
                                </textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Monday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_mon" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_mon }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Tuesday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_tue" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_tue }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Wednesday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_wed" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_wed }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Thursday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_thu" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_thu }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Friday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_fri" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_fri }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Saturday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_sat" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_sat }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Opening Hour (Sunday)</label>
                                <div class="form-group">
                                    <input type="text" name="oh_sun" class="form-control"
                                        placeholder="Example: 9:00 AM to 5:00 PM" value="{{ $getCompany->oh_sun }}" />
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="">Location Map (Google Map Code)</label>
                                <div class="form-group">
                                    <textarea name="map_code" class="form-control h-150" cols="30" rows="10">{{ $getCompany->map_code }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Facebook</label>
                                <div class="form-group">
                                    <input type="text" name="facebook" class="form-control"
                                        placeholder="Example: https://www.facebook.com/"
                                        value="{{ $getCompany->facebook }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Twitter</label>
                                <div class="form-group">
                                    <input type="text" name="twitter" class="form-control"
                                        placeholder="Example: https://www.twitter.com/"
                                        value="{{ $getCompany->twitter }}" />
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Linkedin</label>
                                <div class="form-group">
                                    <input type="text" name="linkedin" class="form-control"
                                        placeholder="Example: https://www.linkedin.com/"
                                        value="{{ $getCompany->linkedin }}" />
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Instagram</label>
                                <div class="form-group">
                                    <input type="text" name="instagram" class="form-control"
                                        placeholder="Example: https://www.instagram.com/"
                                        value="{{ $getCompany->instagram }}" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
