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
	  alert("funcionalidad en desarrollo");
  }