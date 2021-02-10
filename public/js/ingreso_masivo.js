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