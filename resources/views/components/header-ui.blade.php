<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-2 top-1 px-0 mx-2 shadow-none border-radius-xl z-index-sticky side-bar-bg" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{ Breadcrumbs::render(request()->route()->getName(), ...array_values(request()->route()->parameters())) }}
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