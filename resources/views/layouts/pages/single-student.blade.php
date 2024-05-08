@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    @include('components/header-ui')
    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        <!-- Single Student View -->
        @include('components/session-section')
        <div class="card">

            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Student Information</h5>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card-body pt-3">
                        <h6 class="mb-3">Personal Details</h6>

                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Full Name</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_first_name'] ?? ''  .' '.$studentDetails['data']['sd_last_name'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Name With Initials</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_name_with_initials'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">

                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Gender</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_gender'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Address</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_address_line1'] ?? '' .', '.$studentDetails['data']['sd_address_line2'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Telephone</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_telephone_residence'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Mobile</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_telephone_mobile'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">WhatsApp Number</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_telephone_whatsapp'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Email</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_email_address'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Date of Birth</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_date_of_birth'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Religion</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_religion'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Ethnicity</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_ethnicity'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Birth Certificate No</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_birth_certificate_number'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">
                        <div class="row">
                            <div class="col-md-3">
                                <h6 class="text-dark">Health Conditions</h6>
                            </div>
                            <div class="col-md-9 align-self-center">
                                <p class="mb-0">: {{ $studentDetails['data']['sd_health_conditions'] ?? '' }}</p>
                            </div>
                        </div>
                        <hr class="bg-dark my-1">

                    </div>
                </div>
                <div class="col-md-4 offset-1 align-self-center">
                    <div class="card-body text-center">
                        <div class="blur-shadow-avatar">
                            <img class="avatar shadow-lg w-100 h-100" src="{{ asset("storage/".$studentDetails['data']['sd_profile_picture']) }}" alt="avatar">
                        </div>
                        <h5 class="my-3">Name : {{ $studentDetails['data']['sd_first_name']  .' '.$studentDetails['data']['sd_last_name'] }}</h5>
                        <p class="text-muted mb-1">Class : {{ $studentDetails['data']['year_class_data'] != null 
                            &&  $studentDetails['data']['year_class_data']['class'] != null 
                            && $studentDetails['data']['year_class_data']['class']['class_name'] != null ? $studentDetails['data']['year_class_data']['class']['class_name'] : ''  }}</p>
                        <p class="text-muted mb-4">Admission No. : {{ $studentDetails['data']['sd_admission_no']}}</p>
                        <div class="d-flex justify-content-center mb-2">
                            <a target="_blank" href="https://wa.me/{{ $studentDetails['data']['sd_telephone_whatsapp'] }}" class="btn btn-primary mb-0" style="background-color: #25D366 !important;border-color:#25D366 !important;"><i class="fa-brands fa-whatsapp me-1"></i> Watsapp</a>
                            <a href="mailto:{{ $studentDetails['data']['sd_email_address']  }}" class="btn btn-outline-primary ms-1 mb-0"><i class="fa-solid fa-envelope me-1"></i>Email</a>
                        </div>
                    </div>
                </div>
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

                            @if(isset($studentDetails['data']['parent_data']) && isset($studentDetails['data']['parent_data'][0]))
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
                <div class="text-dark fw-bold">Siblings Details</div>
            </div>

            <div class="card-body pt-1">
                <!-- Parent details -->
                @if(isset($studentDetails['data']['sibling_data'][0]) &&
                isset($studentDetails['data']['sibling_data'][0]['ss_details']) &&
                !empty($studentDetails['data']['sibling_data'][0]['ss_details']))
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead>
                            <tr>
                                <th class="px-1 text-sm">First Name</th>
                                <th class="px-1 text-sm">Last name</th>
                                <th class="px-1 text-sm">Gender</th>
                                <th class="px-1 text-sm">Date of Birth</th>
                                <th class="px-1 text-sm">School</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- Decode the JSON string into an array --}}
                            @php
                            $siblingData = json_decode($studentDetails['data']['sibling_data'][0]['ss_details'], true)

                            @endphp

                            {{-- Loop through sibling data --}}
                            @foreach($siblingData as $index => $sibling)
                            @if(isset($sibling['first_name']) &&
                            isset($sibling['last_name']) &&
                            isset($sibling['sex']) &&
                            isset($sibling['date_of_birth']) &&
                            isset($sibling['school']))
                            <tr>
                                <td class="text-sm ps-0">{{ $sibling['first_name'] }}</td>
                                <td class="text-sm">{{ $sibling['last_name'] }}</td>
                                <td class="text-sm">{{ $sibling['sex'] }}</td>
                                <td class="text-sm">{{ $sibling['date_of_birth'] }}</td>
                                <td class="text-sm">{{ $sibling['school'] }}</td>
                            </tr>
                            @endif

                            @endforeach

                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            <div class="card-header py-0">
                <div class="text-dark fw-bold">Attachments</div>
            </div>

            <div class="card-body pt-1">
                <!-- Attachments details -->
                @if(isset($studentDetails['data']['documents']) && is_array($studentDetails['data']['documents']) && !empty($studentDetails['data']['documents'][0]))
                <div class="row">
                    @foreach($studentDetails['data']['documents'][0] as $key => $value)
                    @if (strpos($key, 'sd_') === 0)
                    <div class="col-md-3 bg-white">
                        <a href="{{ asset("storage/".$value) }}" class="btn bg-white">
                            <img src="{{ asset('assets/img/form_img/attachments.png') }}" class="w-15" alt="...">

                            <p class="pt-2">{{ ucwords(str_replace('_', ' ', str_replace('sd_', '', $key))) }}</p>
                        </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @else
                <p colspan="3">No attachment data available</p>
                @endif
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">

        </div>
    </footer>
</main>

@endsection
@section('footer-scripts')

@endsection