<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 h-100 py-0" href="/dashboard" target="_blank">
      <img src="../../assets/img/nsis.png" class="navbar-brand-img mh-100" alt="main_logo">
      <span class="ms-1 font-weight-bold">NSIS </span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#students" class="nav-link active" aria-controls="students" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-users"></i>
          </div>
          <span class="nav-link-text ms-1">Students</span>
        </a>
        <div class="collapse  show " id="students">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> Student Information </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#stinfo">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> Student Transaction <b class="caret"></b></span>
              </a>
              <div class="collapse " id="stinfo">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> S </span>
                      <span class="sidenav-normal"> Student Payments </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> I </span>
                      <span class="sidenav-normal"> Invoices </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> A </span>
                      <span class="sidenav-normal"> Account Payables </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#enrollments" class="nav-link" aria-controls="enrollments" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-right-to-bracket"></i>
          </div>
          <span class="nav-link-text ms-1">Enrollments</span>
        </a>
        <div class="collapse " id="enrollments">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item ">
              <a class="nav-link " href="#">
                <span class="sidenav-mini-icon"> N </span>
                <span class="sidenav-normal"> New Registrations </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="#">
                <span class="sidenav-mini-icon"> A </span>
                <span class="sidenav-normal"> Admissions </span>
              </a>
            </li>

          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterfiles" class="nav-link " aria-controls="masterfiles" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file-word"></i>
          </div>
          <span class="nav-link-text ms-1">Masterfiles</span>
        </a>
        <div class="collapse" id="masterfiles">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#stdfee">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> Students <b class="caret"></b></span>
              </a>
              <div class="collapse " id="stdfee">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> A </span>
                      <span class="sidenav-normal"> Admission Fees </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> M </span>
                      <span class="sidenav-normal"> Monthly Fees </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#">
                      <span class="sidenav-mini-icon text-xs"> S </span>
                      <span class="sidenav-normal"> Surcharge Formula </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-bs-toggle="collapse" aria-expanded="false" href="#sch">
                <span class="sidenav-mini-icon"> S </span>
                <span class="sidenav-normal"> School <b class="caret"></b></span>
              </a>
              <div class="collapse " id="sch">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link " href="grades">
                      <span class="sidenav-mini-icon text-xs"> G </span>
                      <span class="sidenav-normal"> Grades </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="classes">
                      <span class="sidenav-mini-icon text-xs">C </span>
                      <span class="sidenav-normal"> Classes </span>
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
          </ul>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#usermanagement" class="nav-link " aria-controls="usermanagement" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file-word"></i>
          </div>
          <span class="nav-link-text ms-1">User Management</span>
        </a>
        <div class="collapse " id="usermanagement">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Accounts </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Levels </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Roles </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Activities </span>
              </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link " href="/students">
                <span class="sidenav-mini-icon"> U </span>
                <span class="sidenav-normal"> User Assigning </span>
              </a>
            </li>
          </ul>
      </li>
      <li class="nav-item">
        <a data-bs-toggle="collapse" href="#reports" class="nav-link " aria-controls="reports" role="button" aria-expanded="false">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center d-flex align-items-center justify-content-center  me-2">
            <i class="fa-solid fa-file"></i>
          </div>
          <span class="nav-link-text ms-1">Reports</span>
        </a>
        <div class="collapse" id="reports">
          <ul class="nav ms-4 ps-3">
            <li class="nav-item">
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
            <li class="nav-item">
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
            <li class="nav-item">
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