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
                        <h5 class="font-weight-bolder text-white mb-0">Admission Payments</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admission_payment_create') }}" class="btn btn-primary mb-0"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form id="searchForm" method="POST" action="{{ route('admission_payment_search')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="admission_id" class="col-form-label">Admission No</label>
                                    <input type="text" class="form-control" name="admission_id" value="{{ $apiData['admission_id'] ?? '' }}">
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
                                <th class="px-2">Admission No</th>
                                <th class="px-2">Installments</th>
                                <th class="px-2">Pending Installment</th>
                                <th class="px-2">Total Amount</th>
                                <th class="px-2 text-center">Status</th>
                                <th class="px-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($accountPayableData))
                            @foreach($accountPayableData as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data['admission_no'] }}</td>
                                <td>{{$data['no_of_instalments'] ?? 0 }}</td>
                                <td>{{$data['pending_instalment'] ?? 0 }}</td>
                                <td>Rs. {{number_format(doubleval($data['total_amount']),2) }}</td>
                                <td class="text-center">{{ isset($data['status']) ? ($data['status'] == 0 ? "Pending" : ($data['status'] == 1 ? "Paid" : "Partial Paid")) : "Unknown" }}</td>
                                <td class="justify-content-center" style="display: flex;">
                                    <a class="btn btn-warning m-0 py-1 px-2 me-2" href="{{ route('admission_payment_view', ['id' => $data['id']]) }}"><i class="fa-solid fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
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

</script>


@endsection