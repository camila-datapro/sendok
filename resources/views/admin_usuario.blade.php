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
      <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
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
                        <h4 class="page-title" id="titulo_usuario">Mi Perfil</h4>
                     </div>
                  </div>
               </div>
               <!-- Page Title Header Ends-->
               <div class="row">
                  <div class="col-md-12 grid-margin">
                     <div class="col-md-12 grid-margin stretch-card">
                        <div class="container">
                           <div class="row">
                              <ul class="nav nav-tabs" style="border-bottom: 2px solid;border-color: #cdd6dc;">
                                 <li class="nav-item">
                                    <button class="nav-link active btn-primary" id="a_datos_usuario">Datos Usuario</button>
                                 </li>
                                 <li class="nav-item">
                                    <button class="nav-link btn-light" id="a_plantilla_correo">Plantillas de Correo</button>
                                 </li>
                                 <li class="nav-item">
                                    <button class="nav-link btn-light" id="a_firma">Firma</button>
                                 </li>
                              </ul>
                           </div>
                           <br>
                           <div class="row" id="div_plantilla_correo" style="display:none;">
                              <div class="col-md-12" >
                                     <h4>¿Que desea hacer?</h4>
                                     <br>
                                    <div class="row">
                                          <input style="margin-left:20px;" type="checkbox" class="radio" value="1" name="fooby[2][]">Crear plantilla</input>
                                       
                                          <input style="margin-left:50px;" type="checkbox" class="radio" value="1" name="fooby[2][]">Visar plantillas</input>
                                          <br>
                                          </div>
                                          <br>
                                    <div class="row">
                                    <button type="button" class="btn btn-success" onclick="continuar_operacion()">Continuar</button>
                                    </div>
                              </div>
                           </div>
                           <div class="row" id="div_firma_correo" style="display:none;">
                              <div class="col-md-12" >

                                    <text> Editor de firma de correo en desarrollo... </text>
                              </div>
                           </div>
                           <div class="row" id="div_datos_usuario">
                              <div class="col-md-12">


                                 <form id="datos_usuario" class="forms-sample">
                                 <input type="hidden" id="id_usuario" value="{{Auth::user()->id }}"/>
                                    <input type="hidden" id="nombre_hidden" value="{{Auth::user()->name }}"/>
                                    <input type="hidden" id="email_hidden" value="{{Auth::user()->email }}"/>
                                    <input type="hidden" id="cargo_hidden" value="{{Auth::user()->cargo }}"/>
                                    <input type="hidden" id="fono_hidden" value="{{Auth::user()->fono }}"/>
                                    <div class="form-group row">   
                                       <label class="col-md-2">Nombre y Apellido</label>
                                       <div class="form-group col-md-10">                                        
                                          <input disabled required type="text" maxlength="50"  class="form-control form-control-sm" aria-label="nombre" id="nombre" value="{{ Auth::user()->name}}"></input>
                                       </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-2">Email</label>
                                       <div class="form-group col-md-4">                                        
                                          <input disabled required type="email" maxlength="50"  class="form-control form-control-sm" aria-label="email" id="email" value="{{ Auth::user()->email}}">
                                       </div>
                                       <label class="col-md-2">Cargo</label>
                                       <div class="form-group col-md-4">                                        
                                          <input disabled required type="text" maxlength="50"  class="form-control form-control-sm" aria-label="cargo" id="cargo" value="{{ Auth::user()->cargo}}">
                                       </div>
                                    </div>
                                    <div class="form-group row">               
                                       <label class="col-md-2">Fono</label>
                                       <div class="form-group col-md-4">                                        
                                          <input disabled required type="number" maxlength="11"  class="form-control form-control-sm" aria-label="fono" id="fono" value="{{ Auth::user()->fono}}">
                                       </div>
                                    </div>
                                    <div class="row">                                    
                                       <button id="btn_editar" class="btn btn-primary" onclick="mostrarAcciones()" type="button">Editar datos</button>
                                       <button style="display:none; " id="btn_guardar" type="submit" class="btn btn-success">Guardar cambios</button>
                                       <button style="display:none; margin-left:10px;" id="btn_cancelar" onclick="cancelarAcciones()" class="btn btn-danger" type="button">Cancelar</button>
                                    </div>
                                 </form>                        
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
      <!-- Modal -->
     
      <!-- fin seccion modales-->
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
      <!--<script src="{{ asset('/js/producto.js') }}"></script>-->
      <script src="{{ asset('/js/admin_usuario.js') }}"></script>
      <script src="https://unpkg.com/@popperjs/core@2"></script>
     <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>   -->
      <!-- End custom js for this page-->
   </body>
</html>
@endsection