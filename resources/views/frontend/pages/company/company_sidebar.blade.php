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
            <li class="list-group-item {{ Request::is('company/jobs') ? 'active' : '' }}">
                <a href="{{ route('company.create-job') }}">Create Job</a>
            </li>
            <li class="list-group-item {{ Request::is('company/all/jobs') ? 'active' : '' }}">
                <a href="{{ route('company.jobs') }}">All Jobs</a>
            </li>
            <li class="list-group-item {{ Request::is('company/photos') ? 'active' : '' }}">
                <a href="{{ route('company.photos') }}">Photos</a>
            </li>
            <li class="list-group-item {{ Request::is('company/videos') ? 'active' : '' }}">
                <a href="{{ route('company.videos') }}">Videos</a>
            </li>
            <li class="list-group-item {{ Request::is('company/application') ? 'active' : '' }}">
                <a href="{{ route('company.application') }}">Candidate Applications</a>
            </li>
            <li class="list-group-item {{ Request::is('company/edit/password') ? 'active' : '' }}">
                <a href="{{ route('company.edit-password') }}">Change Password</a>
            </li>
            <li class="list-group-item {{ Request::is('company/edit-profile') ? 'active' : '' }}">
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
