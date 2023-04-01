<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6 left-side">
                <ul>
                    <li class="phone-text">111-222-3333</li>
                    <li class="email-text">contact@arefindev.com</li>
                </ul>
            </div>
            <div class="col-md-6 right-side">
                @if (!Auth::guard('company')->check() && !Auth::guard('candidate')->check())
                    <ul class="right">
                        <li class="menu">
                            <a href="{{ url('login') }}"><i class="fas fa-sign-in-alt"></i> Login</a>
                        </li>
                        <li class="menu">
                            <a href="{{ url('register') }}"><i class="fas fa-user"></i> Sign Up</a>
                        </li>
                    </ul>
                @else
                    @if (Auth::guard('company')->check())
                        <ul class="right">
                            <li class="menu">
                                <a href="{{ url('company/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                            </li>
                        </ul>
                    @else
                        <ul class="right">
                            <li class="menu">
                                <a href="{{ url('candidate/dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                            </li>
                        </ul>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
