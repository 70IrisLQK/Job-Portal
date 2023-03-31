@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Job Listing</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="job-result">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="job-filter">
                        <div class="widget">
                            <h2>Job Title</h2>
                            <input type="text" name="" class="form-control" placeholder="Search Titles ..." />
                        </div>

                        <div class="widget">
                            <h2>Job Location</h2>
                            <select name="" class="form-control select2">
                                <option value="">Australia</option>
                                <option value="">Bangladesh</option>
                                <option value="">Canada</option>
                                <option value="">China</option>
                                <option value="">India</option>
                                <option value="">United Kingdom</option>
                                <option value="">United States</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Job Category</h2>
                            <select name="" class="form-control select2">
                                <option value="">Accounting</option>
                                <option value="">Customer Support</option>
                                <option value="">Web Design</option>
                                <option value="">Web Development</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Job Type</h2>
                            <select name="" class="form-control select2">
                                <option value="">Full Time</option>
                                <option value="">Part Time</option>
                                <option value="">Contractual</option>
                                <option value="">Internship</option>
                                <option value="">Freelance</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Experience</h2>
                            <select name="" class="form-control select2">
                                <option value="">Fresher</option>
                                <option value="">1 Year</option>
                                <option value="">2 Years</option>
                                <option value="">3 Years</option>
                                <option value="">4 Years</option>
                                <option value="">5 Years</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Gender</h2>
                            <select name="" class="form-control select2">
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                        </div>

                        <div class="widget">
                            <h2>Salary Range</h2>
                            <select name="" class="form-control select2">
                                <option value="">$100-$500</option>
                                <option value="">$500-$1000</option>
                                <option value="">$1000-$1500</option>
                                <option value="">$1500-$2000</option>
                                <option value="">$2000-$2500</option>
                                <option value="">$2500-$3000</option>
                                <option value="">$3000-$3500</option>
                                <option value="">$3500-$4000</option>
                                <option value="">Above $4000</option>
                            </select>
                        </div>

                        <div class="filter-button">
                            <a href="" class="btn btn-sm"><i class="fas fa-search"></i> Filter</a>
                        </div>

                        <div class="advertisement">
                            <a href=""><img src="uploads/ad-2.png" alt="" /></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="job">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="search-result-header">
                                        <i class="fas fa-search"></i> Search
                                        Result for Job Listing
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo1.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">Software Engineer,
                                                    Google</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Web Development
                                                </div>
                                                <div class="location">
                                                    United States
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    3 days ago
                                                </div>
                                                <div class="budget">
                                                    $3000-$3500
                                                </div>
                                                <div class="expired">
                                                    Expired
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Full Time
                                                </div>
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark active"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo2.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">Web Designer,
                                                    Amplify</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Web Development
                                                </div>
                                                <div class="location">
                                                    United Kingdom
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    1 day ago
                                                </div>
                                                <div class="budget">
                                                    $2000-$2500
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Part Time
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo3.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">Laravel Developer,
                                                    Gimpo</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Web Development
                                                </div>
                                                <div class="location">
                                                    Canada
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    2 days ago
                                                </div>
                                                <div class="budget">
                                                    $2500-$3000
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Full Time
                                                </div>
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo4.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">PHP Developer, Kite
                                                    Solution</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Web Development
                                                </div>
                                                <div class="location">
                                                    Australia
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    7 hours ago
                                                </div>
                                                <div class="budget">
                                                    $3500-$4000
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Full Time
                                                </div>
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo5.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">Junior Accountant, ABC
                                                    Media</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Accounting
                                                </div>
                                                <div class="location">
                                                    China
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    2 hours ago
                                                </div>
                                                <div class="budget">
                                                    $2000-$2500
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Part Time
                                                </div>
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="item d-flex justify-content-start">
                                        <div class="logo">
                                            <img src="uploads/logo6.png" alt="" />
                                        </div>
                                        <div class="text">
                                            <h3>
                                                <a href="job.html">Sales Manager, Tingshu
                                                    Limited</a>
                                            </h3>
                                            <div class="detail-1 d-flex justify-content-start">
                                                <div class="category">
                                                    Customer Support
                                                </div>
                                                <div class="location">
                                                    China
                                                </div>
                                            </div>
                                            <div class="detail-2 d-flex justify-content-start">
                                                <div class="date">
                                                    9 hours ago
                                                </div>
                                                <div class="budget">
                                                    $3000-$3500
                                                </div>
                                            </div>
                                            <div class="special d-flex justify-content-start">
                                                <div class="featured">
                                                    Featured
                                                </div>
                                                <div class="type">
                                                    Full Time
                                                </div>
                                                <div class="urgent">
                                                    Urgent
                                                </div>
                                            </div>
                                            <div class="bookmark">
                                                <a href=""><i class="fas fa-bookmark"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
