@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-2 top-1 px-0 mx-2 shadow-none border-radius-xl z-index-sticky side-bar-bg" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('add_student_payment') }}
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
            <div class="card-header">
                <h6>Add New Student Payment</h6>
            </div>

            <div class="card-body">
               
                   
                    <form id="paymentForm">
    <!-- CSRF token for Laravel -->
    @csrf
           
    <div class="row">
        <div class="col-auto">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="admission_id" class="col-form-label">Admission No : </label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control" name="admission_id" required>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="payment_date" class="col-form-label">Paid Date : </label>
                </div>
                <div class="col-auto">
                    <input type="date" class="form-control" name="payment_date" required>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="payment_term" class="col-form-label">Payment Term : </label>
                </div>
                <div class="col-auto">
                    <select class="form-select pe-5" name="payment_term" required>
                        <option value="class1">Bank Transfer</option>
                        <option value="class2">Card Payment</option>
                        <option value="class3">Manual</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="payment_amount" class="col-form-label">Paid Amount : </label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control number-input" name="payment_amount" required>
                </div>
            </div>
        </div>
    

    <!-- Add a submit button -->
    <div class="col-auto">
    <div class="text-end">
        <button type="button" class="btn btn-primary" id="submitBtn">Get Invoices</button>
    </div>
    </div>
    </div>
</form>

                    

                    <h6 class="mt-4">Pending Invoices</h6>
                    <form id="paymentForm">
                         @csrf
                    <div class="card shadow-none border mt-3">
                        <div class="card-body">
                           <div class="invoices-container">
                                <!-- Invoices will be dynamically added here -->
                            </div> 
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" id="submitSelectedBtn" class="btn btn-primary mt-3">Submit</button>
                    </div>

                </form>
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
<script>
    // input validations
    document.addEventListener('DOMContentLoaded', function() {

        const numberInputs = document.querySelectorAll('.number-input');

        // Number input validation
        numberInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                const numeric = input.value;
                const numericRegex = /^[0-9]*$/; // Only numbers

                if (!numericRegex.test(numeric)) {
                    input.value = input.value.replace(/\D/g, '');
                    // Replace non-digit characters with an empty string
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        $('#submitBtn').click(function (event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get values from the form
            var paymentDate = $('[name="payment_date"]').val();
            var admissionId = $('[name="admission_id"]').val();
            var paymentAmount = $('[name="payment_amount"]').val();

            // Set your Bearer token
            var token = {!! json_encode($token) !!};
            var endpoint = 'user_invoices';
            var api = '{{ env('API_URL') }}';

            // Make an Ajax request with the Bearer token
            $.ajax({
                type: 'GET',
                url: api + '/' + endpoint,
                data: {
                    admission_id: admissionId,
                    amount: paymentAmount,
                    date: paymentDate
                },
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {
                    // Handle the response data and update the UI as needed
                    //console.log(response);
                    updateUI(response,paymentAmount);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });

        // Function to update the UI with invoice data
        function updateUI(response, paymentAmount) {
    var invoicesContainer = $(".invoices-container");

    // Clear existing data in the container
    invoicesContainer.empty();

    if (response && response.data) {
        var invoicesData = response.data;

        // Calculate the total sum of invoice totals
        var totalInvoiceSum = invoicesData.reduce(function (sum, invoice) {
            return sum + parseFloat(invoice.invoice_total);
        }, 0);

        // Loop through each invoice in the response and create/update the HTML
        $.each(invoicesData, function (index, invoice) {
            var invoiceHtml = '<div class="form-check">';

            // Add data attributes to store additional data
            
           
            // Check if the total sum of invoice totals is greater than or equal to the paymentAmount, and enable/disable the checkbox accordingly
            

            
            invoiceHtml += '<label class="form-check-label" for="flexCheckDefault' + (index + 1) + '">';
            invoiceHtml += '<div class="row">';
            invoiceHtml += '<div class="col-auto text-sm">Invoice No: ' + invoice.invoice_number + '</div>';
            invoiceHtml += '<div class="col-auto text-sm">Due Date: ' + invoice.due_date + '</div>';
            invoiceHtml += '<div class="col-auto text-sm">Invoice Total: ' + invoice.invoice_total + '</div>';
            invoiceHtml += '<div class="col-auto text-sm">Invoice Status: ';

                switch (invoice.status) {
                    case 0:
                        invoiceHtml += 'Unpaid';
                        break;
                    case 1:
                        invoiceHtml += 'Paid';
                        break;
                    case 2:
                        invoiceHtml += 'Partially Paid';
                        break;
                    // Add more cases if needed

                    default:
                        // Handle any unexpected status values
                        break;
                }

            invoiceHtml += '</div>';
            invoiceHtml += '</div>';
            invoiceHtml += '</label>';
            invoiceHtml += '</div>';

            // Append the invoice HTML to the container
            invoicesContainer.append(invoiceHtml);
        });
    }
}

        // Function to handle the submission of selected checkboxes
        $('#submitSelectedBtn').click(function () {
            var selectedInvoices = [];
            // Iterate over each checked checkbox and add its value (invoice_id) to the array
           
                    var invoiceData = {
                        admission_id: $('input[name="admission_id"]').val(),
                        payment_amount: $('[name="payment_amount"]').val(),
                        
                        // Retrieve more attributes as needed
                    };

            selectedInvoices.push(invoiceData);
               
            //console.log(invoiceData);
            // Post the selected invoice IDs to another URL
            var token = {!! json_encode($token) !!};
            var api = '{{ env('API_URL') }}';
            var endpoint = 'user_payments';
            
            $.ajax({
                type: 'POST',
                url: api + '/' + endpoint,
                data: { selectedInvoices: selectedInvoices },
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function (response) {

                     updateUI(response);
                     Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    });

                    // Use toast to display a notification
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000  // Adjust the timer as needed
                    });
                    // Handle the response as needed
                },
                error: function (error) {
                    console.error('Error posting selected invoices:', error);
                }
            });
        });
    });
</script>


@endsection