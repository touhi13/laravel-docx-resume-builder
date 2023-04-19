@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Add Doctor</h2>
        <form method="POST" action="{{ route('doctors.store') }}">
            @csrf
            <div class="row row-cols-1 gy-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Personal Details
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description (In 100 words)</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="biography" class="form-label">Biography (In 200 words)</label>
                                <textarea class="form-control" id="biography" name="biography" rows="3" placeholder="Biography"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="subDomainPrefix" class="form-label">Sub-Domain Prefix</label>
                                <input type="text" class="form-control" id="subDomainPrefix" name="subDomainPrefix"
                                    placeholder="Sub-domain Prefix" />
                            </div>
                            <div class="mb-3">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Phone Number" />
                            </div>
                            <div class="mb-3">
                                <label for="achievement" class="form-label">Achievement</label>
                                <textarea class="form-control" id="achievement" name="achievement" rows="3" placeholder="Achievement"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="bmDcNumber" class="form-label">BM & DC No</label>
                                <input type="text" class="form-control" id="bmDcNumber" name="bmDcNumber"
                                    placeholder="BM & DC No" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Professional Speciality
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" class="form-control" id="department" name="department"
                                    placeholder="Department">
                            </div>
                            <div class="mb-3">
                                <label for="specialityDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="specialityDescription" name="specialityDescription" rows="3"
                                    placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Social Links
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="facebookLink" class="form-label">Facebook</label>
                                <input type="text" class="form-control" id="facebookLink" name="facebookLink"
                                    placeholder="Facebook">
                            </div>
                            <div class="mb-3">
                                <label for="LinkedInLink" class="form-label">LinkedIn</label>
                                <input type="text" class="form-control" id="LinkedInLink" name="LinkedInLink"
                                    placeholder="LinkedIn">
                            </div>
                            <div class="mb-3">
                                <label for="youtubeLink" class="form-label">Youtube</label>
                                <input type="text" class="form-control" id="youtubeLink" name="youtubeLink"
                                    placeholder="Youtube">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Education
                            <button class="float-end btn btn-info" id="addMoreEducation"> Add More</button>
                        </div>
                        <div class="card-body" id="educationBody">
                            <div id="degree1">
                                {{-- <p class="fw-bold">Degree 1</p> --}}
                                <div class="mb-3">
                                    <label for="degree" class="form-label">Degree Name</label>
                                    <input type="text" class="form-control" id="degree" name="degree[]"
                                        placeholder="Degree Name">
                                </div>
                                <div class="mb-3">
                                    <label for="instituteName" class="form-label">Institute Name</label>
                                    <input type="text" class="form-control" id="instituteName" name="instituteName[]"
                                        placeholder="Institute Name">
                                </div>
                                <div class="mb-3">
                                    <label for="passingYear" class="form-label">Passing Year</label>
                                    <input type="text" class="form-control" id="passingYear" name="passingYear[]"
                                        placeholder="Passing Year">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Experience
                            <button class="float-end btn btn-info" id="addMoreExperience"> Add More</button>
                        </div>
                        <div class="card-body" id="experienceBody">
                            <div id="experience1">
                                <div class="mb-3">
                                    <label for="jobDuration" class="form-label">Job duration</label>
                                    <input type="text" class="form-control" id="jobDuration" name="jobDuration[]"
                                        placeholder="Job duration">
                                </div>
                                <div class="mb-3">
                                    <label for="jobPosition" class="form-label">Job Position</label>
                                    <input type="text" class="form-control" id="jobPosition" name="jobPosition[]"
                                        placeholder="Job Position">
                                </div>
                                <div class="mb-3">
                                    <label for="orgName" class="form-label">Organization Name</label>
                                    <input type="text" class="form-control" id="orgName" name="orgName[]"
                                        placeholder="Organization Name">
                                </div>
                                <div class="mb-3">
                                    <label for="jobResponsibilities" class="form-label">Job Responsibilities</label>
                                    <textarea class="form-control" id="jobResponsibilities" name="jobResponsibilities[]" rows="3"
                                        placeholder="Job Responsibilities"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header h6">
                            Hospital/ Clinic/ Diagonistic Center/ Personal Chamber Visit Schedule
                            <button class="float-end btn btn-info" id="addMoreOrganization"> Add More</button>
                        </div>
                        <div class="card-body" id="organizationBody">
                            <div id="organization1">
                                <div class="mb-3">
                                    <label for="organizationName" class="form-label">Organization Name</label>
                                    <input type="text" class="form-control" id="organizationName"
                                        name="organizationName[]" placeholder="Organization Name">
                                </div>
                                <div class="mb-3">
                                    <label for="orgPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="orgPhone" name="orgPhone[]"
                                        placeholder="Phone">
                                </div>
                                <div class="mb-3">
                                    <label for="orgEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="orgEmail" name="orgEmail[]"
                                        placeholder="Email">
                                </div>
                                <div class="mb-3">
                                    <label for="orgAddress" class="form-label">Address</label>
                                    <textarea class="form-control" id="orgAddress" name="orgAddress[]" rows="3" placeholder="Address"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="division" class="form-label">Division</label>
                                    <input type="text" class="form-control" id="division" name="division[]"
                                        placeholder="Division">
                                </div>
                                <div class="mb-3">
                                    <label for="district" class="form-label">District</label>
                                    <input type="text" class="form-control" id="district" name="district[]"
                                        placeholder="District">
                                </div>
                                <div class="mb-3">
                                    <label for="area" class="form-label">Area</label>
                                    <input type="text" class="form-control" id="area" name="area[]"
                                        placeholder="Area">
                                </div>
                                <div class="mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position[]"
                                        placeholder="Position">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Visiting Day</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="visitingDay[0][]"
                                            value="Saturday" id="Saturday">
                                        <label class="form-check-label" for="Saturday">
                                            Saturday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Sunday" id="Sunday">
                                        <label class="form-check-label" for="Sunday">
                                            Sunday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Monday" id="Monday">
                                        <label class="form-check-label" for="Monday">
                                            Monday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Tuesday" id="Tuesday">
                                        <label class="form-check-label" for="Tuesday">
                                            Tuesday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Wednesday" id="Wednesday">
                                        <label class="form-check-label" for="Wednesday">
                                            Wednesday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Thursday" id="Thursday">
                                        <label class="form-check-label" for="Thursday">
                                            Thursday
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"name="visitingDay[0][]"
                                            value="Friday" id="Friday">
                                        <label class="form-check-label" for="Friday">
                                            Friday
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label for="visitingTimeFrom" class="form-label">Visiting Time From</label>
                                        <input type="time" class="form-control" id="visitingTimeFrom"
                                            name="visitingTimeFrom[]">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="visitingTimeTo" class="form-label">Visiting Time To</label>
                                        <input type="time" class="form-control" id="visitingTimeTo"
                                            name="visitingTimeTo[]">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="appointmentPhoneNumber" class="form-label">Dr. Appointment Phone
                                        Number</label>
                                    <input type="text" class="form-control" id="appointmentPhoneNumber"
                                        name="appointmentPhoneNumber[]" placeholder="Dr. Appointment Phone Number">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <button type="submit" class="btn btn-primary btn-lg w-100 d-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('style')
    <style>
        .educationHeader {
            padding: 15px;
            border-style: dotted;
        }

        .organizationHeader {
            padding: 15px;
            border-style: dotted;
        }

        .experienceHeader {
            padding: 15px;
            border-style: dotted;
        }
    </style>
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            let educationClick = 1;
            $('#addMoreEducation').on("click", function(e) {
                e.preventDefault();
                ++educationClick;
                let html = '';
                html += `
                  <div id="degree${educationClick}">
                          <div class="mb-2 educationHeader">
                            <span class="fw-bold">Degree ${educationClick}</span> 
                            <button class="float-end removeEducation btn btn-danger">Remove</button>
                          </div>
                     
                            <div class="mb-3">
                                <label for="degree" class="form-label">Degree Name</label>
                                <input type="text" class="form-control" id="degree" name="degree[]"
                                    placeholder="Degree Name">
                            </div>
                            <div class="mb-3">
                                <label for="instituteName" class="form-label">Institute Name</label>
                                <input type="text" class="form-control" id="instituteName" name="instituteName[]"
                                    placeholder="Institute Name">
                            </div>
                            <div class="mb-3">
                                <label for="passingYear" class="form-label">Passing Year</label>
                                <input type="text" class="form-control" id="passingYear" name="passingYear[]"
                                    placeholder="Passing Year">
                            </div>
                  </div>`;

                $('#educationBody').append(html);
                $("#degreeOneHeader").remove();
                $('#degree1').prepend(`<div class="mb-2 educationHeader" id="degreeOneHeader">
                            <span class="fw-bold">Degree 1</span>
                          </div>`);
            });

            $(document).on('click', '.removeEducation', function(e) {
                e.preventDefault();
                // --educationClick;
                $(this).parent().parent().remove();
            });
            let experienceClick = 1;
            $('#addMoreExperience').on("click", function(e) {
                e.preventDefault();
                ++experienceClick;
                console.log("hi")
                let html = "";
                html += ` <div id="experience${experienceClick}">
                    <div class="mb-2 experienceHeader">
                            <span class="fw-bold">Experience ${experienceClick}</span> 
                            <button class="float-end removeExperience btn btn-danger">Remove</button>
                          </div>
                            <div class="mb-3">
                                <label for="jobDuration" class="form-label">Job duration</label>
                                <input type="text" class="form-control" id="jobDuration" name="jobDuration[]"
                                    placeholder="Job duration">
                            </div>
                            <div class="mb-3">
                                <label for="jobPosition" class="form-label">Job Position</label>
                                <input type="text" class="form-control" id="jobPosition" name="jobPosition[]"
                                    placeholder="Job Position">
                            </div>
                            <div class="mb-3">
                                <label for="orgName" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" id="orgName" name="orgName[]"
                                    placeholder="Organization Name">
                            </div>
                            <div class="mb-3">
                                <label for="jobResponsibilities" class="form-label">Job Responsibilities</label>
                                <textarea class="form-control" id="jobResponsibilities" name="jobResponsibilities" rows="3"
                                    placeholder="Job Responsibilities"></textarea>
                            </div>
                        </div>`;
                $('#experienceBody').append(html);
                $("#experienceOneHeader").remove();
                $('#experience1').prepend(`<div class="mb-2 experienceHeader" id="experienceOneHeader">
                            <span class="fw-bold">Experience 1</span>
                          </div>`);
            });
            $(document).on('click', '.removeExperience', function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });
            let organizationClick = 1;
            let visitingDayIndex = 0;
            $('#addMoreOrganization').on("click", function(e) {
                e.preventDefault();
                ++organizationClick;
                let html = '';
                html += `<div id="oragnization${organizationClick}">
                          <div class="mb-2 organizationHeader">
                            <span class="fw-bold">Organization ${organizationClick}</span> 
                            <button class="float-end removeOrganization btn btn-danger">Remove</button>
                          </div>
                            <div class="mb-3">
                                <label for="organizationName" class="form-label">Organization Name</label>
                                <input type="text" class="form-control" id="organizationName"
                                    name="organizationName[]" placeholder="Organization Name">
                            </div>
                            <div class="mb-3">
                                <label for="orgPhone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="orgPhone" name="orgPhone[]"
                                    placeholder="Phone">
                            </div>
                            <div class="mb-3">
                                <label for="orgEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="orgEmail" name="orgEmail[]"
                                    placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <label for="orgAddress" class="form-label">Address</label>
                                <textarea class="form-control" id="orgAddress" name="orgAddress" rows="3" placeholder="Address"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="division" class="form-label">Division</label>
                                <input type="text" class="form-control" id="division" name="division[]"
                                    placeholder="Division">
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" id="district" name="district[]"
                                    placeholder="District">
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" class="form-control" id="area" name="area[]"
                                    placeholder="Area">
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="position" name="position[]"
                                    placeholder="Position">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Visiting Day</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Saturday" id="Saturday" name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Saturday">
                                        Saturday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Sunday" id="Sunday" name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Sunday">
                                        Sunday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Monday" id="Monday" name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Monday">
                                        Monday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Tuesday" id="Tuesday" name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Tuesday">
                                        Tuesday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Wednesday" id="Wednesday" name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Wednesday">
                                        Wednesday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Thursday" id="Thursday"name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Thursday">
                                        Thursday
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Friday" id="Friday"name="visitingDay[${++visitingDayIndex}][]>
                                    <label class="form-check-label" for="Friday">
                                        Friday
                                    </label>
                                </div>
                            </div>
                            <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label for="visitingTimeFrom" class="form-label">Visiting Time From</label>
                                        <input type="time" class="form-control" id="visitingTimeFrom"
                                            name="visitingTimeFrom[]">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="visitingTimeTo" class="form-label">Visiting Time To</label>
                                        <input type="time" class="form-control" id="visitingTimeTo"
                                            name="visitingTimeTo[]">
                                    </div>
                            </div>

                            <div class="mb-3">
                                <label for="appointmentPhoneNumber" class="form-label">Dr. Appointment Phone
                                    Number</label>
                                <input type="text" class="form-control" id="appointmentPhoneNumber"
                                    name="appointmentPhoneNumber[]" placeholder="Dr. Appointment Phone Number">
                            </div>

                        </div>`;

                $('#organizationBody').append(html);
                $("#organizationOneHeader").remove();
                $('#organization1').prepend(`<div class="mb-2 organizationHeader" id="organizationOneHeader">
                            <span class="fw-bold">Organization 1</span>
                          </div>`);
            });
            $(document).on('click', '.removeOrganization', function(e) {
                e.preventDefault();
                $(this).parent().parent().remove();
            });

        });
    </script>
@endpush
