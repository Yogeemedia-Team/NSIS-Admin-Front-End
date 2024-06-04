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
                        <h5 class="font-weight-bolder text-white mb-0">Student Payment Summery Report</h5>
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
                                    <label for="admission_no" class="col-form-label">Admission No</label>
                                    <input type="text" class="form-control" value="{{ $apiData['admission_no'] ?? '' }}" name="admission_no">
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
                <div class="table-responsive">
                    <table  class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="px-2">Transaction Id</th>
                                <th class="px-2">Reference No</th>
                                <th class="px-2">Payment Date</th>
                                <th class="px-2">Payment Term</th>
                                <th class="px-2 text-center">Payment Status</th>
                                <th class="px-2">Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody id="transactionAccordion">
                            @if(isset($allPayments) && count($allPayments) > 0)
                            @php 
                            $total = 0;
                            @endphp

                            @foreach($allPayments as $data)
                            @php 
                            $total = $total + $data['total_due'];
                            @endphp
                            <tr>
                                <td>{{ $data['payment_id']}}</td>
                                <td>{{ $data['payment_reference_no'] ?? ""}}</td>
                                <td>{{ $data['date']}}</td>
                                <td>{{ $data['paid_from']}}</td>
                                <td class="text-center">{{ isset($data['status']) ? ($data['status'] == 0 ? "Pending" : ($data['status'] == 1 ? "Confirmed" : "Partial Paid")) : "Unknown" }}</td>
                                <td>Rs. {{ $data['total_due']}}</td>
                            </tr>
                            
                            @endforeach
                            
                            <tr>
                                <td colspan="4"></td> 
                                <td  colspan="2" class="text-end"><b>Total  Rs. {{ $total }}.00</b></td>
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



<script>
    $(document).ready(function() {
        var accordionItem = '';
        $('#searchForm').submit(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            var endPoint = 'reports/payments?admission_no=' +$('[name="admission_no"]').val() + '&from_date=' + $('[name="from_date"]').val() + '&to_date='+ $('[name="from_date"]').val() +')';

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
            var total = 0;
            $.each(response.data, function(index, payment) {
                total += payment['total_due'];
                paymentStatus = "";
                switch (payment.status) {
                    case 0:
                        paymentStatus = 'Not Paid';
                        break;
                    case 1:
                        paymentStatus = 'Paid';
                        break;
                    case 2:
                        paymentStatus = 'Partially Paid';
                        break;
                    default:
                    paymentStatus = 'Unknown Status';
                }

                var payment_reference_no = payment['payment_reference_no'] != null ? payment['payment_reference_no']: "-";
                accordionItem +=  ' <tr>'+
                        ' <td>'+ payment['payment_id']+'</td>'+
                        ' <td>'+  payment_reference_no+'</td>'+
                        ' <td>'+ payment['date']+'</td>'+
                        ' <td>'+ payment['paid_from']+'</td>'+
                        ' <td>'+ paymentStatus+'</td>'+
                        ' <td>'+ payment['total_due']+'</td>';


                });

                accordionItem +=    '<tr>'+
                                        '<td colspan="4"></td> '+
                                        '<td  colspan="2" class="text-end"><b>Total  Rs.'+total +'.00</b></td>'+
                                    '</tr>';
            console.log(accordionItem);
            $('#transactionAccordion').append(accordionItem);
        }


    });


</script>

@endsection