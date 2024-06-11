@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    @include('components/header-ui')
    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        <!-- Students table -->
        @include('components/session-section')
        <div class="card">
        <div id="loader" class="loader d-none">
                <div class="spinner"></div>
            </div>
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Students Report</h5>
                    </div>
                    <div class="col-md-6 align-self-center text-end">
                       <a type="button" id="downloadButton" class="btn btn-primary mb-0"><i class="fa-solid fa-download me-2"></i> Download</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form id="searchForm" method="POST" action="#">
                            @csrf
                            <div class="row">
                            <div class="col-md-3">
                                    <label for="class" class="col-form-label">Year</label>
                                    <select class="form-select pe-5" name="year">
                                        <option value="2023">2019</option>
                                        <option value="2023">2021</option>
                                        <option value="2023">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024" selected>2024</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Grade</label>
                                    <select class="form-select pe-5" name="master_grade_id">
                                        <option selected  value="">All</option>
                                        @if(isset($grades))
                                        @foreach($grades as $grade)
                                        <option value="{{$grade['id']}}" >{{ $grade['grade_name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Class</label>
                                    <select class="form-select pe-5" name="master_class_id">
                                    <option selected  value="">All</option>
                                        @if(isset($classes))
                                        @foreach($classes as $class)
                                        <option value="{{$class['id']}}" >{{ $class['class_name']  }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-1 align-self-end">
                                    <button type="submit" class="btn btn-primary mb-0">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body pt-0" id="StudentSummery">
                <div id="hiddenContent" class="d-none">
                    <div class="row px-1 invoice-header py-2">
                        <div class="col-md-2 text-center align-self-center">
                            <img src="{{ asset('assets/img/nsis.png') }}" class="w-50 shadow rounded-circle" alt="logo">
                        </div>
                        <div class="col-md-8 align-self-center">
                            <p class="mb-0 fs-5 text-black fw-bold text-capitalize">negombo south international school</p>
                            <p class="mb-0 fs-6 text-black fw-light text-capitalize">nittambuwa branch</p>
                        </div>
                    </div>
                    <hr class="bg-black my-1">
                        <div class="row align-self-center text-center">
                            <p class="mb-0 fs-5 text-black text-center fw-bold text-capitalize">Students Report</p>
                        </div>
                    <div class="row px-1 invoice-address py-1">
                        <div class="col-md-6 text-start">
                            <p class="mb-0 fs-6 text-black ">Year: <span id="lblYear" class="fw-bold"></span></p>
                            <p class="mb-0 fs-6 text-black ">Grade: <span id="lblGrade" class="fw-bold" ></span></p>
                            <p class="mb-0 fs-6 text-black ">Class: <span id="lblClass" class="fw-bold" ></span></p>
                        </div>
                        <div class="col-md-6 text-end py-1">
                        <p class="mb-0 fs-6 text-black fw-light">Issued {{ \Carbon\Carbon::now()->format('M d Y') }}</p>
                        </div>
                    </div>
                   
                </div>
                <div class="table-responsive">
                    <table  class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                            <th class="px-2">Admission No</th>
                            <th class="px-2">Year/Grade/Class</th>
                            <th class="px-2">Name</th>
                            <th class="px-2">Whatapp</th>
                            <th class="px-2">Mobile</th>
                            </tr>
                        </thead>
                        <tbody id="transactionAccordion">
                            @if(isset($studentDetails) && count($studentDetails) > 0)
                            
                            @foreach($studentDetails as $student)
                            @php
                            $year_grade = $student['year_grade_class'];
                            @endphp
                            <tr>
                                <td>{{ $student['sd_admission_no'] }}</td>
                                <td>{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</td>
                                <td>{{ $student['sd_first_name'] ." ". $student['sd_last_name']  }}</td>
                                <td>{{ $student['sd_telephone_whatsapp'] }}</td>
                                <td>{{ $student['sd_telephone_mobile'] }}</td>
                                
                            </tr>
                            
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

        </div>


    </div>
    </div>
    <!-- Students table -->
    </div>
    @include('components/footer-ui')
</main>

@endsection
@section('footer-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>


<script>
    $(document).ready(function() {
        var accordionItem = '';
        $('#searchForm').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();
             
            var endPoint = 'reports/grade_class_student?year=' +$('[name="year"]').val()+ '&master_grade_id=' + $('[name="master_grade_id"]').val() + '&master_class_id='+ $('[name="master_class_id"]').val();

            // Set your Bearer token
            var token = @json($token);
            var api = '{{ env("API_URL") }}'

            // Make an Ajax request with the Bearer token
            $.ajax({
                type: 'GET',
                url: api + '/' + endPoint,
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Handle the response data and update the UI as needed
                    console.log(response);
                    updateUI(response);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        function updateUI(response) {
            $('#transactionAccordion').empty();
            accordionItem = "";
            $.each(response.data, function(index, student) {
               
               
                var year_grade = student['year_grade_class'];
               
                accordionItem +=  ' <tr>'+
                        ' <td>'+ student['sd_admission_no']+'</td>'+
                        ' <td>'+ year_grade['year']+' - '+ year_grade['grade']['grade_name']+' - '+ year_grade['class']['class_name']+'</td>'+
                        ' <td>'+ student['sd_first_name']+' '+ student['sd_last_name'] +'</td>'+
                        ' <td>'+ student['sd_telephone_whatsapp'] +'</td>'+
                        ' <td>'+ student['sd_telephone_mobile']+'</td>';


                });

               
            console.log(accordionItem);
            $('#transactionAccordion').append(accordionItem);
        }
        $("#downloadButton").click(function() {
            $("#loader").removeClass('d-none');
            $("#downloadButton").addClass('d-none');
            $("#hiddenContent").removeClass('d-none');
         
            // Get the current date and format it
            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleString('default', { month: 'short' }) + ' ' + currentDate.getDate() + ' ' + currentDate.getFullYear();

            // Add the formatted date to the hidden content
            $("#lblYear").text($('[name="year"]').val());
            $("#lblGrade").text($('[name="master_grade_id"] option:selected').text());
            $("#lblClass").text($('[name="master_class_id"] option:selected').text());

            var content = document.getElementById("StudentSummery");
            html2pdf(content, {
                margin: 10,
                filename: 'students_summery.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    dpi: 192,
                    letterRendering: true
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                },
                pagebreak: {
                    mode: ['avoid-all', 'css', 'legacy']
                }
            }).then(function() {
                $("#downloadButton").removeClass('d-none');
                $("#hiddenContent").addClass('d-none');
                $("#loader").addClass('d-none');
            });
    });

    });


</script>

@endsection