@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="slider" style="background-image: url({{ asset('upload/homepages/' . $getHomepage->background) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="item">
                        <div class="text">
                            <h2>{{ $getHomepage->title }}</h2>
                            <p>
                                {{ $getHomepage->short_title }}
                            </p>
                        </div>
                        <div class="search-section">
                            <form action="jobs.html" method="post">
                                <div class="inner">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <input type="text" name="" class="form-control"
                                                    placeholder="{{ $getHomepage->job_title }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="" class="form-select select2">
                                                    <option value="">
                                                        {{ $getHomepage->job_location }}
                                                    </option>
                                                    <option value="">
                                                        Australia
                                                    </option>
                                                    <option value="">
                                                        Bangladesh
                                                    </option>
                                                    <option value="">
                                                        Canada
                                                    </option>
                                                    <option value="">
                                                        China
                                                    </option>
                                                    <option value="">
                                                        India
                                                    </option>
                                                    <option value="">
                                                        United Kingdom
                                                    </option>
                                                    <option value="">
                                                        United States
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="" class="form-select select2">
                                                    <option value="">
                                                        {{ $getHomepage->job_category }}
                                                    </option>
                                                    @foreach ($listCategories as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                                {{ $getHomepage->search }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="job-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $getHomepage->job_category_title }}</h2>
                        <p>
                            {{ $getHomepage->job_category_short_title }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($listCategories as $category)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="icon">
                                <i class="{{ $category->icon }}"></i>
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <p>(5 Open Positions)</p>
                            <a href=""></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="{{ url('categories') }}" class="btn btn-primary">See All Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose" style="background-image: url({{ asset('upload/homepages/' . $getHomepage->why_choose_bg) }})">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Why Choose Us</h2>
                        <p>
                            Our Methods to help you build your career in
                            future
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($listWhyChoose as $item)
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $item->title }}</h2>
                                <p>
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="job">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $getHomepage->feature_job_title }}</h2>
                        <p>{{ $getHomepage->feature_job_short_title }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo1.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Software Engineer, Google</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">United States</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">3 days ago</div>
                                <div class="budget">$300-$600</div>
                                <div class="expired">Expired</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark active"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo2.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Web Designer, Amplify</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">United States</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">1 day ago</div>
                                <div class="budget">$1000</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Part Time</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo3.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Laravel Developer, Gimpo</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">2 days ago</div>
                                <div class="budget">$1000-$3000</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo4.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">PHP Developer, Kite Solution</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Web Development</div>
                                <div class="location">Australia</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">7 hours ago</div>
                                <div class="budget">$1800</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo5.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Junior Accountant, ABC Media</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Marketing</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">2 hours ago</div>
                                <div class="budget">$400</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Part Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="item d-flex justify-content-start">
                        <div class="logo">
                            <img src="{{ asset('frontend/imgs/logo6.png') }}" alt="" />
                        </div>
                        <div class="text">
                            <h3>
                                <a href="job.html">Sales Manager, Tingshu Limited</a>
                            </h3>
                            <div class="detail-1 d-flex justify-content-start">
                                <div class="category">Marketing</div>
                                <div class="location">Canada</div>
                            </div>
                            <div class="detail-2 d-flex justify-content-start">
                                <div class="date">9 hours ago</div>
                                <div class="budget">$600-$800</div>
                            </div>
                            <div class="special d-flex justify-content-start">
                                <div class="featured">Featured</div>
                                <div class="type">Full Time</div>
                                <div class="urgent">Urgent</div>
                            </div>
                            <div class="bookmark">
                                <a href=""><i class="fas fa-bookmark"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="jobs.html" class="btn btn-primary">See All Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial"
        style="background-image: url({{ asset('upload/testimonials/' . $getHomepage->testimonial_bg) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">{{ $getHomepage->testimonial_title }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="testimonial-carousel owl-carousel">
                        @foreach ($listTestimonials as $testimonial)
                            <div class="item">
                                <div class="photo">
                                    <img src="{{ asset('upload/testimonials/' . $testimonial->image) }}"
                                        alt="" />
                                </div>
                                <div class="text">
                                    <h4>{{ $testimonial->name }}</h4>
                                    <p>{{ $testimonial->description }}</p>
                                </div>
                                <div class="description">
                                    <p>
                                        {{ $testimonial->comment }}
                                    </p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Latest News</h2>
                        <p>
                            Check our latest news from the following section
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('frontend/imgs/banner1.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Lorem ipsum dolor sit amet, nibh saperet
                                    te pri, at nam diceret disputationi. Quo
                                    an consul impedit, usu possim evertitur
                                    dissentiet ei.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('frontend/imgs/banner2.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Nec in rebum primis causae. Affert
                                    iisque ex pri, vis utinam vivendo
                                    definitionem ad, nostrum omnes que per
                                    et. Omnium antiopam.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="item">
                        <div class="photo">
                            <img src="{{ asset('frontend/imgs/banner3.jpg') }}" alt="" />
                        </div>
                        <div class="text">
                            <h2>
                                <a href="post.html">This is a sample blog post title</a>
                            </h2>
                            <div class="short-des">
                                <p>
                                    Id pri placerat voluptatum, vero dicunt
                                    dissentiunt eum et, adhuc iisque vis no.
                                    Eu suavitate conten tiones definitionem
                                    mel, ex vide.
                                </p>
                            </div>
                            <div class="button">
                                <a href="post.html" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
