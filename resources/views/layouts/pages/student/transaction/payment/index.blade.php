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
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-auto">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="class" class="col-form-label">Class : </label>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-select pe-5" name="class" required>
                                                <option value="class1">Class 1</option>
                                                <option value="class2">Class 2</option>
                                                <option value="class3">Class 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-auto">
                                            <label for="admission_no" class="col-form-label">Addmission No : </label>
                                        </div>
                                        <div class="col-auto">
                                            <input type="text" class="form-control" name="admission_no" placeholder="Enter Admission Number" required>
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
                <span class="border-0"><strong class="text-dark">Addmission No :</strong> &nbsp; 12345678</span>
                <span class="border-0 ps-3"><strong class="text-dark">Name:</strong> &nbsp; Tharaka Dissanayake</span>
                <span class="border-0 ps-3"><strong class="text-dark">Class:</strong> &nbsp; Grade 8 - A</span>

                <div class="card shadow-none border mt-3">
                    <div class="card-body">
                        <span class="text-dark"><strong>Payment Details - Payment ID -12345678</strong></span>
                        <div class="accordion" id="transactionAccordion">
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="transactionOne">
                                    <button class="accordion-button dropdown-toggle pb-2 border-bottom fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#transactionCollapseOne" aria-expanded="true" aria-controls="transactionCollapseOne" role="button" tabindex="0">
                                        <div class="row">
                                            <div class="col-auto text-sm">Invoice No: 12345678</div>
                                            <div class="col-auto text-sm">Date: 2023/02/15</div>
                                            <div class="col-auto text-sm">Due Date: 2023/02/15</div>
                                            <div class="col-auto text-sm">Invoice Total: 12500.00</div>
                                            <div class="col-auto text-sm">Total Paid: 6500.00</div>
                                            <div class="col-auto text-sm">Total Due: 6000.00</div>
                                            <div class="col-auto text-sm">Invoice Status: Partially Paid</div>
                                        </div>
                                    </button>


                                </h6>
                                <div id="transactionCollapseOne" class="accordion-collapse collapse show" aria-labelledby="transactionOne">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0 table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="text-secondary text-sm px-1">ID</th>
                                                        <th class="text-secondary text-sm px-1">Date</th>
                                                        <th class="text-secondary text-sm px-1">Due Date</th>
                                                        <th class="text-secondary text-sm px-1">Description</th>
                                                        <th class="text-secondary text-sm px-1">Category</th>
                                                        <th class="text-secondary text-sm px-1">Amount</th>
                                                        <th class="text-secondary text-sm px-1">Paid Amount</th>
                                                        <th class="text-secondary text-sm px-1">Due Amount</th>
                                                        <th class="text-secondary text-sm px-1">Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-sm">1</td>
                                                        <td class="text-sm">2023-01-01</td>
                                                        <td class="text-sm">2023-01-15</td>
                                                        <td class="text-sm">Sample Description 1</td>
                                                        <td class="text-sm">Monthly Fee</td>
                                                        <td class="text-sm">$100.00</td>
                                                        <td class="text-sm">$50.00</td>
                                                        <td class="text-sm">$50.00</td>
                                                        <td class="text-sm">Paid</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">2</td>
                                                        <td class="text-sm">2023-02-01</td>
                                                        <td class="text-sm">2023-02-15</td>
                                                        <td class="text-sm">Sample Description 2</td>
                                                        <td class="text-sm">Surcharge</td>
                                                        <td class="text-sm">$150.00</td>
                                                        <td class="text-sm">$100.00</td>
                                                        <td class="text-sm">$50.00</td>
                                                        <td class="text-sm">Partially Paid</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h6 class="accordion-header" id="transactionTwo">
                                    <button class="accordion-button dropdown-toggle pb-2 border-bottom fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#transactionCollapseTwo" aria-expanded="true" aria-controls="transactionCollapseTwo" role="button" tabindex="0">
                                        <div class="row">
                                            <div class="col-auto text-sm">Invoice No: 87654321</div>
                                            <div class="col-auto text-sm">Date: 2023/03/15</div>
                                            <div class="col-auto text-sm">Due Date: 2023/03/15</div>
                                            <div class="col-auto text-sm">Invoice Total: 13500.00</div>
                                            <div class="col-auto text-sm">Total Paid: 7000.00</div>
                                            <div class="col-auto text-sm">Total Due: 6500.00</div>
                                            <div class="col-auto text-sm">Invoice Status: Unpaid</div>
                                        </div>
                                    </button>
                                </h6>
                                <div id="transactionCollapseTwo" class="accordion-collapse collapse" aria-labelledby="transactionTwo">
                                    <div class="accordion-body">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0 table-sm">
                                                <thead>
                                                    <tr>
                                                        <th class="text-secondary text-sm px-1">ID</th>
                                                        <th class="text-secondary text-sm px-1">Date</th>
                                                        <th class="text-secondary text-sm px-1">Due Date</th>
                                                        <th class="text-secondary text-sm px-1">Description</th>
                                                        <th class="text-secondary text-sm px-1">Category</th>
                                                        <th class="text-secondary text-sm px-1">Amount</th>
                                                        <th class="text-secondary text-sm px-1">Paid Amount</th>
                                                        <th class="text-secondary text-sm px-1">Due Amount</th>
                                                        <th class="text-secondary text-sm px-1">Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-sm">3</td>
                                                        <td class="text-sm">2023-03-01</td>
                                                        <td class="text-sm">2023-03-15</td>
                                                        <td class="text-sm">Sample Description 3</td>
                                                        <td class="text-sm">Monthly Fee</td>
                                                        <td class="text-sm">$200.00</td>
                                                        <td class="text-sm">$150.00</td>
                                                        <td class="text-sm">$50.00</td>
                                                        <td class="text-sm">Partially Paid</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-sm">4</td>
                                                        <td class="text-sm">2023-04-01</td>
                                                        <td class="text-sm">2023-04-15</td>
                                                        <td class="text-sm">Sample Description 4</td>
                                                        <td class="text-sm">Surcharge</td>
                                                        <td class="text-sm">$180.00</td>
                                                        <td class="text-sm">$100.00</td>
                                                        <td class="text-sm">$80.00</td>
                                                        <td class="text-sm">Unpaid</td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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
@endsection