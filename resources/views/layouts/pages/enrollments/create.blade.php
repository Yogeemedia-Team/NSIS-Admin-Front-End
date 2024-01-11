@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('add_enrollment') }}
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
        <!-- Students table -->

        <div class="card">

            <div class="card-body">
                <form action="{{ route('add_enrollment') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Student ID -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student ID</label>
                                <input type="text" class="form-control alphanumeric-input" name="student_id" placeholder="Enter Student ID" required>
                            </div>
                        </div>
                        <!-- Grade/Class -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="grade_class_id" class="form-label">Grade/Class</label>
                                <select class="form-select" name="grade_class_id" required>
                                    <option value="" disabled selected>Select Grade/Class</option>
                                    <option value="1">Grade/Class 1</option>
                                    <option value="2">Grade/Class 2</option>
                                    <option value="3">Grade/Class 3</option>
                                </select>
                            </div>
                        </div>

                        <!-- First Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
                            </div>
                        </div>
                        <!-- Last Name -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                            </div>
                        </div>

                        <!-- Name with Initials -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_with_initials" class="form-label">Name with Initials</label>
                                <input type="text" class="form-control" name="name_with_initials" placeholder="Enter Name with Initials" required>
                            </div>
                        </div>
                        <!-- Name in Full -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name_in_full" class="form-label">Name in Full</label>
                                <input type="text" class="form-control" name="name_in_full" placeholder="Enter Full Name" required>
                            </div>
                        </div>

                        <!-- Address Line 1 -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address_line1" class="form-label">Address Line 1</label>
                                <input type="text" class="form-control" name="address_line1" placeholder="Enter Address Line 1" required>
                            </div>
                        </div>
                        <!-- Address Line 2 -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address_line2" class="form-label">Address Line 2</label>
                                <input type="text" class="form-control" name="address_line2" placeholder="Enter Address Line 2">
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="address_city" class="form-label">City</label>
                                <input type="text" class="form-control" name="address_city" placeholder="Enter City" required>
                            </div>
                        </div>
                        <!-- Telephone (Residence) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telephone_residence" class="form-label">Telephone (Residence)</label>
                                <input type="tel" class="form-control phone-input" name="telephone_residence" placeholder="Enter Residence Telephone">
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telephone_mobile" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control phone-input" name="telephone_mobile" placeholder="Enter Mobile Number" required>
                            </div>
                        </div>
                        <!-- WhatsApp Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="telephone_whatsapp" class="form-label">WhatsApp Number</label>
                                <input type="tel" class="form-control phone-input" name="telephone_whatsapp" placeholder="Enter WhatsApp Number">
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email_address" class="form-label">Email Address</label>
                                <input type="email" class="form-control email-input" name="email_address" placeholder="Enter Email Address" required>
                            </div>
                        </div>
                        <!-- Sex/Gender -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="sex" class="form-label">Sex/Gender</label>
                                <select class="form-select" name="sex">
                                    <option value="" disabled selected>Select Sex/Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="date_of_birth" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" placeholder="Select Date of Birth" required>
                            </div>
                        </div>
                        <!-- Religion -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="religion" class="form-label">Religion</label>
                                <input type="text" class="form-control" name="religion" placeholder="Enter Religion">
                            </div>
                        </div>

                        <!-- Ethnicity -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="ethnicity" class="form-label">Ethnicity</label>
                                <input type="text" class="form-control" name="ethnicity" placeholder="Enter Ethnicity">
                            </div>
                        </div>
                        <!-- Birth Certificate Number -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="birthcertificate_number" class="form-label">Birth Certificate Number</label>
                                <input type="text" class="form-control alphanumeric-input" name="birthcertificate_number" placeholder="Enter Birth Certificate Number" required>
                            </div>
                        </div>

                        <!-- Profile Picture -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="profile_picture_path" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" name="profile_picture_path" placeholder="Choose Profile Picture">
                            </div>
                        </div>
                        <!-- Health Conditions -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="health_conditions" class="form-label">Health Conditions</label>
                                <textarea class="form-control" name="health_conditions" placeholder="Enter Health Conditions" rows="3"></textarea>
                            </div>
                        </div>

                        <!-- Applied Date -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="applied_date" class="form-label">Applied Date</label>
                                <input type="date" class="form-control" name="applied_date" placeholder="Select Applied Date" required>
                            </div>
                        </div>
                        <!-- Admission Status -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="admission_status" class="form-label">Admission Status</label>
                                <select class="form-select" name="admission_status">
                                    <option value="" disabled selected>Select Admission Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col mt-auto text-end">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>



            </div>
        </div>
        <!-- Students table -->
    </div>
    <footer class="footer">
        <div class="container-fluid">

        </div>
    </footer>
</main>

@endsection
@section('footer-scripts')
<script>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection