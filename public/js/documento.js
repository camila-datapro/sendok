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
				console.log(productos);
					for(var i=0; i<productos.length; i++){
						opciones =opciones+'<option id="'+productos[i].id_producto+'">'+productos[i].nombre_producto+'</option>';
					}


				var newTextBoxDiv = $(document.createElement('div'))
					.attr("id", 'TextBoxDiv' + counter)
					.attr("style", 'border-top: 1px solid; margin-bottom: 20px;');

				newTextBoxDiv.after().html('<label>Seleccione producto N° ' + counter + ' : </label>'+
				'<select id="productos_documento" class="form-control">'+
					'<option id="0">Elija Uno</option>'
					+opciones+
				'</select>'+
				'<label>Unidades producto N° '+counter+'</label>'+
				'<input class="form-control" id="unidades_documento"></input>'+
				'<label>Descuento para producto N° '+counter+'</label>'+
				'<input class="form-control" id="descuento_documento"></input>');

				newTextBoxDiv.appendTo("#TextBoxesGroup");
				counter++;
			});

			$("#removeButton").click(function () {
				if (counter == 1) {
					alert("No more textbox to remove");
					return false;
				}

				counter--;

				$("#TextBoxDiv" + counter).remove();

			});

			$("#getButtonValue").click(function () {

				var msg = '';
				for (i = 1; i < counter; i++) {
					msg += "\n Descuento #" + i + " : " + $('#textbox' + i).val();
				}
				alert(msg);
			});
		}).fail(function () {
			console.log("error en funcion ");		
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
			//  console.log("la base 64 es:");
			var bpdf = btoa(pdf);

			$.ajax({
				type: "POST",
				url: url_prev + '/guardarPDF',
				data: {
					pdf: bpdf,
					_token: $('input[name="_token"]').val()
				} //esto es necesario, por la validacion de seguridad de laravel
			}).done(function (msg) {
				console.log("se completo guardarPDF : " + msg);
				$("#modalCargando").modal('hide');
			}).fail(function () {
				console.log("error en funcion guardarPDF");
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
	// se deben cargar los datos del cliente

	$.ajax({
		type: "POST",
		url: url_prev + '/getCliente',
		data: {
			id_cliente: id_cliente,
			_token: $('input[name="_token"]').val()
		} //esto es necesario, por la validacion de seguridad de laravel
	}).done(function (cliente) {
		var nombre_cliente = cliente[0].nombre_cliente;
		var email_cliente = cliente[0].email_cliente;
		var fono_cliente = cliente[0].fono_cliente;
		$("#nombre_cliente").text(nombre_cliente);
		$("#email_cliente").text(email_cliente);
    $("#fono_cliente").text(fono_cliente);
    $("#id_cliente").text(id_cliente);



		// setear datos de cliente en plantilla


	}).fail(function () {
		console.log("error en funcion getCliente");
	});


	// se deben cargar los datos del ejecutivo

	// se deben cargar los datos del producto

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

		$("#nombre_producto_propuesta").text(nombre_producto);
		$("#valor_producto_propuesta").text(tipo_cambio + ' ' + precio_unitario);
		$("#total_propuesta_sin_iva").text(tipo_cambio + ' ' + subtotal);
		$("#subtotal").text(tipo_cambio + ' ' + subtotal);
		$("#iva").text(iva);
		$("#total_con_iva").text(tipo_cambio + ' ' + total_con_iva);
    $("#unidades_propuesta").text(unidades);
    $("#id_producto").text(producto[0].id_producto);    
    // aun no se implementa para servicio
    $("#id_servicio").text("");
    

	}).fail(function () {
		console.log("error en funcion getProducto");
	});

	setTimeout(() => {
		$("#datos_ingreso").hide();
	}, 200);

	setTimeout(() => {
		$("#plantilla_documento").show();
	}, 200);
}


function editarPDF() {
	setTimeout(() => {
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
            console.log("se completo guardarPDF : " + msg);
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


            var nombre_cliente = $("#nombre_cliente").text();
            var email_destino =$("#email_cliente").text();
            var id_ejecutivo = $("#id_usuario").text();
            var id_cliente = $("#id_cliente").text();
            var id_producto = $("#id_producto").text();

            var valor_s_iva = $("#subtotal").text();

            var tipo_cambio = valor_s_iva.substr(0, 3).trim();
            console.log("El tipo de cambio es:"+tipo_cambio);
            valor_s_iva = valor_s_iva.substr(3).trim();
            var iva = $("#iva").text();
            var total = $("#total_con_iva").text().substr(3).trim();
            var unidades = $("#unidades_propuesta").text();
            var valor_unitario = $("#valor_producto_propuesta").text().substr(3).trim();
            var nombre_producto = $("#nombre_producto_propuesta").text();

            var array_datos = [];
            array_datos.push({
              nombre_cliente: nombre_cliente,
              email_destino: email_destino,
              id_ejecutivo: id_ejecutivo,
              id_cliente: id_cliente,
              id_producto: id_producto,
              valor_s_iva: valor_s_iva,
              iva: iva,
              total : total,
              unidades: unidades,
              valor_unitario: valor_unitario,
              nombre_producto: nombre_producto,
              tipo_cambio : tipo_cambio
            });
          
            var json_datos = JSON.stringify(array_datos);

            console.log(json_datos);

              $.ajax({
                type: "POST",
                url: url_prev + '/setPropuesta',
                data: {          
                  json_datos : json_datos,        
                  _token: $('input[name="_token"]').val()
                } //esto es necesario, por la validacion de seguridad de laravel
              }).done(function (msg) {
   
              }).fail(function () {
                console.log("error en funcion setPropuesta");
              });


        }).fail(function () {
          console.log("error en funcion enviarPropuesta");
        });
		});



}