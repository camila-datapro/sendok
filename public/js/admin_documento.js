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
    console.log(propuesta);
    $("#modal_editar_propuesta").modal('show');
}