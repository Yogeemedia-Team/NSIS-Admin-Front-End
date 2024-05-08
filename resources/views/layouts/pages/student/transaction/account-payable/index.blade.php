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
                        <h5 class="font-weight-bolder text-white mb-0">Account Payable</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <button id="reviseSurchargeOpenModal" type="button" class="btn btn-danger mb-0" data-bs-toggle="modal" data-bs-target="#reviseSurchargeModal">
                            Revise Surcharge
                        </button>

                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form id="searchForm" method="POST" action="{{ route('account_payable_search')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="class" class="col-form-label">Year/Class/Grade</label>
                                    <select class="form-select pe-5" name="sd_year_grade_class_id">
                                        <option selected value="">All</option>
                                        @if(isset($year_grades))
                                        @foreach($year_grades as $year_grade)
                                        <option value="{{$year_grade['id']}}" {{ $apiData['sd_year_grade_class_id'] == $year_grade['id'] ? 'selected' : ''}}>{{ $year_grade['year'].' - '.$year_grade['grade']['grade_name'].' - '.$year_grade['class']['class_name']  }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="admission_id" class="col-form-label">Admission No</label>
                                    <input type="text" class="form-control" name="admission_id" value="{{ $apiData['admission_id'] ?? '' }}">
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
                                <div class="col-md-2 text-end align-self-end">
                                    <button type="submit" class="btn btn-primary w-100 mb-0">Search</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="card-body pt-0">

                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="px-2">#</th>
                                <th class="px-2">Account Payables No</th>
                                <th class="px-2">Admission No</th>
                                <th class="px-2">Description</th>
                                <th class="px-2">Date</th>
                                <th class="px-2">Due Date</th>
                                <th class="px-2">Amoount</th>
                                <th class="px-2 text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($accountPayableData))
                            @foreach($accountPayableData as $key => $data)
                            <tr>
                                <td>{{ $key+1}}</td>
                                <td>{{ $data['id']}}</td>
                                <td>{{ $data['admission_no']}}</td>
                                <td>{{ $data['type']}}</td>
                                <td>{{ date('Y-m-d' , strtotime($data['updated_at']))}}</td>
                                <td>{{ $data['due_date']}}</td>
                                <td>Rs. {{number_format(doubleval($data['amount']),2) }}</td>
                                <td class="text-center">{{ isset($data['status']) ? ($data['status'] == 0 ? "Pending" : ($data['status'] == 1 ? "Completed" : "Partial Paid")) : "Unknown" }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="reviseSurchargeModal" tabindex="-1" aria-labelledby="reviseSurchargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviseSurchargeModalLabel">Revise Surcharge</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="reviseSurchargeForm">
                            <div class="mb-3">
                                <label for="reviseAdmission" class="form-label">Admission No <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="reviseAdmission" required>
                            </div>
                            <div class="mb-3">
                                <label for="reviseAmount" class="form-label">Amount <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="reviseAmount" required>
                            </div>
                            <div class="mb-3">
                                <label for="reviseRemark" class="form-label">Remark</label>
                                <textarea class="form-control" id="reviseRemark"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="reviseSurchargeSubmit" type="button" class="btn btn-primary">Revise</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.getElementById('reviseSurchargeSubmit').addEventListener('click', function() {
                var form = document.getElementById('reviseSurchargeForm');
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                if (form.checkValidity() === true) {
                    // Submit form
                }
            }, false);
        </script>

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
    $('#reviseSurchargeOpenModal').click(function() {
        $('#reviseAdmission').val('');
        $('#reviseAmount').val('');
        $('#reviseRemark').val('');
        $('#reviseSurchargeForm').removeClass('was-validated');
    });

    $('#reviseSurchargeSubmit').click(function() {
        var admissionNo = $('#reviseAdmission').val();
        var reviseAmount = $('#reviseAmount').val();
        var reviseRemark = $('#reviseRemark').val();

        $.ajax({
            type: "POST",
            url: "{{ route('account_payable_revise') }}",
            data: {
                _token: "{{ csrf_token() }}",
                admission_no: admissionNo,
                amount: reviseAmount,
                remark: reviseRemark
            },
            success: function(response) {
                if (response.status == 200) {
                    $('#reviseSurchargeModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Account Payable Revised Successfully',
                    }).then(function() {
                        location.reload();
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                    })
                }

            },
            error: function(xhr, status, error) {

            }
        })
    })


    $(function() {
        $("#due_date").datepicker({
            dateFormat: 'yy-mm-dd',
            onSelect: function(dateText, inst) {
                $('#' + inst.id).attr('value', dateText);
            }
        });
    });
</script>
<script>
    function confirmDelete(classId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user clicks "Yes" in the confirmation dialog, submit the form
                document.getElementById('deleteForm' + classId).submit();
            }
            // If the user clicks "No" or closes the dialog, do nothing
        });
    }
</script>
<script>
    $(document).ready(function() {





        var accordionItem = '';
        $('#searchForm').click(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get values from the form
            var sd_year_grade_class_id = $('[name="sd_year_grade_class_id"]').val();
            var admission_id = $('[name="admission_id"]').val();
            var due_date = $("#due_date").val();

            // Set your Bearer token
            var token = {
                !!json_encode($token) !!
            };
            var endpoint = 'all_user_payments';
            var api = '{{ env('
            API_URL ') }}';

            // Make an Ajax request with the Bearer token
            $.ajax({
                type: 'POST',
                url: api + '/' + endpoint,
                data: {
                    admission_id: admission_id,
                    sd_year_grade_class_id: sd_year_grade_class_id,
                    date: due_date
                },
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
            var studentData = response.data[0];
            var paymentDetails = studentData.student_payment[0];

            // Update admission details
            $('#admissionNo').text(studentData.sd_admission_no);
            $('#studentName').text(studentData.sd_name_in_full);
            $('#gradeClass').text('Grade ' + studentData.sd_year_grade_class_id + ' - ' + studentData.sd_admission_status);



            // Update invoice status
            var invoiceStatus = paymentDetails.status === 1 ? 'Partially Paid' : 'Not Paid';
            $('#invoiceStatus').text('Invoice Status: ' + invoiceStatus);

            // Clear existing data in the container

            $('#transactionAccordion').empty();
            var accordionItem = '';

            //console.log(paymentDetails.invoices);
            // Create and append the accordion item
            //$.each(paymentDetails.invoices, function (index, invoice) {
            $.each(paymentDetails.invoices, function(index, invoice) {
                $('#transactionAccordion').empty();
                var invoiceStatus;

                //console.log(invoice.id);



                // Determine the invoice status based on the status value
                switch (invoice.status) {
                    case 0:
                        invoiceStatus = 'Not Paid';
                        break;
                    case 1:
                        invoiceStatus = 'Paid';
                        break;
                    case 2:
                        invoiceStatus = 'Partially Paid';
                        break;
                    default:
                        invoiceStatus = 'Unknown Status';
                }

                // Create and append the accordion item for each invoice
                //get invoice numbers and create each record

                // var result =  JSON.parse(invoice.invoices);


                //  for(var i=0; i<result.length; i++){

                accordionItem += '<div class="accordion-item">' +
                    '<h6 class="accordion-header" id="transactionOne' + invoice.id + '">' +
                    '<button class="accordion-button dropdown-toggle pb-2 border-bottom fw-bold ajax-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#transactionCollapse' + invoice.id + '" aria-expanded="true" aria-controls="transactionCollapse' + invoice.id + '" role="button" tabindex="0" data-invoice-id="' + invoice.id + '">';


                accordionItem += '</button>' +
                    '</h6>' +
                    '</div>';

                accordionItem += '<div id="transactionCollapse' + invoice.id + '" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="transactionOne' + invoice.id + '">';
                accordionItem += '<div class="accordion-body">';
                accordionItem += '<div class="row">' +
                    '<div class="col-auto text-sm">Invoice No: ' + invoice.invoice_number + '</div>' +
                    //'<div class="col-auto text-sm">Date: ' + invoice.date + '</div>' +
                    '<div class="col-auto text-sm">Due Date: ' + invoice.due_date + '</div>' +
                    '<div class="col-auto text-sm">Invoice Total: ' + invoice.invoice_total + ' </div>' +
                    '<div class="col-auto text-sm">payment_id : ' + invoice.payment_id + '</div>' +
                    '<div class="col-auto text-sm">Total Due: ' + invoice.total_due + '</div>' +
                    '<div class="col-auto text-sm">Invoice Status: ' + invoiceStatus + '</div>' +
                    '</div>';


                var result = invoice.invoice_items;

                $.each(result, function(index, result) {
                    var invoiceState;
                    switch (result.status) {
                        case 0:
                            invoiceState = 'Not Paid';
                            break;
                        case 1:
                            invoiceState = 'Paid';
                            break;
                        case 2:
                            invoiceState = 'Partially Paid';
                            break;
                        default:
                            invoiceState = 'Unknown Status';
                    }
                    //print invoice item list

                    accordionItem += '<div class="row col-md-8 right">' +
                        '<div class="col-auto text-sm">Invoice No: ' + result.invoice_number + '</div>' +
                        //'<div class="col-auto text-sm">Date: ' + invoice.date + '</div>' +
                        '<div class="col-auto text-sm">Due Date: ' + result.due_date + '</div>' +
                        '<div class="col-auto text-sm">Invoice Total: ' + result.invoice_total + ' </div>' +
                        '<div class="col-auto text-sm">payment_id : ' + result.payment_id + '</div>' +
                        '<div class="col-auto text-sm">Total Due: ' + result.total_due + '</div>' +
                        '<div class="col-auto text-sm">Invoice Status: ' + invoiceState + '</div>' +
                        '</div>';


                });

                accordionItem += '</div>';
                accordionItem += '</div>';


                //}

            });
            console.log(accordionItem);
            $('#transactionAccordion').append(accordionItem);
        }


    });

    $(document).on('click', '.ajax-trigger', function() {
        var invoiceId = $(this).data('invoice-id');
        var token = {
            !!json_encode($token) !!
        };
        var endpoint = 'user_single_invoice';
        var api = '{{ env('
        API_URL ') }}';
        $.ajax({
            type: 'GET',
            url: api + '/' + endpoint + '/' + invoiceId,
            dataType: 'json',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
                updateSubData(response);
                console.log(response);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });

        function updateSubData(response) {
            var accordionBody = $("#transactionCollapseTwo .accordion-body tbody");

            // Clear existing data in the table body
            accordionBody.empty();

            if (response && response.data && response.data.student_payment) {
                var studentPayments = response.data.student_payment;

                // Loop through each payment in the response and create/update the HTML
                $.each(studentPayments, function(index, payment) {
                    var paymentStatus = (payment.status === 1) ? 'Paid' : 'Not Paid';

                    // Append a new row to the table body
                    accordionBody.append(
                        '<tr>' +
                        '<td class="text-sm">' + payment.id + '</td>' +
                        '<td class="text-sm">' + payment.date + '</td>' +
                        '<td class="text-sm">' + payment.due_date + '</td>' +
                        '<td class="text-sm">' + payment.describe + '</td>' +
                        '<td class="text-sm">' + payment.category + '</td>' +
                        '<td class="text-sm">$' + payment.total + '</td>' +
                        '<td class="text-sm">$' + payment.total_paid + '</td>' +
                        '<td class="text-sm">$' + payment.outstanding_balance + '</td>' +
                        '<td class="text-sm">' + paymentStatus + '</td>' +
                        '<td></td>' +
                        '</tr>'
                    );
                });
            }
        }
    });
</script>

@endsection