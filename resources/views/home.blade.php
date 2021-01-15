<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
      <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
   </head>
   <body>
      <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" href="./home">
            <img src="{{ asset('/assets/images/logo.svg') }}" alt="logo" /> </a>
            <a class="navbar-brand brand-logo-mini" href="./home">
            <img src="{{ asset('/assets/images/logo-mini.svg') }}" alt="logo" /> </a>
         </div>
         <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="Profile image"> </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                        <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                     </div>
                     <a class="dropdown-item disabled" style="color:gray">Mi perfil</a>
                     <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="nav__name">Cerrar Sesión</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </a>
                  </div>
               </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
            </button>
         </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
         <!-- partial:partials/_sidebar.html -->
         <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
               <li class="nav-item nav-profile">
                  <a href="#" class="nav-link">
                     <div class="profile-image">
                        <img class="img-xs rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="profile image">
                        <div class="dot-indicator bg-success"></div>
                     </div>
                     <div class="text-wrapper">
                        <p class="profile-name">{{ Auth::user()->name }}</p>
                        <p class="designation">{{ Auth::user()->empresa }}</p>
                     </div>
                  </a>
               </li>
               <li class="nav-item nav-category">Menú principal</li>
             
               <li class="nav-item">
                  <a class="nav-link" href="./home">
                  <i class="menu-icon typcn typcn-document-text"></i>
                  <span class="menu-title">Dashboard</span>
                  </a>
               </li>
                  <!-- dropdowns menu-->
                    <!-- productos-->
               <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#menu_productos" aria-expanded="false" aria-controls="menu_productos">
                     <i class="menu-icon typcn typcn-coffee"></i>
                     <span class="menu-title">Productos</span>
                     <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="menu_productos">
                     <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                        <a class="nav-link" href="./producto">Crear nuevo</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./admin_producto">Administrar productos</a>
                        </li>
                     </ul>
                  </div>
                  </li>
               <!-- fin dropdown productos-->
               <li class="nav-item">
                  <a class="nav-link" data-toggle="collapse" href="#menu_clientes" aria-expanded="false" aria-controls="menu_clientes">
                     <i class="menu-icon typcn typcn-coffee"></i>
                     <span class="menu-title">Clientes</span>
                     <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="menu_clientes">
                     <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                        <a class="nav-link" href="./cliente">Crear nuevo</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./admin_cliente">Administrar clientes</a>
                        </li>
                     </ul>
                  </div>
                  </li>
                  <!--fin dropdowns clientes-->
                  <!-- fin dropdowns menu-->
               <li class="nav-item">
                  <a class="nav-link" href="./propuesta">
                  <i class="menu-icon typcn typcn-bell"></i>
                  <span class="menu-title">Crear Propuesta</span>
                  </a>
               </li>
               <li class="nav-item">
                     <a style="background:white; color: blue;" href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <span class="nav__name">Cerrar Sesión</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                           @csrf
                        </form>
                     </a>   
               </li>
            </ul>
         </nav>
         <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">
              <!-- Page Title Header Starts-->
              <div class="row page-title-header">
                  <div class="col-12">
                      <div class="page-header">
                      <h4 class="page-title">Estadísticas</h4>
                      </div>
                  </div>
              </div>
              <!-- inicio row-->
               <!-- Page Title Header Ends-->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="d-flex">
                            <div class="wrapper">
                                <h3 class="mb-0 font-weight-semibold">32,451</h3>
                                <h5 class="mb-0 font-weight-medium text-primary">Visits</h5>
                                <p class="mb-0 text-muted">+14.00(+0.50%)</p>
                            </div>
                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                <canvas height="50" width="100" id="stats-line-graph-1"></canvas>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                            <div class="wrapper">
                                <h3 class="mb-0 font-weight-semibold">15,236</h3>
                                <h5 class="mb-0 font-weight-medium text-primary">Impressions</h5>
                                <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                            </div>
                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                <canvas height="50" width="100" id="stats-line-graph-2"></canvas>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                            <div class="wrapper">
                                <h3 class="mb-0 font-weight-semibold">7,688</h3>
                                <h5 class="mb-0 font-weight-medium text-primary">Conversation</h5>
                                <p class="mb-0 text-muted">+57.62(+0.76%)</p>
                            </div>
                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                <canvas height="50" width="100" id="stats-line-graph-3"></canvas>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
                            <div class="d-flex">
                            <div class="wrapper">
                                <h3 class="mb-0 font-weight-semibold">1,553</h3>
                                <h5 class="mb-0 font-weight-medium text-primary">Downloads</h5>
                                <p class="mb-0 text-muted">+138.97(+0.54%)</p>
                            </div>
                            <div class="wrapper my-auto ml-auto ml-lg-4">
                                <canvas height="50" width="100" id="stats-line-graph-4"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
              <!--fin row-->
              <!-- inicio row-->
              <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-0">Sales Statistics Overview</h4>
                    <div class="d-flex flex-column flex-lg-row">
                        <p>Lorem ipsum is placeholder text commonly used</p>
                        <ul class="nav nav-tabs sales-mini-tabs ml-lg-auto mb-4 mb-md-0" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="sales-statistics_switch_1" data-toggle="tab" role="tab" aria-selected="true">1D</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="sales-statistics_switch_2" data-toggle="tab" role="tab" aria-selected="false">5D</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="sales-statistics_switch_3" data-toggle="tab" role="tab" aria-selected="false">1M</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="sales-statistics_switch_4" data-toggle="tab" role="tab" aria-selected="false">1Y</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex flex-column flex-lg-row">
                        <div class="data-wrapper d-flex mt-2 mt-lg-0">
                            <div class="wrapper pr-5">
                            <h5 class="mb-0">Total Cost</h5>
                            <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold mb-0">15,263</h4>
                                <small class="ml-2 text-gray d-none d-lg-block"><b>89.5%</b> of 20,000 Total</small>
                            </div>
                            </div>
                            <div class="wrapper">
                            <h5 class="mb-0">Total Revenue</h5>
                            <div class="d-flex align-items-center">
                                <h4 class="font-weight-semibold mb-0">$753,098</h4>
                                <small class="ml-2 text-gray d-none d-lg-block"><b>10.5%</b> of 20,000 Total</small>
                            </div>
                            </div>
                        </div>
                        <div class="ml-lg-auto" id="sales-statistics-legend"></div>
                    </div>
                    <canvas class="mt-5" height="120" id="sales-statistics-overview"></canvas>
                </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                <div class="card-body d-flex flex-column">
                    <div class="wrapper">
                        <h4 class="card-title mb-0">Net Profit Margin</h4>
                        <p>Started collecting data from February 2019</p>
                        <div class="mb-4" id="net-profit-legend"></div>
                    </div>
                    <canvas class="my-auto mx-auto" height="250" id="net-profit"></canvas>
                </div>
                </div>
            </div>
        </div>
              <!--fin row-->
            </div>
          </div>
      </div>

      
      
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/js/producto.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
   </body>
</html>