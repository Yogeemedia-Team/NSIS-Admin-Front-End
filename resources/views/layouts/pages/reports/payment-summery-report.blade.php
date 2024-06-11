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
                        <h5 class="font-weight-bolder text-white mb-0">Students Transaction Summery</h5>
                    </div>
                    <div class="col-md-6 align-self-center text-end">
                        <a type="button" id="downloadButton" class="btn btn-primary mb-0"><i class="fa-solid fa-download me-2"></i> Download</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form class="needs-validation" novalidate id="searchForm" method="POST" action="{{ route('student_transaction_summery_search') }}">
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

            <div class="card-body pt-0" id="TransactionSummery">
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
                        <p class="mb-0 fs-5 text-black text-center fw-bold text-capitalize">Student Payment Summery Report</p>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered main-table">
                            <thead>
                                <tr>
                                    <th class="col-sm">#</th>
                                    <th class="col-sm">Transaction No</th>
                                    <th class="col-sm">Payment Term</th>
                                    <th class="col-sm">Payment Date</th>
                                    <th class="col-sm">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if (!function_exists('splitTextIntoTwo')) {
                                        function splitTextIntoTwo($text) {
                                            try {
                                                $length = strlen($text);
                                                $middle = ceil($length / 2);
                                                $part1 = substr($text, 0, $middle);
                                                $part2 = substr($text, $middle);
                                                return $part1.'<br>'.$part2;
                                            } catch (\Exception $e) {
                                                // Handle the exception, log it, or return a default value
                                                return $text;
                                            }
                                        }
                                    }
                                @endphp
                                @if(isset($transactionSummery))
                                @if(Count($transactionSummery) != 0)
                                @foreach ($transactionSummery as $key => $transaction)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td style="font-size: small;">{!! splitTextIntoTwo($transaction['payment_id']) !!}</td>
                                    <td>{{ $transaction['paid_from'] }}</td>
                                    <td>{{ $transaction['date'] }}</td>
                                    <td class="text-end">Rs. {{ $transaction['total_due'] }}</td>
                                </tr>
                                <tr>
                                    <td class="px-0" colspan="5">
                                        <table class="table table-striped table-bordered invoice-table nested-table">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Invoice No</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($transaction['invoice_list'] as $invoice)
                                                <tr>
                                                   
                                                    <td>{{ $invoice['invoice_number'] }}</td>
                                                    <td>{{ $invoice['status']== 0 ? "Pending" : ($invoice['status'] == 1 ? "Completed" : "Partial Paid") }}</td>
                                                    <td class="text-end">Rs. {{ $invoice['invoice_total'] }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="px-0" colspan="4">
                                                        <table class="table table-striped table-bordered payable-table nested-table">
                                                            <thead>
                                                                <tr>
                                                                    
                                                                    <th>No</th>
                                                                    <th>Discretion</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                    <th>Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($invoice['account_paybles'] as $payable)
                                                                <tr>
                                                                    
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
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td class="text-center  px-0" colspan="5">No Data</td>
                                </tr>
                                @endif
                                @else
                                <tr>
                                    <td class="text-center px-0" colspan="5">No Data</td>
                                </tr>
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



<!-- print pdf -->
<script>
    $(document).ready(function() {

  


        $("#downloadButton").click(function() {
            $("#loader").removeClass('d-none');
            $("#downloadButton").addClass('d-none');
            $("#hiddenContent").removeClass('d-none');
         

            var currentDate = new Date();
            var formattedDate = currentDate.toLocaleString('default', { month: 'short' }) + ' ' + currentDate.getDate() + ' ' + currentDate.getFullYear();

            // Add the formatted date to the hidden content
            $("#lblAdmissionNo").text($('[name="admission_no"]').val());
            $("#lblFromDate").text($('[name="from_date"]').val());
            $("#lblToDate").text($('[name="to_date"]').val());

            var content = document.getElementById("TransactionSummery");

            // Use html2pdf to convert HTML content to PDF
            html2pdf(content, {
                margin: 10,
                filename: $('[name="admission_no"]').val() + '_transaction_summery.pdf',
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