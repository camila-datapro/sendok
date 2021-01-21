<!-- inicio de seccion de envio documento propuesta -->
<div class="container">
   <div class="card">
      <div class="card-body">
      <div id="propuesta_detalle">
         <div class="col-md-12" style="padding-left: 0px;display: flex; justify-content: space-between; align-items: center;">
            <?php
               $path =  'https://www.datapro.cl/wp-content/uploads/2019/03/logo-datapro-chile.png';
               $type = pathinfo($path, PATHINFO_EXTENSION);
               $data = file_get_contents($path);
               $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
               ?>
            <img src="<?php echo $base64 ?>">
         </div>
         <!----id propuesta-->
        
            <div class="row">
               <div class="col-md-12" style="padding-left: 0px;margin: 30px 0px;">
                  <table class="table table-bordered">
                     <thead style="background:#142444; ">
                        <tr>
                           <th style="color: #ffffff !important;"> PROPUESTA COMERCIAL</th>
                        </tr>
                     </thead>
                  </table>
                  <table class="table table-bordered" style="border-bottom: 4px solid #142444;">
                     <tbody>
                        <tr>
                           <td style="width: 300px;background: rgba(0, 0, 0, 0.05);"> Propuesta N° </td>
                           <td> AAAAA </td>
                        </tr>
                        <tr>
                           <td style="width: 300px;background: rgba(0, 0, 0, 0.05);"> Fecha </td>
                           <td> <?php echo date("d")."/".date("m")."/".date("Y"); ?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <!----fin id propuesta-->
            <div class="col-md-12" style="padding-left: 0px;">
               <div class="row">
                  <div class="col-md-6" style="padding-left: 0px;">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th> Cliente </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td id="nombre_cliente"> </td>
                           </tr>
                           <tr>
                              <td id="email_cliente"></td>
                           </tr>
                           <tr>
                              <td id="fono_cliente"></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <h2 hidden id="id_usuario"><?php echo Auth::user()->id ?></h2>
                  <h2 hidden id="id_cliente"></h2>
                  <h2 hidden id="id_producto"></h2>
                  <h2 hidden id="id_servicio"></h2>

                  <div class="col-md-6" style="padding-right: 0px;">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th> Ejecutivo </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td><?php echo Auth::user()->name; ?> </td>
                           </tr>
                           <tr>
                              <td> <?php echo Auth::user()->email; ?></td>
                           </tr>
                           <tr>
                              <td> Fono</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <p class="card-description" style="padding-top: 50px;"> A continuación se detalla su requerimiento </p>
            <!---documento-->
            <div class="row">
               <div class="col-md-12" style="padding-left: 0px;">
                  <table class="table table-striped table-bordered" style="border-bottom: 4px solid #142444;">
                     <thead style="background:#142444; ">
                        <tr>
                           <th style="color: #ffffff !important;"> CTD </th>
                           <th style="color: #ffffff !important;"> Descripción </th>
                           <th style="color: #ffffff !important;"> Precio Unitario </th>
                           <th style="color: #ffffff !important;text-align:right;"> Precio </th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td id="unidades_propuesta"> </td>
                           <td id="nombre_producto_propuesta"> </td>
                           <td id="valor_producto_propuesta"></td>
                           <td id="total_propuesta_sin_iva" style="text-align:right;"> </td>
                        </tr>                  
                     </tbody>
                  </table>
               </div>
            </div>
            <!---fin documento-->
            <!---documento-->
            <div class="col-md-12" style="padding-left: 0px;margin-top: 20px;">
               <div class="row">
                  <div class="col-md-6" style="padding-left: 0px;">
                     <table class="table table-striped ">
                        <thead style="background:#142444; ">
                           <tr>
                              <th style="color: #ffffff !important;text-align:center;"> Forma de pago </th>
                              <th style="color: #ffffff !important;text-align:center;"> Validez de la oferta </th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="table-bordered">
                              <td style="text-align:center;"> Contado </td>
                              <td style="text-align:center;"> 5 días </td>
                           </tr>
                        </tbody>
                     </table>
                     <p class="card-description" style="text-align: center;margin-top: 10px;"> Todos los valores se encuentran expresados en dolares más IVA </p>
                  </div>
                  <div class="col-md-6" style="padding-left: 0px;padding-right: 0px;">
                     <table class="table table-bordered">
                        <tbody>
                           <tr>
                              <td> SubTotal</td>
                              <td id="subtotal" style="text-align:right;"></td>
                           </tr>
                           <tr>
                              <td> Iva </td>
                              <td id="iva" style="text-align:right;"> </td>
                           </tr>
                        </tbody>
                        <tbody style="background:#142444; ">
                           <tr>
                              <th style="color: #ffffff !important;text-align:left;"> Total</th>
                              <th id="total_con_iva" style="color: #ffffff !important;text-align:right;"></th>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <p style="text-align: center;margin-top: 60px;margin-bottom: 40px;padding-top: 20px; border-top: 3px solid #142444;">Datapro Spa - Marchant Pereira 150 Oficina 208 Providencia, Santiago Chile, +562 29456572, 
                  www.datapro.cl
               </p>
            </div>
         </div>
         <!---fin documento-->
         <div class="row">
            <div class="col-md-12" style="text-align: center;">
               <button style="margin: 10px; cursor: pointer;color: #fff;" class="btn btn-primary btn-fw btn-lg" onclick="enviarPropuesta();">ENVIAR PROPUESTA</button>
               <button  style="margin: 10px; cursor: pointer;color: #fff;" class="btn btn-warning btn-fw btn-lg" onclick="editarPDF();">EDITAR PROPUESTA</button>
               <button style="margin: 10px; cursor: pointer;color: #fff;" class="btn btn-primary btn-lg" data-toggle="modal" onclick="guardarPropuesta();">GUARDAR PROPUESTA</button>
            </div>
         </div>
         <div class="" style="height: 100px;"><span class="fa fa-check-circle"></span></div>
      </div>
      <div class="col-md-1"></div>
   </div>
</div>
<!-- fin seccion de hoja documento-->