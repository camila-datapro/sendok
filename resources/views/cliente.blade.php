<!DOCTYPE html>
<html lang="en">
   <head>
   <meta name="csrg-token" content="{{ csrf_token() }}" />
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
                  <a class="nav-link" href="./home">
                  <i class="menu-icon typcn typcn-document-text"></i>
                  <span class="menu-title">Dashboard</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./producto">
                  <i class="menu-icon typcn typcn-shopping-bag"></i>
                  <span class="menu-title">Crear Producto</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./cliente">
                  <i class="menu-icon typcn typcn-th-large-outline"></i>
                  <span class="menu-title">Crear Cliente</span>
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="./propuesta">
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
                        <h4 class="page-title">Crear nuevo cliente</h4>                        
                     </div>
                  </div>
               </div>
               <!-- Page Title Header Ends-->
               <div class="row">            
                  <div class="col-md-12 grid-margin">
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <h4 class="card-title">Datos nuevo cliente</h4>
                              <p class="card-description"> Favor completar los campos correctamente </p>
                              <form class="forms-sample">
                                 <div class="form-group">
                                    <label for="exampleInputName1">Nombre Empresa</label>
                                    <input type="text" class="form-control" id="nombre">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputName1">Rut Empresa</label>
                                    <input type="text" class="form-control" id="rut">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail3">Email</label>
                                    <input type="text" class="form-control" id="email">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputName1">Fono contacto</label>
                                    <input type="text" class="form-control" id="telefono">
                                 </div>
                                 <div class="form-group">
                                    <label for="region">Región</label>
                                    <select class="form-control" id="region" onchange="getProvinciasRegion();">
                                       <option _blank="">Elija Una</option>
                                       <?php                  
                                          for($i=0;$i<sizeOf($regiones);$i++){
                                             echo "<option value='".$regiones[$i]->id."'>".$regiones[$i]->region."</option>";
                                          }
                                       ?> 
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="provincia">Provincia</label>
                                    <select class="form-control" id="provincia" onchange="getComunasProvincia();">
                                       <option id="_blank">Elija Una </option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="comuna">Comuna</label>
                                    <select class="form-control" id="comuna">
                                       <option id="_blank">Elija Una </option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputName1">Dirección</label>
                                    <input type="text" class="form-control" id="direccion">
                                 </div>
                                 <div class="form-group">
                                    <input type="button" onclick="crearCliente();" class="btn btn-primary btn-md" value="Crear Cliente">
                                 </div>
                              </form>
                           </div>
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
      <!-- seccion modales-->


         <!-- Modal -->
         <div class="modal fade" id="modalExitosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Creacion Exitosa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               Se ha creado el nuevo cliente de forma exitosa
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
         </div>

         <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Error en la creacion</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               La creación de cliente no se pudo realizar correctamente, porfavor intente nuevamente.
               </div>
               <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
         </div>

         <div class="modal fade" id="modalCargando" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Cargando datos...</h5>
               </div>
               <div class="modal-body align-items-center text-center">
                <img width="100px" src="{{ asset('img/loading.gif') }}"/>
               </div>
            </div>
         </div>
         </div>
      <!-- fin seccion modales-->


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
      <script src="{{ asset('/js/ubicacion.js') }}"></script>
      <!-- End custom js for this page-->
   </body>
</html>