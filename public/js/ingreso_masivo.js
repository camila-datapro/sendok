const url_prev = location.origin + window.location.pathname;


function construirTabla(){
    var data = $('#contenido_ingreso').val();
    if(data!=""){
    var rows = data.split("\n");
    var table = $('<table id="tabla_contenido" class="table table-hover">');
    var i= 0;
    for(var y in rows) {
        if(i==0){
            var cells = rows[y].split("\t");
            var thead = $('<thead class="thead-dark">');
            var row = $('<tr>');
            for(var x in cells) {
                row.append('<th>'+cells[x]+'</th>');
            }
            row.append('</tr>');
            thead.append(row);
            thead.append('</thead>');
            table.append(thead);        
        }else{
            var cells = rows[y].split("\t");
            var row = $('<tr>');
            for(var x in cells) {
                row.append('<td>'+cells[x]+'</td>');
            }
            row.append('</tr>');
            table.append(row);
        }
        i=1;        
    }
    table.append('</table>');

    // Insert into DOM
    $('#div_table').html(table);
    $("#div_opciones").show();
    }else{
        $('#div_table').html("");
    }
}

function limpiarContenido(){
    $('#contenido_ingreso').val("");
}

function limpiarTabla(){
    $("#tabla_contenido").html("");
}

function importarTabla(){
    var array = [];
    var headers = [];
    var vacios = "";
    var fila = 0;
    $("#modalCargando").modal("show");
    $('#tabla_contenido th').each(function(index, item) {
        headers[index] = $(item).html();
    });
    $('#tabla_contenido tr').has('td').each(function() {
        fila++;
        var arrayItem = {};
        $('td', $(this)).each(function(index, item) {
            arrayItem[headers[index]] = $(item).html();
            if(($(item).html()=="") && (fila<($("#tabla_contenido tr").length-1))){ 
                vacios = vacios+"- Fila: "+fila+" columna: "+(index+1)+"</br>";
            }
        });
        
        array.push(arrayItem);
        
    });
    
    var json_array = JSON.stringify(array);
    
    if(vacios==""){
        $.ajax({
            type: "POST",
            url: url_prev + 'insertarProductos',
            data: {
            productos: json_array,         
            _token: $('input[name="_token"]').val()
            } //esto es necesario, por la validacion de seguridad de laravel
        }).done(function (msg) {	
            
          
            setTimeout(() => {
                $("#modalCargando").modal("hide");
                $("#modalExitoso").modal("show");
            }, 600);
            
        }).fail(function () {
            console.log("error en funcion insertarProductos");
        });			
    }else{
        $("#info_validacion").html("Debe rellenar los siguientes campos para continuar: </br>"+vacios);
        $("#modalInfo").modal("show");
    }
}