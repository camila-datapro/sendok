<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
      <link rel="stylesheet" href="../assets/vendors/iconfonts/ionicons/css/ionicons.css">
      <link rel="stylesheet" href="../assets/vendors/iconfonts/typicons/src/font/typicons.css">
      <link rel="stylesheet" href="../assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
      <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
      <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.addons.css">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="../assets/css/shared/style.css">
      <!-- endinject -->
      <!-- Layout styles -->
      <link rel="stylesheet" href="../assets/css/demo_1/style.css">
      <!-- End Layout styles -->
      <link rel="shortcut icon" href="../assets/images/favicon.png" />
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
               <a class="navbar-brand brand-logo" href="/home">
               <img src="../assets/images/logo.svg" alt="logo" /> </a>
               <a class="navbar-brand brand-logo-mini" href="/home">
               <img src="../assets/images/logo-mini.svg" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                     <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                     <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="Profile image"> </a>
                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                           <img class="img-md rounded-circle" src="../assets/images/faces/face8.jpg" alt="Profile image">
                           <p class="mb-1 mt-3 font-weight-semibold">Sasha Stifel</p>
                           <p class="font-weight-light text-muted mb-0">sstifel@datapro.cl</p>
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
                           <img class="img-xs rounded-circle" src="../assets/images/faces/face8.jpg" alt="profile image">
                           <div class="dot-indicator bg-success"></div>
                        </div>
                        <div class="text-wrapper">
                           <p class="profile-name">Sasha Stifel</p>
                           <p class="designation">DATAPRO</p>
                        </div>
                     </a><!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
      <!-- plugins:css -->
      <link rel="stylesheet" href=" {{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
      <!-- endinject -->
      <!-- plugin css for this page -->
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
      <!-- endinject -->
      <!-- Layout styles -->
      <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
      <!-- End Layout styles -->
      <link rel="shortcut icon" href="../assets/images/favicon.png" />
   </head>
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
               <a class="navbar-brand brand-logo" href="/home">
               <img src="../assets/images/logo.svg" alt="logo" /> </a>
               <a class="navbar-brand brand-logo-mini" href="/home">
               <img src="../assets/images/logo-mini.svg" alt="logo" /> </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                     <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                     <img class="img-xs rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="Profile image"> </a>
                     <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                           <img class="img-md rounded-circle" src="{{ asset('/assets/images/faces/face8.jpg') }}" alt="Profile image">
                           <p class="mb-1 mt-3 font-weight-semibold">Sasha Stifel</p>
                           <p class="font-weight-light text-muted mb-0">sstifel@datapro.cl</p>
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
                           <p class="profile-name">Sasha Stifel</p>
                           <p class="designation">DATAPRO</p>
                        </div>
                     </a>
                  </li>
                  <li class="nav-item nav-category">Menú principal</li>
                  <li class="nav-item">
                     <a class="nav-link" href="/home">
                     <i class="menu-icon typcn typcn-document-text"></i>
                     <span class="menu-title">Crear Cliente</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/producto">
                     <i class="menu-icon typcn typcn-shopping-bag"></i>
                     <span class="menu-title">Crear Producto</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/cliente">
                     <i class="menu-icon typcn typcn-th-large-outline"></i>
                     <span class="menu-title">Crear Cliente</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/propuesta">
                     <i class="menu-icon typcn typcn-bell"></i>
                     <span class="menu-title">Crear Propuesta</span>
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
                           <h4 class="page-title">Crear nuevo producto</h4>
                        </div>
                     </div>
                  </div>
                  <!-- Page Title Header Ends-->
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                En desarrollo...
                            </div>
                        </div>
                    </div>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->

               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <!-- End custom js for this page-->
   </body>
</html>
                  </li>
                  <li class="nav-item nav-category">Menú principal</li>
                  <li class="nav-item">
                     <a class="nav-link" href="/home">
                     <i class="menu-icon typcn typcn-document-text"></i>
                     <span class="menu-title">Crear Cliente</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/producto">
                     <i class="menu-icon typcn typcn-shopping-bag"></i>
                     <span class="menu-title">Crear Producto</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/cliente">
                     <i class="menu-icon typcn typcn-th-large-outline"></i>
                     <span class="menu-title">Crear Cliente</span>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/propuesta">
                     <i class="menu-icon typcn typcn-bell"></i>
                     <span class="menu-title">Crear Propuesta</span>
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
                           <h4 class="page-title">Crear nueva propuesta comercial</h4>
                        </div>
                     </div>
                  </div>
                  <!-- Page Title Header Ends-->
                  <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                En desarrollo...
                            </div>
                        </div>
                    </div>
               </div>
               <!-- content-wrapper ends -->
               <!-- partial:partials/_footer.html -->

               <!-- partial -->
            </div>
            <!-- main-panel ends -->
         </div>
         <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
      <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page-->
      <!-- End plugin js for this page-->
      <!-- inject:js -->
      <script src="../assets/js/shared/off-canvas.js"></script>
      <script src="../assets/js/shared/misc.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="../assets/js/demo_1/dashboard.js"></script>
      <!-- End custom js for this page-->
   </body>
</html>