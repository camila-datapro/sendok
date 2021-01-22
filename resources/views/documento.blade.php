<!DOCTYPE html>
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
      <link href="{{ asset('/css/select_buscador.css') }}" rel="stylesheet" />
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
      <style>
         .select2-container--default .select2-selection--single {
         background-color: #fff;
         border: 1px solid #dee2e6;
         border-radius: 0px;
         font-size: 0.75rem;
         line-height: 14px;
         font-weight: 300;
         padding-left: 17px;
         }
      </style>
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
                        <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
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
                  <a class="nav-link" data-toggle="collapse" href="#menu_documentos" aria-expanded="false" aria-controls="menu_clientes">
                     <i class="menu-icon typcn typcn-coffee"></i>
                     <span class="menu-title">Documentos</span>
                     <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="menu_documentos">
                     <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                        <a class="nav-link" href="./documento">Crear nuevo</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="./admin_documentos">Administrar documentos</a>
                        </li>
                     </ul>
                  </div>
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
                        <h4 class="page-title">Crear Documento</h4>
                     </div>
                  </div>
               </div>
               <!-- Page Title Header Ends-->
               <div class="row" id="datos_ingreso">
                  <div class="col-md-12 grid-margin">
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                 <label>Seleccione tipo de documento</label>
                                 <select class="form-control form-control-md" id="tipo_documento">
                                    <option _blank="">Elija Uno</option>
                                    <option id="1">Propuesta Comercial</option>
                                    <option id="2">Orden de Compra</option>
                                 </select>
                              </div>
                              <div id='TextBoxesGroup'>
                                 <div id="TextBoxDiv1" style="margin-bottom: 20px;">
                                    <label>Seleccione producto N° 1: </label>
                                    <select class=" js-example-basic-single form-control" name="textbox1"  type='textbox' id='textbox1' >
                                    <option id="0">Elija Uno</option>
                                    <?php 
                                       for($i=0;$i<sizeOf($productos); $i++){
                                          echo "<option id=".$productos[$i]->id_producto.">".$productos[$i]->nombre_producto."</option>";
                                       }
                                    ?>
                                 </select>  
                                 <label>Unidades producto N° 1</label>
                                 <input class="form-control form-control-sm" id="unidades_documento_0" nombre="unidades_documento"></input>  
                                 <label>Descuento para producto N° 1 (opcional)</label>
                                 <input class="form-control form-control-sm"   id="descuento_documento_0" nombre="descuento_documento"></input>                                                                
                                 </div>                           
                              </div>
                              <div>                              
                                 <input type='button'  class="btn btn-success" value='Agregar producto' id='addButton'>
                                 <input type='button' class="btn btn-success" value='Remover producto' id='removeButton'>
                                 <button disabled type='button' class="btn btn-success" value='Obtener valores' id='getButtonValue'>Comprobar valores</button>
                              </div>
                              <div style="padding-left: 0px !important;">
                                 <label>Seleccione Producto</label>
                                 <select class=" js-example-basic-single form-control" name="select_producto" id="select_producto">
                                    <option id="0">Elija Uno</option>
                                    <?php 
                                       for($i=0;$i<sizeOf($productos); $i++){
                                          echo "<option id=".$productos[$i]->id_producto.">".$productos[$i]->nombre_producto."</option>";
                                       }
                                    ?>
                                 </select>
                              </div>
                              <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                 <label>Seleccione Cliente</label>
                                 <select class=" js-example-basic-single form-control" name="select_cliente" id="select_cliente">
                                    <option id="0">Elija Uno</option>
                                    <?php 
                                       for($i=0;$i<sizeOf($clientes); $i++){
                                          echo "<option id=".$clientes[$i]->id_cliente.">".$clientes[$i]->nombre_cliente."</option>";
                                       }
                                    ?>
                                 </select>
                              </div>
                              <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                 <label>Unidades</label>
                                 <input id="unidades" maxlength="10" name="unidades" type="number" class="form-control form-control-sm" aria-label="Unidades">
                              </div>
                              
                              <div class="form-group">
                                 <button disabled type="button" onclick="vistaPreviaPDF();" class="btn btn-primary btn-md" value="Crear Documento">Crear Documento</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- fin datos ingreso-->
               <input hidden pdf_64="" id="hidden_pdf"></input>
               <div class="row" id="plantilla_documento" style="display:none;">
                  <div class="col-md-12 grid-margin">
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body" id="propuesta_documento">
                              <?php 
                                 set_include_path(dirname(__FILE__)."/../");
                                 include('propuesta_comercial.blade.php');
                              ?>
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
          <!-- Modal -->
      
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
      </div>

      
         <!-- Modal -->
         <div class="modal fade" id="modalExitoso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Operación exitosa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               Se ha efectuado la operación correctamente
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload();" >OK</button>
               </div>
            </div>
         </div>
         </div>

      
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script src="{{ asset('/js/documento.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <script src="{{ asset('/generaPDF/dist/html2pdf.bundle.min.js') }}"></script>
   </body>
</html>