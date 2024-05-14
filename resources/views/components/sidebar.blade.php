<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0  fixed-start side-bar-bg" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 h-100 side-bar-log-bg py-2" href="/dashboard" target="_blank">
      <div class="row ">
        <div class="col-6 text-center">
          <img src="../../assets/img/nsis.png" class="navbar-brand-img bg-white rounded-5 p-1 mh-100 w-75" alt="main_logo">

        </div>
        <div class="col-6 align-self-center">
          <span class="ms-1 fs-5 mb-0 text-white fw-bold">NSIS {{ Cache::get('userType') }}</span>

        </div>
      </div>
    </a>
  </div>
  <hr class="bg-white my-1 ">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link mx-2 {{ request()->routeIs('dashboard') ? 'active' : 'text-white' }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-home"></i>
          </div>
          <span class="nav-link-text ms-1">Home</span>
        </a>
      </li>
      <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#students" class="nav-link mx-2 {{ request()->routeIs('students') ||  request()->routeIs('students_search') || request()->routeIs('formpage') ||
            request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) || request()->routeIs('single-student') || request()->routeIs('single-student') 
            || request()->routeIs('student_edit') || request()->routeIs('add_student_payment_get_invoices') || request()->routeIs('student_paymet_view') || request()->routeIs('add_student_payment')  || request()->routeIs('account_payable') || request()->routeIs('student-upgrade-ui') || request()->routeIs('admission_payment') || request()->routeIs('admission_payment_search') || request()->routeIs('admission_payment_create') || request()->routeIs('admission_payment_view') ||  request()->routeIs('student-upgrade-ui-search') || request()->routeIs('account_payable_search')  || request()->routeIs('invoices') || request()->routeIs('invoices_search') || request()->routeIs('invoices_view') 
             ? 'active' : 'text-white' }}" aria-controls="students" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Students</span>
        </a>
        <div class="collapse {{ request()->routeIs('students') ||  request()->routeIs('students_search') || request()->routeIs('formpage') ||
            request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) || request()->routeIs('single-student') || request()->routeIs('single-student') ||
             request()->routeIs('student_edit') || request()->routeIs('add_student_payment_get_invoices') || request()->routeIs('student_paymet_view') || request()->routeIs('add_student_payment')  || request()->routeIs('account_payable') || request()->routeIs('student-upgrade-ui') || request()->routeIs('admission_payment') || request()->routeIs('admission_payment_search') || request()->routeIs('admission_payment_create') || request()->routeIs('admission_payment_view') ||  request()->routeIs('student-upgrade-ui-search') || request()->routeIs('account_payable_search')  || request()->routeIs('invoices') || request()->routeIs('invoices_search') || request()->routeIs('invoices_view')  ? 'show' : '' }} " id="students">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('students') ||  request()->routeIs('students_search') || request()->routeIs('formpage') || request()->routeIs('single-student') || request()->routeIs('student_edit') ? 'active' : '' }} ">
              <a class="nav-link mx-0" href="{{ route('students') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Student Information </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) || request()->routeIs('add_student_payment_get_invoices') || request()->routeIs('student_paymet_view') || request()->routeIs('add_student_payment')  || request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) || request()->routeIs('account_payable') || request()->routeIs('student-upgrade-ui') || request()->routeIs('admission_payment') || request()->routeIs('admission_payment_search') || request()->routeIs('admission_payment_create') || request()->routeIs('admission_payment_view') ||  request()->routeIs('student-upgrade-ui-search') || request()->routeIs('account_payable_search')  || request()->routeIs('invoices') || request()->routeIs('invoices_search') || request()->routeIs('invoices_view')   ? 'active' : '' }} ">
              <a class="nav-link mx-0" data-bs-toggle="collapse" aria-expanded="false" href="#stinfo">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Student Transaction <b class="caret"></b></span>
              </a>
              <div class="collapse {{request()->routeIs('add_student_payment_get_invoices') || request()->routeIs('student_paymet_view') || request()->routeIs('add_student_payment')  || request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) || request()->routeIs('account_payable') || request()->routeIs('student-upgrade-ui') || request()->routeIs('admission_payment') || request()->routeIs('admission_payment_search') || request()->routeIs('admission_payment_create') || request()->routeIs('admission_payment_view') ||  request()->routeIs('student-upgrade-ui-search') || request()->routeIs('account_payable_search') || request()->routeIs('invoices') || request()->routeIs('invoices_search') || request()->routeIs('invoices_view')  ? 'show' : ''}} " id="stinfo">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">
                  <li class="nav-item {{request()->routeIs('add_student_payment_get_invoices') || request()->routeIs('student_paymet_view') || request()->routeIs('add_student_payment')  || request()->routeIs('student_payments' ) || request()->routeIs('student_payments_get_invoices' ) || request()->routeIs('student_payments_search' ) ? 'active sub-title' : ''}} ">
                    <a class="nav-link mx-2 px-0" href="{{ route('student_payments') }}">
                      <span class="sidenav-mini-icon pe-4"><i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Student Payments </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item {{request()->routeIs('invoices')|| request()->routeIs('invoices_search') || request()->routeIs('invoices_view')  ? 'active sub-title' : ''}}">
                    <a class="nav-link mx-2 px-0" href="{{ route('invoices') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Invoices </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item {{request()->routeIs('account_payable') || request()->routeIs('account_payable_search') ? 'active sub-title' : ''}}">
                    <a class="nav-link mx-2 px-0" href="{{ route('account_payable') }}" disable>
                      <span class="sidenav-mini-icon pe-3"><i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Account Payable </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item {{ request()->routeIs('admission_payment') || request()->routeIs('admission_payment_search') || request()->routeIs('admission_payment_create') || request()->routeIs('admission_payment_view') || request()->routeIs('student-upgrade-ui-search') ? 'active sub-title' : ''}}">
                    <a class="nav-link mx-2 px-0" href="{{ route('admission_payment') }}" disable>
                      <span class="sidenav-mini-icon pe-3"><i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Admission Payments </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item {{request()->routeIs('student-upgrade-ui') || request()->routeIs('student-upgrade-ui-search') ? 'active sub-title' : ''}}">
                    <a class="nav-link mx-2 px-0" href="{{ route('student-upgrade-ui') }}" disable>
                      <span class="sidenav-mini-icon pe-3"><i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Promote Student </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                </ul>
              </div>
            </li>

          </ul>
        </div>
      </li>
      <!-- <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#enrollments" class="nav-link mx-2 {{ request()->routeIs('add_enrollment') || request()->routeIs('enrollments') ? 'active' : 'text-white' }}" aria-controls="enrollments" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-right-to-bracket"></i>
          </div>
          <span class="nav-link-text ms-1">Enrollments</span>
        </a>
        <div class="collapse {{ request()->routeIs('add_enrollment') || request()->routeIs('enrollments') ? 'show' : '' }}" id="enrollments">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('add_enrollment') ? 'active' : '' }} ">
              <a class="nav-link mx-0  " href="{{ route('add_enrollment') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> New Registrations </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('enrollments') ? 'active' : '' }}">
              <a class="nav-link mx-0  " href="{{ route('enrollments') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Admissions </span>
              </a>
            </li>

          </ul>
        </div>
      </li> -->
      <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterfiles" class="nav-link mx-2 {{ request()->routeIs('admission_fee') || request()->routeIs('monthly_fee') || request()->routeIs('extracurriculars') || request()->routeIs('grades') || request()->routeIs('classes') ||request()->routeIs('year_grade_class') || request()->routeIs('add_year_grade_class') || request()->routeIs('extracurriculars') ? 'active' : 'text-white' }}" aria-controls="masterfiles" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file-word"></i>
          </div>
          <span class="nav-link-text ms-1">Masterfiles</span>
        </a>
        <div class="collapse  {{ request()->routeIs('admission_fee') || request()->routeIs('monthly_fee') || request()->routeIs('extracurriculars') || request()->routeIs('grades') || request()->routeIs('classes') ||request()->routeIs('year_grade_class') || request()->routeIs('add_year_grade_class') || request()->routeIs('extracurriculars') ? 'show' : '' }}" id="masterfiles">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line  {{ request()->routeIs('admission_fee') || request()->routeIs('monthly_fee') ? 'active' : '' }}  sub-menu-line mt-1 rounded">
              <a class="nav-link mx-0 " data-bs-toggle="collapse" aria-expanded="false" href="#stdfee">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Students <b class="caret"></b></span>
              </a>
              <div class="collapse {{ request()->routeIs('admission_fee') || request()->routeIs('monthly_fee') ? 'show' : '' }} " id="stdfee">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">

                  <li class="nav-item mt-1 rounded {{ request()->routeIs('admission_fee') ? 'active sub-title' : '' }} ">
                    <a class="nav-link mx-2 px-0" href="{{ route('admission_fee') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Admission Fees </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item mt-1 rounded {{ request()->routeIs('monthly_fee') ? 'active sub-title' : '' }} ">
                    <a class="nav-link mx-2 px-0" href="{{ route('monthly_fee') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Monthly Fees </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('grades') || request()->routeIs('classes') ||request()->routeIs('year_grade_class') || request()->routeIs('add_year_grade_class') || request()->routeIs('extracurriculars') ? 'active' : '' }}">
              <a class="nav-link mx-0  " data-bs-toggle="collapse" aria-expanded="false" href="#sch">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> School <b class="caret"></b></span>
              </a>
              <div class="collapse {{ request()->routeIs('grades') || request()->routeIs('classes') ||request()->routeIs('year_grade_class') || request()->routeIs('add_year_grade_class') || request()->routeIs('extracurriculars') ? 'show' : '' }}" id="sch">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('grades') ? 'active sub-title' : '' }}">
                    <a class="nav-link mx-2 px-0" href="{{ route('grades') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Grades </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('classes') ? 'active sub-title' : '' }}">
                    <a class="nav-link mx-2 px-0" href="{{ route('classes') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Classes </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('extracurriculars') ? 'active sub-title' : '' }}">
                    <a class="nav-link mx-2 px-0" href="{{ route('extracurriculars') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Extracurriculars </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{request()->routeIs('year_grade_class') || request()->routeIs('add_year_grade_class') ? 'active sub-title' : '' }}">
                    <a class="nav-link mx-2 px-0" href="{{ route('year_grade_class') }}">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Year Grade Class Relationship </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                </ul>
              </div>
            </li>
          </ul>
      </li>
      <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#usermanagement" class="nav-link mx-2 {{ request()->routeIs('user_accounts') || request()->routeIs('user_levels') || request()->routeIs('user_roles')|| request()->routeIs('user_activities')|| request()->routeIs('user_assigning') ? 'active' : 'text-white' }}" aria-controls="usermanagement" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file-word"></i>
          </div>
          <span class="nav-link-text ms-1">User Management</span>
        </a>
        <div class="collapse {{ request()->routeIs('user_accounts') || request()->routeIs('user_levels') || request()->routeIs('user_roles')|| request()->routeIs('user_activities')|| request()->routeIs('user_assigning') ? 'show' : '' }} " id="usermanagement">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_accounts') ? 'active' : '' }}">
              <a class="nav-link mx-0" href="{{ route('user_accounts') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> User Accounts </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_levels') ? 'active' : '' }}">
              <a class="nav-link mx-0" href="{{ route('user_levels') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> User Levels </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_roles') ? 'active' : '' }}">
              <a class="nav-link mx-0" href="{{ route('user_roles') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> User Roles </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_activities') ? 'active' : '' }}">
              <a class="nav-link mx-0" href="{{ route('user_activities') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> User Activities </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_assigning') ? 'active' : '' }}">
              <a class="nav-link mx-0" href="{{ route('user_assigning') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> User Assigning </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <hr class="bg-white my-1">
      <!-- <li class="nav-item">
        <a data-bs-toggle="collapse" href="#reports" class="nav-link mx-2 {{ request()->routeIs('students') ||  request()->routeIs('students_search') ? 'text-white' : 'text-white' }}" aria-controls="reports" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file"></i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
        <div class="collapse {{ request()->routeIs('add_enrollment') ? '' : '' }}" id="reports">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link mx-0" data-bs-toggle="collapse" aria-expanded="false" href="#payreports">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Payment Reports <b class="caret"></b></span>
              </a>
              <div class="collapse {{ request()->routeIs('add_enrollment') ? '' : '' }} " id="payreports">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('add_enrollment') ? '' : '' }}">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Outstanding List </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('add_enrollment') ? '' : '' }}">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Payment Summary </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('add_enrollment') ? '' : '' }}">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Transaction Detailed Report </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item {{ request()->routeIs('add_enrollment') ? '' : '' }}">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Payment Delayed List </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link mx-0" data-bs-toggle="collapse" aria-expanded="false" href="#lists">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Lists <b class="caret"></b></span>
              </a>
              <div class="collapse " id="lists">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">

                  <li class="nav-item">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Student Lists </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">

                  <li class="nav-item">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Extracurriculars </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link mx-0" data-bs-toggle="collapse" aria-expanded="false" href="#finance">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Finance Reports <b class="caret"></b></span>
              </a>
              <div class="collapse " id="finance">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">
                  <li class="nav-item">
                    <a class="nav-link mx-2 px-0" href="#">
                      <span class="sidenav-mini-icon  pe-3"> <i class="fas fa-chevron-right"></i></span>
                      <span class="sidenav-normal"> Income Summary </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                </ul>
              </div>
            </li>
          </ul>
      </li>
      <hr class="bg-white my-1"> -->
    </ul>
  </div>
  <div class="sidenav-footer mx-3 mt-3 pt-3">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('../../assets/img/curved-images/white-curved.jpg')"></div>
      <div class="card-body text-start p-3 w-100">
        <div class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
          <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
        </div>
        <div class="docs-info">
          <h6 class="text-white up mb-0">Need help?</h6>
          <p class="text-xs font-weight-bold">Please check our docs</p>
          <a href="/documant" target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
        </div>
      </div>
    </div>
  </div>
</aside>