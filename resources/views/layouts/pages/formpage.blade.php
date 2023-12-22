@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm">
                        <a class="opacity-3 text-dark" href="javascript:;">
                            <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>shop </title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(0.000000, 148.000000)">
                                                <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">CRM</li>
                </ol>
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
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
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
                                        <div class="my-auto">
                                            <img src="../../assets/img/ym.jpg" class="avatar avatar-sm  me-3 " alt="user image">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Yogeemedia
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
                                        <div class="my-auto">
                                            <img src="../../assets/img/small_logo.png" class="avatar avatar-sm bg-gradient-dark  me-3 " alt="nsis">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New lecture</span> by NSIS
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
                                                Payment successfully completed
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
                    <form id="regForm" action="/action_page.php" method="POST">
                        @csrf
                        <div class="form_title mb-4">
                            <h4>Student Register Form</h4>
                        </div>
                        <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                            <h6 class="mb-3">personal Details</h6>
                            <div class="row">
                                <!-- Admission Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Admission Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="admission_no">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="year_grade_class_id" class="form-label">Year/Class/Grade</label>
                                        <select class="form-select" name="year_grade_class_id">
                                            <option value="year1">Year 1</option>
                                            <option value="year1">Year 2</option>
                                            <option value="year1">Year 3</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="first_name">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="last_name">
                                    </div>
                                </div>
                                <!-- Name with Initials -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_with_initials" class="form-label">Name with Initials</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="name_with_initials">
                                    </div>
                                </div>

                                <!-- Name in Full -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name_in_full" class="form-label">Name in Full</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="name_in_full">
                                    </div>
                                </div>
                                <!-- Address Line 1 -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address_line1" class="form-label">Address Line 1</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="address_line1">
                                    </div>
                                </div>

                                <!-- Address Line 2 -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address_line2" class="form-label">Address Line 2</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="address_line2">
                                    </div>
                                </div>

                                <!-- Address City -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="address_city" class="form-label">Address City</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="address_city">
                                    </div>
                                </div>

                                <!-- Telephone Residence -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone_residence" class="form-label">Telephone Residence</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="telephone_residence">
                                    </div>
                                </div>

                                <!-- Telephone Mobile -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone_mobile" class="form-label">Telephone Mobile</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="telephone_mobile">
                                    </div>
                                </div>

                                <!-- Telephone WhatsApp -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="telephone_whatsapp" class="form-label">Telephone WhatsApp</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="telephone_whatsapp">
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email_address" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" oninput="this.className = 'form-control'" name="email_address">
                                    </div>
                                </div>
                                <!-- Sex -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="sex" class="form-label">Gender</label>
                                        <select class="form-select" name="sex">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Date of Birth -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" oninput="this.className = 'form-control'" name="date_of_birth">
                                    </div>
                                </div>

                                <!-- Religion -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">Religion</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="religion">
                                    </div>
                                </div>

                                <!-- Ethnicity -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ethnicity" class="form-label">Ethnicity</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="ethnicity">
                                    </div>
                                </div>

                                <!-- Number of Birth Certificate -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birthcertificate_number" class="form-label">Birth Certificate Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="birthcertificate_number">
                                    </div>
                                </div>

                                <!-- Health Conditions -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="health_conditions" class="form-label">Health Conditions</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="health_conditions"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab">
                            <h6 class="mb-3">Father’s Information</h6>
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_first_name">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_last_name">
                                    </div>
                                </div>
                                <!-- NIC No -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_nic">
                                    </div>
                                </div>
                                <!-- Higher Education Qualification -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_higher_education_qualification" class="form-label">Higher Education Qualification</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_higher_education_qualification">
                                    </div>
                                </div>
                                <!-- Occupation -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_occupation">
                                    </div>
                                </div>
                                <!-- Official Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_official_address" class="form-label">Official Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="fath_official_address"></textarea>
                                    </div>
                                </div>
                                <!-- Permanent Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_permanent_address" class="form-label">Permanent Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="fath_permanent_address"></textarea>
                                    </div>
                                </div>
                                <!-- Official Contact Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_contact_official" class="form-label">Official Contact Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_contact_official">
                                    </div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_contact_mobile" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_contact_mobile">
                                    </div>
                                </div>
                                <!-- Admission Date -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_admission_date" class="form-label">Admission Date</label>
                                        <input type="date" class="form-control" oninput="this.className = 'form-control'" name="fath_admission_date">
                                    </div>
                                </div>
                                <!-- Admission Payment Amount -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_admission_payment_amount" class="form-label">Admission Payment Amount</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_admission_payment_amount">
                                    </div>
                                </div>
                                <!-- Number of Installments -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="fath_no_of_installments" class="form-label">Number of Installments</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="fath_no_of_installments">
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4 mb-3">Mother’s Information</h6>
                            <div class="row">
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_first_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_first_name">
                                    </div>
                                </div>
                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_last_name">
                                    </div>
                                </div>
                                <!-- NIC No -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_nic">
                                    </div>
                                </div>
                                <!-- Higher Education Qualification -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_higher_education_qualification" class="form-label">Higher Education Qualification</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_higher_education_qualification">
                                    </div>
                                </div>
                                <!-- Occupation -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_occupation" class="form-label">Occupation</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_occupation">
                                    </div>
                                </div>
                                <!-- Official Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_official_address" class="form-label">Official Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="moth_official_address"></textarea>
                                    </div>
                                </div>
                                <!-- Permanent Address -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_permanent_address" class="form-label">Permanent Address</label>
                                        <textarea class="form-control" oninput="this.className = 'form-control'" name="moth_permanent_address"></textarea>
                                    </div>
                                </div>
                                <!-- Official Contact Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_contact_official" class="form-label">Official Contact Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_contact_official">
                                    </div>
                                </div>
                                <!-- Mobile Number -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_contact_mobile" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_contact_mobile">
                                    </div>
                                </div>
                                <!-- Admission Date -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_admission_date" class="form-label">Admission Date</label>
                                        <input type="date" class="form-control" oninput="this.className = 'form-control'" name="moth_admission_date">
                                    </div>
                                </div>
                                <!-- Admission Payment Amount -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_admission_payment_amount" class="form-label">Admission Payment Amount</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_admission_payment_amount">
                                    </div>
                                </div>
                                <!-- Number of Installments -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="moth_no_of_installments" class="form-label">Number of Installments</label>
                                        <input type="text" class="form-control" oninput="this.className = 'form-control'" name="moth_no_of_installments">
                                    </div>
                                </div>
                            </div>
                            <h6 class="mt-4 mb-3">Student Siblings</h6>
                            <table id="siblings_table" class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Date of Birth</th>
                                        <th>School</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control" name="siblings[0][first_name]"></td>
                                        <td><input type="text" class="form-control" name="siblings[0][last_name]"></td>
                                        <td>
                                            <select class="form-select" name="siblings[0][sex]">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </td>
                                        <td><input type="date" class="form-control" name="siblings[0][date_of_birth]"></td>
                                        <td><input type="text" class="form-control" name="siblings[0][school]"></td>
                                        <td><button type="button" class="btn btn-danger" onclick="removeSiblingRow(this)">Remove</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-primary" onclick="addSiblingRow()">Add Sibling</button>
                            <input type="hidden" name="siblings_data" id="siblings_data">
                        </div>
                        <div class="tab">
                            <div class="row">
                                <h6 class="mt-4 mb-3">Attachments</h6>
                                <!-- Profile Picture Path -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="profle_picture_path" class="form-label">Profile Picture</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="profle_picture_path">
                                    </div>
                                </div>
                                <!-- Birth Certificate -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birth_certificate" class="form-label">Birth Certificate</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="birth_certificate">
                                    </div>
                                </div>
                                <!-- Father NIC -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nic_father" class="form-label">Father NIC</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="nic_father">
                                    </div>
                                </div>
                                <!-- Mother NIC -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nic_mother" class="form-label">Mother NIC</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="nic_mother">
                                    </div>
                                </div>
                                <!-- Marriage Certificate -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="marriage_certificate" class="form-label">Marriage Certificate</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="marriage_certificate">
                                    </div>
                                </div>
                                <!-- Permission Letter -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="permission_letter" class="form-label">Permission Letter</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="permission_letter">
                                    </div>
                                </div>
                                <!-- Permission Letter -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="leaving_certificate" class="form-label">Leaving Certificate</label>
                                        <input type="file" class="form-control" oninput="this.className = 'form-control'" name="leaving_certificate">
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
                first_name: $(row).find('[name^="siblings"]').eq(0).val(),
                last_name: $(row).find('[name^="siblings"]').eq(1).val(),
                sex: $(row).find('[name^="siblings"]').eq(2).val(),
                date_of_birth: $(row).find('[name^="siblings"]').eq(3).val(),
                school: $(row).find('[name^="siblings"]').eq(4).val(),
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
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
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