@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('single-student') }}
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
        <!-- Single Student View -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body text-center">
                        <img src="{{ asset("storage/".$studentDetails['sd_profile_picture']) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3">{{ $studentDetails['sd_first_name'] .' '.$studentDetails['sd_last_name']  }}</h5>
                        <p class="text-muted mb-1">{{ $studentDetails['sd_year_grade_class_id']}}</p>
                        <p class="text-muted mb-4">{{ $studentDetails['organization_id']}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a target="_blank" href="https://wa.me/{{ $studentDetails['sd_telephone_whatsapp']}}" class="btn btn-primary" style="background-color: #25D366 !important;border-color:#25D366 !important;"><i class="fa-brands fa-whatsapp me-1"></i> Watsapp</a>
                            <a href="mailto:{{ $studentDetails['sd_email_address']}}" class="btn btn-outline-primary ms-1"><i class="fa-solid fa-envelope me-1"></i>Email</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="mb-4"> Insights
                        </p>
                        <p class="mb-1" style="font-size: .77rem;">Attendance</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Payments</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Marks Average</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-1" style="font-size: .77rem;">Extra Curricular</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- <p class="mt-4 mb-1" style="font-size: .77rem;">Sample Text 5</p>
                        <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_first_name'] .' '.$studentDetails['sd_last_name']  }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Name With Initials</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_name_with_initials'] }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Gender</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_gender']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_address_line1'] .', '.$studentDetails['sd_address_line2'] }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Telephone</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_telephone_residence']}}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_telephone_mobile']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Watsapp Number</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_telephone_whatsapp']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_email_address']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Date of Birth</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_date_of_birth']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Religion</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_religion']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Ethnicity</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_ethnicity']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Birthcertificate No</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_birth_certificate_number']}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <p class="mb-0">Health Conditions</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="mb-0 text-muted"><span class="badge badge-success text-dark">{{ $studentDetails['sd_health_conditions']}}</span></p>
                            </div>
                        </div>


                        <!-- <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Admission Date</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_admission_date']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Payment Amount</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">LKR {{ $studentDetails['sd_admission_payment_amount']}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-5">
                                <p class="mb-0">Number of Installments</p>
                            </div>
                            <div class="col-sm-7">
                                <p class="text-muted mb-0">{{ $studentDetails['sd_no_of_installments']}}</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Parent details -->
                        <div class="mb-4">
                            <div class="bg-dark py-2 px-3">
                                <h6 class="text-light mb-0">Parent Details</h6>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last name</th>
                                        <th scope="col">NIC</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Occupation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @if(isset($studentDetails['parent_data'][0]))
                                        <tr>
                                            <td><b>Father</b></td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_father_first_name'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_father_last_name'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_father_nic'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_father_contact_official'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_father_occupation'] ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Mother</b></td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_mother_first_name'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_mother_last_name'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_mother_nic'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_mother_contact_official'] ?? '' }}</td>
                                            <td>{{ $studentDetails['parent_data'][0]['sp_mother_occupation'] ?? '' }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="6">No parent data available</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <!-- Attachments details -->
                        <div class="mb-3">
                            <div class="bg-dark py-2 px-3">
                                <h6 class="text-light mb-0">Attachments </h6>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Birth Certificate</td>
                                        <td><a target="_blank" href="" class="btn btn-secondary btn-sm">View</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Student View -->
        <div class="back_btn">
            <button class="btn btn-secondary" onclick="history.back()"><i class="fa-solid fa-chevron-left me-2"></i> Back</button>
        </div>
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

@endsection