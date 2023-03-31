<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/admin/dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/admin/dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ url('/admin/dashboard') }}"><i class="fas fa-hand-point-right"></i>
                    <span>Dashboard</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/homepage*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Homepage Setting</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/homepage/setting') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.homepage') }}"><i class="fas fa-angle-right"></i>
                            Homepage </a></li>
                    <li class="{{ Request::is('admin/homepage/job-category') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.job-category') }}"><i class="fas fa-angle-right"></i>
                            Job Categories </a></li>
                    <li class="{{ Request::is('admin/homepage/why-choose') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.why-choose') }}"><i class="fas fa-angle-right"></i>
                            Why Choose Us </a></li>
                    <li class="{{ Request::is('admin/homepage/feature-job') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.feature-job') }}"><i class="fas fa-angle-right"></i>
                            Feature Job </a></li>
                    <li class="{{ Request::is('admin/homepage/testimonial') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.testimonial') }}"><i class="fas fa-angle-right"></i>
                            Testimonial </a></li>
                    <li class="{{ Request::is('admin/homepage/last-news') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.last-news') }}"><i class="fas fa-angle-right"></i>
                            Last News </a></li>

                    <li class="{{ Request::is('admin/terms') ? 'active' : '' }}"><a class="nav-link" href=""><i
                                class="fas fa-angle-right"></i>
                            Terms</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/page*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Page Setting</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/blogs') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-blogs') }}"><i class="fas fa-angle-right"></i>
                            Page Blog </a></li>

                    <li class="{{ Request::is('admin/page/faqs') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-faqs') }}"><i class="fas fa-angle-right"></i>
                            Page FAQ </a></li>
                    <li class="{{ Request::is('admin/terms') ? 'active' : '' }}"><a class="nav-link" href=""><i
                                class="fas fa-angle-right"></i>
                            Terms</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/categories*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>
                        Management Category</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/categories') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('categories.index') }}"><i class="fas fa-angle-right"></i>
                            List All Category </a></li>
                    <li class="{{ Request::is('admin/categories/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('categories.create') }}"><i class="fas fa-angle-right"></i>
                            Add Category</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/chooses*') ? 'active' : '' }}">
                <a href="{{ url('admin/choose') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Why Choose</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/chooses') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('chooses.index') }}"><i class="fas fa-angle-right"></i>
                            List All Why Choose </a></li>
                    <li class="{{ Request::is('admin/chooses/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('chooses.create') }}"><i class="fas fa-angle-right"></i>
                            Add Why Choose</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/testimonials*') ? 'active' : '' }}">
                <a href="{{ url('admin/testimonials') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Testimonial</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/testimonials') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('testimonials.index') }}"><i class="fas fa-angle-right"></i>
                            List All Testimonial </a></li>
                    <li class="{{ Request::is('admin/testimonials/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('testimonials.create') }}"><i class="fas fa-angle-right"></i>
                            Add Testimonial</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/posts*') ? 'active' : '' }}">
                <a href="{{ url('admin/posts') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Post</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/posts') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('posts.index') }}"><i class="fas fa-angle-right"></i>
                            List All Post </a></li>
                    <li class="{{ Request::is('admin/posts/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('posts.create') }}"><i class="fas fa-angle-right"></i>
                            Add Post</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/faqs*') ? 'active' : '' }}">
                <a href="{{ url('admin/faqs') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management FAQ</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/faqs') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('faqs.index') }}"><i class="fas fa-angle-right"></i>
                            List All FAQ </a></li>
                    <li class="{{ Request::is('admin/faqs/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('faqs.create') }}"><i class="fas fa-angle-right"></i>
                            Add FAQ</a></li>
                </ul>
            </li>


        </ul>
    </aside>
</div>
