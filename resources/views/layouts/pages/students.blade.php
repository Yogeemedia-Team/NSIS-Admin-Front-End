@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-2 top-1 px-0 mx-2 shadow-none border-radius-xl z-index-sticky side-bar-bg" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb text-white">
        {{ Breadcrumbs::render('students') }}
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
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="container-fluid body_content py-4">
    <!-- Students table -->

    <div class="card">
      <div class="card-header pt-1 px-3">
        <div class="row bg-secondary py-2 px-1 rounded-4">
          <div class="col-md-6 align-self-center">
            <h5 class="font-weight-bolder text-white mb-0">Student Information</h5>
          </div>
          <div class="col-md-6 text-end">
            <a href="{{ route('formpage') }}" class="btn btn-primary mb-0"><i class="fa-solid fa-plus me-2"></i> Add New</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0">

        <div class="table-responsive">
          <table id="dataTable" class="table table-striped" style="width:100%">
            <thead>
              <tr>
                <th class="px-2">Admission No</th>
                <th class="px-2">First Name</th>
                <th class="px-2">Last Name</th>
                <th class="px-2">Email</th>
                <th class="px-2">Mobile</th>
                <th class="px-2 text-center">Action</th>
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
                <td class="justify-content-center" style="display: flex;">
                  <a class="btn btn-warning m-0 py-1 px-2 me-2" href="/single-student/{{ $student['student_id'] }}"><i class="fa-solid fa-eye"></i></a>
                  <a class="btn btn-secondary m-0 py-1 px-2 me-2" href="{{ route('student_edit', ['studentId' => $student['student_id']]) }}"><i class="fas fa-edit"></i></a>

                  <form id="deleteForm{{ $student['id'] }}" action="{{ route('user_account_delete', ['id' => $student['id']]) }}" method="POST">

                    @csrf
                    @method('DELETE')
                    <button style="border:2px solid #c1476e" type="button" class="btn btn-danger m-0 py-1 px-2" onclick="confirmDelete('{{ $student['id'] }}')">
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
    </div>
    <!-- Students table -->
  </div>
  <footer class="footer">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 offset-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <p class="text-white fw-bold mb-0">Version 1.0.0</p>
            </li>
          </ul>
        </div>
      </div>
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