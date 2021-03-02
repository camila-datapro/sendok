const url_prev = location.origin+'/desarrollo/public';

function mostrarAcciones(){
	$("#btn_editar").hide();
	$("#btn_guardar").show();
	$("#btn_cancelar").show();
}

function mostrarAcciones(){
	enable();
	$("#btn_editar").hide();
	$("#btn_guardar").show();
	$("#btn_cancelar").show();
}

function cancelarAcciones(){
	disable();
	$("#nombre").val($("#nombre_hidden").val());
	$("#email").val($("#email_hidden").val());
	$("#cargo").val($("#cargo_hidden").val());
	$("#fono").val($("#fono_hidden").val());
	$("#btn_guardar").hide();
	$("#btn_cancelar").hide();
	$("#btn_editar").show();
	
}

function enable() {
	$("#titulo_usuario").text("Editar Usuario");
	$('#datos_usuario input').each(function () {
	  $(this).prop('disabled', false);
   });

  }
  
  function disable() {
	$("#titulo_usuario").text("Datos de Usuario");
	$('#datos_usuario input').each(function () {
	  $(this).prop('disabled', true);
   });

  }

  $("#datos_usuario").on("submit", function (e) {
	//do your form submission logic here
	e.preventDefault();
	editarBDUsuario();
  });
  
  function editarBDUsuario(){
	$.ajaxSetup({
		headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
		}
	  });

	
	  var array_datos = [];
	  array_datos.push({
		nombre: $("#nombre").val(),
		email: $("#email").val(),
		cargo: $("#cargo").val(),
		fono: $("#fono").val(),
		id_usuario: $("#id_usuario").val()
	  });
  	  	
	  var json_datos = JSON.stringify(array_datos);

	  $.ajax({
		type: "POST",
		url: url_prev + '/editarUsuario',
		data: {
		  json_datos: json_datos,
		  _token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
	  }).done(function (msg) {
		$("#modalExitosa").modal("show");
	  }).fail(function () {				
		console.log("Error al editar usuario");
	  });
  }

  $("#a_datos_usuario").click(function () {
	 
	document.getElementById("a_plantilla_correo").classList.remove('active');
	document.getElementById("a_firma").classList.remove('active');
	document.getElementById("a_datos_usuario").classList.add('active');
	$("#div_firma_correo").hide();
	$("#div_plantilla_correo").hide();
	$("#div_datos_usuario").show();
  });

  $("#a_plantilla_correo").click(function () {	

	document.getElementById("a_firma").classList.remove('active');
	document.getElementById("a_datos_usuario").classList.remove('active');
	document.getElementById("a_plantilla_correo").classList.add('active');
	$("#div_datos_usuario").hide();
	$("#div_firma_correo").hide();
	$("#div_plantilla_correo").show();
	
});

$("#a_firma").click(function () {
	
	document.getElementById("a_plantilla_correo").classList.remove('active');	
	document.getElementById("a_datos_usuario").classList.remove('active');
	document.getElementById("a_firma").classList.add('active');
	$("#div_plantilla_correo").hide();
	$("#div_datos_usuario").hide();
	$("#div_firma_correo").show();
	
});