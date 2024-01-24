@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('student_payments') }}
                <h6 class="font-weight-bolder mb-0"></h6>
            </nav>
            <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                <a href="javascript:;" class="nav-link text-body p-0">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </div>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <!-- <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div> -->
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <form id="logout-form" action="{{ route('logOut') }}" method="POST" style="display: none;">
                            @csrf

                        </form>
                        <button class="btn btn-icon btn-3 btn-primary" style="margin-bottom: 0px !important;" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="btn-inner--icon"><i class="fa fa-user me-sm-1"></i></span>
                            <span class="btn-inner--text">Logout</span>
                        </button>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <!-- Hide gear icon -->
                            <!-- <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i> -->
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 1</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 2</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span>Sample Notification 3</span>
                                            </h6>
                                            <p class="text-xs text-secondary mb-0">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        <!-- Students table -->

        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col">
                        <form id="searchForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-auto">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="class" class="col-form-label">Class : </label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select pe-5" name="sd_year_grade_class_id" required>
                                                <option value="1">Class 1</option>
                                                <option value="class2">Class 2</option>
                                                <option value="class3">Class 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="admission_id" class="col-form-label">Addmission No : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" name="admission_id" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto pt-auto text-end">
                        <a href="{{ route('add_student_payment') }}" class="btn btn-primary mb-0"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <span class="border-0"><strong class="text-dark">Admission No :</strong> &nbsp; <span id="admissionNo"></span></span>
            <span class="border-0 ps-3"><strong class="text-dark">Name:</strong> &nbsp; <span id="studentName"></span></span>
            <span class="border-0 ps-3"><strong class="text-dark">Class:</strong> &nbsp; <span id="gradeClass"></span></span>

            <!-- Payment Details -->
            <div class="card shadow-none border mt-3">
                <div class="card-body">
                    <span class="text-dark"><strong>Payment Details - Payment ID -<span id="invoiceNo"></span></strong></span>
                    <div class="accordion" id="transactionAccordion">
                        <!-- Accordion Item will be dynamically added here -->
                    </div>
                </div>
            </div>
            
        </div>

                </div>


            </div>
        </div>
        <!-- Students table -->
    </div>
    <footer class="footer">
        <div class="container-fluid">

        </div>
    </footer>
</main>

@endsection
@section('footer-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    $(document).ready(function () {
        $('#searchForm').click(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get values from the form
            var sd_year_grade_class_id = $('[name="sd_year_grade_class_id"]').val();
            var admission_id = $('[name="admission_id"]').val();

            // Set your Bearer token
            var token = {!! json_encode($token) !!};
            var endpoint = 'all_user_payments';
            var api = '{{ env('API_URL') }}';

            // Make an Ajax request with the Bearer token
            $.ajax({
                type: 'POST',
                url: api + '/' + endpoint,
                data: {
                    admission_id: admission_id,
                    sd_year_grade_class_id: sd_year_grade_class_id,
                },
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {
                    // Handle the response data and update the UI as needed
                    console.log(response);
                    updateUI(response);
                },
                error: function (error) {
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

    // Update payment details
    $('#invoiceNo').text(paymentDetails.invoice_id);
    $('#invoiceDate').text(paymentDetails.date);
    $('#dueDate').text(paymentDetails.due_date);
    $('#invoiceTotal').text(paymentDetails.total);
    $('#totalPaid').text(paymentDetails.total - paymentDetails.outstanding_balance);
    $('#totalDue').text(paymentDetails.outstanding_balance);

    // Update invoice status
    var invoiceStatus = paymentDetails.status === 1 ? 'Partially Paid' : 'Not Paid';
    $('#invoiceStatus').text('Invoice Status: ' + invoiceStatus);

    // Clear existing data in the container
    $('#transactionAccordion').empty();

    // Create and append the accordion item
   $.each(studentData.student_payment, function (index, invoice) {
            var invoiceStatus;
            
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
    var accordionItem = '<div class="accordion-item">' +
        '<h6 class="accordion-header" id="transactionOne">' +
        '<button class="accordion-button dropdown-toggle pb-2 border-bottom fw-bold ajax-trigger" type="button" data-bs-toggle="collapse" data-bs-target="#transactionCollapse' + index + '" aria-expanded="true" aria-controls="transactionCollapse' + index + '" role="button" tabindex="0" data-invoice-id="' + invoice.invoice_id + '">' +
        '<div class="row">' +
        '<div class="col-auto text-sm">Invoice No: ' + invoice.invoice_id + '</div>' +
        '<div class="col-auto text-sm">Date: ' + invoice.date + '</div>' +
        '<div class="col-auto text-sm">Due Date: ' + invoice.due_date + '</div>' +
        '<div class="col-auto text-sm">Invoice Total: ' + invoice.total + '</div>' +
        '<div class="col-auto text-sm">Total Paid: ' + (invoice.total - invoice.outstanding_balance) + '</div>' +
        '<div class="col-auto text-sm">Total Due: ' + invoice.outstanding_balance + '</div>' +
        '<div class="col-auto text-sm">Invoice Status: ' + invoiceStatus + '</div>' +
        '</div>' +
        '</button>' +
        '</h6>' +
        '</div>';

    $('#transactionAccordion').append(accordionItem);
});
}
    });

    $(document).on('click', '.ajax-trigger', function () {
    var invoiceId = $(this).data('invoice-id');
    var token = {!! json_encode($token) !!};
    var endpoint = 'user_single_invoice';
    var api = '{{ env('API_URL') }}';
             $.ajax({
                    type: 'GET',
                    url: api + '/' + endpoint + '/' + invoiceId,
                    dataType: 'json',
                    headers: {
                        'Authorization': 'Bearer ' + token
                    },
                    success: function (response) {
                        updateSubData(response);
                        console.log(response);   
                    },
                    error: function (error) {
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
        $.each(studentPayments, function (index, payment) {
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