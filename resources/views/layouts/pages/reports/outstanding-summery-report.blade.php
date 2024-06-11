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

            <div class="card-body pt-0">
                <div id="TransactionSummery" class="p-2 shadow col-sm-12">
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
                                    <td>{{ $outstanding['invoice_total'] }}</td>
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
                                                    <td>Rs. {{ $payable['amount'] }}</td>
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
            $("#downloadButton").addClass('d-none');

            // Get the HTML content of the element to be converted to PDF
            var content = document.getElementById("TransactionSummery");

            // Use html2pdf to convert HTML content to PDF
            html2pdf(content, {
                margin: 10,
                filename: 'transaction_summery.pdf',
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
            });
        });
    });
</script>

@endsection