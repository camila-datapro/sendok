<!DOCTYPE html>
<html lang="en">
   <head>
      <meta name="csrg-token" content="{{ csrf_token() }}" />
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta http-equiv="Expires" content="0">
      <meta http-equiv="Last-Modified" content="0">      
      <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">      
      <meta http-equiv="Pragma" content="no-cache">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
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
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
      <!--datatables-->
      <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
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
         .top-spaced{
         margin-top: 10px;
         }

         .modal {
         overflow-y:auto;
         }
         
         iframe{
            width: 100%;
            height: 70vh;
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
            <div class="content-wrapper" style="background: white;">
               <!-- Page Title Header Starts-->
               <div class="row page-title-header">
                  <div class="col-12">
                     <div class="page-header">
                        <h4 class="page-title">Administrar documentos</h4>
                     </div>
                  </div>
               </div>
               <!-- Page Title Header Ends-->
               <div class="row">
                  <div class="col-md-12 grid-margin">
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="container">
                           <div class="row">
                              <div class="col-lg-12">
                                 <table class="table table-hover tabla_propuestas display nowrap" cellspacing="0" id="tabla_propuestas">
                                    <thead>
                                       <tr>
                                          <th scope="col">Folio</th>
                                          <th scope="col">Empresa</th>
                                          <th scope="col">Nombre Contacto</th>
                                          <th scope="col">Fecha modificacion</th>
                                          <th scope="col">Monto</th>
                                          <th scope="col">Estado Envío</th>
                                          <th scope="col">Acciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php                  
                                          for($i=0;$i<sizeOf($propuestas);$i++){
                                             $nombre_empresa ="";
                                             $nombre_contacto= "";
                                             for($x=0;$x<sizeOf($clientes);$x++){
                                                   if($clientes[$x]->id_cliente == $propuestas[$i]->id_cliente){
                                                         $nombre_empresa = $clientes[$x]->nombre_cliente;
                                                         $nombre_contacto = $clientes[$x]->nombre_contacto;
                                                         $x = sizeOf($clientes);
                                                   }
                                             }
                                             echo "<tr>                                                     
                                             <td >".$propuestas[$i]->folio_propuesta."</td><td>".$nombre_empresa."</td>";
                                             echo "<td> ".$nombre_contacto."</td>";
                                             echo "<td> ".$propuestas[$i]->fecha_modificacion."</td>
                                             <td> ".$propuestas[$i]->total."</td>
                                             <td> ".(($propuestas[$i]->estado_envio==null) ? 'Pendiente de envío' : $propuestas[$i]->estado_envio )."</td>
                                             <td>
                                                <button class='btn btn-warning' id='editar".$propuestas[$i]->id_propuesta."' onclick='adminEditarPropuesta(".$propuestas[$i].")'; >
                                                <i class='fas fa-edit'></i>
                                                </button> 
                                                <button class='btn btn-primary' id='ver_".$propuestas[$i]->id_propuesta."' onclick=adminVerPropuesta('".strval($propuestas[$i]->folio_propuesta)."'); >
                                                <i class='fas fa-eye'></i>
                                                </button> 
                                                <button class='btn btn-success' id='enviar_".$propuestas[$i]->id_propuesta."' onclick='enviarPropuestaList(".$i.")'>
                                                <i class='fas fa-paper-plane'></i>
                                                </button>
                                             </td>
                                             </tr>";
                                          }
                                          ?>  
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <input hidden id="id_propuesta_hidden" indice_propuesta="0"></input>
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
      <div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="text-center content-justify-center">
                     <h4>¿Está seguro de eliminar el elemento? : </h4>
                     <h4 id="modal_eliminar_nombre"></h4>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                  <button type="button" class="btn btn-primary" id="eliminar_producto" onclick="eliminarProducto();">Si, eliminar</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalExitosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Operación exitosa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  Se ha realizado la operación de forma exitosa.
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload();">OK</button>
               </div>
            </div>
         </div>
      </div>

      <!-- Modal ver propuesta-->
      <div class="modal fade" id="modalVerPropuesta" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="page-title">Visor de Documento</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="row" id="ver_propuesta">
                     <div class="col-md-12">                                                       
                        <iframe id="visor_documento" src="" frameborder="0"></iframe>                                      
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button id="cerrar" type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>                 
               </div>
            </div>
         </div>
      </div>                               
      <!-- Fin modal ver propuesta-->



      <!-- Modal -->
      <div class="modal fade" id="modal_editar_propuesta" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="page-title">Editar Documento</h4>
                  <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload();">&times;</button>
               </div>
               <div class="modal-body">
                     <!-- Page Title Header Ends-->
                     <div class="row" id="datos_ingreso">
                        <div class="col-md-12">
                                    <div id="formulario_editar">
                                       <div style="padding-left: 0px !important;" class="form-group col-sm-12">
                                          <label>Seleccione Cliente</label>                               
                                          <select class="form-control" name="select_cliente" id="select_cliente">
                                             <option id="0">Elija Uno</option>
                                             <?php 
                                                for($i=0;$i<sizeOf($clientes); $i++){                                          
                                                   echo "<option id=".$clientes[$i]->id_cliente." fono_cliente='".$clientes[$i]->fono_cliente."' nombre_cliente='".$clientes[$i]->nombre_cliente."' email_cliente='".$clientes[$i]->email_cliente."' contacto_nombre='".$clientes[$i]->nombre_contacto."' contacto_cargo='".$clientes[$i]->cargo_contacto."' >".$clientes[$i]->nombre_cliente."</option>";
                                                }
                                                ?>
                                          </select>
                                       </div>
                                       <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                          <label><b>Seleccione Producto(s)</b></label>
                                          <div id='TextBoxesGroup'>
                                             <div id="TextBoxDiv1" style="margin-bottom: 20px; border: 1px solid; border-color: #dee2e6; background-color: #e0e4ff; padding: 12px; padding-top: 0px;">
                                                <label class="top-spaced">Seleccione producto N° 1: </label>
                                                <select class="form-control" name="textbox1"  type='textbox' id='select_producto_1' >
                                                   <option id="0">Elija Uno</option>
                                                   <?php 
                                                      for($i=0;$i<sizeOf($productos); $i++){
                                                         echo "<option id=".$productos[$i]->id_producto." nombre_producto='".$productos[$i]->nombre_producto."' valor_producto='".$productos[$i]->valor_producto."' tipo_cambio='".$productos[$i]->tipo_cambio."'>".$productos[$i]->nombre_producto." (".$productos[$i]->tipo_cambio." ".$productos[$i]->valor_producto.")"."</option>";
                                                      }
                                                      ?>
                                                </select>
                                                <label class="top-spaced">Unidades producto N° 1</label>
                                                <input class="form-control form-control-sm" id="unidades_producto_1" nombre="unidades_producto"></input>  
                                                <label class="top-spaced">Descuento para producto N° 1 (opcional)</label>
                                                <input class="form-control form-control-sm" onkeyup="validaDescuento(this)" id="descuento_producto_1" nombre="descuento_producto"></input>                                                                
                                             </div>
                                          </div>
                                          <input hidden id="cantidad_divs" cantidad="1"></input>
                                          <div>
                                             <input type='button'  class="btn btn-success" value='Agregar item' id='addButton'>
                                             <input type='button' class="btn btn-danger" value='Remover item' id='removeButton'>
                                             <!--<button type='button' class="btn btn-success" value='Obtener valores' id='getButtonValue'>Comprobar valores</button>-->
                                          </div>
                                          <br>
                                       </div>
                                    </div>
                           
                        </div>
                     </div>
                     <!-- fin datos ingreso-->
                     <input hidden pdf_64="" id="hidden_pdf"></input>
                     <div class="row" id="plantilla_documento" style="display:none;">
                        <div class="col-md-12 ">                                                       
                           <?php 
                              set_include_path(dirname(__FILE__)."/../");
                              include('propuesta_comercial.blade.php');
                              ?>                                                           
                        </div>
                     </div>                     
               </div>
               <div class="modal-footer">
                  <button id="boton_cerrar_proceso" type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.reload();">Salir</button>
                  <button id="boton_mostrar_pdf" type="button" class="btn btn-primary" onclick="mostrarVistaPrevia();">Generar vista previa</button>               
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Error en la operación</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  La operacion no se pudo realizar correctamente, porfavor intente nuevamente.
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="modalinfo" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalinfo">Atención</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p id="info_validacion"></p>
               </div>
               <div class="modal-footer">
                  <button id="boton_info" type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalCargando" tabindex="-1" role="dialog" aria-labelledby="modalcargandolabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalcargandolabel">Cargando datos...</h5>
               </div>
               <div class="modal-body align-items-center text-center">
                  <img width="100px" src="{{ asset('img/loading.gif') }}"/>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalEnviando" tabindex="-1" role="dialog" aria-labelledby="modalenviandolabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalenviandolabel">Enviando documento...</h5>
               </div>
               <div class="modal-body align-items-center text-center">
                  <img width="100px" src="{{ asset('img/loading.gif') }}"/>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalCuerpoCorreo" tabindex="-1" role="dialog" aria-labelledby="modalcuerpo" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalcuerpo">Ingrese Contenido del mensaje</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <textarea class="form-control" id="cuerpo_correo"></textarea>
               </div>
               <div class="modal-footer">
                  <?php
                     echo "<button type='button' class='btn btn-secondary' data-dismiss='modal' onclick='sendMailFromList(".$propuestas.");' >Enviar</button>";
                     ?>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalCuerpoCorreoEdit" tabindex="-1" role="dialog" aria-labelledby="modalcuerpoeditar" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalcuerpoeditar">Ingrese Contenido del mensaje</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <textarea class="form-control" id="cuerpo_correo_edit"></textarea>
               </div>
               <div class="modal-footer">
                  <?php
                     echo "<button type='button' class='btn btn-secondary' data-dismiss='modal' onclick='enviarCorreo();' >Enviar</button>";
                     ?>
               </div>
            </div>
         </div>
      </div>
      <!-- fin seccion modales-->
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <?php 
            echo "<script src='".asset('/js/admin_documento.js?ver='.rand())."'></script>";
      ?>
      
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>   
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>   
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="{{ asset('/generaPDF/dist/html2pdf.bundle.min.js') }}"></script>
      <!-- End custom js for this page-->
      <script>
         $(document).ready(function() {
            $(".tabla_propuestas").DataTable({
                responsive: true
            });
         });
      </script>
   </body>
</html>