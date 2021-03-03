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
	 $("#div_visar_plantillas").hide();
	 $("#div_crear_plantilla").hide();
	document.getElementById("a_plantilla_correo").classList.remove('active');
	document.getElementById("a_firma").classList.remove('active');

	document.getElementById("a_plantilla_correo").classList.remove('btn-primary');
	document.getElementById("a_firma").classList.remove('btn-primary');

	document.getElementById("a_plantilla_correo").classList.remove('btn-light');
	document.getElementById("a_firma").classList.remove('btn-light');
	document.getElementById("a_datos_usuario").classList.remove('btn-light');

	document.getElementById("a_plantilla_correo").classList.add('btn-light');
	document.getElementById("a_firma").classList.add('btn-light');

	document.getElementById("a_datos_usuario").classList.add('active');
	
	document.getElementById("a_datos_usuario").classList.add('btn-primary');
	$("#div_firma_correo").hide();
	$("#div_plantilla_correo").hide();
	$("#div_datos_usuario").show();
  });

  $("#a_plantilla_correo").click(function () {	
	$("#div_visar_plantillas").hide();
	$("#div_crear_plantilla").hide();
	document.getElementById("a_firma").classList.remove('btn-primary');
	document.getElementById("a_datos_usuario").classList.remove('btn-primary');

	document.getElementById("a_firma").classList.remove('btn-light');
	document.getElementById("a_datos_usuario").classList.remove('btn-light');
	document.getElementById("a_plantilla_correo").classList.remove('btn-light');

	document.getElementById("a_firma").classList.add('btn-light');
	document.getElementById("a_datos_usuario").classList.add('btn-light');

	document.getElementById("a_firma").classList.remove('active');
	document.getElementById("a_datos_usuario").classList.remove('active');

	document.getElementById("a_plantilla_correo").classList.add('btn-primary');
	document.getElementById("a_plantilla_correo").classList.add('active');
	$("#div_datos_usuario").hide();
	$("#div_firma_correo").hide();
	$("#div_plantilla_correo").show();
	
});

$("#a_firma").click(function () {
	$("#div_visar_plantillas").hide();
	$("#div_crear_plantilla").hide();
	document.getElementById("a_plantilla_correo").classList.remove('active');
	document.getElementById("a_datos_usuario").classList.remove('active');
	
	document.getElementById("a_plantilla_correo").classList.remove('btn-primary');	
	document.getElementById("a_datos_usuario").classList.remove('btn-primary');

	document.getElementById("a_plantilla_correo").classList.remove('btn-light');	
	document.getElementById("a_datos_usuario").classList.remove('btn-light');
	document.getElementById("a_firma").classList.remove('btn-light');

	document.getElementById("a_plantilla_correo").classList.add('btn-light');	
	document.getElementById("a_datos_usuario").classList.add('btn-light');

	document.getElementById("a_firma").classList.add('btn-primary');

	document.getElementById("a_firma").classList.add('active');

	$("#div_plantilla_correo").hide();
	$("#div_datos_usuario").hide();
	$("#div_firma_correo").show();
	
});

$("input:checkbox").on('click', function() {
	$("#btn_continuar_operacion").prop('disabled',false);
	// in the handler, 'this' refers to the box clicked on
	var $box = $(this);
	if ($box.is(":checked")) {
	  // the name of the box is retrieved using the .attr() method
	  // as it is assumed and expected to be immutable
	  var group = "input:checkbox[name='" + $box.attr("name") + "']";
	  // the checked state of the group/box on the other hand will change
	  // and the current value is retrieved using .prop() method
	  $(group).prop("checked", false);
	  $box.prop("checked", true);
	} else {
	  $box.prop("checked", false);
	}	

  });

  function continuar_operacion(){
	  
	  if($("#check_crear_plantilla").is(":checked")){
		$("#div_plantilla_correo").hide();
		$("#div_crear_plantilla").show();
	  }
	  if($("#check_visar_plantilla").is(":checked")){
		$("#div_plantilla_correo").hide();
		$("#div_visar_plantillas").show();
	  }
  }


  function enable_firma() {
	$('#form_firma textarea').each(function () {
	  $(this).prop('disabled', false);
   });
   $('#form_firma input').each(function () {
	$(this).prop('disabled', false);
 });

  }
  
  function disable_firma() {

	$('#form_firma input').each(function () {
	  $(this).prop('disabled', true);
   });

   $('#form_firma textarea').each(function () {
	$(this).prop('disabled', true);
 });

  }

  function editarFirma(){
	  $("#btn_editar_pie_firma").hide();
	  $("#btn_guardar_firma").show();
	  $("#btn_cancelar_cambios").show();
	  enable_firma();
  }

  function cancelarEdicionFirma(){
	$("#btn_guardar_firma").hide();
	$("#btn_cancelar_cambios").hide();
	$("#btn_editar_pie_firma").show();
	disable_firma();
}

$("#form_firma").on("submit", function (e) {
	//do your form submission logic here
	e.preventDefault();
  });

  $("#form_datos_plantilla").on("submit", function (e) {
	//do your form submission logic here
	e.preventDefault();
	guardarNuevaPlantilla();
  });

  // tras edicion de firma
  function guardarFirma(){
	  alert("funcionalidad en desarrollo ");
  }

  function guardarNuevaPlantilla(){
	$.ajaxSetup({
		headers: {
		  'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
		}
	  });
	  var array_datos = [];
	  array_datos.push({
		nombre: $("#nombre_plantilla").val(),
		asunto: $("#asunto_plantilla").val(),
		cuerpo: $("#cuerpo_plantilla").val(),
		id_usuario: parseInt($("#id_usuario").val())
	  });
  	  	
	  var json_datos = JSON.stringify(array_datos);
	  console.log(json_datos);
	  $.ajax({
		type: "POST",
		url: url_prev + '/crearPlantilla',
		data: {
		  json_datos: json_datos,
		  _token: $("#token").val()
		} //esto es necesario, por la validacion de seguridad de laravel
	  }).done(function (msg) {
		$("#modalExitosa").modal("show");
	  }).fail(function () {				
		console.log("Error al crear plantilla");
	  });
  }

  function verPlantilla(id){
	$("#modal_ver_nombre").text("Ver Plantilla");
	$("#btn_editar_ver_plantilla").show();
	$("#btn_editar_guardar_plantilla").hide();
	disable_ver_plantilla();
	var nombre = $("#td_nombre_"+id).text();
	var asunto = $("#td_asunto_"+id).text();
	$("#moda_ver_cuerpo_id").val(id);
	var contenido = $("#td_cuerpo_"+id).text();
	
	$("#modal_ver_cuerpo_nombre").val(asunto);
	$("#modal_ver_cuerpo_asunto").val(asunto);
	$("#modal_ver_cuerpo_contenido").val(contenido);
	//$("#modal_ver_cuerpo").text(`nombre: ${nombre} asunto: ${asunto} \n contenido: ${contenido}`);
	$("#modalVerPlantilla").modal("show");
  }

  function editarPlantilla(){
	$("#modal_ver_nombre").text("Editar Plantilla");
	enable_ver_plantilla();
	  $("#btn_editar_ver_plantilla").hide();
	  $("#btn_editar_guardar_plantilla").show();
	var id = $("#moda_ver_cuerpo_id").val();
	var nombre = $("#modal_ver_cuerpo_nombre").val();
	var asunto = $("#modal_ver_cuerpo_asunto").val();
	var contenido = $("#modal_ver_cuerpo_contenido").val();
  }
  function eliminarPlantilla(id){
	console.log("hola2");
  }
  

  function enable_ver_plantilla() {
	$('#datos_ver_editar_plantilla input').each(function () {
	  $(this).prop('disabled', false);
   });

   $('#datos_ver_editar_plantilla textarea').each(function () {
	$(this).prop('disabled', false);
 });

  }
  
  function disable_ver_plantilla() {
	$('#datos_ver_editar_plantilla input').each(function () {
	  $(this).prop('disabled', true);
   });

   $('#datos_ver_editar_plantilla textarea').each(function () {
	$(this).prop('disabled', true);
 });

  }