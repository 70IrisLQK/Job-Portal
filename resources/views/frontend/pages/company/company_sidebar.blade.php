<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item {{ Request::is('company/dashboard') ? 'active' : '' }}">
                <a href="{{ route('company.dashboard') }}">Dashboard</a>
            </li>
            <li class="list-group-item {{ Request::is('company/payment') ? 'active' : '' }}">
                <a href="{{ route('company.payment') }}">Make Payment</a>
            </li>
            <li class="list-group-item {{ Request::is('company/orders') ? 'active' : '' }}">
                <a href="{{ route('company.orders') }}">Orders</a>
            </li>
            <li class="list-group-item">
                <a href="company-job-add.html">Create Job</a>
            </li>
            <li class="list-group-item">
                <a href="company-jobs.html">All Jobs</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('company.photos') }}">Photos</a>
            </li>
            <li class="list-group-item">
                <a href="company-videos.html">Videos</a>
            </li>
            <li class="list-group-item">
                <a href="company-applications.html">Candidate Applications</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('company.edit-profile') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <form id="form_submit" action="{{ route('company.logout') }}" method="post">
                    @csrf
                    <a onclick="submitForm()" href="#">Logout</a>
                </form>
            </li>
        </ul>
    </div>
</div>
