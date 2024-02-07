@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
    <!-- Navbar -->
    @include('components/header-ui')

    <!-- End Navbar -->
    <div class="container-fluid body_content py-4">
        <!-- Students table -->

        <div class="card">
            <div class="card-header pt-1 px-3">
                <div class="row bg-secondary py-2 px-1 rounded-4">
                    <div class="col-md-6 align-self-center">
                        <h5 class="font-weight-bolder text-white mb-0">Add New Student Payment</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="paymentForm">
                    <!-- CSRF token for Laravel -->
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="admission_id" class="col-form-label">Admission No : </label>

                                <input type="text" class="form-control" name="admission_id" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="payment_date" class="col-form-label">Paid Date : </label>
                                <input type="date" class="form-control" name="payment_date" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="payment_term" class="col-form-label">Payment Term : </label>
                                <select class="form-select pe-5" name="payment_term" required>
                                    <option value="class1">Bank Transfer</option>
                                    <option value="class2">Card Payment</option>
                                    <option value="class3">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label for="payment_amount" class="col-form-label">Paid Amount : </label>
                                <input type="text" class="form-control number-input" name="payment_amount" required>
                            </div>
                        </div>

                        <!-- Add a submit button -->
                        <div class="col-md-2 text-end align-self-center">
                                <button type="button" class="btn btn-primary w-75 mb-0" id="submitBtn">Get Invoices</button>
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
    @include('components/footer-ui')
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
    $(document).ready(function() {
        $('#submitBtn').click(function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Get values from the form
            var paymentDate = $('[name="payment_date"]').val();
            var admissionId = $('[name="admission_id"]').val();
            var paymentAmount = $('[name="payment_amount"]').val();

            // Set your Bearer token
            var token = {!!json_encode($token) !!};
            var endpoint = 'user_invoices';
            var api = '{{ env('API_URL ') }}';

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
                success: function(response) {
                    // Handle the response data and update the UI as needed
                    //console.log(response);
                    updateUI(response, paymentAmount);
                },
                error: function(error) {
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
                var totalInvoiceSum = invoicesData.reduce(function(sum, invoice) {
                    return sum + parseFloat(invoice.invoice_total);
                }, 0);

                // Loop through each invoice in the response and create/update the HTML
                $.each(invoicesData, function(index, invoice) {
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
        $('#submitSelectedBtn').click(function() {
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
            var token = {!!json_encode($token) !!};
            var api = '{{ env('API_URL ') }}';
            
            var endpoint = 'user_payments';

            $.ajax({
                type: 'POST',
                url: api + '/' + endpoint,
                data: {
                    selectedInvoices: selectedInvoices
                },
                dataType: 'json',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {

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
                        timer: 3000 // Adjust the timer as needed
                    });
                    // Handle the response as needed
                },
                error: function(error) {
                    console.error('Error posting selected invoices:', error);
                }
            });
        });
    });
</script>


@endsection