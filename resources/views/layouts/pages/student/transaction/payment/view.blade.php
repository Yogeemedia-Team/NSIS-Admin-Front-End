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
                        <h5 class="font-weight-bolder text-white mb-0">Student Transaction View</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row px-1 invoice-address py-1">
                    <div class="col-md-6 text-start">
                        <p class="mb-0 fs-6 text-black fw-bold">Admission No : {{ $details['admission_no']}}</p>
                        <p class="mb-0 fs-6 text-black fw-bold">Student Name : {{ $details['sd_name_with_initials']}}</p>
                        <p class="mb-0 fs-6 text-black fw-bold">Transaction No : {{ $details['payment_id']}}</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p class="mb-0 fs-6 text-black fw-bold text-capitalize">Paid Date : {{ $details['date']}}</p>
                        <p class="mb-0 fs-6 text-black fw-bold text-capitalize">Payment Term : {{ $details['paid_from']}}</p>
                        <p class="mb-0 fs-6 text-black fw-bold text-capitalize">Amount : Rs.{{ $details['total_due']}}</p>
                        <p class="mb-0 fs-6 text-black fw-bold text-capitalize">Status : {{ isset($details['status']) ? ($details['status'] == 0 ? "New" : ($details['status'] == 1 ? "Paid" : "Partial Paid")) : "Unknown" }}</p>
                    </div>
                </div>

                <div class="row py-2">
                    @foreach($details['invoiceDetails'] as $key => $header)
                    <div class="show-payments py-2">
                        <a data-bs-toggle="collapse" href="#collapse{{ $key }}" role="button" aria-expanded="false" aria-controls="collapse{{ $key }}">
                            <div class="row bg-success bg-gradient rounded-5 p-1">
                                <div class="col-6 align-self-baseline">
                                    <p class="mb-0 fs-5 text-white fw-light">Invoice No : {{ $header['invoice_number']}} </p>
                                </div>
                                <div class="col-4 text-end align-self-baseline">
                                    <p class="mb-0 fs-5 text-white fw-light">Status : {{ isset($header['status']) ? ($header['status'] == 0 ? "New" : ($header['status'] == 1 ? "Paid" : "Partial Paid")) : "Unknown" }}</p>
                                </div>
                                <div class="col-2 text-end align-self-baseline">
                                    <i class="fas fa-chevron-down text-white"></i>
                                </div>
                            </div>
                        </a>
                        <div class="collapse" id="collapse{{ $key }}">
                            <div class="card card-body">
                                <div class="row">
                                    <p class="mb-0 fs-5 text-black fw-bold">Account Payable</p>
                                </div>
                                <div class="row py-3">
                                    <div class="table-responsive">
                                        <table id="dataTable" class="table table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="col px-2">#</th>
                                                    <th class="col-5 px-2">Payable No</th>
                                                    <th class="col-2 px-2">Description</th>
                                                    <th class="col-2 px-2">Date</th>
                                                    <th class="col-2 px-2">Due Date</th>
                                                    <th class="col-2 px-2">Amount</th>
                                                    <th class="col-2 px-2">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach( $header['accountPayables'] as $key => $data)
                                                <tr>
                                                    <th scope="row">{{ $key+1 }}</th>
                                                    <td>{{ $data['invoice_number'] }}</td>
                                                    <td>{{ $data['type'] }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data['created_at'])->format('M d Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data['due_date'])->format('M d Y') }}</td>
                                                    <td>Rs. {{number_format(doubleval($data['amount']),2) }}</td>
                                                    <td>{{ isset($data['status']) ? ($data['status'] == 0 ? "New" : ($data['status'] == 1 ? "Paid" : "Partial Paid")) : "Unknown" }}</td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row amount-details text-end">
                                    <div class="col-md-10 text-end">
                                        <p class="fw-bold mb-0 fs-6">Total Amount :</p>
                                        <p class="fw-bold mb-0 fs-6">Paid Amount :</p>
                                        <p class="fw-bold mb-0 fs-6">Due Amount :</p>
                                        <p class="fw-bold mb-0 fs-6">New Total Outstanding :</p>
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <p class="fw-light mb-0 fs-6">Rs.{{number_format(doubleval($header['invoice_total']),2) }}</p>
                                        <p class="fw-light mb-0 fs-6">Rs.{{number_format(doubleval($header['total_paid']),2) }}</p>
                                        <p class="fw-light mb-0 fs-6">Rs.{{number_format(doubleval($header['total_due']),2) }}</p>
                                        <hr class="bg-black my-1">
                                        <p class="fw-light mb-0 fs-6">Rs.{{number_format(doubleval($header['new_total_due']),2) }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

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