 @extends('main.app')
 @section('content')
 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
   <!-- Navbar -->
   <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
     <div class="container-fluid py-1 px-3">
       <nav aria-label="breadcrumb">
         {{ Breadcrumbs::render('home') }}
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
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-md-7 col-lg-8 my-auto">
                 <div class="d-flex flex-column h-100">
                   <h2 class="font-weight-bold">Dashboard</h2>
                   <p class="mb-5">NSIS - School Management System</p>
                   <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                     Read More
                     <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                   </a>
                 </div>
               </div>
               <div class="col-md-5 col-lg-4 ms-auto text-center mt-5 mt-lg-0">
                 <div class="border-radius-lg h-100">
                   <!-- <img src="../assets/img/shapes/waves`-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves"> -->
                   <div class="position-relative d-flex align-items-center justify-content-center h-100">
                     <img class="w-100 position-relative z-index-2 pt-4" src="../assets/img/children.png" alt="rocket">
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

     </div>
     <div class="row mt-4">
       <div class="col-md-12">
         <div class="card z-index-2">
           <div class="p-3">
             <h6>Pay overview</h6>
             <p class="text-sm">
               <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
               <span class="font-weight-bold">4% more</span> in November
             </p>
           </div>
           <div class="card-body p-3">
             <div class="chart">
               <canvas id="chart-line" class="chart-canvas" height="300" style="display: block; box-sizing: border-box; height: 300px; width: 750px;" width="750"></canvas>
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- Cards section  -->
     <div class="row mt-4">
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Payments</p>
                   <h5 class="font-weight-bolder mb-0">
                     XXXXXX
                     <br>
                     <span class="text-success text-sm font-weight-bolder">XX%</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="h-100 w-100 icon icon-shape bg-gradient-secondary shadow text-center border-radius-md d-flex align-items-center justify-content-center">
                   <i class="fa-solid fa-3x fa-user"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Outstanding</p>
                   <h5 class="font-weight-bolder mb-0">
                     XXXXXX
                     <br>
                     <span class="text-success text-sm font-weight-bolder">XX%</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="h-100 w-100 icon icon-shape bg-gradient-success shadow text-center border-radius-md d-flex align-items-center justify-content-center">
                   <i class="fa-solid fa-3x fa-person-chalkboard"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">To be Confirmed</p>
                   <h5 class="font-weight-bolder mb-0">
                     XXXXXX
                     <br>
                     <span class="text-success text-sm font-weight-bolder">XX%</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="h-100 w-100 icon icon-shape bg-gradient-info shadow text-center border-radius-md d-flex align-items-center justify-content-center">
                   <i class="fa-solid fa-3x fa-desktop"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-xl-3 col-sm-6">
         <div class="card">
           <div class="card-body p-3">
             <div class="row">
               <div class="col-8">
                 <div class="numbers">
                   <p class="text-sm mb-0 text-capitalize font-weight-bold">Red Zone</p>
                   <h5 class="font-weight-bolder mb-0">
                     XXXXXX
                     <br>
                     <span class="text-success text-sm font-weight-bolder">XX%</span>
                   </h5>
                 </div>
               </div>
               <div class="col-4 text-end">
                 <div class="h-100 w-100 icon icon-shape bg-gradient-warning shadow text-center border-radius-md d-flex align-items-center justify-content-center">
                   <i class="fa-solid fa-3x fa-clipboard"></i>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
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

 <script src="{{ asset('assets/js/plugins/chartjs.min.js')}}"></script>
 <script>
   var ctx2 = document.getElementById("chart-line").getContext("2d");

   var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

   gradientStroke1.addColorStop(1, '#969FEE');
   gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
   gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

   var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

   gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
   gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
   gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors
  const currentDate = new Date();
const currentMonth = currentDate.getMonth() + 1; // Months are zero-indexed, so add 1
const currentDay = new Date(currentDate.getFullYear(), currentMonth, 0).getDate();

const daysOfMonth = Array.from({ length: currentMonth === 1 ? 31 : currentDay }, (_, i) => (i + 1).toString());
const daysOfJanuary = Array.from({ length: currentMonth === 1 ? currentDay : 31 }, (_, i) => (i + 1).toString());

const generateRandomIncomes = () => {
  return Array.from({ length: currentMonth === 1 ? currentDay : 31 }, () => Math.floor(Math.random() * 50000) + 5000);
};

const mobileAppsData = generateRandomIncomes();
const websitesData = generateRandomIncomes();

new Chart(ctx2, {
  type: "line",
  data: {
    labels: currentMonth === 1 ? daysOfJanuary : daysOfMonth,
    datasets: [
      {
        label: "Total Income",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#82d616",
        borderWidth: 3,
       // backgroundColor: gradientStroke1,
       // fill: true,
        data: currentMonth === 1 ? generateRandomIncomes() : mobileAppsData,
        maxBarThickness: 6
      },
      {
        label: "Total Outstanding",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#c1476e",
        borderWidth: 3,
       // backgroundColor: gradientStroke2,
        //fill: true,
        data: currentMonth === 1 ? generateRandomIncomes() : websitesData,
        maxBarThickness: 6
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      },
      centerTitle: {
        display: true,
        text: "December",
        position: "bottom",
      },
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        min: 0,
        max: 100000,
        ticks: {
          stepSize: 10000,
          callback: function (value, index, values) {
            return value.toLocaleString(); // Format ticks as desired
          }
        }
      },
      x: {
        grid: {
          display: false,
        },
        ticks: {
          display: true,
          color: '#b2b9bf',
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
  plugins: [{
    id: 'centerTitle',
    beforeDraw: (chart) => {
      const ctx = chart.ctx;
      const { chartArea, scales } = chart;
      const xAxis = scales['x'];
      const yPosition = chartArea.bottom + 65; // Adjust the y position as needed

      ctx.save();
      ctx.textAlign = 'center';
      ctx.textBaseline = 'middle';
      ctx.fillStyle = '#000'; // Set the color for the title

      // Calculate the x position based on the center of the x-axis
      const xPosition = (xAxis.left + xAxis.right) / 2;

      ctx.fillText(chart.options.plugins.centerTitle.text, xPosition, yPosition);
      ctx.restore();
    }
  }],
})
 </script>
 @endsection