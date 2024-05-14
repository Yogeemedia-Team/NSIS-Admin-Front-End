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
                        <h5 class="font-weight-bolder text-white mb-0">Admission Payments By : {{ isset($data['admission_no']) ? $data['admission_no'] : ''}}</h5>
                    </div>

                </div>
            </div>

            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-md-6">
                        <label for="admission_id" class="col-form-label">Admission No : </label> <span class="bold">{{ isset($data['admission_no']) ? $data['admission_no'] : ''}}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="admission_id" class="col-form-label">Total Amount : </label> <span class="bold">{{ isset($data['total_amount']) ? 'Rs. '. $data['total_amount'] : ''}}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="admission_id" class="col-form-label">NO Of Installments : </label> <span class="bold">{{ isset($data['no_of_instalments']) ? $data['no_of_instalments'] : ''}}</span>
                    </div>
                    <div class="col-md-6">
                        <label for="admission_id" class="col-form-label">Status : </label> <span class="bold">{{ isset($data['status']) ? ($data['status'] == 1 ? 'Paid' : ($data['status'] == 0 ? 'Pending' : 'Partial Paid')) : ''}}</span>
                    </div>
                </div>

                <div class="row">
                    @if(isset($data['admission_instalments']))
                    @foreach($data['admission_instalments'] as $key => $data)
                    <div class="card border-1 my-2">
                        <div class="row py-1">
                            <div class="col-md-6">
                                <h5>Installment {{$data['instalments_no']}}</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class=" {{$data['status'] == 1 ? 'bg-success text-white' : ' bg-danger text-white'}}  rounded-5 py-1 px-2">{{$data['status'] == 1 ? 'Paid' : 'Pending'}}</span>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Amount :</label> Rs. {{$data['instalment_amount']}}
                            </div>
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Due Date :</label> {{ $data['due_date'] }}
                            </div>
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Paid Date :</label> {{ $data['paid_date'] }}
                            </div>
                            @if($data['status'] == 1)
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Reference No :</label> {{ $data['reference_no'] }}
                            </div>
                            @endif
                            @if($data['status'] != 1)
                            <div class="col-md-3 align-self-end">
                                <a type="button" disable class="btn btn-secondary rounded-5 mb-0 openInstalmentModal" data-bs-toggle="modal" data-bs-target="#updateInstallmentModal" installmentId="{{$data['id']}}">Update Installment</a>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- <div class="card border-1 my-2">
                        <div class="row py-1">
                            <div class="col-md-6">
                                <h5>Installment 01</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <span class=" bg-success text-white rounded-5 py-1 px-2">Status</span>
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Amount :</label> Rs.5000
                            </div>
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Due Date :</label> 2024-05-08
                            </div>
                            <div class="col-md-3 align-self-end">
                                <label for="number_of_installments" class="col-form-label py-0 bold">Paid Date :</label> 2024-05-08
                            </div>
                            <div class="col-md-3 align-self-end">
                                <a type="button" disable class="btn btn-secondary rounded-5 mb-0">Update Installment</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="updateInstallmentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Installment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateInstallmentForm">
                        <div class="mb-3">
                            <label for="admission_id" class="col-form-label">Paid Date</label>
                            <input type="date" class="form-control" name="paid_date" id="paid_date" required>
                            <input type="hidden" class="form-control" name="id" id="idOfSelectInstallment">
                        </div>
                        <div class="mb-3">
                            <label for="admission_id" class="col-form-label">Reference No.</label>
                            <input type="text" class="form-control" name="reference_no" id="reference_no">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateInstallmentBtn" class="btn btn-primary">Update</button>
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
    $('.openInstalmentModal').click(function() {
        var id = $(this).attr('installmentId');
        $('#paid_date').val(null)
        $('#reference_no').val(null)
        $('#idOfSelectInstallment').val(id)
    });

    $('#updateInstallmentBtn').click(function() {
        var id = $('#idOfSelectInstallment').val();
        var date = $('#paid_date').val();
        var reference_no = $('#reference_no').val();

        if (date == '' || date == null) {
            $('#updateInstallmentForm').addClass('was-validated');
            return;
        } else {
            $('#updateInstallmentForm').removeClass('was-validated');
        }

        $.ajax({
            type: "POST",
            url: "{{ route('admission_payment_update') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                paid_date: date,
                reference_no: reference_no
            },
            success: function(response) {

                if (response.status == 200) {
                    $('#updateInstallmentModal').modal('hide');
                    $('#updateInstallmentForm')[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        confirmButtonText: 'Ok',
                    }).then(function() {
                        location.reload();
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                        confirmButtonText: 'Ok',
                    })
                }

            },
            error: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: response.message,
                    confirmButtonText: 'Ok',
                })
            }
        })
    })
</script>


@endsection