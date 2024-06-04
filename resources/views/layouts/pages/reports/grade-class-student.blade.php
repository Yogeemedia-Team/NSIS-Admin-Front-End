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
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Students Report</h5>
                    </div>
                    <div class="col-md-6 align-self-center text-end">
                        <a href="{{ route('add_student_payment') }}" class="btn btn-primary mb-0"><i class="fa-solid fa-download me-2"></i> Download</a>
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
                                    <label for="class" class="col-form-label">Year/Grade/Class</label>
                                    <select class="form-select pe-5" name="master_grade_id">
                                        <option selected  value="">Select Grade</option>
                                        @if(isset($grades))
                                        @foreach($grades as $grade)
                                        <option value="{{$grade['id']}}" >{{ $grade['grade_name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Year/Class/Grade</label>
                                    <select class="form-select pe-5" name="master_class_id">
                                    <option selected  value="">Select Class</option>
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
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table  class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                            <th class="px-2">Admission No</th>
                            <th class="px-2">Year/Grade/Class</th>
                            <th class="px-2">First Name</th>
                            <th class="px-2">Last Name</th>
                            <th class="px-2">Whatapp No</th>
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
                                <td>{{ $student['sd_first_name'] }}</td>
                                <td>{{ $student['sd_last_name'] }}</td>
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
                        ' <td>'+ student['sd_first_name'] +'</td>'+
                        ' <td>'+ student['sd_last_name'] +'</td>'+
                        ' <td>'+ student['sd_telephone_whatsapp'] +'</td>'+
                        ' <td>'+ student['sd_telephone_mobile']+'</td>';


                });

               
            console.log(accordionItem);
            $('#transactionAccordion').append(accordionItem);
        }


    });


</script>

@endsection