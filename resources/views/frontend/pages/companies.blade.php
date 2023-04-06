@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('{{ asset('upload/' . $getPage->image) }}')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $getPage->title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="job-filter">
                        <form method="get" action="{{ route('companies.listing') }}" id="form__submit">
                            <div class="widget">
                                <h2>Company Name</h2>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Search Company Name ..." value="{{ $name }}" />
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Location</h2>
                                <select name="location" class="form-control select2">
                                    <option value="">Company Location</option>
                                    @foreach ($companyLocation as $item)
                                        <option @if ($item->id == $location) selected @endif value={{ $item->id }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Industry</h2>
                                <select name="industry" class="form-control select2">
                                    <option value="">Company Industry</option>

                                    @foreach ($companyIndustry as $item)
                                        <option @if ($item->id == $industry) selected @endif value={{ $item->id }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Company Size</h2>
                                <select name="size" class="form-control select2">
                                    <option value="">Company Size</option>

                                    @foreach ($companySize as $item)
                                        <option @if ($item->id == $size) selected @endif value={{ $item->id }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="widget">
                                <h2>Founded On</h2>
                                <select name="founded" class="form-control select2">
                                    <option value="">Founded On</option>
                                    @foreach ($companyFounded as $item)
                                        <option @if ($item->id == $founded) selected @endif
                                            value={{ $item->id }}>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="filter-button">
                                <a type="submit" class="btn  btn-sm" onclick="submitForm()">
                                    <i class="fas fa-search"></i> Filter
                                </a>
                            </div>
                        </form>

                        <div class="advertisement">
                            <a href="https://github.com/70IrisLQK" target="_blank"><img
                                    src="{{ asset('upload/advertisements/' . $getAdvertisement->company_listing_ad) }}"
                                    alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search
                                        Result for Company Listing
                                    </div>
                                </div>
                                @if (!$getCompanies->count())
                                    <div class="text-danger">No result data found</div>
                                @else
                                    @foreach ($getCompanies as $company)
                                        <div class="col-md-12">
                                            <div class="item d-flex justify-content-start">
                                                <div class="logo">
                                                    <img src="{{ asset('upload/companies/' . $company->logo) }}"
                                                        alt="" />
                                                </div>
                                                <div class="text">
                                                    <h3>
                                                        <a
                                                            href="{{ route('companies.detail', [$company->slug]) }}">{{ $company->company_name }}</a>
                                                    </h3>
                                                    <div class="detail-1 d-flex justify-content-start">
                                                        <div class="category">
                                                            {{ $company->industry->name }}
                                                        </div>
                                                        <div class="location">
                                                            {{ $company->location->name }}
                                                        </div>
                                                    </div>
                                                    <div class="detail-2 d-flex justify-content-start">
                                                        <div class="location">
                                                            {!! Str::limit($company->description, 100, '...') !!}
                                                        </div>
                                                    </div>
                                                    <div class="open-position">
                                                        <span class="badge bg-primary">{{ $company->jobs_count }} Open
                                                            Positions</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="col-md-12">
                                    {{ $getCompanies->appends($_GET)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
