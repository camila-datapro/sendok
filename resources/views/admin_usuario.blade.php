@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
   <meta name="csrg-token" content="{{ csrf_token() }}" />
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
      <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/assets/js/dataTables.min.js') }}">
     <!-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">-->
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
                                 <li class="nav-item">
                                    <button class="nav-link btn-light" id="a_smtp">Configurar SMTP</button>
                                 </li>
                              </ul>
                           </div>
                           <br>

                           <input hidden type="hidden" id="id_usuario" style="display:none;" value="{{Auth::user()->id}}"/>

                       
                           <div id="div_visar_plantillas" class="col-md-12" style="display:none">
                              <button class="btn btn-success float-left" onclick="$('#modal_crear_plantilla').modal('show');">Nueva Plantilla</button>
                              <table class="table table-bordered" id="tabla_plantillas">
                                 <thead>
                                    <tr>
                                       <th>Nombre plantilla</th>
                                       <th>Asunto</th>
                                       <th>Cuerpo resumido</th>
                                       <th>Acciones</th>
                                    </tr>
                                    <tbody>
                                       <?php 
                                       $plantillas = json_decode(json_encode($plantillas), true);
                                       for($i=0;$i<sizeOf($plantillas);$i++){ 
                                          $id = intval($plantillas[$i]['id']);
                                          $nombre = strval($plantillas[$i]['nombre_plantilla']);
                                          $asunto = strval($plantillas[$i]['asunto']);
                                          $cuerpo = strval($plantillas[$i]['cuerpo_mensaje']);
                                          echo ("<input id='td_id_".$id."' type='hidden' name='browser' value='".$id."'");
                                          echo "<tr>";
                                          echo "<td id='td_nombre_{$id}'>{$nombre}</td>";
                                          echo "<td id='td_asunto_{$id}'>{$asunto}</td>";
                                          echo "<td id='td_cuerpo_{$id}'>{$cuerpo}</td>";
                                          echo "<td>";
                                          echo " <button class='btn btn-danger' id='eliminar_plantilla_{$id}' onclick='confirmarEliminacion({$id},`{$nombre}`);' ><i class='fas fa-trash'></i></button>";
                                            echo " <button class='btn btn-warning' id='ver_plantilla_{$id}' onclick='verPlantilla({$id});' ><i class='fas fa-edit'></i></button>";
                                            
                                            
                                          echo "</td>";
                                       echo "</tr>";
                                       } ?>
                                    </tbody>
                                 </thead>
                              </table>
                           </div>
                           <div class="row" id="div_firma_correo" style="display:none;">
                              <div class="col-md-12" >
                                 <form id="form_firma">
      
                                    <div class="row" id="vista_previa_firma_texto">
                                          
                                    </div>
                                    <div class="row" id="wiziwig" style="display:none;">                                                                              
                                          <textarea placeholder="Diseñe o copie y pegue su firma de correo electrónico" name="summernote" id="summernote" ></textarea>                                       
                                    </div><br>                                  
                                    <br>
                                    <button type="button" id="btn_editar_pie_firma" class="btn btn-primary float-right" onclick="editarFirma();" style="margin-right:10px;">Editar</button>                                    
                                    <button type="button" id="btn_cancelar_cambios" class="btn btn-warning float-right" style="display:none; margin-right:10px;" onclick="cancelarEdicionFirma();">Cancelar</button>
                                    <button type="submit" id="btn_guardar_firma" class="btn btn-success float-right" style="display:none; margin-right:10px;" onclick="guardarFirma();">Guardar</button>                                    
                                 </form>
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
                                       <button style="display:none; " id="btn_guardar" type="submit" class="btn btn-success">Guardar</button>
                                       <button style="display:none; margin-left:10px;" id="btn_cancelar" onclick="cancelarAcciones()" class="btn btn-danger" type="button">Cancelar</button>
                                    </div>
                                 </form>                        
                           <!--add-->
                              </div>
                           </div>
                           <!-- form de smtp de correo -->
                           <div id="div_configura_smtp" class="col-md-12" style="display:none;">
                              <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">                           
                                    <form id="form_datos_smtp" class="forms-sample">
                                    <div class="row form-group">
                                          <label> Nombre </label>                                          
                                          <input required class="form-control" type="text" id="nombre_smtp" placeholder="Nombre" value="{{$usuarioSMTP['nombre_smtp']}}"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Email </label>                                          
                                          <input required class="form-control" type="text" id="email_smtp" placeholder="Email" value="{{$usuarioSMTP['email_smtp']}}"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Password </label>                                          
                                          <input required class="form-control" type="password" id="password_smtp" placeholder="Password" value="{{$usuarioSMTP['password_smtp']}}"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Host</label>                                          
                                          
                                          <input required class="form-control" type="text" id="host_smtp" placeholder="smtp.example.com" value="{{$usuarioSMTP['host_smtp']}}"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Puerto</label>                                          
                                          
                                          <input required class="form-control" type="text" id="port_smtp"  value="{{$usuarioSMTP['port_smtp']}}"></input>                                          
                                       </div>
                                       <input type="hidden" id="tipo_encriptacion" style="display:none;" value="{{$usuarioSMTP['encriptacion_smtp']}}"></input>
                                       <div class="row form-group">
                                          <label> Encriptacion</label>                                          
                                          <select class="form-control" id="encriptacion_smtp">
                                             <option id="0">Elija uno</option>
                                             <option id="ssl" value="ssl">ssl</option>
                                             <option id="tls" value="tls">tls</option>                                             
                                          </select> 
                                       </div>
                                       <br>
                                       <button id="boton_guardar_smtp" type="submit" class="btn btn-success float-right" type="button">Guardar</button>
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

      <div class="modal fade" id="modalCreacionExitosaPlantilla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Creación exitosa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  Se ha realizado la operación de forma exitosa.
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="dirigirListadoPlantila();">OK</button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modalVerPlantilla" tabindex="-1" role="dialog"  aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modal_ver_nombre"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">                  
                  <div class="col-md-12" id="datos_ver_editar_plantilla">
                     <input type="hidden" style="display:none" id="modal_ver_cuerpo_id"/>
                     <div class="row form-group">
                        <label style="margin-top: 3px;" class="col-md-3">Nombre Plantilla</label>
                        <div class="col-md-9">
                           <input disabled="true" class="form-control" id="modal_ver_cuerpo_nombre"></input>
                        </div>
                     </div>
                     <div class="row form-group">
                        <label style="margin-top: 3px;" class="col-md-3">Asunto correo</label>
                        <div class="col-md-9">
                           <input disabled="true" class="form-control" id="modal_ver_cuerpo_asunto"></input>
                        </div>
                     </div>
                     <div class="row form-group">
                        <label style="margin-top: 3px;" class="col-md-3">Cuerpo correo</label>
                        <div class="col-md-9">
                           <textarea disabled="true" class="form-control" id="modal_ver_cuerpo_contenido"></textarea>
                        </div>
                     </div>
                  </div>   
               </div>
               <div class="modal-footer">
                  <button style="display:none" id="btn_editar_guardar_plantilla" type="button" class="btn btn-success" onclick="guardarEdicionPlantilla()">Guardar</button>
                  <button  id="btn_editar_ver_plantilla" type="button" class="btn btn-primary" onclick="editarPlantilla()">Editar</button>
                  <button id="btn_cerrar_ver_plantilla" type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="modal_crear_plantilla" tabindex="-1" role="dialog" aria-labelledby="nueva_plantilla" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="nueva_plantilla">Crear nueva plantilla</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="text-center content-justify-center">
                  <div id="div_crear_plantilla" class="col-md-12">
                           <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                           
                                    <form id="form_datos_plantilla" class="forms-sample">
                                       
                                       <div class="row form-group">
                                          <label> Nombre plantilla</label>                                          
                                          <input required class="form-control" type="text" id="nombre_plantilla" placeholder="Nombre de plantilla a crear"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Asunto correo</label>                                          
                                          <input required class="form-control" type="text" id="asunto_plantilla" placeholder="Asunto correo"></input>                                          
                                       </div>
                                       <div class="row form-group">
                                          <label> Cuerpo correo</label>                                          
                                          <textarea required id="cuerpo_plantilla" placeholder="Ingrese cuerpo de correo" class="form-control" type="text"></textarea>
                                       </div>
                                       <br>
                                       <button type="button" class="btn btn-danger float-right"  data-dismiss="modal">Cerrar</button>
                                       <button id="boton_guardar_plantilla" type="submit" class="btn btn-success float-right" style="margin-right: 15px">Guardar</button>
                                       
                                    </form>
                           </div>
                  </div>
               </div>
   
            </div>
         </div>
      </div>

<!--contenido modal crear nueva plantilla-->

<!-- fin contenido modal crear nueva plantilla-->

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
                     <input type="hidden" id="modal_id_eliminar" style="display:none;"/>
                     <h4>¿Está seguro de eliminar el elemento? : </h4>
                     <h4 id="modal_eliminar_nombre"></h4>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                  <button type="button" class="btn btn-primary" id="eliminar_plantilla" onclick="eliminarPlantilla();">Si, eliminar</button>
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
      <script src="{{ asset('/js/dataTables.js')}}"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.16.0/standard-all/ckeditor.js"></script>  
      <!-- include summernote css/js -->

     <!-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>   -->
     
     
      <!-- End custom js for this page-->
      <script>
         $(document).ready(function() {
        
            var tipo_encriptacion = $("#tipo_encriptacion").val();
            document.getElementById('encriptacion_smtp').value=tipo_encriptacion;

            $("#tabla_plantillas").DataTable({
                //responsive: true
            });
            CKEDITOR.addCss('.cke_editable p { margin: 0 !important; }');
            CKEDITOR.replace( 'summernote' ,{
               width: '100%',
               placeholder : "Diseñe o copie y pegue su firma de correo electrónico",
               extraPlugins: 'colorbutton'
            });
            
            
         });

      </script>
   </body>
</html>
@endsection