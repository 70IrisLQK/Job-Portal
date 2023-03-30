<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right w-100-p justify-content-end">
        <li class="nav-link">
            <a href="" target="_blank" class="btn btn-warning">Front End</a>
        </li>
        @php
            $getAdmin = App\Models\Admin::find(Auth::guard('admin')->user()->id);
        @endphp
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img alt="image" src="{{ asset('upload/avatars/' . $getAdmin->avatar) }}"
                    class="rounded-circle-custom">
                <div class="d-sm-none d-lg-inline-block">{{ $getAdmin->name }}</div>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                <li>
                    <a href="{{ route('admin.profile', [$getAdmin->id]) }}" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Edit Profile
                    </a>
                </li>
                <li>
                    <form action="{{ route('admin.logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
