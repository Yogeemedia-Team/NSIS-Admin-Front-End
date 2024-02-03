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
        <a data-bs-toggle="collapse" href="#students" class="nav-link mx-2 {{ request()->routeIs('students') || request()->routeIs('formpage') ||  request()->routeIs('student_payments') ? 'active' : 'text-white' }}" aria-controls="students" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Students</span>
        </a>
        <div class="collapse {{ request()->routeIs('students') || request()->routeIs('formpage') ||  request()->routeIs('student_payments') ? 'show' : '' }} " id="students">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('students') || request()->routeIs('formpage') ? 'active' : '' }} ">
              <a class="nav-link mx-0" href="{{ route('students') }}">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Student Information </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('student_payments') ? 'active' : '' }} ">
              <a class="nav-link mx-0" data-bs-toggle="collapse" aria-expanded="false" href="#stinfo">
                <span class="sidenav-mini-icon pe-4"> <i class="fas fa-stop"></i> </span>
                <span class="sidenav-normal"> Student Transaction <b class="caret"></b></span>
              </a>
              <div class="collapse" id="stinfo">
                <ul class="nav nav-sm flex-column">
                  <hr class="bg-black my-1">
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('student_payments') }}">
                      <span class="sidenav-mini-icon text-xs"> S </span>
                      <span class="sidenav-normal"> Student Payments </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> I </span>
                      <span class="sidenav-normal"> Invoices </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> A </span>
                      <span class="sidenav-normal"> Account Payables </span>
                    </a>
                  </li>
                  <hr class="bg-black my-1">
                </ul>
              </div>
            </li>

          </ul>
        </div>
      </li>
      <hr class="bg-white my-1">
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
              <a class="nav-link " href="{{ route('add_enrollment') }}">
                <span class="sidenav-mini-icon"> N </span>
                <span class="sidenav-normal"> New Registrations </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('enrollments') ? 'active' : '' }}">
              <a class="nav-link " href="{{ route('enrollments') }}">
                <span class="sidenav-mini-icon"> A </span>
                <span class="sidenav-normal"> Admissions </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterfiles" class="nav-link mx-2 {{ request()->routeIs('admission_fee') ? 'active' : 'text-white' }}" aria-controls="masterfiles" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file-word"></i>
          </div>
          <span class="nav-link-text ms-1">Masterfiles</span>
        </a>
        <div class="collapse {{ request()->routeIs('admission_fee') ? 'show' : '' }}" id="masterfiles">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link {{ request()->routeIs('admission_fee') ? 'active' : '' }} " data-bs-toggle="collapse" aria-expanded="false" href="#stdfee">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> Students <b class="caret"></b></span>
              </a>
              <div class="collapse {{ request()->routeIs('admission_fee') ? 'show' : '' }} " id="stdfee">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('admission_fee') ? 'active' : '' }} ">
                    <a class="nav-link " href="{{ route('admission_fee') }}">
                      <span class="sidenav-mini-icon text-xs"> A </span>
                      <span class="sidenav-normal"> Admission Fees </span>
                    </a>
                  </li>
                  <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('monthly_fee') ? 'active' : '' }} ">
                    <a class="nav-link " href="{{ route('monthly_fee') }}">
                      <span class="sidenav-mini-icon text-xs"> M </span>
                      <span class="sidenav-normal"> Monthly Fees </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#sch">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> School <b class="caret"></b></span>
              </a>
              <div class="collapse " id="sch">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('grades') }}">
                      <span class="sidenav-mini-icon text-xs"> G </span>
                      <span class="sidenav-normal"> Grades </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('classes') }}">
                      <span class="sidenav-mini-icon text-xs">C </span>
                      <span class="sidenav-normal"> Classes </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('extracurriculars') }}">
                      <span class="sidenav-mini-icon text-xs">E </span>
                      <span class="sidenav-normal"> Extracurriculars </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="{{ route('year_grade_class') }}">
                      <span class="sidenav-mini-icon text-xs">Y </span>
                      <span class="sidenav-normal"> Year Grade Class Relationship </span>
                    </a>
                  </li>
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
              <a class="nav-link" href="{{ route('user_accounts') }}">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Accounts </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_levels') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('user_levels') }}">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Levels </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_roles') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('user_roles') }}">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Roles </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_activities') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('user_activities') }}">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Activities </span>
              </a>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded {{ request()->routeIs('user_assigning') ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('user_assigning') }}">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Assigning </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <hr class="bg-white my-1">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#reports" class="nav-link mx-2 {{ request()->routeIs('students') ? 'text-white' : 'text-white' }}" aria-controls="reports" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file"></i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
        <div class="collapse {{ request()->routeIs('add_enrollment') ? '' : '' }}" id="reports">
          <ul class="nav px-4">
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#payreports">
                <span class="sidenav-mini-icon"> P </span>
                <span class="sidenav-normal"> Payment Reports <b class="caret"></b></span>
              </a>
              <div class="collapse " id="payreports">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> O </span>
                      <span class="sidenav-normal"> Outstanding List </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> P </span>
                      <span class="sidenav-normal"> Payment Summary </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> T </span>
                      <span class="sidenav-normal"> Transaction Detailed Report </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> P </span>
                      <span class="sidenav-normal"> Payment Delayed List </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#lists">
                <span class="sidenav-mini-icon"> L </span>
                <span class="sidenav-normal"> Lists <b class="caret"></b></span>
              </a>
              <div class="collapse " id="lists">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> S </span>
                      <span class="sidenav-normal"> Student Lists </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs">E </span>
                      <span class="sidenav-normal"> Extracurriculars </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item sub-menu-line mt-1 rounded">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#finance">
                <span class="sidenav-mini-icon"> F </span>
                <span class="sidenav-normal"> Finance Reports <b class="caret"></b></span>
              </a>
              <div class="collapse " id="finance">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> I </span>
                      <span class="sidenav-normal"> Income Summary </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
      </li>
      <hr class="bg-white my-1">
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