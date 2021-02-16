$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
  
} );



const url_prev = location.origin+'/desarrollo/public';



  
  
  function confirmarEliminacion(producto){
    id_boton = producto.id_producto;
    nombre_producto = producto.nombre_producto;
    var id_producto = parseInt(id_boton);
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


/*$(document).ready(function() {
  var windowsize = $(window).width();
    if(windowsize<1500){
      setTimeout(() => {  
          $("td.sorting_1").click();
        }, 100);
      
    }
});*/


function verProducto(producto){
   var nombre = producto.nombre;
   var descripcion = producto.descripcion;
   $("#texto_descripcion").text(descripcion);
   $("#nombre_descripcion").text(nombre);
    setTimeout(() => {  
      $("#modal_ver_producto").modal("show");
    }, 300);
}




