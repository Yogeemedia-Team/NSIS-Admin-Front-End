@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                {{ Breadcrumbs::render('students') }}
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
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
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
            <div class="card-body">
                <div class="text-end">
                    <a href="/formpage" class="btn btn-primary"><i class="fa-solid fa-plus me-2"></i> Add New</a>
                </div>
                <table id="dataTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Admission No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach($studentDetails as $student)
                        <tr>
                             <td>{{ $student['sd_admission_no'] }}</td>
                            <td>{{ $student['sd_first_name'] }}</td>
                            <td>{{ $student['sd_last_name'] }}</td>
                            <td>{{ $student['sd_email_address'] }}</td>
                            <td>{{ $student['sd_telephone_mobile'] }}</td>
                            <td style="display: flex;">
                                <a class="btn btn-warning m-0 py-1 px-2" href="/single-student/{{ $student['student_id'] }}"><i class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('student_delete', $student['student_id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger m-0 py-1 px-2" onclick="confirmDelete(event)">
                                    <i class="fa-solid fa-trash"></i>
                                    </button> 
                                </form>
  
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
        <!-- Students table -->
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <!-- <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        © <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Yogeemedia</a>
                        for a better web.
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>
    </footer>
</main>

@endsection
@section('footer-scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(studentId) {
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
                document.getElementById('deleteForm' + studentId).submit();
            }
            // If the user clicks "No" or closes the dialog, do nothing
        });
    }
</script>
@endsection