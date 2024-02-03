@extends('main.app')
@section('content')
<link href="{{ asset('assets/css/cropper.min.css') }}" rel="stylesheet" />
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-2 top-1 px-0 mx-2 shadow-none border-radius-xl z-index-sticky side-bar-bg" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('formpage') }}
                <h6 class="font-weight-bolder mb-0"></h6>
            </nav>
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <!-- <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div> -->
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <form id="logout-form" action="{{ route('logOut') }}" method="POST" style="display: none;">
                            @csrf

                        </form>
                        <button class="btn btn-icon btn-3 btn-primary" style="margin-bottom: 0px !important;" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="btn-inner--icon"><i class="fa fa-user me-sm-1"></i></span>
                            <span class="btn-inner--text">Logout</span>
                        </button>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <!-- Hide gear icon -->
                            <!-- <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i> -->
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 1</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 2</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 3</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        <!-- step form -->
        <div class="card">
            <div class="card-body">
                <div class="reg_form">
                    <form id="regForm" action="{{ route('student_create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form_title mb-4">
                            <h4>Student Register Form</h4>
                        </div>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/student.png') }}');">
                                <h6 class="mb-3">Personal Details</h6>
                                <div class="row">
                                    <!-- Admission Number -->
                                    @php
                                    $uniqueId = uniqid();
                                    @endphp
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="id" class="form-label">Admission Number</label>
                                            <input type="hidden" value="{{ $uniqueId }}" name="student_id">
                                            <input type="hidden" value="{{ env('ORGANIZATION_ID') }}" name="organization_id">
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sd_admission_no" placeholder="Enter Admission Number" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sd_year_grade_class_id" class="form-label">Year/Class/Grade</label>
                                        <select class="form-select" name="sd_year_grade_class_id">
                                            @foreach ( $year_grades as $year_grade)
                                                    <option value="{{$year_grade['id']}}">{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_first_name" placeholder="Enter First Name" required>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_last_name" placeholder="Enter Last Name" required>
                                        </div>
                                    </div>
                                    <!-- Name with Initials -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_name_with_initials" class="form-label">Name with Initials</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_name_with_initials" placeholder="Enter Name with Initials" required>
                                        </div>
                                    </div>

                                    <!-- Name in Full -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_name_in_full" class="form-label">Name in Full</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_name_in_full" placeholder="Enter Full Name" required>
                                        </div>
                                    </div>
                                    <!-- Address Line 1 -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_address_line1" class="form-label">Address Line 1</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_address_line1" placeholder="Enter Address Line 1" required>
                                        </div>
                                    </div>

                                    <!-- Address Line 2 -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_address_line2" class="form-label">Address Line 2</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_address_line2" placeholder="Enter Address Line 2">
                                        </div>
                                    </div>

                                    <!-- Address City -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_address_city" class="form-label">Address City</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_address_city" placeholder="Enter City" required>
                                        </div>
                                    </div>

                                    <!-- Telephone Residence -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_telephone_residence" class="form-label">Telephone Residence</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sd_telephone_residence" placeholder="Enter Residence Telephone">
                                        </div>
                                    </div>

                                    <!-- Telephone Mobile -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_telephone_mobile" class="form-label">Telephone Mobile</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sd_telephone_mobile" placeholder="Enter Mobile Telephone" required>
                                        </div>
                                    </div>

                                    <!-- Telephone WhatsApp -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_telephone_whatsapp" class="form-label">Telephone WhatsApp</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sd_telephone_whatsapp" placeholder="Enter WhatsApp Telephone" required>
                                        </div>
                                    </div>

                                    <!-- Email Address -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_email_address" class="form-label">Email Address</label>
                                            <input type="email" class="form-control email-input" oninput="this.className = 'form-control email-input'" name="sd_email_address" placeholder="Enter Email Address" required>
                                        </div>
                                    </div>
                                    <!-- Sex -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_sex" class="form-label">Gender</label>
                                            <select class="form-select" name="sd_gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_date_of_birth" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" oninput="this.className = 'form-control'" name="sd_date_of_birth" placeholder="Select Date of Birth" required>
                                        </div>
                                    </div>

                                    <!-- Religion -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_religion" class="form-label">Religion</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_religion" placeholder="Enter Religion" required>
                                        </div>
                                    </div>

                                    <!-- Ethnicity -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_ethnicity" class="form-label">Ethnicity</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sd_ethnicity" placeholder="Enter Ethnicity" required>
                                        </div>
                                    </div>

                                    <!-- Number of Birth Certificate -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_birthcertificate_number" class="form-label">Birth Certificate Number</label>
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sd_birth_certificate_number" placeholder="Enter Birth Certificate Number" required>
                                        </div>
                                    </div>

                                    <!-- Health Conditions -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_health_conditions" class="form-label">Health Conditions</label>
                                            <textarea class="form-control" oninput="this.className = 'form-control'" name="sd_health_conditions" placeholder="Enter Health Conditions"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/father.png') }}');">
                                <h6 class="mb-3">Father’s Information</h6>
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_father_first_name" placeholder="Enter Father's First Name" required>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_father_last_name" placeholder="Enter Father's Last Name" required>
                                        </div>
                                    </div>
                                    <!-- NIC No -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_nic" class="form-label">NIC Number</label>
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sp_father_nic" placeholder="Enter Father's NIC Number" required>
                                        </div>
                                    </div>
                                    <!-- Higher Education Qualification -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_higher_education_qualification" class="form-label">Higher Education Qualification</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_father_higher_education_qualification" placeholder="Enter Father's Higher Education Qualification" required>
                                        </div>
                                    </div>
                                    <!-- Occupation -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_father_occupation" placeholder="Enter Father's Occupation" required>
                                        </div>
                                    </div>
                                    <!-- Official Address -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_official_address" class="form-label">Official Address</label>
                                            <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_father_official_address" placeholder="Enter Father's Official Address"></textarea>
                                        </div>
                                    </div>
                                    <!-- Permanent Address -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_permanent_address" class="form-label">Permanent Address</label>
                                            <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_father_permanent_address" placeholder="Enter Father's Permanent Address"></textarea>
                                        </div>
                                    </div>
                                    <!-- Official Contact Number -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_contact_official" class="form-label">Official Contact Number</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sp_father_contact_official" placeholder="Enter Father's Official Contact Number" required>
                                        </div>
                                    </div>
                                    <!-- Mobile Number -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_contact_mobile" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sp_father_contact_mobile" placeholder="Enter Father's Mobile Number" required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/mother.png') }}');">
                                <h6 class="mt-4 mb-3">Mother’s Information</h6>
                                <div class="row">
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_first_name" class="form-label">First Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_mother_first_name" placeholder="Enter Mother's First Name" required>
                                        </div>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_last_name" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_mother_last_name" placeholder="Enter Mother's Last Name" required>
                                        </div>
                                    </div>
                                    <!-- NIC No -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_nic" class="form-label">NIC Number</label>
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sp_mother_nic" placeholder="Enter Mother's NIC Number" required>
                                        </div>
                                    </div>
                                    <!-- Higher Education Qualification -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_higher_education_qualification" class="form-label">Higher Education Qualification</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_mother_higher_education_qualification" placeholder="Enter Mother's Higher Education Qualification" required>
                                        </div>
                                    </div>
                                    <!-- Occupation -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_occupation" class="form-label">Occupation</label>
                                            <input type="text" class="form-control" oninput="this.className = 'form-control'" name="sp_mother_occupation" placeholder="Enter Mother's Occupation" required>
                                        </div>
                                    </div>
                                    <!-- Official Address -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_official_address" class="form-label">Official Address</label>
                                            <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_mother_official_address" placeholder="Enter Mother's Official Address"></textarea>
                                        </div>
                                    </div>
                                    <!-- Permanent Address -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_permanent_address" class="form-label">Permanent Address</label>
                                            <textarea class="form-control" oninput="this.className = 'form-control'" name="sp_mother_permanent_address" placeholder="Enter Mother's Permanent Address"></textarea>
                                        </div>
                                    </div>
                                    <!-- Official Contact Number -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_contact_official" class="form-label">Official Contact Number</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sp_mother_contact_official" placeholder="Enter Mother's Official Contact Number" required>
                                        </div>
                                    </div>
                                    <!-- Mobile Number -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_mother_contact_mobile" class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control phone-input" oninput="this.className = 'form-control phone-input'" name="sp_mother_contact_mobile" placeholder="Enter Mother's Mobile Number" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/pay.png') }}');">
                                <h6 class="mt-4 mb-3">Student Payment</h6>
                                <div class="row">
                                    <!-- Admission Date -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_admission_date" class="form-label">Admission Date</label>
                                            <input type="date" class="form-control" oninput="this.className = 'form-control'" name="sd_admission_date" placeholder="Select Admission Date" required>
                                        </div>
                                    </div>
                                    <!-- Admission Payment Amount -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_admission_payment_amount" class="form-label">Admission Payment Amount</label>
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sd_admission_payment_amount" placeholder="Enter Admission Payment Amount" required>
                                        </div>
                                    </div>
                                    <!-- Number of Installments -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sp_father_no_of_installments" class="form-label">Number of Installments</label>
                                            <input type="text" class="form-control alphanumeric-input" oninput="this.className = 'form-control alphanumeric-input'" name="sd_no_of_installments" placeholder="Enter Number of Installments" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/sibling.png') }}');">
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
                                            <tr>
                                                <td><input type="text" class="form-control" name="siblings[0][first_name]" placeholder="Enter Sibling's First Name"></td>
                                                <td><input type="text" class="form-control" name="siblings[0][last_name]" placeholder="Enter Sibling's Last Name"></td>
                                                <td>
                                                    <select class="form-select" name="siblings[0][sex]">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </td>
                                                <td><input type="date" class="form-control" name="siblings[0][date_of_birth]" placeholder="Select Sibling's Date of Birth"></td>
                                                <td><input type="text" class="form-control" name="siblings[0][school]" placeholder="Enter Sibling's School"></td>
                                                <td><button type="button" class="btn btn-danger" onclick="removeSiblingRow(this)">Remove</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="addSiblingRow()">Add Sibling</button>
                                <input type="hidden" name="ss_details" id="siblings_data">
                            </div>
                        </div>
                        <div class="tab">
                            <div class="form_img" style="background-image: url('{{ asset('assets/img/form_img/attachments.png') }}');">
                                <h6 class="mt-4 mb-3">Attachments</h6>
                                <div class="row">
                                    <!-- Profile Picture Path -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_profle_picture_path" class="form-label">Profile Picture</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" id="sd_profile_picture" name="sd_profile_picture" required>
                                         <!-- Image preview container -->
                                         <div id="imagePreviewContainer">
                                                <img id="imagePreview" src="#" alt="Image Preview">
                                            </div>

                                        <!-- Crop button -->
                                        <button type="button" id="cropImageBtn">Crop Image</button>

                                        <!-- Hidden input for cropped image data -->
                                        <input type="hidden" name="croppedImage" id="croppedImage">
                                        </div>
                                        
                                    </div>
                                    <!-- Birth Certificate -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_birth_certificate" class="form-label">Birth Certificate</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_birth_certificate" required>
                                        </div>
                                    </div>
                                    <!-- Father NIC -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_nic_fatherer" class="form-label">Father NIC</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_nic_father">
                                        </div>
                                    </div>
                                    <!-- Mother NIC -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_nic_motherer" class="form-label">Mother NIC</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_nic_mother">
                                        </div>
                                    </div>
                                    <!-- Marriage Certificate -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_marriage_certificate" class="form-label">Marriage Certificate</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_marriage_certificate">
                                        </div>
                                    </div>
                                    <!-- Permission Letter -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_permission_letter" class="form-label">Permission Letter</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_permission_letter">
                                        </div>
                                    </div>
                                    <!-- Permission Letter -->
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sd_leaving_certificate" class="form-label">Leaving Certificate</label>
                                            <input type="file" class="form-control" oninput="this.className = 'form-control'" name="sd_leaving_certificate">
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
    <footer class="footer">
        <div class="container-fluid">
            <!-- <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Yogeemedia</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </footer>
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

    imageInput.addEventListener('change', function (e) {

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

            reader.onload = function (event) {
                // Update image preview
                imagePreview.src = event.target.result;

                // Initialize Cropper.js
                cropper = new Cropper(imagePreview, {
                    aspectRatio: 1, // You can set your desired aspect ratio
                    viewMode: 1,    // You can set the view mode as needed
                });

                // Show the image preview container
                imagePreviewContainer.style.display = 'block';
                imagePreview.style.display = 'block';
                cropImageBtn.style.display = 'block';
                croppedImageInput.style.display = 'block';
            };

            reader.readAsDataURL(file);
        }
    });

    // Handle the crop button click
    cropImageBtn.addEventListener('click', function () {
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
        cell3.innerHTML = '<select class="form-select" name="siblings[' + siblingIndex + '][sex]"><option value="male">Male</option><option value="female">Female</option></select>';
        cell4.innerHTML = '<input type="date" class="form-control" name="siblings[' + siblingIndex + '][date_of_birth]">';
        cell5.innerHTML = '<input type="text" class="form-control" name="siblings[' + siblingIndex + '][school]">';
        cell6.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeSiblingRow(this)">Remove</button>';

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

        $('html, body').animate({
                scrollTop: $('#regForm').offset().top
            }, 'slow');
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