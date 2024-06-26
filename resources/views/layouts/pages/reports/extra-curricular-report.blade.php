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
                <!-- Loader content, e.g., spinner -->
                <div class="spinner"></div>
            </div>
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Student Extra Curricular Report</h5>
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
                                    <label for="class" class="col-form-label">Extra Curricular</label>
                                    <select class="form-select pe-5" name="extra_curricular_id">
                                        <option selected value="">Select Extra Curricular</option>
                                        @if(isset($extraCurriculars))
                                        @foreach($extraCurriculars as $extraCurricular)
                                        <option value="{{$extraCurricular['id']}}" >{{ $extraCurricular['extracurricular_name'] }}</option>
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
            <div class="card-body pt-0" id="CurricularSummery">
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
                            <p class="mb-0 fs-5 text-black text-center fw-bold text-capitalize">Student Extra Curricular Report</p>
                        </div>
                    <div class="row px-1 invoice-address py-1">
                        <div class="col-md-6 text-start">
                            <p class="mb-0 fs-6 text-black ">Extra Curricular: <span id="lblExtraCurricular" class="fw-bold"></span></p>
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
                                <td>{{ $student['sd_first_name']." ". $student['sd_last_name']}}</td>
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
             
            var endPoint = 'reports/student_extra_curriculars?extra_curricular_id=' +$('[name="extra_curricular_id"]').val();

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
                       ' <td>'+ student['sd_first_name']+' '+student['sd_last_name'] +'</td>'+
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
            $("#lblExtraCurricular").text($('[name="extra_curricular_id"] option:selected').text());

            var content = document.getElementById("CurricularSummery");
            html2pdf(content, {
                margin: 10,
                filename: 'extra_curricular_summery.pdf',
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