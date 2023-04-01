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

                    <li class="{{ Request::is('admin/page/terms') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-terms') }}"><i class="fas fa-angle-right"></i>
                            Page Term </a></li>

                    <li class="{{ Request::is('admin/page/privacy') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-privacy') }}"><i class="fas fa-angle-right"></i>
                            Page Privacy </a></li>

                    <li class="{{ Request::is('admin/page/contacts') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-contacts') }}"><i class="fas fa-angle-right"></i>
                            Page Contact </a></li>

                    <li class="{{ Request::is('admin/page/categories') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-categories') }}"><i class="fas fa-angle-right"></i>
                            Page Category </a></li>

                    <li class="{{ Request::is('admin/page/pricing') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.page-pricing') }}"><i class="fas fa-angle-right"></i>
                            Page Pricing </a></li>

                    <li class="{{ Request::is('admin/page/other-item') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin.other-item') }}"><i class="fas fa-angle-right"></i>
                            Page Other Item </a></li>

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
            <li class="nav-item dropdown {{ Request::is('admin/packages*') ? 'active' : '' }}">
                <a href="{{ url('admin/packages') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Package</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/packages') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('packages.index') }}"><i class="fas fa-angle-right"></i>
                            List All Package </a></li>
                    <li class="{{ Request::is('admin/packages/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('packages.create') }}"><i class="fas fa-angle-right"></i>
                            Add Package</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/locations*') ? 'active' : '' }}">
                <a href="{{ url('admin/locations') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Job Location</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/locations') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('locations.index') }}"><i class="fas fa-angle-right"></i>
                            List All Location </a></li>
                    <li class="{{ Request::is('admin/locations/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('locations.create') }}"><i class="fas fa-angle-right"></i>
                            Add Location</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/types*') ? 'active' : '' }}">
                <a href="{{ url('admin/types') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Job Type</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/types') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('types.index') }}"><i class="fas fa-angle-right"></i>
                            List All Type </a></li>
                    <li class="{{ Request::is('admin/types/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('types.create') }}"><i class="fas fa-angle-right"></i>
                            Add Type</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/experiences*') ? 'active' : '' }}">
                <a href="{{ url('admin/experiences') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Job Experience</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/experiences') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('experiences.index') }}"><i class="fas fa-angle-right"></i>
                            List All Experience </a></li>
                    <li class="{{ Request::is('admin/experiences/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('experiences.create') }}"><i class="fas fa-angle-right"></i>
                            Add Experience</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/salaries*') ? 'active' : '' }}">
                <a href="{{ url('admin/salaries') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Job Salary</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/salaries') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('salaries.index') }}"><i class="fas fa-angle-right"></i>
                            List All Salary </a></li>
                    <li class="{{ Request::is('admin/salaries/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('salaries.create') }}"><i class="fas fa-angle-right"></i>
                            Add Salary</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ Request::is('admin/genres*') ? 'active' : '' }}">
                <a href="{{ url('admin/genres') }}" class="nav-link has-dropdown"><i
                        class="fas fa-hand-point-right"></i><span>
                        Management Job Genre</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/genres') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('genres.index') }}"><i class="fas fa-angle-right"></i>
                            List All Genre </a></li>
                    <li class="{{ Request::is('admin/genres/create') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('genres.create') }}"><i class="fas fa-angle-right"></i>
                            Add Genre</a></li>
                </ul>
            </li>


        </ul>
    </aside>
</div>
