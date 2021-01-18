//cambia segun el ambiente
//local
//const url_prev = '';
// cpanel
const url_prev = location.origin+'/desarrollo/public';
//cargarTiposDeProducto();

function visarUnidades(){
  var opcion = $("#tipo_producto option:selected").attr("id");
  if(opcion=="producto"){
    $("#div_unidades").show();
  }else{
    $("#div_unidades").hide();
  }
}


function cargarTiposDeProducto(){
    
    $.ajax({
      type: "GET",
      url: url_prev+'/obtenerTiposDeProducto',
      data: {}
    }).done(function(msg) {
        var json = JSON.parse(msg);
        var opciones = "<option id='0'> Elija Uno </option>";
        for(var i=0; i<json.length; i++){
            opciones = opciones + "<option id="+json[i].id_tipo_producto+" id_tipo_producto= '"+json[i].id_tipo_producto+"'>"+json[i].nombre_tipo+"</option>";
        }
        $('#tipo_producto').find('option').remove().end().append(opciones);
    });
}
  
  function crearProducto(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
      }
    });

    var id_tipo_producto = $("#tipo_producto option:selected").attr('id_tipo_producto');
    var nombre_producto = $("#nombre_producto").val();
    var valor_producto = $("#valor_venta").val();
    var descripcion_producto = $("#descripcion_producto").val();
    var tipo_cambio = $("#select_cambio option:selected").attr("id");
    var stock = $("#stock").val();
    var costo = $("#costo").val();
    var margen = $("#margen").val();

    $("#modalCargando").modal('show');
    $.ajax({
        type: "POST",
        url: url_prev + '/crearProducto',
        data: {
        id_tipo: id_tipo_producto,
        nombre: nombre_producto,
        valor: valor_producto,
        descripcion: descripcion_producto,
        tipo_cambio: tipo_cambio,
        stock: stock,
        costo: costo,
        margen: margen,
        _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function(msg) {
        setTimeout(() => {  
            $("#modalCargando").modal('hide'); 
        }, 500);
        setTimeout(() => {  
            $("#modalExitosa").modal('show');
        }, 500);
     
    }).fail(function() {
        
        setTimeout(() => {  
            $("#modalCargando").modal('hide'); 
        }, 500);
        setTimeout(() => {  
            $("#modalError").modal('show');
        }, 500);
    });
  }

  function confirmarEliminacion(id_boton, nombre_producto){
    var id_producto = parseInt(id_boton.replace('eliminar_',''));
    $("#modal_eliminar_nombre").text(nombre_producto);
    $("#modal_eliminar").removeAttr("id_producto");
     $("#modal_eliminar").attr("id_producto",id_producto);
     $("#modal_eliminar").modal('show');
  }
  
  function eliminarProducto(){
    var id_producto = $("#modal_eliminar").attr("id_producto");
    $("#modal_eliminar").modal('hide');
    $("#modalCargando").modal('show');
  
    $.ajax({
      type: "POST",
      url: url_prev + '/eliminarProducto',
      data: {
        id_producto: id_producto,
        _token: $('input[name="_token"]').val()
      } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function(msg) {
      setTimeout(() => {  
          $("#modalCargando").modal('hide'); 
      }, 500);
      setTimeout(() => {  
          $("#modalExitosa").modal('show');
      }, 500);
    }).fail(function() {
      setTimeout(() => {  
          $("#modalCargando").modal('hide'); 
      }, 500);
      setTimeout(() => {  
          $("#modalError").modal('show');
      }, 500);
    });
  
  }


$(document).ready(function() {
  var windowsize = $(window).width();
    if(windowsize<1100){
      setTimeout(() => {  
          $("td.sorting_1").click();
      }, 100);
      
    }
});
