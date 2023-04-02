<div class="col-lg-3 col-md-12">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item active">
                <a href="candidate-dashboard.html">Dashboard</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-applied-jobs.html">Applied Jobs</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-bookmarked-jobs.html">Bookmarked Jobs</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-education.html">Education</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-skill.html">Skills</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-experience.html">Work Experience</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-award.html">Awards</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('candidate_edit_password') }}">Change Password</a>
            </li>
            <li class="list-group-item">
                <a href="{{ route('candidate_edit_profile') }}">Edit Profile</a>
            </li>
            <li class="list-group-item">
                <a href="candidate-resume.html">Resume Upload</a>
            </li>
            <li class="list-group-item">
                <form id="form_submit" action="{{ route('candidate.logout') }}" method="post">
                    @csrf
                    <a onclick="submitForm()" href="#">Logout</a>
                </form>
            </li>
        </ul>
    </div>
</div>
