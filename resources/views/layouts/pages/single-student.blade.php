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
        <!-- Single Student View -->
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 move-on-hover">
                    <div class="card-body text-center">
                        <div class="blur-shadow-avatar">
                            <img class="avatar avatar-xxl shadow-lg" src="{{ asset("storage/".$studentDetails['data']['sd_profile_picture']) }}" alt="avatar">
                        </div>
                        <h5 class="my-3">Name : {{ $studentDetails['data']['sd_first_name']  .' '.$studentDetails['data']['sd_last_name'] }}</h5>
                        @php
                        $classes = ['4-A', '5-C', '6-D', '7-F'];
                        $randomKey = $classes[array_rand($classes)];
                        @endphp
                        <p class="text-muted mb-1">Class : {{ $randomKey }}</p>
                        <p class="text-muted mb-4">Admission No. : {{ $studentDetails['data']['sd_admission_no']}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a target="_blank" href="https://wa.me/{{ $studentDetails['data']['sd_telephone_whatsapp'] }}" class="btn btn-primary mb-0" style="background-color: #25D366 !important;border-color:#25D366 !important;"><i class="fa-brands fa-whatsapp me-1"></i> Watsapp</a>
                            <a href="mailto:{{ $studentDetails['data']['sd_email_address']  }}" class="btn btn-outline-primary ms-1 mb-0"><i class="fa-solid fa-envelope me-1"></i>Email</a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 move-on-hover">
                    <div class="card-header pb-0">
                        <div class="text-dark fw-bold">
                            Insights
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        </p>
                        <p class="mb-2">Attendance</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-2" >Payments</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-2" >Marks Average</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="mt-4 mb-2" >Extra Curricular</p>
                        <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-dark fw-bold">
                                    Profile informations
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <button class="btn btn-secondary px-3 py-2 mb-0" onclick="history.back()"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                            </div>
                        </div>

                    </div>
                    <div class="card-body pt-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ $studentDetails['data']['sd_first_name'] ?? ''  .' '.$studentDetails['data']['sd_last_name'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Name With Initials:</strong> &nbsp; {{ $studentDetails['data']['sd_name_with_initials'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Gender:</strong> &nbsp; {{ $studentDetails['data']['sd_gender'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp; {{ $studentDetails['data']['sd_address_line1'] ?? '' .', '.$studentDetails['data']['sd_address_line2'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Telephone:</strong> &nbsp; {{ $studentDetails['data']['sd_telephone_residence'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $studentDetails['data']['sd_telephone_mobile'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">WhatsApp Number:</strong> &nbsp; {{ $studentDetails['data']['sd_telephone_whatsapp'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $studentDetails['data']['sd_email_address'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Date of Birth:</strong> &nbsp; {{ $studentDetails['data']['sd_date_of_birth'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Religion:</strong> &nbsp; {{ $studentDetails['data']['sd_religion'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Ethnicity:</strong> &nbsp; {{ $studentDetails['data']['sd_ethnicity'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Birth Certificate No:</strong> &nbsp; {{ $studentDetails['data']['sd_birth_certificate_number'] ?? '' }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Health Conditions:</strong> &nbsp; <span class="badge badge-success text-dark">{{ $studentDetails['data']['sd_health_conditions'] ?? '' }}</span></li>
                        </ul>


                    </div>
                    <div class="card-header py-0">
                        <div class="text-dark fw-bold">Parent Details</div>
                    </div>
                    <div class="card-body pt-1">
                        <!-- Parent details -->
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="px-1 text-sm ps-0">Parent</th>
                                        <th class="px-1 text-sm">First Name</th>
                                        <th class="px-1 text-sm">Last name</th>
                                        <th class="px-1 text-sm">NIC</th>
                                        <th class="px-1 text-sm">Mobile</th>
                                        <th class="px-1 text-sm">Occupation</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if(isset($studentDetails['data']['parent_data']))
                                    <tr>
                                        <td class="text-sm ps-0"><b>Father</b></td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_father_first_name'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_father_last_name'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_father_nic'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_father_contact_official'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_father_occupation'] ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-sm ps-0"><b>Mother</b></td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_mother_first_name'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_mother_last_name'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_mother_nic'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_mother_contact_official'] ?? '' }}</td>
                                        <td class="text-sm">{{ $studentDetails['data']['parent_data'][0]['sp_mother_occupation'] ?? '' }}</td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td colspan="6">No parent data available</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-header py-0">
                        <div class="text-dark fw-bold">Attachments</div>
                    </div>
                    <div class="card-body pt-1">
                        <!-- Attachments details -->
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="px-1 text-sm ps-0">Name</th>
                                        <th class="px-1 text-sm text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($studentDetails['data']['documents']) && is_array($studentDetails['data']['documents']))
                                    @foreach($studentDetails['data']['documents'][0] as $key => $value)
                                    @if (strpos($key, 'sd_') === 0)
                                    <tr>
                                        <td class="text-sm ps-0">{{ ucwords(str_replace('_', ' ', str_replace('sd_', '', $key))) }}</td>
                                        <td class="text-sm text-end">
                                            <a target="_blank" href="{{ asset("storage/".$value) }}" class="btn btn-warning m-0 py-1 px-2"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3">No attachment data available</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
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