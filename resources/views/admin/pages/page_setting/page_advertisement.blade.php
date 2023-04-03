@extends('admin.admin_master')
@section('admin-content')
    <section class="section">
        <div class="section-header">
            <h1> Page Category </h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-advertisement', [$getAdvertisement->id]) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('admin.components.display_error')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label">Job Listing Background *</label>
                                            <input type="file" class="form-control mt_10" name="image" id="image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/advertisements/' . $getAdvertisement->job_listing_ad) }}"
                                                alt="" class="profile-photo w_100_p" id="show_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Job Listing Show *</label>
                                            <select class="form-control" name="job_listing_ad_status">
                                                <option value="1"
                                                    {{ $getAdvertisement->job_listing_ad_status == 1 ? 'select' : '' }}>
                                                    Show</option>
                                                <option value="0"
                                                    {{ $getAdvertisement->job_listing_ad_status == 0 ? 'select' : '' }}>
                                                    Hide</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Company Listing Background *</label>
                                            <input type="file" class="form-control mt_10" name="company_image"
                                                id="company_image">
                                        </div>
                                        <div class="col-3">
                                            <img src="{{ asset('upload/advertisements/' . $getAdvertisement->company_listing_ad) }}"
                                                alt="" class="profile-photo w_100_p" id="show_company_image">
                                            <label class="form-label"></label>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Company Listing Show *</label>
                                            <select class="form-control" name="company_listing_ad_status">
                                                <option value="1"
                                                    {{ $getAdvertisement->company_listing_ad_status == 1 ? 'select' : '' }}>
                                                    Show</option>
                                                <option value="0"
                                                    {{ $getAdvertisement->company_listing_ad_status == 0 ? 'select' : '' }}>
                                                    Hide</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label"></label>
                                            <button type="submit" class="btn btn-primary">Update Page Category</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
