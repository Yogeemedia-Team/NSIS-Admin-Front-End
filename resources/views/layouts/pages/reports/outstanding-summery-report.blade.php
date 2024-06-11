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
                        <h5 class="font-weight-bolder text-white mb-0">Outstanding Summery</h5>
                    </div>
                    <div class="col-md-6 align-self-center text-end">
                        <a type="button" id="downloadButton" class="btn btn-primary mb-0"><i class="fa-solid fa-download me-2"></i> Download</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form class="needs-validation" novalidate id="searchForm" method="POST" action="{{ route('student_outstanding_summery_search') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="admission_no" class="col-form-label">Admission No</label>
                                    <input type="text" class="form-control" value="{{ $apiData['admission_no'] ?? null }}" name="admission_no" required>
                                </div>

                                <!-- due_date -->
                                <div class="col-md-2">
                                    <label for="admission_id" class="col-form-label">From Date</label>
                                    <input type="date" class="form-control" value="{{ $apiData['from_date'] ?? '' }}" name="from_date" id="from_date">
                                </div>
                                <!-- due_date -->
                                <div class="col-md-2">
                                    <label for="admission_id" class="col-form-label">To Date</label>
                                    <input type="date" class="form-control" value="{{ $apiData['to_date'] ?? '' }}" name="to_date" id="to_date">
                                </div>
                                <div class="col-md-1 align-self-end">
                                    <button type="submit" class="btn btn-primary mb-0">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body pt-0"id="TransactionSummery">
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
                        <p class="mb-0 fs-5 text-black text-center fw-bold text-capitalize">Outstanding Summery</p>
                    </div>
                    <div class="row px-1 invoice-address py-1">
                        <div class="col-md-6 text-start">
                            <p class="mb-0 fs-6 text-black ">Admission No: <span id="lblAdmissionNo" class="fw-bold"></span></p>
                            <p class="mb-0 fs-6 text-black ">From Date: <span id="lblFromDate" class="fw-bold" ></span></p>
                            <p class="mb-0 fs-6 text-black ">To Date: <span id="lblToDate" class="fw-bold" ></span></p>
                        </div>
                        <div class="col-md-6 text-end py-1">
                        <p class="mb-0 fs-6 text-black fw-light">Issued {{ \Carbon\Carbon::now()->format('M d Y') }}</p>
                        </div>
                    </div>
                   
                </div>
                <div class="p-2 shadow col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered main-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice No</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($outstandingSummery))
                                @if(Count($outstandingSummery) != 0)
                                @foreach ($outstandingSummery as $key => $outstanding)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $outstanding['invoice_number'] }}</td>
                                    <td>{{ $outstanding['status']== 0 ? "Pending" : ($outstanding['status'] == 1 ? "Completed" : "Partial Paid") }}</td>
                                    <td class="text-end" >Rs.{{ $outstanding['invoice_total'] }}</td>
                                </tr>
                                <tr>
                                    <td class="px-0" colspan="4">
                                        <table class="table table-striped table-bordered payable-table nested-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Payable No</th>
                                                    <th>Discretion</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($outstanding['account_paybles'] as $payable)
                                                <tr>
                                                    <td>*</td>
                                                    <td>{{ $payable['id'] }}</td>
                                                    <td>{{ $payable['type'] }}</td>
                                                    <td>{{ $payable['due_date'] }}</td>
                                                    <td>{{ $payable['status']== 0 ? "Pending" : ($payable['status'] == 1 ? "Completed" : "Partial Paid") }}</td>
                                                    <td class="text-end" >Rs. {{ $payable['amount'] }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center  px-0" colspan="4">No Data</td>
                                </tr>
                                @endif
                                @else
                                <tr>
                                    <td class="text-center px-0" colspan="4">No Data</td>
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
    <!-- Students table -->
    </div>
    @include('components/footer-ui')
</main>

@endsection
@section('footer-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>



<!-- print pdf -->
<script>
    $(document).ready(function() {
        $("#downloadButton").click(function() {
            $("#loader").removeClass('d-none');
            $("#downloadButton").addClass('d-none');
            $("#hiddenContent").removeClass('d-none');
         
            $("#lblAdmissionNo").text($('[name="admission_no"]').val());
            $("#lblFromDate").text($('[name="from_date"]').val());
            $("#lblToDate").text($('[name="to_date"]').val());

            // Get the HTML content of the element to be converted to PDF
            var content = document.getElementById("TransactionSummery");

            // Use html2pdf to convert HTML content to PDF
            html2pdf(content, {
                margin: 10,
                filename: 'outstanding_summery.pdf',
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