@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">
   <head>
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
      <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <!--  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">-->
      <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
      <style>
      .wrapper2{width: 100%; border: none 0px RED;
overflow-x: scroll; overflow-y:hidden;}

.wrapper2{}

.div2 {width:100%;
overflow: auto;}

.big_text
{
 max-width: 0;
 overflow-x: scroll;
 
 white-space: nowrap;
}
table {
        border-collapse: collapse;
        table-layout: fixed;
        width: 310px;
      }
      table td {
        width: 110px;
        word-wrap: break-word;
      }

      .table td{
         white-space: normal;
      }
      </style>
   </head>
   @endsection
   @section('body1')
   <body>
      <div class="container-scroller">
         <!-- partial:partials/_navbar.html -->
         @endsection
         @section('body2')
         <!-- partial -->
         <div class="main-panel">
            <div class="content-wrapper" style="background: white;">
               <!-- Page Title Header Starts-->
               <div class="row page-title-header">
                  <div class="col-12">
                     <div class="page-header">
                        <h4 class="page-title">Administrar Productos</h4>
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
                             
                               
                              <div class="div2">
                                 <div id="div_cargando" class="row">
                                    
                                     <img id="cargando" style="margin-left: 30px;"  width="30px" src="{{ asset('img/loading.gif') }}"/>
                                     <label style="margin-left: 10px;">Cargando lista de productos...</label>
                                 </div>
    
                                 <table class="table table-hover tabla_productos" id="tabla_productos" style="display:none;">
                                    <thead>
                                       <tr>
                                          <th scope="col"">Nombre</th>                                          
                                          <th scope="col">SKU</th>
                                          <th scope="col">Proveedor</th>
                                          <th scope="col">Costo</th>
                                          <th scope="col">% Margen</th>
                                          <th scope="col">Precio</th>
                                          <th scope="col">Acciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php              
                                       $productos = json_decode($productos);
                                          for($i=0;$i<sizeOf($productos);$i++){
                                             $array_datos= array(
                                                "nombre" => $productos[$i]->nombre_producto,
                                                "descripcion" => $productos[$i]->descripcion_producto
                                             );
                                             echo "<tr>                                                      
                                             <td style='max-width: 100px;' class='BreakWord'>".$productos[$i]->nombre_producto."</td>                                                      
                                             <td>".$productos[$i]->numero_interno."</td>                                                      
                                             <td>".$productos[$i]->proveedor."</td>
                                             <td><b>".strtoupper($productos[$i]->tipo_cambio)."</b> ".$productos[$i]->costo."</td>
                                             <td> % ".$productos[$i]->margen."</td>                                                      
                                             <td><b>".strtoupper($productos[$i]->tipo_cambio)."</b> ".$productos[$i]->valor_producto."</td>
                                             <td>
                                                <button class='btn btn-danger' id='eliminar_".$productos[$i]->id_producto."' onclick='confirmarEliminacion(".json_encode($productos[$i]).")' >
                                                <i class='fas fa-trash-alt'></i>
                                                </button> 
                                                <button class='btn btn-warning' id='ver_".$productos[$i]->id_producto."' onclick='verProducto(".json_encode($array_datos).")' >
                                                <i class='fas fa-search'></i>
                                                </button> 
                                             </td>
                                             </tr>";
                                          }
                                          ?>  
                                    </tbody>
                                 </table>
                                
                           </div>
                           <!--add-->
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
      <div class="modal fade" id="modal_ver_producto" tabindex="-1" role="dialog" aria-labelledby="modal_ver_producto" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modal_ver_producto">Descripcion de producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <h3 id="nombre_descripcion"></h3>
                  <h4 id="texto_descripcion"></h4>
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
      <!-- fin seccion modales-->
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <!--<script src="{{ asset('/js/producto.js') }}"></script>-->
      <script src="{{ asset('/js/admin_producto.js') }}"></script>
      <script src="https://unpkg.com/@popperjs/core@2"></script>
      <script src="{{ asset('/js/dataTables.js')}}"></script>   
     <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>   -->
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <!-- End custom js for this page-->
      <script>
         $(document).ready(function() {
            $("#div_cargando").hide();
            $("#tabla_productos").show();
            $(".tabla_productos").DataTable({
                //responsive: true
            });
         });
      </script>
   </body>
</html>
@endsection