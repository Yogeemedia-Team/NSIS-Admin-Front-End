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
                        <form id="searchForm" method="POST" action=" {{ route('student-upgrade-ui-search') }} ">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Year/Class/Grade</label>
                                    <select class="form-select pe-5" name="sd_year_grade_class_id">
                                        @if(isset($year_grades))
                                        @foreach($year_grades as $year_grade)
                                        <option value="{{$year_grade['id']}}" {{ $apiData['sd_year_grade_class_id'] == $year_grade['id'] ? 'selected' : ''}}>{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="default_monthly_fee" class="col-form-label">Default Monthly Fee</label>
                                    <input type="number" class="form-control" value="{{ $apiData['default_monthly_fee'] ?? null }}" name="default_monthly_fee" min="0" required>
                                </div>
                                <div class="col-md-2 align-self-end">
                                    <button type="submit" class="btn btn-primary mb-0">Get Results</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form method="POST" action=" {{ route('student-upgrade-form') }} ">

                <div class="card-header pt-0">
                    <div class="row">
                        <div class="col">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Promote Year/Class/Grade</label>
                                    <select class="form-select pe-5" name="promote_sd_year_grade_class_id" required>
                                        @if(isset($year_grades))
                                        @foreach($year_grades as $year_grade)
                                        <option value="{{$year_grade['id']}}" {{ $apiData['promote_sd_year_grade_class_id'] == $year_grade['id'] ? 'selected' : ''}}>{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <input type="text" name="sd_year_grade_class_id" hidden value="{{ $apiData['sd_year_grade_class_id'] }}">
                                </div>

                                <div class="col-md-1 align-self-end">
                                    <button type="submit" class="btn btn-success mb-0">Promote</button>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Please fill out this form carefully.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">

                    <div class="table-responsive">
                        <table id="dataTable" class="table table-striped" style="width:100%">
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
                                @foreach($studentDetails as $student)
                                <tr>
                                    <td>{{ $student['sd_admission_no'] }}</td>
                                    <td>{{ $student['sd_first_name'] }}</td>
                                    <td>{{ $student['sd_last_name'] }}</td>
                                    <td>{{ $student['sd_telephone_whatsapp'] }}</td>
                                    <td>{{ $student['sd_telephone_mobile'] }}</td>
                                    <td></td>
                                    <td>
                                        <input type="number" class="form-control" value="{{ $apiData['default_monthly_fee'] ?? null }}" name="default_monthly_fee_{{ $student['student_id'] }}" min="0" required>
                                        <input type="text" value="{{ $student['student_id'] }}" name="student_id_{{ $student['student_id'] }}" hidden>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </form>

        </div>
    </div>
    @include('components/footer-ui')
</main>

@endsection