const url_prev = location.origin + '/desarrollo/public';

$(document).ready(function () {
	$('.js-example-basic-single').select2();

	// se obtienen los productos
	$.ajax({
		type: "POST",
		url: url_prev + '/listProductos',
		data: {
			_token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
	}).done(function (msg) {		
			var productos = msg;
			var counter = 2;

			$("#addButton").click(function () {

				if (counter > 20) {
					alert("Only 10 textboxes allow");
					return false;
				}

				var opciones = "";				
					for(var i=0; i<productos.length; i++){
						opciones =opciones+'<option id="'+productos[i].id_producto+'" nombre_producto="'+productos[i].nombre_producto+'" tipo_cambio="'+productos[i].tipo_cambio+'" valor_producto="'+productos[i].valor_producto+'">'+productos[i].nombre_producto+' ('+productos[i].tipo_cambio+' '+productos[i].valor_producto+')'+'</option>';
					}


				var newTextBoxDiv = $(document.createElement('div'))
					.attr("id", 'TextBoxDiv' + counter)
					.attr("style", 'border-top: 1px solid; margin-bottom: 20px;'+
					'border: 1px solid;'+
					'border-color: #dee2e6;'+
					'background-color: #e0e4ff;'+
					' padding: 12px; padding-top: 0px;');

				newTextBoxDiv.after().html('<label class="top-spaced">Seleccione producto N° ' + counter + ' : </label>'+
				'<select id="select_producto_'+counter+'" class="form-control">'+
					'<option id="0">Elija Uno</option>'
					+opciones+
				'</select>'+
				'<label class="top-spaced">Unidades producto N° '+counter+'</label>'+
				'<input class="form-control" id="unidades_producto_'+counter+'""></input>'+
				'<label class="top-spaced">Descuento para producto N° '+counter+' (opcional)</label>'+
				'<input class="form-control" id="descuento_producto_'+counter+'""></input>');
				$("#cantidad_divs").attr("cantidad",counter);		
				newTextBoxDiv.appendTo("#TextBoxesGroup");
				counter++;
			});

			$("#removeButton").click(function () {
				if (counter == 1) {
					alert("No more textbox to remove");
					return false;
				}

				counter--;
				$("#cantidad_divs").attr("cantidad",(counter-1));
				$("#TextBoxDiv" + counter).remove();

			});
		}).fail(function () {
			console.log("error en generacion dinamica de productos ");		
		});

});

function adminEditarPropuesta(propuesta){	
	var nombres_producto = JSON.parse(propuesta.nombre_producto);
	var ids_producto = JSON.parse(propuesta.id_producto);
	var unidades_producto = JSON.parse(propuesta.unidades);
	var descuento_producto = JSON.parse(propuesta.descuento);

	$("#folio_propuesta").text(propuesta.folio_propuesta);
	//seteo el primer div
	document.getElementById("select_producto_1").selectedIndex = document.getElementById(ids_producto[0]).index;
	$("#unidades_producto_1").val(unidades_producto[0]);
	$("#descuento_producto_1").val(descuento_producto[0]);
	// descuento se deja para despues 
	var cantidad_divs = ids_producto.length;
	for(var i=1; i<cantidad_divs; i++){
		$("#addButton").click();
		document.getElementById("select_producto_"+(i+1)).selectedIndex = document.getElementById(ids_producto[i]).index;
		$("#unidades_producto_"+(i+1)).val(unidades_producto[i]);
		$("#descuento_producto"+(i+1)).val(descuento_producto[i]);

	}


	document.getElementById("select_cliente").selectedIndex = document.getElementById(propuesta.id_cliente).index;
    $("#modal_editar_propuesta").modal('show');
}

function mostrarVistaPrevia(){

	
	var cantidad_divs = $("#cantidad_divs").attr("cantidad");

	var msg_info = "";

	if($("#select_cliente").val()=="Elija Uno"){
		msg_info += "- Debe seleccionar un cliente.</br>";
	}

	if($("#tipo_documento").val()=="Elija Uno"){
		msg_info += "- Debe seleccionar un tipo de documento.</br>";
	}



	for(var i=1;i<=parseInt(cantidad_divs);i++){
		if($("#select_producto_"+i).val()=="Elija Uno"){
			msg_info += "- Debe seleccionar el producto N°: "+i+".</br>";
		}
		if($("#unidades_producto_"+i).val()==""){
			msg_info += "- Debe seleccionar las unidades N°: "+i+".</br>";
		}
	
	}

	if(msg_info==""){

	var id_cliente = $("#select_cliente option:selected").attr('id');
	
	// se obtienen los datos del cliente

	$("#nombre_cliente").text($("#select_cliente option:selected").attr("nombre_cliente"));
	$("#email_cliente").text($("#select_cliente option:selected").attr("email_cliente"));
	$("#fono_cliente").text($("#select_cliente option:selected").attr("fono_cliente"));
	$("#contacto_nombre").text($("#select_cliente option:selected").attr("contacto_nombre"));
	$("#contacto_cargo").text($("#select_cliente option:selected").attr("contacto_cargo"));
    $("#id_cliente").text(id_cliente);

	//se obtienen los productos dinamicos del formulario anterior
	// cantidad
	// nombre
	// precio unitario
	// precio total
	var total_parcial = 0;
	var subtotal = 0;
	var iva = 0;
	var total = 0;
	var tipo_cambio_p = 0;
	var descuento = 0;
	var html = "";
	var tiene_descuento = 0;// 1 si es que tiene

	for(var k=1; k<=cantidad_divs;k++){
		if($("#descuento_producto_"+k).val()!=""){
			tiene_descuento = 1;
			
		}
	}

	if(tiene_descuento==1){
		$("#columna_descuento").show();
	}else{
		$("#columna_descuento").hide();
	}


	for(var i=1; i<=cantidad_divs;i++){
		descuento = parseInt(($("#descuento_producto_"+i).val()=="")? 0 : $("#descuento_producto_"+i).val());
		total_parcial = parseInt($("#select_producto_"+i+" option:selected").attr("valor_producto"))*parseInt($("#unidades_producto_"+i).val()) - descuento;
		tipo_cambio_p = $("#select_producto_"+i+" option:selected").attr("tipo_cambio").toUpperCase();
		
		html ='<tr>'+
			'<td>'+$("#unidades_producto_"+i).val()+'</td>'+
			'<td>'+$("#select_producto_"+i+" option:selected").attr("nombre_producto")+'</td>'+
			'<td><b>'+tipo_cambio_p+' </b> '+$("#select_producto_"+i+" option:selected").attr("valor_producto")+'</td>';
			//evaluamos si es que tiene descuento y mostramos la columna
			if(tiene_descuento==1){ // caso que si posea descuento
			
				if($("#descuento_producto_"+i).val()!=""){
					// se muestra el dato	
					html = html +'<td><b>'+tipo_cambio_p+'</b> '+descuento+'</td>';
				}else{
					// se muestra campo vacío para no generar descuadre en la tabla 
					html = html+'<td>--</td>';
				}
			}
			html = html+'<td><b>'+tipo_cambio_p+'</b> '+total_parcial+'</td></tr>';

		$("#tabla_propuesta_body").append(html);
		subtotal = subtotal + total_parcial;
	}

	iva= Math.round(subtotal*0.19);
	total = subtotal + iva;
	
	$("#subtotal").text(tipo_cambio_p+' '+subtotal);
	$("#iva").text(iva);
	$("#total_con_iva").text(tipo_cambio_p+' '+total);


	$("#datos_ingreso").hide();
	$("#plantilla_documento").show();
	$("#boton_mostrar_pdf").hide();
	$("#boton_guardar_cambios").show();
	}else{
		
		
			$("#info_validacion").html(msg_info);
			$("#modalInfo").modal("show");		
		
		
	}
	
}





function editarPDF() {
	$("#boton_mostrar_pdf").show();
	$("#guardar_propuesta").show();
	$("#enviar_propuesta").hide();
	$("#check_envio").hide();		
	setTimeout(() => {
		$("#tabla_propuesta_body").html("");
		$("#plantilla_documento").hide();
	}, 200);

	setTimeout(() => {
		$("#datos_ingreso").show();
	}, 200);
}



function guardarPropuesta() {
	const elemento = document.getElementById('propuesta_detalle');
	
	var folio = $("#folio_propuesta").text();
	html2pdf()
		.set({
			margin: 1,
			filename: folio+'.pdf',
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
		.catch(err => console.log(err))
		.finally()
		.outputPdf()
		.then(function (pdf) {
			// This logs the right base64
			$("#modalCargando").modal("hide");
			var bpdf = btoa(pdf);

			$.ajax({
				type: "POST",
				url: url_prev + '/guardarPDF',
				data: {
					pdf: bpdf,
					nombre_doc: folio+'.pdf',
					_token: $('input[name="_token"]').val()
				} //esto es necesario, por la validacion de seguridad de laravel
			}).done(function (msg) {
				actualizaEnBD();
				$("#guardar_propuesta").hide();
			}).fail(function () {				
				console.log("Error en descarga del documento");
			});


			$("#hidden_pdf").attr("pdf_64", bpdf);
		});
}

function actualizaEnBD(){
	// se almacena la propuesta en base de datos
	var folio = $("#folio_propuesta").text();
	var cantidad_divs = $("#cantidad_divs").attr("cantidad");
	var nombre_cliente = $("#nombre_cliente").text();
	var email_destino =$("#email_cliente").text();
	var id_ejecutivo = $("#id_usuario").text();
	var id_cliente = $("#id_cliente").text();		
	
	var array_tipo_cambio = [];
	var array_id_producto = [];
	var array_nombre_producto = [];
	var array_unidades = [];
	var array_descuento = [];
	var array_valor_unitario_producto =[];
	var array_subtotal_producto = [];
	var total_con_iva = parseInt($("#total_con_iva").text().substr(3).trim());
	var iva = 0.19;
	var subtotal = 0;

	  for(var i=1;i<=cantidad_divs;i++){
		subtotal = parseInt($("#select_producto_"+i+" option:selected").attr("valor_producto"))*parseInt($("#unidades_producto_"+i).val());				
		array_tipo_cambio.push($("#select_producto_"+i+" option:selected").attr("tipo_cambio").toUpperCase());
		array_id_producto.push($("#select_producto_"+i+" option:selected").attr("id"));
		array_nombre_producto.push($("#select_producto_"+i+" option:selected").attr("nombre_producto"));
		array_valor_unitario_producto.push($("#select_producto_"+i+" option:selected").attr("valor_producto"));
		array_unidades.push($("#unidades_producto_"+i).val());
		array_descuento.push(($("#descuento_producto_"+i).val()));
		array_subtotal_producto.push(subtotal);
	}			

	var json_tipo_cambio = JSON.stringify(array_tipo_cambio);
	var json_id_producto = JSON.stringify(array_id_producto);
	var json_nombre_producto = JSON.stringify(array_nombre_producto);
	var json_unidades = JSON.stringify(array_unidades);
	var json_descuento = JSON.stringify(array_descuento);
	var json_valor_unitario_producto = JSON.stringify(array_valor_unitario_producto);
	var json_subtotal_producto = JSON.stringify(array_subtotal_producto);
	var total_s_iva = parseInt($("#subtotal").text().substr(3).trim());

	var id_ejecutivo = $("#id_usuario").text();
	var id_cliente = $("#select_cliente option:selected").attr("id");
	var email_cliente = $("#select_cliente option:selected").attr("email_cliente");
	var fono_cliente =  $("#select_cliente option:selected").attr("fono_cliente");
	var nombre_cliente = $("#select_cliente option:selected").attr("nombre_cliente");

	
	var datos_envio = [
		json_tipo_cambio,
		json_id_producto,
		json_nombre_producto,
		json_unidades,
		json_valor_unitario_producto,
		json_subtotal_producto,
		total_s_iva,
		total_con_iva,
		Math.round(total_s_iva*iva),
		id_ejecutivo,
		id_cliente,
		email_cliente,
		fono_cliente,
		nombre_cliente,
		folio,
		json_descuento
	];

	$("#modalCargando").modal('hide');
	$.ajax({
		type: "POST",
		url: url_prev + '/updatePropuesta',
		data: {
		  datos_envio: datos_envio,
		  _token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
		  }).done(function (msg) {
			$("#enviar_propuesta").show();
		}).fail(function () {
		console.log("error en funcion enviarPropuesta");
		});
	//queda pendiente almacenar en la base de datos
}

// envio de correo desde seccion EDITAR
function enviarPropuesta() {
	$("#enviar_propuesta").attr("disabled",true);
	$("#cargando_accion").show();
	$("#modal_editar_propuesta").hide();
	$("#modalCuerpoCorreoEdit").modal("show");				    
}

function enviarCorreo(){
	$("#modalEnviando").modal("show");
		// envio de propuesta
		var folio = $("#folio_propuesta").text();
		var destinatario = $("#email_cliente").text();
		var cuerpo = $("#cuerpo_correo_edit").val();
		console.log("el cuerpo de correo es:"+cuerpo);
		$.ajax({
		  type: "POST",
		  url: url_prev + '/enviarPropuesta',
		  data: {
			destinatario: destinatario,
			contenido: cuerpo,
			nombre_doc: folio+'.pdf',
			_token: $('input[name="_token"]').val()
		  } //esto es necesario, por la validacion de seguridad de laravel
		}).done(function (msg) {		  	
			setEstadoEnviado(folio);
			$("#modalEnviando").modal("hide");
			$("#enviar_propuesta").attr("disabled",false);
			setTimeout(() => {
				$("#modalExitosa").modal("show");				
			}, 300);		  
			
		}).fail(function () {
		  console.log("error en funcion enviarPropuesta");
		});					
}

// envio de correo desde seccion de listado

function enviarPropuestaList(indice) {
	$("#modalCuerpoCorreo").modal("show");
	$("#id_propuesta_hidden").attr("indice_propuesta",indice);
	//$("#modalCargando").modal('show');
	   
}

function sendMailFromList(propuestas){
	var indice = $("#id_propuesta_hidden").attr("indice_propuesta");
	var propuesta = propuestas[indice];
	var contenido = $("#cuerpo_correo").val();

	
	$("#modalEnviando").modal("show");
	var folio = propuesta.folio_propuesta;
	var destinatario = propuesta.email_destino;	
	// envio de propuesta
	$.ajax({
	  type: "POST",
	  url: url_prev + '/enviarPropuesta',
	  data: {
		destinatario: destinatario,
		contenido: contenido,
		nombre_doc: folio+'.pdf',
		_token: $('input[name="_token"]').val()
	  } //esto es necesario, por la validacion de seguridad de laravel
	}).done(function (msg) {		 
		setEstadoEnviado(folio);	
		$("#modalEnviando").modal("hide");
		setTimeout(() => {
			$("#modalExitosa").modal("show");	
		}, 200);			
	}).fail(function () {
	  console.log("error en funcion sendMailFromList");
	});					
}


function setEstadoEnviado(folio){
	$.ajax({
		type: "POST",
		url: url_prev + '/setEstadoEnviado',
		data: {
		  folio: folio,
		  _token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
	  }).done(function (msg) {		  	
		
	  }).fail(function () {
		console.log("error en funcion setEstadoEnviado");
	  });		
}

function adminVerPropuesta(folio){
	$("#visor_documento").attr("src","./documentos/"+folio+".pdf");
	$("#modalVerPropuesta").modal("show");
}