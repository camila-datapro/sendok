@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">
   <head>
   <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
      <meta charset="utf-8">
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
         .margined-left{
         margin-left: 12px;
         }
         .modal {
         overflow-y:auto;
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
                              <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                 <label>Seleccione Cliente o <button class="button btn-primary" onclick="crearClienteDocumento();">Cree uno nuevo</button></label>
                                 <select class=" js-example-basic-single form-control" name="select_cliente" id="select_cliente">
                                    <option id="0">Elija Uno</option>
                                    <?php 
                                       for($i=0;$i<sizeOf($clientes); $i++){
                                          echo "<option id=".$clientes[$i]->id_cliente." fono_cliente='".$clientes[$i]->fono_cliente."' nombre_cliente='".$clientes[$i]->nombre_cliente."' email_cliente='".$clientes[$i]->email_cliente."' contacto_nombre='".$clientes[$i]->nombre_contacto."' contacto_cargo='".$clientes[$i]->cargo_contacto."' >".$clientes[$i]->nombre_cliente."</option>";
                                       }
                                       ?>
                                 </select>
                              </div>
                              <div style="padding-left: 0px !important;" class="form-group col-md-12">
                                 <label>Seleccione Producto(s) o <button class="button btn-primary" onclick="crearProductoDocumento();">Cree uno nuevo</button></label>
                                 <div id='TextBoxesGroup'>
                                    <div id="TextBoxDiv1" style="margin-bottom: 20px; border: 1px solid; border-color: #dee2e6; background-color: #e0e4ff; padding: 12px; padding-top: 0px;">
                                       <label class="top-spaced">Seleccione producto N° 1: </label>
                                     
                                       <select class="form-control" name="textbox1"  type='textbox' id='select_producto_1' onchange="mostrarAdjunto(this)" >
                                          <option id="0">Elija Uno</option>
                                          <?php 
                                             for($i=0;$i<sizeOf($productos); $i++){
                                                echo "<option id_interno=".$productos[$i]->numero_interno." tiene_folleto=".$productos[$i]->tiene_folleto." id=".$productos[$i]->id_producto." nombre_producto='".$productos[$i]->nombre_producto."' valor_producto='".$productos[$i]->valor_producto."' tipo_cambio='".$productos[$i]->tipo_cambio."'>".$productos[$i]->nombre_producto." (".$productos[$i]->tipo_cambio." ".$productos[$i]->valor_producto.")"."</option>";
                                             }
                                             ?>
                                       </select>

                                       <div class="row">
                                          <div style="display:none;" class="form-check" id="check_1">
                                             <input type="checkbox" class="checkbox" id="adjuntar_ficha_1"> <label style="margin-top:4px;">Adjuntar Ficha Técnica</label></input>
                                          </div>
                                       </div>
                                       
                                       <label class="top-spaced">Unidades producto N° 1</label>
                                       <input class="form-control form-control-sm" id="unidades_producto_1" nombre="unidades_producto"></input>  
                                       <label class="top-spaced"> % Descuento para producto N° 1 (opcional)</label>
                                       <input type="number" onkeyup="validaPorcentaje(this)" class="form-control form-control-sm" id="descuento_producto_1" nombre="descuento_producto"></input>                                                                
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
                              <div class="form-group">
                                 <button type="button" onclick="vistaPreviaPDF();" class="btn btn-primary btn-md" value="Crear Documento">Crear Documento</button>
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
                  <button id="boton_validacion" type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalInfoProducto" tabindex="-1" role="dialog" aria-labelledby="modalinfoproducto" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalinmodalinfoproductofo">Atención</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <p id="info_validacion_producto"></p>
               </div>
               <div class="modal-footer">
                  <button id="boton_validacion_producto" type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
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
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="enviarCorreo();" >OK</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalCrearCliente" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear nuevo cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload();">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="col-md-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <form class="forms-sample">
                              <h4 class="card-title" style="color: #001fff9e;">Datos empresa</h4>
                              <div class="margined-left">
                                 <div class="form-group">
                                    <label for="exampleInputName1">Nombre Empresa</label>
                                    <input type="text" maxlength="20" class="form-control" id="nombre">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputName1">Rut Empresa</label>
                                    <input type="text" maxlength="15" class="form-control" id="rut">
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
                                    <input type="text" maxlength="30" class="form-control" id="direccion">
                                 </div>
                              </div>
                              <h4 class="card-title" style="color: #001fff9e;">Datos contacto</h4>
                              <!-- datos de contacto-->
                              <div class="margined-left">
                                 <div class="form-group">
                                    <label for="nombre_contacto">Nombre Contacto</label>
                                    <input type="email" class="form-control" id="nombre_contacto">
                                 </div>
                                 <div class="form-group">
                                    <label for="nombre_contacto">Cargo en la empresa</label>
                                    <input type="email" class="form-control" id="cargo_contacto">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail3">Email contacto</label>
                                    <input type="email" class="form-control" id="email">
                                 </div>
                                 <div class="form-group">
                                    <label for="exampleInputName1">Fono contacto</label>
                                    <input type="number" maxlength="12" class="form-control" id="telefono">
                                 </div>
                              </div>
                           </form>
                           <div class="modal-footer">
                              <input type="button" onclick="crearCliente();" class="btn btn-primary btn-md" value="Crear Cliente">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="modalCrearProducto" role="dialog">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Crear nuevo producto</h5>
                  <button type="button" class="close" data-dismiss="modal" onclick="window.location.reload();">&times;</button>
               </div>
               <div class="modal-body">
                  <div class="col-md-12 grid-margin stretch-card">
                     <div class="card">
                        <div class="card-body">
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Clase</label>
                              <select class="form-control form-control-md" id="tipo_producto" onchange="visarUnidades();">
                                 <option _blank="">Elija Uno</option>
                                 <option id="producto">Producto</option>
                                 <option id="servicio">Servicio</option>
                              </select>
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Nombre Producto</label>
                              <input id="nombre_producto" maxlength="20" name="nombre_producto" type="text" class="form-control form-control-sm" aria-label="Nombre Producto">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>N° Fabricacion</label>
                              <input id="numero_fabricacion" maxlength="20" name="numero_fabricacion" type="text" class="form-control form-control-sm" aria-label="Nombre Producto">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>N° Interno</label>
                              <input id="numero_interno" maxlength="20" name="numero_interno" type="text" class="form-control form-control-sm" aria-label="Nombre Producto">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Descripción Producto</label>
                              <input id="descripcion_producto" maxlength="250" name="descripcion_producto" type="text" class="form-control form-control-sm" aria-label="Descripción de Producto">
                           </div>
                           <div style="padding-left: 0px !important; display:none;" class="form-group col-md-12" id="div_unidades">
                              <label>Unidades disponibles</label>
                              <input id="stock" maxlength="15" name="stock" type="number" class="form-control form-control-sm" aria-label="Stock">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Tipo de Cambio</label>
                              <select class="form-control" id="select_cambio">
                                 <option id="_blank">Elija Uno</option>
                                 <option id="clp">CLP</option>
                                 <option id="usd">USD</option>
                                 <option id="uf">UF</option>
                              </select>
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Costo</label>
                              <input type="number" maxlength="10" class="form-control form-control-sm" aria-label="costo" id="costo">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label> % Margen</label>
                              <input type="number" maxlength="10" onkeyup="validaPorcentaje(this)" class="form-control form-control-sm" aria-label="margen" id="margen">
                           </div>
                           <div style="padding-left: 0px !important;" class="form-group col-md-12">
                              <label>Valor venta</label>
                              <input type="number" maxlength="10" class="form-control form-control-sm" aria-label="valor_venta" id="valor_venta">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <input type="button" onclick="crearProducto();" class="btn btn-primary btn-md" value="Crear Producto">
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="modalExitosa" tabindex="-1" role="dialog" aria-labelledby="modalexito" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="modalexito">Creacion Exitosa</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  Se ha efectuado la operación exitosamente.
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
@endsection