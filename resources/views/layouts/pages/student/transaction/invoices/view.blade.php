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
                        <h5 class="font-weight-bolder text-white mb-0">Invoices View</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="InvoicesForDownload" class="p-2 shadow col-sm-12">
                    <div class="row px-1 invoice-header py-2">
                        <div class="col-md-2 text-center align-self-center">
                            <img src="{{ asset('assets/img/nsis.png') }}" class="w-50 shadow rounded-circle " alt="logo">
                        </div>
                        <div class="col-md-6 align-self-center">
                            <p class="text-black fs-5 fw-bolder mb-0">Invoice <span class="fs-5 fw-bold">{{ $details[0]['invoice_number']}}</span></p>
                        </div>
                        <div class="col-md-2 offset-2 align-self-center">
                            <button id="downloadButton" type="button" class="btn btn-transparent shadow border text-black mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                                    <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383" />
                                    <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z" />
                                </svg> Download
                            </button>
                        </div>
                    </div>
                    <hr class="bg-black my-1">
                    <div class="row px-1 invoice-address py-1">
                        <div class="col-md-6 text-start">
                            <p class="mb-0 fs-5 text-black fw-bold">Admission No : {{ $details[0]['admission_no']}}</p>
                            <p class="mb-0 fs-5 text-black fw-bold">Student Name : {{ $details[0]['sd_name_with_initials']}}</p>
                            <p class="mb-0 fs-6 text-black fw-light text-capitalize">{{ $details[0]['sd_address_line1']}}{{ $details[0]['sd_address_line1'] == ''? '':',' }}</p>
                            <p class="mb-0 fs-6 text-black fw-light text-capitalize">{{ $details[0]['sd_address_line2']}}{{ $details[0]['sd_address_line2'] == ''? '':',' }}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-0 fs-5 text-black fw-bold text-capitalize">negombo south international school</p>
                            <p class="mb-0 fs-6 text-black fw-light text-capitalize">nittambuwa branch</p>
                        </div>
                    </div>
                    <div class="row px-1 issued-date text-end py-1">
                        <p class="mb-0 fs-5 text-black fw-light">Issued {{ \Carbon\Carbon::parse($details[0]['created_at'])->format('M d Y') }}</p>
                        <p class="mb-0 fs-5 text-success fw-bolder">Invoice Status : {{ isset($details[0]['status']) ? ($details[0]['status'] == 0 ? "New" : ($details[0]['status'] == 1 ? "Paid" : "Partial Paid")) : "Unknown" }}</p>
                    </div>
                    <div class="row px-1 issued-date py-1">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="col px-2">#</th>
                                        <th class="col-5 px-2">Admission No</th>
                                        <!-- <th class="col-2 px-2">Date</th> -->
                                        <th class="col-2 px-2">Due Date</th>
                                        <th class="col-2 px-2">Amount</th>
                                        <th class="col-2 px-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $details[0]['accountPayables'] as $key => $data)
                                    <tr>
                                        <th scope="row">{{ $key+1 }}</th>
                                        <td>{{ $data['admission_no'] }}</td>
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
                        <div class="col-md-9 text-end">
                            <p class="fw-bold mb-0 fs-5">Total Amount :</p>
                            <p class="fw-bold mb-0 fs-5">Paid Amount :</p>
                            <p class="fw-bold mb-0 fs-5">Due Amount :</p>
                            <p class="fw-bold mb-0 fs-5">New Total Outstanding :</p>
                        </div>
                        <div class="col-md-3 text-end">
                            <p class="fw-light mb-0 fs-5">Rs. {{number_format(doubleval($details[0]['invoice_total']),2) }}</p>
                            <p class="fw-light mb-0 fs-5">Rs. {{number_format(doubleval($details[0]['total_paid']),2) }}</p>
                            <p class="fw-light mb-0 fs-5">Rs. {{number_format(doubleval($details[0]['total_due']),2) }}</p>
                            <hr class="bg-black my-1">
                            <p class="fw-light mb-0 fs-5">Rs. {{number_format(doubleval($details[0]['new_total_due']),2) }}</p>

                        </div>
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
            var content = document.getElementById("InvoicesForDownload");

            // Use html2pdf to convert HTML content to PDF
            html2pdf(content, {
                margin: 10,
                filename: 'invoice.pdf',
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



<script>
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