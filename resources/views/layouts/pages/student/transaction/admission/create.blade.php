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
                        <h5 class="font-weight-bolder text-white mb-0">Add New Admission Payment</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="installmentsCreateForm" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="admission_id" class="col-form-label">Admission No<span class="text-danger"> *</span></label>
                            <input id="admission_id" type="text" class="form-control" name="admission_id" required>
                        </div>
                        <div class="col-md-3">
                            <label for="admission_amount" class="col-form-label">Amount<span class="text-danger"> *</span></label>
                            <input id="admission_amount" type="number" class="form-control" name="admission_amount" required>
                        </div>
                        <div class="col-md-3">
                            <label for="number_of_installments" class="col-form-label">Number Of Installments<span class="text-danger"> *</span></label>
                            <input id="number_of_installments" type="number" class="form-control" name="number_of_installments" required>
                        </div>
                        <div class="col-md-3 align-self-end">
                            <button id="getInstallments" type="button" class="btn btn-primary w-75 mb-0">Get Installments</button>
                        </div>
                    </div>
                </form>

                <h4 class="pt-3">Installment List : </h4>
                <div class="row" id="numberOfInstalmentDisplay">

                </div>

                <div class="row saveSection d-none">
                    <div class="col-md-3 offset-9">
                        <button id="SaveData" type="button" class="btn btn-success w-75 mb-0">Save</button>
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
    $('#admission_id, #admission_amount, #number_of_installments').on('input', function() {
        $('.saveSection').addClass('d-none');
        $('#numberOfInstalmentDisplay').html('');
    });

    $('#getInstallments').click(function() {

        var admissionNo = $('#admission_id').val();
        var admissionAmount = $('#admission_amount').val();
        var numberOfInstallments = $('#number_of_installments').val();

        if (!admissionNo || !admissionAmount || !numberOfInstallments) {
            $('#installmentsCreateForm').addClass('was-validated');
            return;
        } else {
            $('#installmentsCreateForm').removeClass('was-validated');
        }

        $('#numberOfInstalmentDisplay').html('')
        for (var i = 1; i <= numberOfInstallments; i++) {
            var today = new Date();
            if (i != 1) {
                today.setMonth(today.getMonth() + (i - 1)); // Add one month to the current date
            }

            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0'); // Adding 1 because getMonth() returns month index starting from 0
            var day = String(today.getDate()).padStart(2, '0');

            var nextMonthDate = year + '-' + month + '-' + day;
            $('#numberOfInstalmentDisplay').append('<div class="card border-1 my-2"><div class="row py-2 instalmentCount"><h5>Installment ' + i + '</h5><div class="col-md-3"><label for="number_of_installments" class="col-form-label py-0">Amount :</label> Rs.' + (admissionAmount / numberOfInstallments).toFixed(2) + '</div><div class="col-md-3"><label for="number_of_installments" class="col-form-label py-0">Due Date :</label>' + nextMonthDate + '</div>' +
                '<div class="col-md-3"><div class="form-check"><label for="number_of_installments" class="col-form-label py-0">Paid</label><input class="form-check-input numberOfInstallmentsCheckBox" value="0" id="checkBoxVal' + i + '" type="checkbox" nameOfChecked="numberOfInstallmentsCheckBox' + i + '"></div></div>' +
                '<div class="col-md-3"> <input type="text" class="form-control" disabled placeholder="Reference No" id="numberOfInstallmentsCheckBox' + i + '"></div>');
        }

        $('.saveSection').removeClass('d-none');

    })

    $(document).on("click", ".numberOfInstallmentsCheckBox", function() {

        var showRef = $(this).attr('nameOfChecked');
        if ($('#' + showRef).prop('disabled')) {
            $('#' + showRef).prop('disabled', false);
            $(this).val(1)
        } else {
            $('#' + showRef).prop('disabled', true);
            $('#' + showRef).val(null);
            $(this).val(0)
        }
    });

    $('#SaveData').click(function() {
        var admissionNo = $('#admission_id').val();
        var admissionAmount = $('#admission_amount').val();
        var numberOfInstallments = $('#number_of_installments').val();

        var installmentArray = [];

        for (var i = 1; i <= numberOfInstallments; i++) {
            var today = new Date();
            if (i != 1) {
                today.setMonth(today.getMonth() + (i - 1));
            }

            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var day = String(today.getDate()).padStart(2, '0');

            var nextMonthDate = year + '-' + month + '-' + day;

            var amount = (admissionAmount / numberOfInstallments);
            var no = i;
            var reference_no = $('#numberOfInstallmentsCheckBox' + i).val();
            var due_date = nextMonthDate;
            var status = $('#checkBoxVal' + i).val();

            // Create an object for the installment
            var installment = {
                "instalment_amount": amount.toFixed(2),
                "instalments_no": no,
                "reference_no": reference_no,
                "due_date": due_date,
                "status": status
            };

            // Push the installment object into the installmentArray
            installmentArray.push(installment);
        }

        // ajax call

        $.ajax({
            type: "POST",
            url: "{{ route('admission_payment_store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "admissionNo": admissionNo,
                "admissionAmount": admissionAmount,
                "numberOfInstallments": numberOfInstallments,
                "installmentArray": installmentArray
            },
            success: function(response) {
                if (response.status === 200) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                    })
                    window.location.href = "{{ route('admission_payment') }}";
                    return;

                }
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: response.message,
                })
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong',
                })
            }
        })

    });
</script>


@endsection