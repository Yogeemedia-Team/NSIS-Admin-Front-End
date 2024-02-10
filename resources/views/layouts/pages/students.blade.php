@extends('main.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 side-bar-bg  h-100 ">
  <!-- Navbar -->
  @include('components/header-ui')
  <!-- End Navbar -->
  <div class="container-fluid body_content py-4">
    @include('components/session-section')

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
  @include('components/footer-ui')
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