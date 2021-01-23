const url_prev = location.origin + '/desarrollo/public';

// In your Javascript (external .js resource or <script> tag)

function listProductos(){


  }
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

/*			$("#getButtonValue").click(function () {

				var msg = '';
				for (i = 1; i < counter; i++) {
					msg += "\n Id Producto #" + i + " : " + $('#select_producto_' + i).val();
					msg += 
					"\n Unidades #" + i + " : " + $('#unidades_producto_' + i).val();
					msg += "\n Descuento #" + i + " : " + $('#descuento_producto_' + i).val();
				}
				alert(msg);
			});*/
		}).fail(function () {
			console.log("error en generacion dinamica de productos ");		
		});

});




function guardarPropuesta() {
	const elemento = document.getElementById('propuesta_detalle');
	$("#modalCargando").modal('show');
	html2pdf()
		.set({
			margin: 1,
			filename: 'documento.pdf',
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
					_token: $('input[name="_token"]').val()
				} //esto es necesario, por la validacion de seguridad de laravel
			}).done(function (msg) {
				$("#modalCargando").modal('hide');
			}).fail(function () {				
				$("#modalCargando").modal('hide');
			});


			$("#hidden_pdf").attr("pdf_64", bpdf);
		});
}

function vistaPreviaPDF() {

	var tipo_documento = $("#tipo_documento option:selected").attr('id');
	var id_cliente = $("#select_cliente option:selected").attr('id');
	var id_producto = $("#select_producto option:selected").attr('id');
	var unidades = $("#unidades");
	//indica la cantidad de productos que se ingresaron en el formulario anterior
	var cantidad_divs = $("#cantidad_divs").attr("cantidad");

	// se obtienen los datos del cliente

	$("#nombre_cliente").text($("#select_cliente option:selected").attr("nombre_cliente"));
	$("#email_cliente").text($("#select_cliente option:selected").attr("email_cliente"));
    $("#fono_cliente").text($("#select_cliente option:selected").attr("fono_cliente"));
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
	for(var i=1; i<=cantidad_divs;i++){
		total_parcial = parseInt($("#select_producto_"+i+" option:selected").attr("valor_producto"))*parseInt($("#unidades_producto_"+i).val());
		tipo_cambio_p = $("#select_producto_"+i+" option:selected").attr("tipo_cambio").toUpperCase();
		$("#tabla_propuesta_body").append('<tr>'+
			'<td>'+$("#unidades_producto_"+i).val()+'</td>'+
			'<td>'+$("#select_producto_"+i+" option:selected").attr("nombre_producto")+'</td>'+
			'<td><b>'+tipo_cambio_p+' </b> '+$("#select_producto_"+i+" option:selected").attr("valor_producto")+'</td>'+
			'<td><b>'+tipo_cambio_p+'</b> '+total_parcial+'</td>'+
		'</tr>')
		;
		subtotal = subtotal + total_parcial;
	}

	iva= Math.round(subtotal*0.19);
	total = subtotal + iva;
	
	$("#subtotal").text(tipo_cambio_p+' '+subtotal);
	$("#iva").text(iva);
	$("#total_con_iva").text(tipo_cambio_p+' '+total);
/*
	$.ajax({
		type: "POST",
		url: url_prev + '/getProducto',
		data: {
			id_producto: id_producto,
			_token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
	}).done(function (producto) {
		var nombre_producto = producto[0].nombre_producto;
		var precio_unitario = producto[0].valor_producto;
		var tipo_cambio = (producto[0].tipo_cambio).toUpperCase();
		var unidades = $("#unidades").val();
		var subtotal = parseInt(precio_unitario) * parseInt(unidades);
		var iva = Math.round(subtotal * 0.19);
		var total_con_iva = subtotal + iva;
		for(i=0;i<$("#cantidad_divs").attr("cantidad");i++){
			
		}
		$("#id_producto").text(producto[0].id_producto);    
		$("#nombre_producto_propuesta").text(nombre_producto);
		$("#valor_producto_propuesta").text(tipo_cambio + ' ' + precio_unitario);
		$("#total_propuesta_sin_iva").text(tipo_cambio + ' ' + subtotal);

		$("#unidades_propuesta").text(unidades);


		$("#subtotal").text(tipo_cambio + ' ' + subtotal);
		$("#iva").text(iva);
		$("#total_con_iva").text(tipo_cambio + ' ' + total_con_iva);
   
    // aun no se implementa para servicio
    $("#id_servicio").text("");
    

	}).fail(function () {
		console.log("error en funcion getProducto");
	});
 */
	setTimeout(() => {
		$("#datos_ingreso").hide();
	}, 200);

	setTimeout(() => {
		$("#plantilla_documento").show();
	}, 200);
}


function editarPDF() {
	setTimeout(() => {
		$("#tabla_propuesta_body").html("");
		$("#plantilla_documento").hide();
	}, 200);

	setTimeout(() => {
		$("#datos_ingreso").show();
	}, 200);
}

function eliminarProducto() {
	var id_producto = $("#modal_eliminar").attr("id_producto");
	$("#modal_eliminar").modal('hide');
	$("#modalCargando").modal('show');
}

function enviarPropuesta() {
	$("#modalCargando").modal('show');
	const elemento = document.getElementById('propuesta_detalle');

	html2pdf()
		.set({
			margin: 1,
			filename: 'documento.pdf',
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
		.outputPdf()
		.then(function (pdf) {
			var bpdf = btoa(pdf);
      $("#hidden_pdf").attr("pdf_64", bpdf);
      
              // primero guardo la propuesta en el servidor
        setTimeout(() => {
          //var bpdf = $("#hidden_pdf").attr("pdf_64");
          $.ajax({
            type: "POST",
            url: url_prev + '/guardarPDF',
            data: {
              pdf: bpdf,
              _token: $('input[name="_token"]').val()
            } //esto es necesario, por la validacion de seguridad de laravel
          }).done(function (msg) {            
          }).fail(function () {
            console.log("error en funcion guardarPDF");

          });

        }, 400);


              
        // envio de propuesta
        var destinatario = $("#email_cliente").text();
        $.ajax({
          type: "POST",
          url: url_prev + '/enviarPropuesta',
          data: {
            destinatario: destinatario,
            _token: $('input[name="_token"]').val()
          } //esto es necesario, por la validacion de seguridad de laravel
        }).done(function (msg) {
          setTimeout(() => {
            $("#modalCargando").modal('hide');
          }, 200);
          setTimeout(() => {
            $("#modalExitoso").modal('show');
		  }, 200);
		  
            // se almacena la propuesta en base de datos
			var cantidad_divs = $("#cantidad_divs").attr("cantidad");

            var nombre_cliente = $("#nombre_cliente").text();
            var email_destino =$("#email_cliente").text();
            var id_ejecutivo = $("#id_usuario").text();
			var id_cliente = $("#id_cliente").text();			

			var json_tipo_cambio = "";
			var json_id_producto = "";
			var json_nombre_producto = "";
			var json_unidades = "";
			var json_valor_unitario_producto ="";
			var json_subtotal_producto = "";
			//queda pendiente almacenar en la base de datos
        
        }).fail(function () {
          console.log("error en funcion enviarPropuesta");
		});
		
		});



}