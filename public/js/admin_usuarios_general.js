const carpeta = window.location.pathname;
if (carpeta.includes("desarrollo")) {
	var url_prev = location.origin + "/desarrollo/public/";
} else {
	var url_prev = location.origin + "/public/";
}


$("#a_mi_empresa").click(function () {
    $("#div_nuevos_usuarios").hide();
    $("#div_mi_empresa").show();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    
    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    
    //document.getElementById("a_mi_empresa").classList.add('btn-light');
    document.getElementById("a_usuarios").classList.add('btn-light');
    
    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');

    document.getElementById("a_mi_empresa").classList.add('btn-primary');
	document.getElementById("a_mi_empresa").classList.add('active');


    
	  
});


$("#a_usuarios").click(function () {
    $("#div_mi_empresa").hide();
    $("#div_nuevos_usuarios").show();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    
    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    
    document.getElementById("a_mi_empresa").classList.add('btn-light');
    //document.getElementById("a_usuarios").classList.add('btn-light');
    
    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');

    document.getElementById("a_usuarios").classList.add('btn-primary');
	document.getElementById("a_usuarios").classList.add('active');


    
	  
});


$("#form_mi_empresa").on("submit", function (e) {
	//do your form submission logic here
    e.preventDefault();
    alert("Funcionalidad en desarrollo...");
});
  
$("#form_nuevos_usuarios").on("submit", function (e) {
	//do your form submission logic here
    e.preventDefault();
    alert("Funcionalidad en desarrollo...");
});



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