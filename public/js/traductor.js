
const url_prev = location.origin+'/desarrollo/public';

function copy() {
    let textarea = document.getElementById("nueva_config");
    textarea.select();
    document.execCommand("copy");
}

function generaConfiguracion() {
    var cant = $("#cantidad_parametros").val();
    var texto = "";
    for (var i = 0; i < parseInt(cant); i++) {
        texto = texto + $("#parametro_" + i).text()+"="+btoa($("#desencriptado_"+i).val())+"\n";
    }
    $("#nueva_config").text(texto);

}