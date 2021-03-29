const carpeta = window.location.pathname;
if (carpeta.includes("desarrollo")) {
	var url_prev = location.origin + "/desarrollo/public/";
} else {
	var url_prev = location.origin + "/public/";
}


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
  $('#comuna').find('option').remove().end().append(opcion);
}


function getComunasRegion() {
  
  var idRegion = parseInt($("#region").val());
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
    }
  });
  $.ajax({
    type: "POST",
    url: url_prev + 'obtenerComunas',
    data: {
      id: idRegion,
      _token: $('input[name="_token"]').val()
    } //esto es necesario, por la validacion de seguridad de laravel
  }).done(function(msg) {
    // se incorporan las opciones en la comuna
    var json = JSON.parse(msg);
    var opciones = "<option id='0'> Elija Una </option>";
    for (var i = 0; i < json.length; i++) {
      opciones = opciones + "<option id='" + json[i].id + "' id_comuna='" + json[i].id + "'>" + json[i].comuna + "</option>";
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
        url: url_prev + 'crearCliente',
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


function confirmarEliminacion(cliente){
  var id_cliente = cliente.id_cliente;
  var nombre_cliente = cliente.nombre_cliente;
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
    url: url_prev + 'eliminarCliente',
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

function editarCliente(cliente){  
  disable();
  $("#btn_guardar").hide();
  
  $("#btn_editar").show();
  cliente = JSON.stringify(cliente);
  cliente = JSON.parse(cliente);
  


  $("#nombre").val(cliente.nombre_cliente);
      
  $("#rut").val(cliente.rut_cliente);
  $("#telefono").val(cliente.fono_cliente);
  $("#email").val(cliente.email_cliente);
  $("#id_cliente").val(cliente.id_cliente);
  $("#region").find('option[value="'+(cliente.id_region_cliente)+'"]').prop('selected', true); 
  if($("#region").val()!="Elija Una"){
    getComunasRegion();      
  }
  
  setTimeout(() => {
    if($("#comuna option").length>1){
      $("#comuna").find('option[id_comuna='+(cliente.id_comuna_cliente)+']').prop('selected', true); 
    }  
  }, 200);
    
     
        $("#direccion").val(cliente.direccion_cliente);
        $("#nombre_contacto").val(cliente.nombre_contacto);
        $("#cargo_contacto").val(cliente.cargo_contacto);
        
  
    $("#modalEditarCliente").modal("show");
      
      
    

}
function editarClienteBD(){

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
      var id_cliente = $("#id_cliente").val();
      var rut = $("#rut").val();
      var fono = parseInt($("#telefono").val());
      var email = $("#email").val();
      var idRegion = parseInt($("#region").val());      
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
        id_comuna: idComuna,
        direccion: direccion,
        nombre_contacto: nombre_contacto,
        cargo_contacto : cargo_contacto,
        id_cliente : id_cliente
      });

      var json_datos = JSON.stringify(array_datos);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
      });
      $("#modalEditarCliente").modal("hide");

      $.ajax({
        type: "POST",
        url: url_prev + 'editarCliente',
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
    $("#modalEditarCliente").modal("show");
    $("#info_validacion").html(msj_info);
		$("#modalInfo").modal("show");
  }
  
}

function enable() {
  $("#titulo_editar").text("Editar Cliente");
    $('#modalEditarCliente input').each(function () {
      $(this).prop('disabled', false);
  });
  $('#modalEditarCliente select').each(function () {
    $(this).prop('disabled', false);
  });
}

function disable() {
  $("#titulo_editar").text("Editar Cliente");
  $('#modalEditarCliente input').each(function () {
      $(this).prop('disabled', true);
  });
  $('#modalEditarCliente select').each(function () {
    $(this).prop('disabled', true);
  });
}

function mostrarEditarCliente(){

  $("#btn_editar").hide();
  enable();
  $("#btn_guardar").show();
}

$("#form_cliente").on("submit", function (e) {
  //do your form submission logic here
  e.preventDefault();
  editarClienteBD();
});
