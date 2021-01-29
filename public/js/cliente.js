const url_prev = location.origin+'/desarrollo/public';

function cargarRegiones() {
  $.ajax({
    type: "GET",
    url: '/obtenerRegiones',
    data: {}
  }).done(function(msg) {});
}

$('region').on('change', function() {
  limpiarSeleccion();
});

function limpiarSeleccion() {
  var opcion = "<option id='0'> Elija Una </option>";
  $('#provincia').find('option').remove().end().append(opcion);
  $('#comuna').find('option').remove().end().append(opcion);
}


function getProvinciasRegion() {
  var idRegion = parseInt($("#region").val());
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: url_prev + '/obtenerProvincias',
    data: {
      id: idRegion,
      _token: $('input[name="_token"]').val()
    } //esto es necesario, por la validacion de seguridad de laravel
  }).done(function(msg) {
    // se incorporan las opciones en la provincia
    var json = JSON.parse(msg);
    var opciones = "<option id='0'> Elija Una </option>";
    for (var i = 0; i < json.length; i++) {
      opciones = opciones + "<option id='" + json[i].id + "' id_provincia='" + json[i].id + "'>" + json[i].provincia + "</option>";
    }
    $('#provincia').find('option').remove().end().append(opciones);
  });
}

function getComunasProvincia() {
  var idProvincia = $("#provincia option:selected").attr('id_provincia');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: url_prev + '/obtenerComunas',
    data: {
      id: idProvincia,
      _token: $('input[name="_token"]').val()
    } //esto es necesario, por la validacion de seguridad de laravel
  }).done(function(msg) {
    // se incorporan las opciones en la comuna
    var json = JSON.parse(msg);
    var opciones = "<option id='0'> Elija Una </option>";
    for (var i = 0; i < json.length; i++) {
      opciones = opciones + "<option id=" + json[i].id + " id_comuna= '" + json[i].id + "'>" + json[i].comuna + "</option>";
    }
    $('#comuna').find('option').remove().end().append(opciones);
  });
}

function crearCliente() {

  var msj_info = "";

  if($("#nombre").val()==""){
    msj_info+= "- Debe ingresar Nombre de Empresa. </br>";
  }

  if($("#rut").val()==""){
    msj_info+= "- Debe ingresar RUT. </br>";
  }

  if($("#telefono").val()==""){
    msj_info+= "- Debe ingresar Teléfono. </br>";
  }

  if($("#email").val()==""){
    msj_info+= "- Debe ingresar Email. </br>";
  }
  if($("#region").val()=="Elija Una"){
    msj_info+= "- Debe seleccionar Region. </br>";
  }
  if($("#provincia").val()=="Elija Una"){
    msj_info+= "- Debe seleccionar Provincia. </br>";
  }
  if($("#comuna").val()=="Elija Una"){
    msj_info+= "- Debe seleccionar Comuna. </br>";
  }
  if($("#direccion").val()==""){
    msj_info+= "- Debe ingresar Direccion. </br>";
  }
  if($("#nombre_contacto").val()==""){
    msj_info+= "- Debe ingresar Nombre de contacto. </br>";
  }

  if($("#cargo_contacto").val()==""){
    msj_info+= "- Debe ingresar Cargo de contacto. </br>";
  }

  if(msj_info==""){
      var nombre = $("#nombre").val();
      
      var rut = $("#rut").val();
      var fono = parseInt($("#telefono").val());
      var email = $("#email").val();
      var idRegion = parseInt($("#region").val());
      var idProvincia = parseInt($("#provincia option:selected").attr('id_provincia'));
      var idComuna = parseInt($("#comuna option:selected").attr('id_comuna'));
      var direccion = $("#direccion").val();
      var nombre_contacto = $("#nombre_contacto").val();
      var cargo_contacto = $("#cargo_contacto").val();
      var array_datos = [];
      var token = $('input[name="_token"]').val();

      array_datos.push({
        nombre: nombre,
        rut: rut,
        fono: fono,
        email: email,
        id_region: idRegion,
        id_provincia: idProvincia,
        id_comuna: idComuna,
        direccion: direccion,
        nombre_contacto: nombre_contacto,
        cargo_contacto : cargo_contacto
      });

      var json_datos = JSON.stringify(array_datos);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
      });

      $.ajax({
        type: "POST",
        url: url_prev + '/crearCliente',
        data: {
          json_datos: json_datos,
          _token: token
        } //esto es necesario, por la validacion de seguridad de laravel
      }).done(function(msg) {
          $("#modalExitosa").modal('show');
        
      }).fail(function() {
        setTimeout(() => {  
            $("#modalError").modal('show');
        }, 200);
      });
  }else{
    $("#info_validacion").html(msj_info);
		$("#modalInfo").modal("show");
  }
}


function confirmarEliminacion(id_boton,nombre_cliente){
  var id_cliente = parseInt(id_boton.replace('eliminar_',''));
  $("#modal_eliminar_nombre").text(nombre_cliente);
  $("#modal_eliminar").removeAttr("id_cliente");
   $("#modal_eliminar").attr("id_cliente",id_cliente);
   $("#modal_eliminar").modal('show');
}

function eliminarCliente(){
  var id_cliente = $("#modal_eliminar").attr("id_cliente");
  $("#modal_eliminar").modal('hide');
  $("#modalCargando").modal('show');

  $.ajax({
    type: "POST",
    url: url_prev + '/eliminarCliente',
    data: {
      id_cliente: id_cliente,
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