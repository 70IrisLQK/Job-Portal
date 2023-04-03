<div class="navbar-area" id="stickymenu">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ url('/') }}" class="logo">
            <img src="{{ asset('frontend/imgs/logo.png') }}" alt="" />
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('frontend/imgs/logo.png') }}" alt="" />
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ url('/') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item {{ Request::is('jobs') ? 'active' : '' }}">
                            <a href="{{ url('jobs') }}" class="nav-link">
                                Find Jobs</a>
                        </li>
                        <li class="nav-item {{ Request::is('companies') ? 'active' : '' }}">
                            <a href="{{ url('companies') }}" class="nav-link">Companies</a>
                        </li>
                        <li class="nav-item {{ Request::is('pricing') ? 'active' : '' }}">
                            <a href="{{ url('pricing') }}" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item {{ Request::is('faqs') ? 'active' : '' }}">
                            <a href="{{ url('faqs') }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="nav-item {{ Request::is('blogs') ? 'active' : '' }}">
                            <a href="{{ url('blogs') }}" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
                            <a href="{{ url('contacts') }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>
