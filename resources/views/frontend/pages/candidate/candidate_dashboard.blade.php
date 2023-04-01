@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url('uploads/banner.jpg')">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
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
                                <a href="candidate-edit-profile.html">Edit Profile</a>
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
                <div class="col-lg-9 col-md-12">
                    <h3>Hello, Peter Johnson</h3>
                    <p>See all the statistics at a glance:</p>

                    <div class="row box-items">
                        <div class="col-md-4">
                            <div class="box1">
                                <h4>12</h4>
                                <p>Applied Jobs</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box2">
                                <h4>3</h4>
                                <p>Bookmarked Jobs</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box3">
                                <h4>5</h4>
                                <p>Rejected Jobs</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-5">Recently Applied</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>SL</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Status</th>
                                    <th class="w-100">Detail</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Senior Laravel Developer</td>
                                    <td>ABC Multimedia</td>
                                    <td>
                                        <div class="badge bg-primary">
                                            Applied
                                        </div>
                                    </td>
                                    <td>
                                        <a href="job.html" class="btn btn-primary btn-sm text-white"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Expert Laravel Developer</td>
                                    <td>Big Axis Limited</td>
                                    <td>
                                        <div class="badge bg-danger">
                                            Rejected
                                        </div>
                                    </td>
                                    <td>
                                        <a href="job.html" class="btn btn-primary btn-sm text-white"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>MySQL Database Expert</td>
                                    <td>Kite IT Solution</td>
                                    <td>
                                        <div class="badge bg-success">
                                            Approved
                                        </div>
                                    </td>
                                    <td>
                                        <a href="job.html" class="btn btn-primary btn-sm text-white"><i
                                                class="fas fa-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
