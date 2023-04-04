@extends('frontend.frontend_master')
@section('frontend-content')
    <div class="page-top" style="background-image: url({{ asset('upload/banner10.jpg') }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Application Detail</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content user-panel">
        <div class="container">
            <div class="row">
                @include('frontend.pages.company.company_sidebar')
                <div class="col-lg-9 col-md-12">
                    <h4 class="resume">Basic Profile</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th class="w-200">Photo:</th>
                                <td>
                                    <img src="{{ isset($getCandidateResume->image) ? asset('upload/avatars/' . $getCandidateResume->image) : asset('upload/no_image.jpg') }}"
                                        alt="" class="w-100" />
                                </td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $getCandidateResume->name }}</td>
                            </tr>
                            <tr>
                                <th>Designation:</th>
                                <td>{{ $getCandidateResume->description ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $getCandidateResume->email ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $getCandidateResume->phone ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <td>{{ $getCandidateResume->country ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $getCandidateResume->address ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <td>{{ $getCandidateResume->state ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <td>{{ $getCandidateResume->city ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Zip Code:</th>
                                <td>{{ $getCandidateResume->zip_code ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>
                                    @if ($getCandidateResume->gender == 1)
                                        Male
                                    @else
                                        Female
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Marital Status:</th>
                                <td>
                                    @if ($getCandidateResume->marital_status == 1)
                                        Married
                                    @else
                                        Not Married
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td>{{ $getCandidateResume->date_of_birth ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td>{{ $getCandidateResume->website ?? 'Updating' }}</td>
                            </tr>
                            <tr>
                                <th>Biography:</th>
                                <td>
                                    {!! $getCandidateResume->bio ?? 'Updating' !!}
                                </td>
                            </tr>
                        </table>
                    </div>

                    <h4 class="resume mt-5">Education</h4>
                    @if (!$candidateEducation->count())
                        <span class="text-danger">Updating</span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Education Level</th>
                                        <th>Institute</th>
                                        <th>Degree</th>
                                        <th>Passing Year</th>
                                    </tr>
                                    @foreach ($candidateEducation as $education)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $education->level }}</td>
                                            <td>{{ $education->institute }}</td>
                                            <td>{{ $education->degree }}</td>
                                            <td>{{ $education->passing_year }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif


                    <h4 class="resume mt-5">Skills</h4>

                    @if (!$candidateSkill->count())
                        <span class="text-danger">Updating</span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Skill Name</th>
                                        <th>Percentage</th>
                                    </tr>
                                    @foreach ($candidateSkill as $skill)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $skill->skill_name }}</td>
                                            <td>{{ $skill->percentage }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h4 class="resume mt-5">Experience</h4>

                    @if (!$candidateWorkExperience->count())
                        <span class="text-danger">Updating</span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Company</th>
                                        <th>Designation</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                    </tr>
                                    @foreach ($candidateWorkExperience as $experience)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $experience->company }}</td>
                                            <td>{{ $experience->description }}</td>
                                            <td>{{ $experience->start_date }}</td>
                                            <td>{{ $experience->end_date }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h4 class="resume mt-5">Awards</h4>

                    @if (!$candidateAward->count())
                        <span class="text-danger">Updating</span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th class="w-100">Date</th>
                                    </tr>
                                    @foreach ($candidateAward as $award)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $award->title }}
                                            </td>
                                            <td>
                                                {{ $award->description }}}
                                            </td>
                                            <td>{{ $award->date }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif

                    <h4 class="resume mt-5">Resume</h4>

                    @if (!$candidateResume->count())
                        <span class="text-danger">Updating</span>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>File</th>
                                    </tr>
                                    @foreach ($candidateResume as $resume)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $resume->name }}</td>
                                            <td>
                                                <a href="{{ asset('upload/resumes/' . $resume->file) }}"
                                                    target="_blank">{{ $resume->file }}</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
