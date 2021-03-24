@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
      <meta name="csrg-token" content="{{ csrf_token() }}" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sendok</title>
      <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
      <link rel="stylesheet" href=" {{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">      
      <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
   </head>
   @endsection
   @section('body1')
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         @endsection  
         <!-- partial -->
         @section('body2')
         <div class="main-panel">
            <div class="content-wrapper" style="background: white;">
               <!-- Page Title Header Starts-->
               <div class="row page-title-header">
                  <div class="col-12">
                     <div class="page-header">
                        <h4 class="page-title">Administrar Clientes</h4>
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
                                 <table class="table table-hover tabla_clientes display nowrap" cellspacing="0" id="tabla_clientes">
                                    <thead>
                                       <tr>
                                          <th scope="col">Nombre empresa</th>
                                          <!--<th scope="col">id</th>-->
                                          <th scope="col">Fono</th>
                                          <th scope="col">Nombre Contacto</th>
                                          <th scope="col">Email Contacto</th>
                                          <th scope="col">Acciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php                  
                                          for($i=0;$i<sizeOf($clientes);$i++){
                                             echo "<tr>                                                      
                                             <td >".$clientes[$i]["nombre_cliente"]."</td>                                                      
                                             <td>".$clientes[$i]["fono_cliente"]."</td>
                                             <td> ".$clientes[$i]["nombre_contacto"]." -- ".$clientes[$i]["cargo_contacto"]."</td>
                                             <td> ".$clientes[$i]["email_cliente"]."</td>
                                           
                                             <td>
                                                <button class='btn btn-danger' id='eliminar_".$clientes[$i]["id_cliente"]."' onclick='confirmarEliminacion(".json_encode($clientes[$i]).");' >
                                                <i class='fas fa-trash-alt'></i>
                                                </button> 
                                                <button class='btn btn-warning' id='editar_".$clientes[$i]["id_cliente"]."' onclick='editarCliente(".json_encode($clientes[$i]).");' >
                                                <i class='fas fa-edit'></i>
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
                  <button type="button" class="btn btn-primary" id="eliminar_cliente" onclick="eliminarCliente();">Si, eliminar</button>
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

      <div class="modal fade" id="modalEditarCliente" tabindex="-1" role="dialog" aria-labelledby="modalEditarCliente" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="titulo_editar">Ver Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <form class="forms-sample" id="form_cliente">
               <div class="modal-body">
                
                        <input type="hidden" id="id_cliente" />
                        <h4 class="card-title" style="color: #001fff9e;">Datos empresa</h4>
                        <div class="margined-left">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="exampleInputName1" class="col-md-2">Nombre</label>
                                    <div class="col-md-4">
                                       <input required disabled type="text" maxlength="20" class="form-control" id="nombre">
                                    </div>
                                    <label for="exampleInputName1" class="col-md-2">Rut</label>
                                    <div class="col-md-4">
                                       <input required disabled type="text" maxlength="15" class="form-control" id="rut">
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="region" class="col-md-2">Región</label>
                                    <div class="col-md-10">
                                       <select disabled class="form-control" id="region" onchange="getComunasRegion();">
                                          <option _blank="">Elija Una</option>
                                          <?php                  
                                             for($i=0;$i<sizeOf($regiones);$i++){
                                                echo "<option value='".$regiones[$i]->id."'>".$regiones[$i]->region."</option>";
                                             }
                                             ?> 
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>


                   
                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="comuna" class="col-md-2">Comuna</label>
                                    <div class="col-md-10">
                                       <select disabled class="form-control" id="comuna">
                                          <option id="_blank">Elija Una </option>
                                       </select>
                                    </div>
                                 </div>
                              </div>     
                           </div>
                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="exampleInputName1" class="col-md-2">Dirección</label>
                                    <div class="col-md-10">
                                       <input required disabled type="text" maxlength="30" class="form-control" id="direccion">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <h4 class="card-title" style="color: #001fff9e;">Datos contacto</h4>
                        <!-- datos de contacto-->
                        <div class="margined-left">
                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label class="col-md-2" for="nombre_contacto">Nombre</label>
                                    <div class="col-md-4">
                                       <input required disabled type="text" class="form-control" id="nombre_contacto">
                                    </div>
                                    <label class="col-md-2" for="nombre_contacto">Cargo</label>
                                    <div class="col-md-4">
                                       <input required disabled type="text" class="form-control" id="cargo_contacto">
                                    </div>
                                 </div>
                              </div>
                           </div>
 
                           <div class="form-group">
                              <div class="col-md-12">
                                 <div class="form-group row">
                                    <label for="exampleInputEmail3" class="col-md-1">Email</label>
                                    <div class="col-md-5">
                                       <input required  disabled type="email" class="form-control" id="email">
                                    </div>
                                    <label for="exampleInputName1" class="col-md-1">Fono</label>
                                    <div class="col-md-5">
                                       <input disabled type="number" maxlength="12" class="form-control" id="telefono">
                                    </div>
                                 </div>
                              </div>
                           </div>
              
                        </div>
                 
               </div>
               <div class="modal-footer">
               
                  <button id="btn_editar" type="button" class="btn btn-primary" onclick="mostrarEditarCliente();">Editar Cliente</button>
                  <button id="btn_guardar" style="display:none;" type="submit" class="btn btn-success" ">Guardar Cambios</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
               </form>
               </div>
            </div>
         </div>
      </div>
      <!-- fin seccion modales-->
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <script src="{{ asset('/js/cliente.js')}}"></script>
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="{{ asset('/js/dataTables.js')}}"></script>   
      <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>   
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $(document).ready(function() {
            $(".tabla_clientes").DataTable({
                responsive: true
            });
         });
      </script>
   </body>
</html>
@endsection