@extends('main.app')
@section('content')
<link href="{{ asset('assets/css/cropper.min.css') }}" rel="stylesheet" />
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    
    <div class="container-fluid body_content py-4">
        <!-- step form -->
        <div class="card">
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Student Update Form</h5>
                    </div>
                </div>
            </div>
            <div class="card-body  pt-0">
                <div class="reg_form">
                    <form id="regForm" action="{{ route('students_update', ['studentId' => $studentDetails['data']['student_id']]) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="tab">
                            <h6 class="mb-3">Personal Details</h6>
                            <div class="row">
                                @php
                                $uniqueId = uniqid();
                                @endphp
                                <div class="col-md-4 align-self-center ">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Admission Number</label>
                                        <input type="hidden" value="{{ $studentDetails['data']['student_id'] }}" name="student_id">
                                        <input type="hidden" value="{{ $studentDetails['data']['organization_id'] }}" name="organization_id">
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_admission_no'] }}" name="sd_admission_no" required>
                                    </div>
                                </div>
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_year_grade_class_id" class="form-label">Year/Class/Grade</label>
                                        <select class="form-select" name="sd_year_grade_class_id">
                                            @foreach ($year_grades as $year_grade)
                                            <option value="{{ $year_grade['id'] }}" {{ $studentDetails['data']['sd_year_grade_class_id'] == $year_grade['id'] ? 'selected' : '' }}>
                                                {{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'] .' - '.$year_grade['class']['class_name'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- First Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_first_name'] }}" name="sd_first_name" required>
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" value="{{ $studentDetails['data']['sd_last_name'] }}" oninput="this.className = 'form-control'" name="sd_last_name" required>
                                    </div>
                                </div>
                                <!-- Name with Initials -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_name_with_initials" class="form-label">Name with Initials</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_name_with_initials'] }}" name="sd_name_with_initials" required>
                                    </div>
                                </div>

                                <!-- Name in Full -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_name_in_full" class="form-label">Name in Full</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_name_in_full'] }}" name="sd_name_in_full" required>
                                    </div>
                                </div>
                                <!-- Address Line 1 -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_address_line1" class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_address_line1'] }}" name="sd_address_line1" required>
                                    </div>
                                </div>

                                <!-- Address Line 2 -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_address_line2" class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_address_line2'] ?? '' }}" name="sd_address_line2">
                                    </div>
                                </div>

                                <!-- Address City -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_address_city" class="form-label">Address City</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_address_city'] }}" name="sd_address_city" required>
                                    </div>
                                </div>

                                <!-- Telephone Residence -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_telephone_residence" class="form-label">Telephone
                                            Residence</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['sd_telephone_residence'] }}" name="sd_telephone_residence" required>
                                    </div>
                                </div>

                                <!-- Telephone Mobile -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_telephone_mobile" class="form-label">Telephone Mobile</label>
                                        <input type="tnumberext" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['sd_telephone_mobile'] }}" name="sd_telephone_mobile" required>
                                    </div>
                                </div>

                                <!-- Telephone WhatsApp -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_telephone_whatsapp" class="form-label">Telephone WhatsApp</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['sd_telephone_whatsapp'] }}" name="sd_telephone_whatsapp" required>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_email_address" class="form-label">Email Address</label>
                                        <input type="email" class="form-control email-input" oninput="this.className = 'form-control email-input'" value="{{ $studentDetails['data']['sd_email_address'] }}" name="sd_email_address" required>
                                    </div>
                                </div>
                                <!-- Sex -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_sex" class="form-label">Gender</label>
                                        <select class="form-select" name="sd_gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_date_of_birth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_date_of_birth'] }}" name="sd_date_of_birth" required>
                                    </div>
                                </div>

                                <!-- Religion -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_religion" class="form-label">Religion</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_religion'] }}" name="sd_religion" required>
                                    </div>
                                </div>

                                <!-- Ethnicity -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_ethnicity" class="form-label">Ethnicity</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_ethnicity'] }}" name="sd_ethnicity" required>
                                    </div>
                                </div>

                                <!-- Number of Birth Certificate -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_birthcertificate_number" class="form-label">Birth Certificate
                                            Number</label>
                                        <input type="number" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" value="{{ $studentDetails['data']['sd_birth_certificate_number'] }}" name="sd_birth_certificate_number" required>
                                    </div>
                                </div>

                                <!-- Health Conditions -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_health_conditions" class="form-label">Health Conditions</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="sd_health_conditions">{{ $studentDetails['data']['sd_health_conditions'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 class="mb-3">Father’s Information</h6>
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_first_name'] ?? '' }}" name="sp_father_first_name" required>
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_last_name'] ?? '' }}" name="sp_father_last_name" required>
                                    </div>
                                </div>
                                <!-- NIC No -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_nic'] ?? '' }}" name="sp_father_nic" required>
                                    </div>
                                </div>
                                <!-- Higher Education Qualification -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_higher_education_qualification" class="form-label">Higher
                                            Education Qualification</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_higher_education_qualification'] ?? '' }}" name="sp_father_higher_education_qualification" required>
                                    </div>
                                </div>
                                <!-- Occupation -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_occupation'] ?? '' }}" name="sp_father_occupation" required>
                                    </div>
                                </div>

                                <!-- Official Contact Number -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_contact_official" class="form-label">Official Contact
                                            Number</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_contact_official'] ?? '' }}" name="sp_father_contact_official" required>
                                    </div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_contact_mobile" class="form-label">Mobile Number</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_father_contact_mobile'] ?? '' }}" name="sp_father_contact_mobile" required>
                                    </div>
                                </div>
                                <!-- Official Address -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_official_address" class="form-label">Official
                                            Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_father_official_address">{{ $studentDetails['data']['parent_data'][0]['sp_father_official_address'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                <!-- Permanent Address -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_permanent_address" class="form-label">Permanent
                                            Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_father_permanent_address">{{ $studentDetails['data']['parent_data'][0]['sp_father_permanent_address'] ?? '' }}</textarea>
                                    </div>
                                </div>

                            </div>
                            <h6 class="mt-4 mb-3">Mother’s Information</h6>
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_first_name'] ?? '' }}" name="sp_mother_first_name" required>
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_last_name'] ?? '' }}" name="sp_mother_last_name" required>
                                    </div>
                                </div>
                                <!-- NIC No -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_nic'] ?? '' }}" name="sp_mother_nic" required>
                                    </div>
                                </div>
                                <!-- Higher Education Qualification -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_higher_education_qualification" class="form-label">Higher
                                            Education Qualification</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_higher_education_qualification'] ?? '' }}" name="sp_mother_higher_education_qualification" required>
                                    </div>
                                </div>
                                <!-- Occupation -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_occupation'] ?? '' }}" name="sp_mother_occupation" required>
                                    </div>
                                </div>

                                <!-- Official Contact Number -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_contact_official" class="form-label">Official Contact
                                            Number</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_contact_official'] ?? '' }}" name="sp_mother_contact_official" required>
                                    </div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_contact_mobile" class="form-label">Mobile Number</label>
                                        <input type="number" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" value="{{ $studentDetails['data']['parent_data'][0]['sp_mother_contact_mobile'] ?? '' }}" name="sp_mother_contact_mobile" required>
                                    </div>
                                </div>
                                <!-- Official Address -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_official_address" class="form-label">Official
                                            Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_mother_official_address">{{ $studentDetails['data']['parent_data'][0]['sp_mother_official_address'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                <!-- Permanent Address -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_mother_permanent_address" class="form-label">Permanent
                                            Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_mother_permanent_address">{{ $studentDetails['data']['parent_data'][0]['sp_mother_permanent_address'] ?? '' }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4 mb-3">Student Payment</h6>
                            <div class="row">
                                <!-- Admission Date -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_admission_date" class="form-label">Admission Date</label>
                                        <input type="date" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['sd_admission_date'] }}" name="sd_admission_date" required>
                                    </div>
                                </div>
                                <!-- Admission Payment Amount -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_admission_payment_amount" class="form-label">Admission
                                            Payment Amount</label>
                                        <input type="number" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" value="{{ $studentDetails['data']['sd_admission_payment_amount'] }}" name="sd_admission_payment_amount" required>
                                    </div>
                                </div>
                                <!-- Number of Installments -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sp_father_no_of_installments" class="form-label">Number of
                                            Installments</label>
                                        <input type="number" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" value="{{ $studentDetails['data']['sd_no_of_installments'] }}" name="sd_no_of_installments" required>
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4 mb-3">Student Siblings</h6>
                            <div class="table-responsive">
                                <table id="siblings_table" class="table">
                                    <thead>
                                        <tr>
                                            <th class="px-2">First Name</th>
                                            <th class="px-2">Last Name</th>
                                            <th class="px-2">Gender</th>
                                            <th class="px-2">Date of Birth</th>
                                            <th class="px-2">School</th>
                                            <th class="px-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Decode the JSON string into an array --}}
                                        @php
                                        $siblingData =
                                        json_decode($studentDetails['data']['sibling_data'][0]['ss_details'], true)

                                        @endphp

                                        {{-- Loop through sibling data --}}
                                        @foreach($siblingData as $index => $sibling)

                                        <tr>
                                            <td><input type="text" class="form-control" name="siblings[{{ $index }}][first_name]" value="{{ $sibling['first_name'] }}"></td>
                                            <td><input type="text" class="form-control" name="siblings[{{ $index }}][last_name]" value="{{ $sibling['last_name'] }}"></td>
                                            <td>
                                                <select class="form-select" name="siblings[{{ $index }}][sex]">
                                                    <option value="male" {{ $sibling['sex'] === 'male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="female" {{ $sibling['sex'] === 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                            </td>
                                            <td><input type="date" class="form-control" name="siblings[{{ $index }}][date_of_birth]" value="{{ $sibling['date_of_birth'] }}">
                                            </td>
                                            <td><input type="text" class="form-control" name="siblings[{{ $index }}][school]" value="{{ $sibling['school'] }}"></td>
                                            <td><button type="button" class="btn btn-danger" onclick="removeSiblingRow(this)">Remove</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary" onclick="addSiblingRow()">Add Sibling</button>
                            <input type="hidden" name="ss_details" id="siblings_data">
                        </div>
                        <div class="tab">
                            <h6 class="mt-4 mb-3">Attachments</h6>
                            <div class="row">

                                <!-- Profile Picture Path -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_profle_picture_path" class="form-label">Profile Picture</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_profile_picture'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" id="sd_profile_picture" name="sd_profile_picture" value="{{ $studentDetails['data']['documents'][0]['sd_profile_picture'] ?? '' }}">


                                            <!-- Hidden input for cropped image data -->
                                            <input type="hidden" name="croppedImage" id="croppedImage">
                                        </div>
                                    </div>
                                </div>

                                <!-- Birth Certificate -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_birth_certificate" class="form-label">Birth Certificate</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_birth_certificate'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_birth_certificate" value="{{ $studentDetails['data']['documents'][0]['sd_birth_certificate'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                                <!-- Father NIC -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_nic_fatherer" class="form-label">Father NIC</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_nic_father'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['documents'][0]['sd_nic_father'] ?? '' }}" name="sd_nic_father">
                                        </div>
                                    </div>
                                </div>
                                <!-- Mother NIC -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_nic_motherer" class="form-label">Mother NIC</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_nic_mother'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['documents'][0]['sd_nic_mother'] ?? '' }}" name="sd_nic_mother">
                                        </div>
                                    </div>
                                </div>
                                <!-- Marriage Certificate -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_marriage_certificate" class="form-label">Marriage
                                            Certificate</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_marriage_certificate'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['documents'][0]['sd_marriage_certificate'] ?? '' }}" name="sd_marriage_certificate">
                                        </div>
                                    </div>
                                </div>
                                <!-- Permission Letter -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_permission_letter" class="form-label">Permission Letter</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_permission_letter'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['documents'][0]['sd_permission_letter'] ?? '' }}" name="sd_permission_letter">
                                        </div>
                                    </div>
                                </div>
                                <!-- Permission Letter -->
                                <div class="col-md-4 align-self-center">
                                    <div class="mb-3">
                                        <label for="sd_leaving_certificate" class="form-label">Leaving
                                            Certificate</label>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset("storage/".$studentDetails['data']['documents'][0]['sd_leaving_certificate'] ?? 'assets/img/no-image.png') }}" class="avatar avatar-sm me-3" alt="user1">
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" value="{{ $studentDetails['data']['documents'][0]['sd_leaving_certificate'] ?? '' }}" name="sd_leaving_certificate">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tabs over -->
                        <div class="mt-3" style="overflow:auto;">
                            <div style="float:right;">
                                <button class="btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- step form -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewModalLabel">Crop Profile picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Image preview container -->
                            <div id="imagePreviewContainer">
                                <img id="imagePreview" class="w-100" src="#" alt="Image Preview">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="cropImageBtn" data-bs-dismiss="modal">Crop Image & Save</button>
                </div>
            </div>
        </div>
    </div>
    @include('components/footer-ui')
</main>

@endsection
@section('footer-scripts')
<script src="{{ asset('assets/js/plugins/cropper.min.js') }}"></script>
<script>
    var cropper;
    var imageInput = document.getElementById('sd_profile_picture');
    var imagePreview = document.getElementById('imagePreview');
    var imagePreviewContainer = document.getElementById('imagePreviewContainer');
    var cropImageBtn = document.getElementById('cropImageBtn');
    var croppedImageInput = document.getElementById('croppedImage');

    imageInput.addEventListener('change', function(e) {

        if (cropper) {
            cropper.destroy();
        }
        imagePreview.src = '';
        imagePreviewContainer.style.display = 'none';
        imagePreview.style.display = 'none';
        cropImageBtn.style.display = 'none';
        croppedImageInput.style.display = 'none';

        var file = e.target.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function(event) {
                // Update image preview
                imagePreview.src = event.target.result;

                // Initialize Cropper.js
                cropper = new Cropper(imagePreview, {
                    aspectRatio: 1, // You can set your desired aspect ratio
                    viewMode: 1, // You can set the view mode as needed
                });

                // Show the image preview container
                imagePreviewContainer.style.display = 'block';
                imagePreview.style.display = 'block';
                cropImageBtn.style.display = 'block';
                croppedImageInput.style.display = 'block';
                $('#imagePreview').removeClass('w-100')
                $('#imagePreview').addClass('w-100')
            };

            reader.readAsDataURL(file);
            $('#imagePreviewModal').modal('show')
        }
    });

    // Handle the crop button click
    cropImageBtn.addEventListener('click', function() {
        // Get cropped data URL
        var croppedDataUrl = cropper.getCroppedCanvas().toDataURL();

        // Update the hidden input with cropped image data
        croppedImageInput.value = croppedDataUrl;

        // Optionally, hide the image preview container
        imagePreviewContainer.style.display = 'none';
    });

    // input validations
    document.addEventListener('DOMContentLoaded', function() {
        const phoneInputs = document.querySelectorAll('.phone-input');
        const emailInputs = document.querySelectorAll('.email-input');
        const alphanumericInputs = document.querySelectorAll('.alphanumeric-input');

        // Phone number validation
        phoneInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                const phoneNumber = input.value;
                const phoneRegex = /^\d{10}$/; // Example regex for 10 digits

                if (!phoneRegex.test(phoneNumber)) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
        });

        // Email validation
        emailInputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                const email = input.value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Basic email regex

                if (!emailRegex.test(email)) {
                    input.classList.add('is-invalid');
                } else {
                    input.classList.remove('is-invalid');
                }
            });
        });

        // Alphanumeric input validation
        alphanumericInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                const alphanumeric = input.value;
                const alphanumericRegex = /^[a-zA-Z0-9]*$/; // Only letters and numbers

                if (!alphanumericRegex.test(alphanumeric)) {
                    input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
                }
            });
        });
    });
</script>

<script>
    var siblingIndex = 1;

    function addSiblingRow() {
        var table = document.getElementById("siblings_table").getElementsByTagName('tbody')[0];
        var row = table.insertRow(table.rows.length);

        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.innerHTML = '<input type="text" class="form-control" name="siblings[' + siblingIndex + '][first_name]">';
        cell2.innerHTML = '<input type="text" class="form-control" name="siblings[' + siblingIndex + '][last_name]">';
        cell3.innerHTML = '<select class="form-select" name="siblings[' + siblingIndex +
            '][sex]"><option value="male">Male</option><option value="female">Female</option></select>';
        cell4.innerHTML = '<input type="date" class="form-control" name="siblings[' + siblingIndex +
            '][date_of_birth]">';
        cell5.innerHTML = '<input type="text" class="form-control" name="siblings[' + siblingIndex + '][school]">';
        cell6.innerHTML =
            '<button type="button" class="btn btn-danger" onclick="removeSiblingRow(this)">Remove</button>';

        siblingIndex++;
        updateSiblingsData();
    }

    function removeSiblingRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateSiblingsData();
    }

    function updateSiblingsData() {
        var siblingsData = [];

        // Iterate through the table rows and collect sibling data
        $('#siblings_table tbody tr').each(function(index, row) {
            var sibling = {
                first_name: $(row).find('input[name^="siblings"][name$="[first_name]"]').val(),
                last_name: $(row).find('input[name^="siblings"][name$="[last_name]"]').val(),
                sex: $(row).find('select[name^="siblings"][name$="[sex]"]').val(),
                date_of_birth: $(row).find('input[name^="siblings"][name$="[date_of_birth]"]').val(),
                school: $(row).find('input[name^="siblings"][name$="[school]"]').val(),
            };

            siblingsData.push(sibling);
        });

        // Update the hidden input with the serialized sibling data
        $('#siblings_data').val(JSON.stringify(siblingsData));
    }

    // function manualUpdate() {


    //     // Show a SweetAlert message after the update
    //     Swal.fire({
    //         title: 'Success!',
    //         text: 'Siblings data updated.',
    //         icon: 'success',
    //         timer: 2000, // Close the alert after 2 seconds
    //         timerProgressBar: true,
    //         showConfirmButton: false
    //     });
    // }
</script>


<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
        updateSiblingsData(); // Call the update function
    }

    function validateForm() {
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");

        // Loop through each input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // Check if the field is required and its value is empty:
            if (y[i].hasAttribute("required") && y[i].value === "") {
                y[i].classList.add("is-invalid"); // Add the "invalid" class
                valid = false; // Set the valid status to false
            }
        }

        // If all required fields are valid, mark the step as finished:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].classList.add("finish");
        }

        return valid; // Return the valid status
    }


    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";

    }
</script>

@endsection