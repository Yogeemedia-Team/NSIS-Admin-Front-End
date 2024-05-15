@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    @include('components/header-ui')
    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        @include('components/session-section')

        <div class="card">
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Promote Students</h5>
                    </div>
                    <div class="col-md-6 text-end">
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <!-- <form id="searchForm" method="POST" action=" {{ route('student-upgrade-ui-search') }} "> -->
                        <form>
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Current Year/Class/Grade</label>
                                    <select id="currentYearClass" class="form-select pe-5" name="sd_year_grade_class_id">
                                        @if(isset($year_grades))
                                        <option selected disabled> Select Year / Class / Grade</option>
                                        @foreach($year_grades as $year_grade)
                                        <option value="{{$year_grade['id']}}">{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3 promoteYearClassDivAndDefaultMonthlyFee d-none">
                                    <label for="class" class="col-form-label">Promote Year/Class/Grade</label>
                                    <select id="promoteYearClass" class="form-select pe-5" name="promote_sd_year_grade_class_id" required>
                                    </select>
                                </div>
                                <div class="col-md-3 promoteYearClassDivAndDefaultMonthlyFee d-none">
                                    <label for="default_monthly_fee" class="col-form-label">Default Monthly Fee</label>
                                    <input id="defaultMonthlyFee" type="number" class="form-control" name="default_monthly_fee" min="0" required>
                                </div>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="studentTableSection" class="card-body pt-0 d-none">
            <form id="studentForm" method="POST" action=" {{ route('student-upgrade-form') }} ">
                @csrf
                <div class="table-responsive">
                    <table id="studentTable" class="table table-striped table-bordered " style="width:100%">
                        <thead>
                            <tr>
                                <th class="px-2">Admission No</th>
                                <th class="px-2">First Name</th>
                                <th class="px-2">Last Name</th>
                                <th class="px-2">Whatapp No</th>
                                <th class="px-2">Mobile</th>
                                <th class="px-2">Current Monthly Fee</th>
                                <th class="px-2">New Monthly Fee</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-2 offset-10 px-3 text-end">
                        <input type="hidden" name="promote_sd_year_grade_class_id" id="promote_sd_year_grade_class_id" value="">
                        <input type="hidden" name="prev_sd_year_grade_class_id" id="prev_sd_year_grade_class_id" value="">
                        <button type="submit" class="btn btn-success mb-0">Promote</button>
                    </div>
                </div>
            </form>



        </div>
    </div>
    </div>
    @include('components/footer-ui')
</main>

@endsection
@section('footer-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#currentYearClass').change(function() {
            var currentYearClass = $(this).val();
            $('#promote_sd_year_grade_class_id').val(null);
            $('#defaultMonthlyFee').val(null);
            $('.addDefaultAmount').val(null);
            $.ajax({
                type: "POST",
                url: "{{ route('student-upgrade-ui-search') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    sd_year_grade_class_id: currentYearClass
                },
                success: function(data) {

                    $('#studentTable tbody').html('');
                    if (data.data.length == 0) {
                        $('#studentTableSection').addClass('d-none');
                        $('.promoteYearClassDivAndDefaultMonthlyFee').addClass('d-none');
                        Swal.fire({
                            icon: 'warning',
                            html: 'No Data Found'
                        });
                        return;
                    }
                    $('#studentTableSection').removeClass('d-none');
                    $('.promoteYearClassDivAndDefaultMonthlyFee').removeClass('d-none');
                    $.each(data.data, function(index, student) {
                        $('#studentTable tbody').append(`
                                <tr>
                                    <td>${student['sd_admission_no']}</td>
                                    <td>${student['sd_first_name']}</td>
                                    <td>${student['sd_last_name']}</td>
                                    <td>${student['sd_telephone_whatsapp']}</td>
                                    <td>${student['sd_telephone_mobile']}</td>
                                    <td>${student['monthly_fee']}</td>
                                    <td>
                                        <input type="number" class="form-control addDefaultAmount" value="${student['default_monthly_fee'] ?? data.default_monthly_fee}" name="default_monthly_fee_${student['student_id']}" min="0" required>
                                        <input type="text" value="${student['student_id']}" name="student_id_${student['student_id']}" hidden>
                                    </td>
                                </tr>
                            `);
                    });
                    getPromoteYearClass();
                }
            })
        })

        function getPromoteYearClass() {
            var currentYearClass = $('#currentYearClass').val();
            $('#prev_sd_year_grade_class_id').val(currentYearClass);
            $.ajax({
                type: "GET",
                url: "{{ route('get-year-grade-class') }}",
                success: function(data) {
                    $('#promoteYearClass').html('');
                    $('#promoteYearClass').append(`<option selected disabled> Select Year / Class / Grade </option>`);
                    $.each(data.data, function(index, year) {
                        if (currentYearClass != year['id']) {
                            $('#promoteYearClass').append(`<option value="${year['id']}">${year['year']} - ${year['grade']['grade_name']} - ${year['class']['class_name']}</option>`);
                        }
                    })
                }
            })
        }

        $('#promoteYearClass').change(function() {
            $('#promote_sd_year_grade_class_id').val($(this).val());
        })

        $('#defaultMonthlyFee').on('input', function() {
            $('.addDefaultAmount').val($(this).val());
        });

        $('#studentForm').submit(function(e) {
            e.preventDefault();
            var promote_sd_year_grade_class_id = $('#promote_sd_year_grade_class_id').val();
            if (promote_sd_year_grade_class_id == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: 'Please Select Promote Year / Class / Grade'
                });
                return false;
            } else {
                $(this).unbind('submit').submit();
            }
        });
    })
</script>
@endsection