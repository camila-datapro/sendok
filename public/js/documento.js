
//cambia segun el ambiente
//local
//const url_prev = '';
// cpanel
const url_prev = location.origin+'/desarrollo/public';

// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function guardarPropuesta(){
    const elemento = document.getElementById('propuesta_detalle');
    $("#modalCargando").modal('show');
    html2pdf()
    .set({
        margin: 1,
        filename: 'documento.pdf',
        image: {
            type: 'png',
            quality: 0.98
        },
        html2canvas: {
            scale: 1, // a mayor escala, mejores graficos pero mas peso
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'portrait' //landscape de forma horizontal
        }
    })
    .from(elemento)
    .save()
    .catch( err => console.log(err))
    .finally()
    .outputPdf()
    .then(function(pdf) {
        // This logs the right base64
        $("#modalCargando").modal("hide");
      //  console.log("la base 64 es:");
      var bpdf = btoa(pdf);

      $.ajax({
        type: "POST",
        url: url_prev + '/guardarPDF',
        data: {
          pdf: bpdf,
          _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
      }).done(function(msg) {                 
            console.log("se completo guardarPDF : "+msg);
            $("#modalCargando").modal('hide');
      }).fail(function() {
        console.log("error en funcion guardarPDF");
        $("#modalCargando").modal('hide');
      });




       $("#hidden_pdf").attr("pdf_64",bpdf);
    });
}

function vistaPreviaPDF(){
  
    var tipo_documento = $("#tipo_documento option:selected").attr('id');
    var id_cliente = $("#select_cliente option:selected").attr('id');
    var id_producto = $("#select_producto option:selected").attr('id');
    var unidades = $("#unidades");
    // se deben cargar los datos del cliente

    $.ajax({
        type: "POST",
        url: url_prev + '/getCliente',
        data: {
          id_cliente: id_cliente,
          _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
      }).done(function(cliente) {       
            var nombre_cliente = cliente[0].nombre_cliente;
            var rut_cliente = cliente[0].rut_cliente;
            var email_cliente = cliente[0].email_cliente;
            var fono_cliente = cliente[0].fono_cliente;
            $("#nombre_cliente").text(nombre_cliente);
            $("#email_cliente").text(email_cliente);
            $("#fono_cliente").text(fono_cliente);

            // setear datos de cliente en plantilla


      }).fail(function() {
        console.log("error en funcion getCliente");
      });

   
    // se deben cargar los datos del ejecutivo

    // se deben cargar los datos del producto

    $.ajax({
        type: "POST",
        url: url_prev + '/getProducto',
        data: {
          id_producto: id_producto,
          _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
      }).done(function(producto) {
            var nombre_producto = producto[0].nombre_producto;
            var precio_unitario = producto[0].valor_producto;
            var tipo_cambio = (producto[0].tipo_cambio).toUpperCase();
            var unidades = $("#unidades").val();
            var subtotal = parseInt(precio_unitario)*parseInt(unidades);
            var iva = Math.round(subtotal*0.19);
            var total_con_iva = subtotal + iva;
            
            $("#nombre_producto_propuesta").text(nombre_producto);
            $("#valor_producto_propuesta").text(tipo_cambio+' '+precio_unitario);
            $("#total_propuesta_sin_iva").text(tipo_cambio+' '+subtotal);
            $("#subtotal").text(tipo_cambio+' '+subtotal);
            $("#iva").text(iva);
            $("#total_con_iva").text(tipo_cambio+' '+total_con_iva);
            $("#unidades_propuesta").text(unidades);

      }).fail(function() {
        console.log("error en funcion getProducto");
      });

    setTimeout(() => {
        $("#datos_ingreso").hide();    
    }, 200);
    
    setTimeout(() => {
        $("#plantilla_documento").show();
    }, 200);
    
    
}


function editarPDF(){
    // se deben cargar los datos del cliente

    // se deben cargar los datos de la empresa

    // se deben cargar los datos del producto
    setTimeout(() => {
        $("#plantilla_documento").hide();    
    }, 200);
    
    setTimeout(() => {
        $("#datos_ingreso").show();
    }, 200);
    
    
}

function eliminarProducto(){
    var id_producto = $("#modal_eliminar").attr("id_producto");
    $("#modal_eliminar").modal('hide');
    $("#modalCargando").modal('show');
}

function enviarPropuesta(){
    var pdf_64 = $("#hidden_pdf").attr("pdf_64");
    $.ajax({
        type: "POST",
        url: url_prev + '/enviarPropuesta',
        data: {        
          _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
      }).done(function(msg) {                   
            console.log(msg);
            // setear datos de cliente en plantilla
            console.log("envio de propuesta exitoso");
            

      }).fail(function() {
        console.log("error en funcion enviarPropuesta");
      });

}