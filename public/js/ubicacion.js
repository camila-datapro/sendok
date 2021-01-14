//cambia segun el ambiente
//local
//const url_prev = '';
// cpanel
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
    url: url_prev + 'obtenerProvincias',
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
  var nombre = $("#nombre").val();
  var rut = $("#rut").val();
  var fono = parseInt($("#telefono").val());
  var email = $("#email").val();
  var idRegion = parseInt($("#region").val());
  var idProvincia = parseInt($("#provincia option:selected").attr('id_provincia'));
  var idComuna = parseInt($("#comuna option:selected").attr('id_comuna'));
  var direccion = $("#direccion").val();


  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
    }
  });
  $("#modalCargando").modal('show');
  $.ajax({
    type: "POST",
    url: url_prev + '/crearCliente',
    data: {
      nombre: nombre,
      rut: rut,
      email: email,
      fono: fono,
      idRegion: idRegion,
      idProvincia: idProvincia,
      idComuna: idComuna,
      direccion: direccion,
      _token: $('input[name="_token"]').val()
    } //esto es necesario, por la validacion de seguridad de laravel
  }).done(function(msg) {
    $("#modalCargando").modal('hide');
    $("#modalExitosa").modal('show');
  }).fail(function() {
    $("#modalError").modal('show');
  });
}