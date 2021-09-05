const carpeta = window.location.pathname;
if (carpeta.includes("desarrollo")) {
    var url_prev = location.origin + "/desarrollo/public/";
} else {
    var url_prev = location.origin + "/public/";
}
var flag = true;
$(document).ready(function () {

    if ($("#regval").val() != 0) {
        $("#region").val($("#regval").val());
        getComunasRegion();

    }
    $('[data-toggle="tooltip"]').tooltip();
});
var datadrag = [];
/******************************************************************************* */
/********Funcion que resalta la selección realizada TEMPLATES ******** */
$("#a_templates").click(function () {
    $("#div_mi_empresa").hide();
    $("#div_nuevos_usuarios").hide();
    $("#div_templates").show();

    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    document.getElementById("a_templates").classList.remove('btn-primary');

    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    document.getElementById("a_templates").classList.remove('btn-light');

    document.getElementById("a_mi_empresa").classList.add('btn-light');
    //document.getElementById("a_templates").classList.add('btn-light');
    document.getElementById("a_usuarios").classList.add('btn-light');

    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');
    document.getElementById("a_templates").classList.remove('active');

    document.getElementById("a_templates").classList.add('btn-primary');
    document.getElementById("a_templates").classList.add('active');
    $("#lienzo").html("");
    $("#contenedortablatemp").css("display", "block");
    $("#contenedortemplate").css("display", "none");
    /* Llamada a la función */
    infotabletemplates();
    /* Llamada a la función */
    ver();
    $('[data-toggle="tooltip"]').tooltip();
});
/******************************************************************************* */
/********Funcion que resalta la selección realizada Mi Empresa ******** */
$("#a_mi_empresa").click(function () {
    $("#div_nuevos_usuarios").hide();
    $("#div_mi_empresa").show();
    $("#div_templates").hide();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    document.getElementById("a_templates").classList.remove('btn-primary');

    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    document.getElementById("a_templates").classList.remove('btn-light');

    //document.getElementById("a_mi_empresa").classList.add('btn-light');
    document.getElementById("a_usuarios").classList.add('btn-light');
    document.getElementById("a_templates").classList.add('btn-light');

    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');
    document.getElementById("a_templates").classList.remove('active');

    document.getElementById("a_mi_empresa").classList.add('btn-primary');
    document.getElementById("a_mi_empresa").classList.add('active');
});
/******************************************************************************* */
/********Funcion que resalta la selección realizada Usuarios ******** */
$("#a_usuarios").click(function () {
    $("#div_mi_empresa").hide();
    $("#div_templates").hide();
    $("#div_nuevos_usuarios").show();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    document.getElementById("a_templates").classList.remove('btn-primary');

    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    document.getElementById("a_templates").classList.remove('btn-light');

    document.getElementById("a_mi_empresa").classList.add('btn-light');
    document.getElementById("a_templates").classList.add('btn-light');
    //document.getElementById("a_usuarios").classList.add('btn-light');

    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');
    document.getElementById("a_templates").classList.remove('active');

    document.getElementById("a_usuarios").classList.add('btn-primary');
    document.getElementById("a_usuarios").classList.add('active');
    /* llamada a la función */
    infotable();
});

/******************************************************************************* */
/********Funcion que permite ingresar una empresa ******** */
$("#form_mi_empresa").on("submit", function (e) {
    //do your form submission logic here
    e.preventDefault();
    var error = "";
    if ($.trim($("#nombre_empresa").val()) == "") {
        if (error == "") {
            error = ".- Ingrese el Nombre de la Empresa.";
        } else {
            error = error + "<br>.- Ingrese el Nombre de la Empresa.";
        }
    }
    if ($.trim($("#rut_empresa").val()) == "") {
        if (error == "") {
            error = ".- Ingrese el Rut de la Empresa.";
        } else {
            error = error + "<br>.- Ingrese el Rut de la Empresa.";
        }
    }
    if (!Fn.validaRut($("#rut_empresa").val())) {
        if (error == "") {
            error = ".- El Rut de la Empresa no es válido.";
        } else {
            error = error + "<br>.- El Rut de la Empresa no es válido.";
        }
    }
    if ($("#region").val() == "") {
        if (error == "") {
            error = ".- Ingrese la Región.";
        } else {
            error = error + "<br>.- Ingrese la Región.";
        }
    }
    if ($("#comuna").val() == "") {
        if (error == "") {
            error = ".- Ingrese la Comuna.";
        } else {
            error = error + "<br>.- Ingrese la Comuna.";
        }
    }
    if ($.trim($("#direccion_empresa").val()) == "" || $.trim($("#direccion_empresa").val()).length == 0) {
        if (error == "") {
            error = ".- Ingrese la dirección de la Empresa.";
        } else {
            error = error + "<br>.- Ingrese la dirección de la Empresa.";
        }
    }
    if ($.trim($("#fono_empresa").val()) == "" || $.trim($("#fono_empresa").val()).length < 9) {
        if (error == "") {
            error = ".- Ingrese un número telefónico correcto.";
        } else {
            error = error + "<br>.- Ingrese un número telefónico correcto.";
        }
    }
    if (error != "") {
        $("#exampleModalLabel").html("Presentamos errores en su Formulario");
        $("#modalbody").html(error);
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        return false;
    } else {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: url_prev + 'agregarempresa',
            data: {
                "nombreemp": $("#nombre_empresa").val(),
                "rutemp": $("#rut_empresa").val(),
                "region": $("#region").val(),
                "comuna": $("#comuna").val(),
                "diremp": $("#direccion_empresa").val(),
                "fonoemp": $("#fono_empresa").val(),
                _token: $('input[name="_token"]').val()
            }, //esto es necesario, por la validacion de seguridad de laravel
            datatype: "json",
        }).done(function (msg) {
            var json = JSON.parse(msg);
            if (json.status == "ok") {
                $("#exampleModalLabel").html("Actualización Exitosa");
                $("#modalbody").html("La información ingresada a sido actualizada correctamente");
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            } else {
                $("#exampleModalLabel").html("Presentamos errores en su Formulario");
                $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            }
        });
    }
});

/*$("#form_nuevos_usuarios").on("submit", function (e) {
  //do your form submission logic here
    e.preventDefault();
    alert("Funcionalidad en desarrollo...");
});*/


/******************************************************************************* */
/********Funcion que permite cargar las regiones en el select ******** */
function cargarRegiones() {
    $.ajax({
        type: "GET",
        url: '/obtenerRegiones',
        data: {}
    }).done(function (msg) { });
}
/******************************************************************************* */
/********Funcion que inicia la carga de comunas ******** */
$('region').on('change', function () {
    limpiarSeleccion();
});
/******************************************************************************* */
/********Funcion que  carga de comunas el los select´s ******** */
function limpiarSeleccion() {
    var opcion = "<option id='0'> Elija Una </option>";
    $('#comuna').find('option').remove().end().append(opcion);
}

/******************************************************************************* */
/********Funcion que obtiene las comunas de la región ******** */
function getComunasRegion() {

    var idRegion = parseInt($("#region").val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'obtenerComunas',
        data: {
            id: idRegion,
            _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function (msg) {
        // se incorporan las opciones en la comuna
        var json = JSON.parse(msg);
        var opciones = "<option value=''>Seleccione una Comuna </option>";
        for (var i = 0; i < json.length; i++) {
            opciones = opciones + "<option value='" + json[i].id + "'>" + json[i].comuna + "</option>";
        }

        if ($("#comval").val() > 0) {
            $('#comuna').find('option').remove().end().append(opciones).val($("#comval").val());
        } else {
            $('#comuna').find('option').remove().end().append(opciones);
        }

    }).fail(function () {
        console.log('Error en getComunasRegion()');
    });
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
///////////////////////////Completa tabla usuarios///////////////////////////////
function infotable() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'obtenerUsuariosEmpresa',
        data: {
            _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function (msg) {
        // se incorporan las opciones en la comuna
        var json = JSON.parse(msg);
        var html;

        for (let [key, value] of Object.entries(json.datos)) {
            if (json.datos[key].id != json.id) {
                html += "<tr><td>" + json.datos[key].nombre + " " + json.datos[key].apellido + "</td><td>" + json.datos[key].email + "</td><td>" + json.datos[key].cargo + "</td><td><button class='btn btn-warning editarfin ml-1' id='editarinfo" + json.datos[key].id + "' onclick='editarusuarios(" + json.datos[key].id + ")'><i class='fas fa-edit' aria-hidden='true'></i></button><button class='btn btn-danger ml-1' id='cancelar" + json.datos[key].id + "' onclick='eliminarusuarios(" + json.datos[key].id + ")'><i class='fas fa-trash-alt' aria-hidden='true'></i></button></td></tr>";
            }


            $("#bodytabla").html("");
            $("#bodytabla").html(html);

            var table = $('#tabla_usuarios').DataTable({
                dom: '<"top col-sm latder"f><"top col-sm latizq"l>rt<"bottom col-sm latder"i><"bottom col-sm latizq"p><"clear">',
                retrieve: true,
                paging: true,
                pageLength: 10,
                order: [],
                fixedHeader: true,
                responsive: true,
                scrollCollapse: true,
            });
            $('.dataTables_length').addClass('float-right');
            $('.dataTables_filter').addClass('float-left');
            $('.dataTables_paginate').addClass('float-right');

            $('[data-toggle="tooltip"]').tooltip();
        }

    }).fail(function () {
        console.log('Error en infotable()');
    });
}
/////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
///////////////////////////Completa tabla Templates//////////////////////////////
function infotabletemplates() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'obtenerUsuariosTemplates',
        data: {
            _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function (msg) {
        // se incorporan las opciones en la comuna
        var json = JSON.parse(msg);
        var html;
        if (json.datos.length > 0) {
            for (var i = 0; i < (json.datos.length); i = i + 3) {

                html += "<tr><td>" + json.datos[i + 2] + "</td><td class='text-right'><button class='btn btn-primary ml-1' id='cancelar" + json.datos[i + 1] + "' onclick='vertemplate(" + json.datos[i + 1] + ")' data-toggle='tooltip' data-placement='top' title='Vista Previa'><i class='fas fa-eye' aria-hidden='true'></i></button><button class='btn btn-warning editarfin ml-1' id='editarinfo" + json.datos[i + 1] + "' onclick='editartemplate(" + json.datos[i + 1] + ",1)' data-toggle='tooltip' data-placement='top' title='Editar Template'><i class='fas fa-edit' aria-hidden='true'></i></button><button class='btn btn-danger ml-1' id='eliminarinfo" + json.datos[i + 1] + "' onclick='eliminartemplate(" + json.datos[i + 1] + ",1)' data-toggle='tooltip' data-placement='top' title='Eliminar Template'><i class='fas fa-trash-alt' aria-hidden='true'></i></button></td></tr>";
            }
            $("#bodytemplates").html("");
            $("#bodytemplates").html(html);

            var table = $('#tabla_templates').DataTable({
                dom: '<"top col-sm latder"f><"top col-sm latizq"l>rt<"bottom col-sm latder"i><"bottom col-sm latizq"p><"clear">',
                retrieve: true,
                paging: true,
                pageLength: 10,
                order: [],
                fixedHeader: true,
                responsive: true,
                scrollCollapse: true,
            });
            $('.dataTables_length').addClass('float-right');
            $('.dataTables_filter').addClass('float-left');
            $('.dataTables_paginate').addClass('float-right');

            $('[data-toggle="tooltip"]').tooltip();
        } else {
            html = "<tr><td>Sin Templates Guardados</td><td class='text-right'>Sin Templates Guardados</td></tr>";
            $("#bodytemplates").html("");
            $("#bodytemplates").html(html);
            var table = $('#tabla_templates').DataTable({
                dom: '<"top col-sm latder"f><"top col-sm latizq"l>rt<"bottom col-sm latder"i><"bottom col-sm latizq"p><"clear">',
                retrieve: true,
                paging: true,
                pageLength: 10,
                order: [],
                fixedHeader: true,
                responsive: true,
                scrollCollapse: true,
            });
            $('.dataTables_length').addClass('float-right');
            $('.dataTables_filter').addClass('float-left');
            $('.dataTables_paginate').addClass('float-right');

            $('[data-toggle="tooltip"]').tooltip();
        }


    }).fail(function () {
        console.log('Error en infotabletemplate()');
    });
}

function agregarusuario() {
    $("#exampleModalLabel").html("Agregar Usuario");
    $("#modalbody").html('<div class="col-md-12">' +
        '<div class="row">' +
        '<label for="modal_nombre_add" class="col-md-5">Nombre(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="100" class="form-control" id="modal_nombre_add" value="">' +
        '<div class="col-md-12" id="error_modal_add"></div>' +
        '</div>' +
        '<label for="modal_apellido_add" class="col-md-5">Apellido(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="100" class="form-control" id="modal_apellido_add" value="">' +
        '<div class="col-md-12" id="error_modal0_add"></div>' +
        '</div>' +
        '<label for="modal_email_add" class="col-md-5">Email(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="100" class="form-control" id="modal_email_add" value="" >' +
        '<div class="col-md-12" id="error_modal1_add"></div>' +
        '</div>' +
        '<!--<label class="col-md-5">Password(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="10" class="form-control" id="rut_empresa" value="">' +
        '<div class="col-md-12" id="error_modal2"></div>' +
        '</div>-->' +
        '<label for="modal_fono" class="col-md-5">Fono(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="13" class="form-control" id="modal_fono_add" value="" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">' +
        '<div class="col-md-12" id="error_modal3_add"></div>' +
        '</div>' +
        '<label for="modal_cargo_add" class="col-md-5">Cargo(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="text" maxlength="50" class="form-control" id="modal_cargo_add" value="">' +
        '<div class="col-md-12" id="error_modal4_add"></div>' +
        '</div>' +
        '<label class="col-md-5" for="modal_pass_add">Password(*)</label>' +
        '<div class="col-md-7 mb-2 input-group">' +
        '<div class="input-group">' +
        '<input type="password" class="form-control" placeholder="" aria-label="Ingrese la Contraseña" aria-describedby="btnGroupAddon" id="modal_pass_add" maxlength="10">' +
        '<div class="input-group-prepend">' +
        '<button class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Ver Password" onclick="mostrarContrasenaadd();"><i class="fas fa-eye"></i></button>' +
        '</div>' +
        '</diV>' +
        '<div class="col-md-12" id="error_modal5_add"></div>' +
        '</div>' +
        '<label class="col-md-5" for="modal_pass1_add">Repita el Password(*)</label>' +
        '<div class="col-md-7 mb-2">' +
        '<input type="password" maxlength="10" class="form-control" id="modal_pass1_add" value="">' +
        '<div class="col-md-12" id="error_modal6_add"></div>' +
        '</div>' +

        '</div>' +
        '</div>');
    $("#modalfooter").html('<button type="button" class="btn btn-primary" onclick="agregarusuariomodal();">Agregar</button><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>');
    $("#modalExitosa").modal("show");
    $('[data-toggle="tooltip"]').tooltip();
}

function agregarusuariomodal() {
    var msj_info = "";
    $("#error_modal_add").html("");
    $("#error_modal0_add").html("");
    $("#error_modal1_add").html("");
    $("#error_modal3_add").html("");
    $("#error_modal4_add").html("");
    $("#error_modal5_add").html("");
    $("#error_modal6_add").html("");
    if ($("#modal_nombre_add").val() == "") {
        $("#error_modal_add").html('<small style="color:red">Ingrese el Nombre</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_apellido_add").val() == "") {
        $("#error_modal0_add").html('<small style="color:red">Ingrese el Apellido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_email_add").val() == "") {
        $("#error_modal1_add").html('<small style="color:red">Ingrese el Email</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_email_add").val() != "" && !validateEmail($("#modal_email_add").val())) {
        $("#error_modal1_add").html('<small style="color:red">Email no Válido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_fono_add").val() == "") {
        $("#error_modal3_add").html('<small style="color:red">Ingrese el Teléfono</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_fono_add").val() != "" && $("#modal_fono_add").val().length < 9) {
        $("#error_modal3_add").html('<small style="color:red">Teléfono no Válido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_cargo_add").val() == "") {
        $("#error_modal4_add").html('<small style="color:red">Ingrese el Cargo</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_pass_add").val() == "") {
        $("#error_modal5_add").html('<small style="color:red">Ingrese una Contraseña</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_pass_add").val() != "" && $("#modal_pass_add").val().length <= 5) {
        $("#error_modal5_add").html('<small style="color:red">Debe tener al menos 6 caracteres</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_pass_add").val() != "" && $("#modal_pass_add").val().length >= 6 && ($("#modal_pass_add").val() != $("#modal_pass1_add").val())) {
        $("#error_modal6_add").html('<small style="color:red">Las contraseñas no son Iguales</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if (msj_info == "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: url_prev + 'add_user_modal',
            data: {
                "nombre": $("#modal_nombre_add").val(),
                "apellido": $("#modal_apellido_add").val(),
                "email": $("#modal_email_add").val(),
                "fono": $("#modal_fono_add").val(),
                "cargo": $("#modal_cargo_add").val(),
                "pass": $("#modal_pass_add").val(),
                _token: $('input[name="_token"]').val()
            }, //esto es necesario, por la validacion de seguridad de laravel
            datatype: "json",
        }).done(function (msg) {
            var json = JSON.parse(msg);
            if (json.status == "ok" && json.id > 0) {
                $("#exampleModalLabel").html("Actualización Exitosa");
                $("#modalbody").html("La información ingresada a sido actualizada correctamente");
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            } else {
                $("#exampleModalLabel").html("Presentamos errores en su Formulario");
                $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            }
            infotable();
        }).fail(function () {
            $("#exampleModalLabel").html("Presentamos en la Plataforma");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
            console.log("error agregarusuariomodal()");
        });
    } else {
        return false;
    }

}

function editarusuarios(id) {
    var idUser = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'obtenerUsuario',
        data: {
            id: idUser,
            _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function (msg) {
        var json = JSON.parse(msg);
        var userdat = "Sin Información";
        var nombredat = "Sin Información";
        var apellidodat = "Sin Información";
        var emaildat = "Sin Información";
        var fonodat = "Sin Información";
        var cargodat = "Sin Información";
        var empresadat = "Sin Información";
        var creadodat = "Sin Información";
        var passdat = "Sin Información";
        var idmodal = "0";
        var avatarrdat = "face8.jpg";
        for (let [key, value] of Object.entries(json.datos)) {
            userdat = json.datos[key].user;
            nombredat = json.datos[key].nombre;
            apellidodat = json.datos[key].apellido;
            emaildat = json.datos[key].email;
            fonodat = json.datos[key].fono;
            cargodat = json.datos[key].cargo;
            empresadat = json.datos[key].empresa;
            avatardat = json.datos[key].avatar;
            creadodat = json.datos[key].creado;
            passdat = json.datos[key].pass;
            idmodal = json.datos[key].id;
        }
        $("#exampleModalLabel").html("Editar Usuario : " + nombredat + "");
        $("#modalbody").html('<div class="col-md-12">' +
            '<div class="row">' +
            '<label for="modal_user" class="col-md-5">Usuario</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_user" value="' + userdat + '" disabled>' +
            '</div>' +
            '<label for="modal_nombre" class="col-md-5">Nombre(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_nombre" value="' + nombredat + '">' +
            '<div class="col-md-12" id="error_modal"></div>' +
            '</div>' +
            '<label for="modal_apellido" class="col-md-5">Apellido(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_apellido" value="' + apellidodat + '">' +
            '<div class="col-md-12" id="error_modal0"></div>' +
            '</div>' +
            '<label for="modal_email" class="col-md-5">Email(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_email" value="' + emaildat + '" >' +
            '<div class="col-md-12" id="error_modal1"></div>' +
            '</div>' +
            '<!--<label class="col-md-5">Password(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="10" class="form-control" id="rut_empresa" value="' + passdat + '">' +
            '<div class="col-md-12" id="error_modal2"></div>' +
            '</div>-->' +
            '<label for="modal_fono" class="col-md-5">Fono(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="13" class="form-control" id="modal_fono" value="' + fonodat + '" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">' +
            '<div class="col-md-12" id="error_modal3"></div>' +
            '</div>' +
            '<label for="modal_cargo" class="col-md-5">Cargo(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="50" class="form-control" id="modal_cargo" value="' + cargodat + '">' +
            '<div class="col-md-12" id="error_modal4"></div>' +
            '</div>' +
            '<label class="col-md-5" for="modal_pass">Password</label>' +
            '<div class="col-md-7 mb-2 input-group">' +
            '<div class="input-group">' +
            '<input type="password" class="form-control" placeholder="" aria-label="Ingrese la Contraseña" aria-describedby="btnGroupAddon" id="modal_pass" maxlength="10">' +
            '<div class="input-group-prepend">' +
            '<button class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Ver Password" onclick="mostrarContrasena();"><i class="fas fa-eye"></i></button>' +
            '</div>' +
            '</diV>' +
            '<div class="col-md-12" id="error_modal5"></div>' +
            '</div>' +
            '<label class="col-md-5">Avatar</label>' +
            '<div class="col-md-7 mb-2">' +
            '<img class="img-sm m-2" src="https://desarrollo.sendok.cl/assets/images/faces/' + avatarrdat + '" alt="Profile image">' +
            '</div>' +
            '<label class="col-md-5" for="rut_empresa_ok">Fecha de Creación</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="10" class="form-control" id="rut_empresa_ok" value="' + creadodat + '" disabled>' +
            '</div>' +
            '<label class="col-md-5" for="rut_empresa">Empresa</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="10" class="form-control" id="rut_empresa" value="' + empresadat + '" disabled>' +
            '</div>' +
            '<input type="hidden" id="id_modal" value="' + idmodal + '" disabled>' +

            '</div>' +
            '</div>');
        $("#modalfooter").html('<button type="button" class="btn btn-primary" onclick="editardatos();">Editar</button><button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>');
        $("#modalExitosa").modal("show");
        $('[data-toggle="tooltip"]').tooltip();
    }).fail(function () {
        console.log('Error en getComunasRegion()');
    });


}

function editardatos() {
    var msj_info = "";
    $("#error_modal0").html("");
    $("#error_modal").html("");
    $("#error_modal1").html("");
    $("#error_modal3").html("");
    $("#error_modal4").html("");
    $("#error_modal5").html("");
    if ($("#modal_nombre").val() == "") {
        $("#error_modal").html('<small style="color:red">Ingrese el Nombre</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_apellido").val() == "") {
        $("#error_modal0").html('<small style="color:red">Ingrese el Apellido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_email").val() == "") {
        $("#error_modal1").html('<small style="color:red">Ingrese el Email</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_email").val() != "" && !validateEmail($("#modal_email").val())) {
        $("#error_modal1").html('<small style="color:red">Email no Válido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_fono").val() == "") {
        $("#error_modal3").html('<small style="color:red">Ingrese el Teléfono</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_fono").val() != "" && $("#modal_fono").val().length < 9) {
        $("#error_modal3").html('<small style="color:red">Teléfono no Válido</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_cargo").val() == "") {
        $("#error_modal4").html('<small style="color:red">Ingrese el Cargo</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if ($("#modal_pass").val() != "" && $("#modal_pass").val().length <= 5) {
        $("#error_modal5").html('<small style="color:red">El Password debe tener al menos 6 Caracteres.</small>');
        msj_info += "- Debe ingresar Nombre de Empresa. </br>";
    }
    if (msj_info == "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: url_prev + 'update_user_modal',
            data: {
                "nombre": $("#modal_nombre").val(),
                "apellido": $("#modal_apellido").val(),
                "email": $("#modal_email").val(),
                "fono": $("#modal_fono").val(),
                "fono": $("#modal_fono").val(),
                "cargo": $("#modal_cargo").val(),
                "id": $("#id_modal").val(),
                "pass": $("#modal_pass").val(),
                _token: $('input[name="_token"]').val()
            }, //esto es necesario, por la validacion de seguridad de laravel
            datatype: "json",
        }).done(function (msg) {
            var json = JSON.parse(msg);
            if (json.status == "ok") {
                $("#exampleModalLabel").html("Actualización Exitosa");
                $("#modalbody").html(json.hash);
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            } else {
                $("#exampleModalLabel").html("Presentamos errores en su Formulario");
                $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
                $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
                $("#modalExitosa").modal("show");
            }
            infotable();
        }).fail(function () {
            $("#exampleModalLabel").html("Presentamos en la Plataforma");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
            console.log("error editardatos()");
        });
    } else {
        return false;
    }
}

function eliminarusuarios(id) {
    var idUser = id;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'obtenerUsuario',
        data: {
            id: idUser,
            _token: $('input[name="_token"]').val()
        } //esto es necesario, por la validacion de seguridad de laravel
    }).done(function (msg) {
        var json = JSON.parse(msg);
        var userdat = "Sin Información";
        var nombredat = "Sin Información";
        var apellidodat = "Sin Información";
        var emaildat = "Sin Información";
        var fonodat = "Sin Información";
        var cargodat = "Sin Información";
        var empresadat = "Sin Información";
        var creadodat = "Sin Información";
        var passdat = "Sin Información";
        var idmodal = "0";
        var avatarrdat = "face8.jpg";
        for (let [key, value] of Object.entries(json.datos)) {
            userdat = json.datos[key].user;
            nombredat = json.datos[key].nombre;
            apellidodat = json.datos[key].apellido;
            emaildat = json.datos[key].email;
            fonodat = json.datos[key].fono;
            cargodat = json.datos[key].cargo;
            empresadat = json.datos[key].empresa;
            avatardat = json.datos[key].avatar;
            creadodat = json.datos[key].creado;
            passdat = json.datos[key].pass;
            idmodal = json.datos[key].id;
        }
        $("#exampleModalLabel").html("Esta seguro de Eliminar a este Usuario");
        $("#modalbody").html('<div class="col-md-12">' +
            '<div class="row">' +
            '<label for="modal_user" class="col-md-5">Usuario</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_user" value="' + userdat + '" disabled>' +
            '</div>' +
            '<label for="modal_nombre" class="col-md-5">Nombre(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_nombre" value="' + nombredat + '" disabled>' +
            '<div class="col-md-12" id="error_modal"></div>' +
            '</div>' +
            '<label for="modal_apellido" class="col-md-5">Apellido(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_apellido" value="' + apellidodat + '" disabled>' +
            '<div class="col-md-12" id="error_modal0"></div>' +
            '</div>' +
            '<label for="modal_email" class="col-md-5">Email(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="100" class="form-control" id="modal_email" value="' + emaildat + '" disabled>' +
            '<div class="col-md-12" id="error_modal1"></div>' +
            '</div>' +
            '<label for="modal_fono" class="col-md-5">Fono(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="13" class="form-control" id="modal_fono" value="' + fonodat + '" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" disabled>' +
            '<div class="col-md-12" id="error_modal3"></div>' +
            '</div>' +
            '<label for="modal_cargo" class="col-md-5">Cargo(*)</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="50" class="form-control" id="modal_cargo" value="' + cargodat + '" disabled>' +
            '<div class="col-md-12" id="error_modal4"></div>' +
            '</div>' +
            '<label class="col-md-5">Avatar</label>' +
            '<div class="col-md-7 mb-2">' +
            '<img class="img-sm m-2" src="https://desarrollo.sendok.cl/assets/images/faces/' + avatarrdat + '" alt="Profile image">' +
            '</div>' +
            '<label class="col-md-5" for="rut_empresa_ok">Fecha de Creación</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="10" class="form-control" id="rut_empresa_ok" value="' + creadodat + '" disabled>' +
            '</div>' +
            '<label class="col-md-5" for="rut_empresa">Empresa</label>' +
            '<div class="col-md-7 mb-2">' +
            '<input type="text" maxlength="10" class="form-control" id="rut_empresa" value="' + empresadat + '" disabled>' +
            '</div>' +
            '<input type="hidden" id="id_modal" value="' + idmodal + '" disabled>' +

            '</div>' +
            '</div>');
        $("#modalfooter").html('<button type="button" class="btn btn-danger" onclick="eliminardatos(' + id + ');">Eliminar</button><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>');
        $("#modalExitosa").modal("show");
        $('[data-toggle="tooltip"]').tooltip();
    }).fail(function () {
        console.log('Error en getComunasRegion()');
    });
}

function eliminardatos(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'delete_user_modal',
        data: {
            "id": id,
            _token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function (msg) {
        var json = JSON.parse(msg);
        if (json.status == "ok") {
            $("#exampleModalLabel").html("Acción exitosa");
            $("#modalbody").html("El Usuario ha sido eliminado correctamente");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        } else {
            $("#exampleModalLabel").html("Presentamos errores en su Formulario");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        }
        infotable();
    }).fail(function () {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });
}

function vertemplate(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'getTemplateId',
        data: {
            "idtemp": id,
            _token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function (msg) {
        var json = JSON.parse(msg);
        if (json.status == "ok") {
            $("#titleextra").html("Vista Previa Template");
            $("#bodyextra").html(json.temp);
            $("#footerextra").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button><button type="button" class="btn btn-primary" onclick="editartemplate(' + id + ',2)">Editar</button><button type="button" class="btn btn-danger" onclick="eliminartemplate(' + id + ',2)">Eliminar</button>');
            $("#extraLargeModal").modal("show");
        } else {
            $("#exampleModalLabel").html("Presentamos errores en su Formulario");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        }
    }).fail(function () {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });

}


var isTemplateEditing = false;
var editedtemplateID = '';

function editartemplate(id, tipo) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'getTemplateId',
        data: {
            "idtemp": id,
            _token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function (msg) {
        var json = JSON.parse(msg);
        var html;
        if (tipo == 2) {
            $("#titleextra").html("");
            $("#bodyextra").html("");
            $("#footerextra").html('');
            $("#extraLargeModal").modal("hide");
        }
        if (json.status == "ok") {
            html = json.temp.replace('<div class="container"><div class="card"><div class="card-body">', "");
            html = html.replace('</div></div></div>', "");
            tinyMCE.get('textareapersonalizado').setContent(html);
            isTemplateEditing = true;
            editedtemplateID = id;
            $("#lienzo").html(html);
            $("#contenedortablatemp").css("display", "none");
            $("#contenedortemplate").css("display", "block");


        } else {
            $("#exampleModalLabel").html("Presentamos errores en su Formulario");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        }
    }).fail(function () {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });
}

function newtemplate() {
    tinyMCE.get('textareapersonalizado').setContent("");
    isTemplateEditing = false;
    editedtemplateID = "";
    $("#lienzo").html("");
    $("#contenedortablatemp").css("display", "none");
    $("#contenedortemplate").css("display", "block");
}

function vertemplatetabla() {
    $("#lienzo").html("");
    $("#contenedortablatemp").css("display", "block");
    $("#contenedortemplate").css("display", "none");
    infotabletemplates();
}

function eliminartemplate(id, tipo) {
    if (tipo == 2) {
        $("#titleextra").html("");
        $("#bodyextra").html("");
        $("#footerextra").html('');
        $("#extraLargeModal").modal("hide");
    }
    $("#exampleModalLabel").html("Estimado Usuario:");
    $("#modalbody").html("Está seguro de eliminar este Template?.");
    $("#modalfooter").html('<button type="button" class="btn btn-danger" onclick="confirmarelim(' + id + ');">Eliminar</button><button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>');
    $("#modalExitosa").modal("show");
}

function confirmarelim(id) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'deleteTemplateId',
        data: {
            "idtemp": id,
            _token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function (msg) {
        var json = JSON.parse(msg);
        if (json.status == "ok") {
            $("#exampleModalLabel").html("Estimado Usuario");
            $("#modalbody").html("Su Template fue eliminado correctamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
            infotabletemplates()
        } else {
            $("#exampleModalLabel").html("Presentamos errores en su Formulario");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        }
    }).fail(function () {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });
}
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/***********************************Funcion que retiene evento ***************** */
function allowDrop(ev) {
    $("#divpadre").val(ev.target.id);
    console.log("Div Padre", $("#divpadre").val());
    if (flag) {
        ev.preventDefault();
    } else {
        return false;
    }
}

function allowDroptext(ev) {
    ev.preventDefault();
}
/******************************************************************************* */
/***********************************Funcion inicia evento Drag ***************** */
function revisardiv(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function dragStart(ev) {
    ev.dataTransfer.setData("divpadre", ev.target.id);
    console.log("dragStart Inicio arrastrar", ev.target.id);
    if (flag) {
        ev.dataTransfer.setData("text", ev.target.id);
    } else {
        ev.preventDefault();
    }
}

function dragStartfalse(ev) {
    ev.preventDefault();
}
/******************************************************************************* */
/***********************************Funcion que retiene Drop ***************** */
function dragDroptext(ev) {

    console.log("dragDroptext", flag);
    console.log("estamos acá");

}

function dragDrop(ev) {

    ev.preventDefault();
    var divpadre = $("#divpadre").val();
    console.log("id del div padre donde:", divpadre);
    var data = ev.dataTransfer.getData("text");
    console.log("id del div a soltar:", data);
    var time = new Date();
    var idaleatorio = time.getTime();
    var elementoid = "";
    if (divpadre == "lienzo") {
        if (data == "nomemp") {
            elementoid = "%nombreempresa%";
            var $el = $('<div class="drop-item encab" id="' + idaleatorio + '" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="' + idaleatorio + '" data-parametrotres="texto">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "rutemp") {
            elementoid = "%rutempresa%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "regemp") {
            elementoid = "%regionempresa%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "comemp") {
            elementoid = "%comunaempresa%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "diremp") {
            elementoid = "%direccionempresa%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "nomcon") {
            elementoid = "%nombrecontacto%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "apecon") {
            elementoid = "%apellidocontacto%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "carcon") {
            elementoid = "%cargocontacto%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "emacon") {
            elementoid = "%emailcontacto%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "telcon") {
            elementoid = "%telefonocontacto%";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "orden") {

            elementoid = '<div id="propuesta_detalle" id="orden' + idaleatorio + '">' +
                '<div class="col-md-12" style="padding-left: 0px; display: flex; justify-content: space-between; align-items: center;">' +
                '<div class="col-md-12 flex-column-reverse flex-md-row" style="display: flex;">' +
                '<div class="col-md-4 encab text-center my-auto" id="encabezado1"  data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="encabezado1" data-parametrotres="imagen">' +
                '<img id="imagenencabezado1" style="height:70px;width:250px;" src="data:image/png;base64,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">' +
                '</div>' +
                '<div class="col-md-4 encab text-center my-auto" id="encabezado2" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="encabezado2" data-parametrotres="vacio">' +
                '<p class="vacio borrar" id="pencabezado2' + idaleatorio + '">[Agregar Contenido]</p>' +
                '</div>' +
                '<div class="col-md-4 encab text-center my-auto" id="encabezado3" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="encabezado3" data-parametrotres="vacio">' +
                '<p class="vacio borrar" id="pencabezado3' + idaleatorio + '">[Agregar Contenido]</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col-md-12" style="padding-left: 0px;margin: 30px 0px;">' +
                '<table class="table table-bordered">' +
                '<thead style="background:#142444; ">' +
                '<tr>' +
                '<th class="encab borrar" style="color: #ffffff !important;" id="titulodoc" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="titulodoc"  data-parametrotres="texto"> PROPUESTA COMERCIAL</th>' +
                '</tr>' +
                '</thead>' +
                '</table>' +
                '<table class="table table-bordered" style="border-bottom: 4px solid #142444;">' +
                '<tbody>' +
                '<tr>' +
                '<td style="width: 300px;background: rgba(0, 0, 0, 0.05);"> Folio </td>' +
                '<td id="folio_propuesta"></td>' +
                '</tr>' +
                '<tr>' +
                '<td style="width: 300px;background: rgba(0, 0, 0, 0.05);"> Fecha </td>' +
                '<td>Agregar Fecha</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-12" style="padding-left: 0px;">' +
                '<div class="row">' +
                '<div class="col-md-6" style="padding-left: 0px;">' +
                '<table class="table table-bordered">' +
                '<thead>' +
                '<tr>' +
                '<th> Cliente </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr>' +
                '<td id="contacto_nombre"></td>' +
                '</tr>' +
                '<tr>' +
                '<td id="contacto_cargo"></td>' +
                '</tr>' +
                '<tr>' +
                '<td id="email_cliente"></td>' +
                '</tr>' +
                '<tr>' +
                '<td id="fono_cliente"></td>' +
                '</tr>' +
                '<tr>' +
                '<td id="nombre_cliente"> </td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '<h2 hidden id="id_usuario"></h2>' +
                '<h2 hidden id="id_cliente"></h2>' +
                '<h2 hidden id="id_producto"></h2>' +
                '<h2 hidden id="id_servicio"></h2>' +

                '<div class="col-md-6" style="padding-right: 0px;">' +
                '<table class="table table-bordered">' +
                '<thead>' +
                '<tr>' +
                '<th> Ejecutivo </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr>' +
                '<td>Nombre Usuario</td>' +
                '</tr>' +
                '<tr>' +
                '<td> Email Usuario</td>' +
                '</tr>' +
                '<tr>' +
                '<td> Teléfono Usuario</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<p class="card-description" style="padding-top: 50px;"> A continuación se detalla su requerimiento </p>' +
                '<div class="row">' +
                '<div class="col-md-12 table-responsive" style="padding-left: 0px;">' +
                '<table class="table table-striped table-bordered tablaFixed" style="border-bottom: 4px solid #142444;">' +
                '<thead style="background:#142444; ">' +
                '<tr>' +
                '<th style="color: #ffffff !important; width: 8%"> CTD </th>' +
                '<th style="color: #ffffff !important; width: 27%"> Nombre </th>' +
                '<th style="color: #ffffff !important; width: 33%"> Descripción </th>' +
                '<th style="color: #ffffff !important; width: 12%"> Precio Unitario </th>' +
                '<th id="columna_descuento" style="color: #ffffff !important; width: 10%; display: none;"> % Descuento </th>' +
                '<th style="color: #ffffff !important;text-align:right; width: 10%"> Precio </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody id="tabla_propuesta_body">' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-12" style="padding-left: 0px;margin-top: 20px;">' +
                '<div class="row">' +
                '<div class="col-md-6"  >' +
                '<table class="table table-striped ">' +
                '<thead style="background:#142444; ">' +
                '<tr>' +
                '<th style="color: #ffffff !important;text-align:center;"> Forma de pago </th>' +
                '<th style="color: #ffffff !important;text-align:center;"> Validez de la oferta </th>' +
                '</tr>' +
                '</thead>' +
                '<tbody>' +
                '<tr class="table-bordered">' +
                '<td style="text-align:center;"> Contado </td>' +
                '<td style="text-align:center;"> 5 días </td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '<p class="card-description" style="text-align: center;margin-top: 10px;"> Todos los valores se encuentran expresados en dolares más IVA </p>' +
                '</div>' +
                '<div class="col-md-6"  >' +
                '<table class="table table-bordered">' +
                '<tbody>' +
                '<tr>' +
                '<td> SubTotal</td>' +
                '<td id="subtotal" style="text-align:right;"></td>' +
                '</tr>' +
                '<tr>' +
                '<td> Iva </td>' +
                '<td id="iva" style="text-align:right;"> </td>' +
                '</tr>' +
                '</tbody>' +
                '<tbody style="background:#142444; ">' +
                '<tr>' +
                '<th style="color: #ffffff !important;text-align:left;"> Total</th>' +
                '<th id="total_con_iva" style="color: #ffffff !important;text-align:right;"></th>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-12 encab text-center my-auto" id="encabezado4" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="encabezado4" data-parametrotres="texto">' +
                '<p class="texto" id="textoencabezado4"  style="text-align: center;margin-top: 60px;margin-bottom: 40px;padding-top: 20px; border-top: 3px solid #142444;">Datapro Spa - Marchant Pereira 150 Oficina 208 Providencia, Santiago Chile, +562 29456572, www.datapro.cl</p>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-1"></div>';
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
            datadrag.push({
                padre: "orden" + idaleatorio + "",
                id: idaleatorio,
                hijos: { "encabezado1": { "contenido": "imagen" }, "encabezado2": { "contenido": "vacio" }, "encabezado3": { "contenido": "vacio" } }
            });

        } else if (data == "propuesta") {
            elementoid = '<table class="table table-bordered" id="tablaorden' + idaleatorio + '" style="margin:10px;width:99%;"><caption>Propuesta Comercial</caption><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody id="bodyorden' + idaleatorio + '"><tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr><tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr><tr><th scope="row">3</th><td>Larry</td><td>the Bird</td><td>@twitter</td></tr></tbody></table>';
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "tablas") {
            $("#compbody").html('<div class="form-group">' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox" class="col-sm-3 col-form-label"># Filas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBoxError"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox1" class="col-sm-3 col-form-label"># Columnas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox1" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBox1Error"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '</div>');
            var botonera = '<button type="button" class="btn btn-primary"  onclick="agregartabla(' + idaleatorio + ')">Agregar Tabla</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
            $("#comptitle").html("Agregar Componente (Tabla):");

            //$("#compfooter").html('<button type="button" class="btn btn-primary"  onclick="agregartexto('+texto1+','+tipo+')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
            $("#compfooter").html(botonera);
            $("#componentes").modal("show");

        } else if (data == "subtablas") {
            elementoid = '<table class="table table-bordered" id="tablaorden' + idaleatorio + '" style="margin:10px;width:99%;"><caption>Propuesta Comercial</caption><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody id="bodyorden' + idaleatorio + '"><tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td></tr><tr><th scope="row">2</th><td>Jacob</td><td>Thornton</td><td>@fat</td></tr><tr><th scope="row">3</th><td>Larry</td><td>the Bird</td><td>@twitter</td></tr></tbody></table>';
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else if (data == "separador") {
            elementoid = "<hr>";
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
        } else {
            var tipo = 0;
            if (data == "texttitulo") {
                tipo = 1;
            }
            if (data == "textsubtitulo") {
                tipo = 2;
            }
            if (data == "textparrafo") {
                tipo = 3;
            }
            datadrag.push({ tipo: data, id: idaleatorio, elemento: elementoid });
            var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
            $("#lienzo").append($el);
            mostrarmodal(idaleatorio, tipo);
            console.log(datadrag);
        }
    } else {
        if ($("#" + divpadre).data("parametrotres") == "vacio") {
            $("#" + divpadre).html("");
        }
        if (data == "nomemp") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%nombreempresa%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "rutemp") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%rutempresa%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "regemp") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%regionempresa%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "comemp") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%comunaempresa%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "diremp") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%direccionempresa%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "nomcon") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%nombrecontacto%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "apecon") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%apellidocontacto%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "carcon") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%cargocontacto%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "emacon") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%emailcontacto%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "telcon") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "%telefonocontacto%";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
        } else if (data == "separador") {
            if ($("#" + divpadre).data("parametrotres")) {
                $("#" + divpadre).data("parametrotres", "texto");
                console.log($("#" + divpadre).data("parametrotres"));
            }
            elementoid = "<hr>";
            var nuevodiv = $("#" + divpadre).html() + " " + elementoid;
            $("#" + divpadre).html();
            $("#" + divpadre).html(nuevodiv);
            console.log("nuevodiv", nuevodiv);
        } else {
            var clase = '';
            var tipo = 0;
            if (data == "texttitulo") {
                tipo = 1;
            }
            if (data == "textsubtitulo") {
                tipo = 2;
            }
            if (data == "textparrafo") {
                clase = 'ondrop ="dragDroptext(event)" ondragover ="allowDroptext(event)"';
                tipo = 3;
            }
            datadrag.push({ tipo: data, id: idaleatorio, elemento: elementoid });
            mostrarmodaltexto(divpadre, tipo);
        }

    }
    $(".encab").mouseover(function (e) {
        var idmouse = e.target.id;
        $("#" + idmouse).css("border", "solid 1px black");
    }).mouseout(function (e) {
        var idmouse = e.target.id;
        $("#" + idmouse).css("border", "none");
    });
    $('.encab').popover({
        animation: false,
        html: true,
        title: '<span class="text-info"><strong>Acciones</strong></span>' +
            '<button onclick="$(this).closest(\'div.popover\').popover(\'hide\');" type="button" class="close" aria-hidden="true">&times;</button>',
        sanitize: false,
        placement: 'top',
        trigger: 'manual',
        content: function () {
            var p1 = $(this).data("parametrouno");
            var p2 = $(this).data("parametrodos");
            var p3 = $(this).data("parametrotres");
            if (p3 == "vacio") {
                return '<div style="margin-top:5px;margin-bottom:5px;">' + $("#" + p2).html() + '</div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponente(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><div>';
            } else {
                return '<div style="margin-top:5px;margin-bottom:5px;">' + $("#" + p2).html() + '</div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponente(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <button type="button" id="button-clear" class="btn btn-danger" onclick="eliminarcomponente(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\')"><i class="fa fa-trash" aria-hidden="true"></i></button><div>';
            }


        }
    }).on("mouseenter", function () {
        var _this = this;
        $(this).popover("show");

        $(".popover").on("mouseleave", function () {
            $(_this).popover('hide');
        });
    }).on("mouseleave", function () {
        var _this = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(_this).popover("hide");
            }
        }, 300);
    });

    $("#lienzo").trigger('create');

    //console.log("idaleatorio", idaleatorio);
    //console.log(document.getElementById(data));

    //ev.target.append("<div>hola</div>");
    //var $el = $('<div class="drop-item" id="'+idaleatorio+'">'+elementoid+'</div>');
    //$el.append($('<button type="button" class="btn btn-default btn-xs remove"><span><i class="fa fa-trash" aria-hidden="true"></i></span></button>').click(function () { $("#lienzo").parent().detach(); }));
    //$("#lienzo").append($el); 
    //var iddiv = "prueba";
    //mostrarmodal(iddiv);
}

/******************************************************************************* */
/***************************** Funcion para agregar tabla ***************** */
function agregartabla(idaleatorio) {
    $("#intLimitTextBoxError").css("display", "none");
    $("#intLimitTextBox1Error").css("display", "none");
    if ($("#intLimitTextBox").val() == "") {
        $("#intLimitTextBoxError").css("display", "block");
    } else if ($("#intLimitTextBox1").val() == "") {
        $("#intLimitTextBox1Error").css("display", "block");
    } else {
        var filas = $("#intLimitTextBox").val();
        var columnas = $("#intLimitTextBox1").val();
        var html = '<table style="border: 3px dotted red;" class="table table-bordered poptablapadre" id="tabla' + idaleatorio + '" data-toggle="popover" data-parametrouno="' + idaleatorio + '" data-parametrodos="tabla" data-parametrotres="tabla" data-parametroi="' + filas + '" data-parametroj="' + columnas + '" data-tipo="tabla" >';
        for (var i = 0; i < filas; i++) {
            html += "<tr class='poptablatr'  id='tr" + idaleatorio + i + "' data-toggle='popover' data-parametrouno='" + idaleatorio + "' data-parametrodos='tr' data-parametrotres='fila' data-parametroi='" + i + "'>";
            for (var j = 0; j < columnas; j++) {
                html += "<td class='vacio poptablatd' id='td" + idaleatorio + i + j + "' style='border: 3px dotted gray;'' data-toggle='popover' data-parametrouno='" + idaleatorio + "' data-parametrodos='td' data-parametrotres='vacio' data-parametroi='" + i + "' data-parametroj='" + j + "' data-tipo='columna'>[vacio]</td>";
            }
            html += "</tr>";
        }
        html += '</table>';
        var elementoid = html;
        var $el = $('<div class="drop-item" id="' + idaleatorio + '">' + elementoid + '</div>');
        $("#lienzo").append($el);
        $("#componentes").modal("hide");
        $(".poptablapadre").mouseover(function (e) {
            var idmouse = e.target.id;
            $("#" + idmouse).css("border", "solid 1px black");
        }).mouseout(function (e) {
            var idmouse = e.target.id;
            $("#" + idmouse).css("border", "3px dotted red");
        });
        $('.poptablapadre').popover({
            animation: false,
            container: 'body',
            html: true,
            title: '<span class="text-info"><strong>Acciones Tabla</strong></span>' +
                '<button onclick="$(this).closest(\'div.popover\').popover(\'hide\');" type="button" class="close" aria-hidden="true">&times;</button>',
            sanitize: false,
            placement: 'top',
            trigger: 'manual',
            content: function () {
                var p1 = $(this).data("parametrouno");
                var p2 = $(this).data("parametrodos");
                var p3 = $(this).data("parametrotres");
                var p4 = $(this).data("parametroi");
                var p5 = $(this).data("parametroj");
                var p6 = $(this).data("tipo");
                if (p3 == "vacio") {
                    return '<div style="margin-top:5px;margin-bottom:5px;">' + $("#" + p2 + p1).html() + '</div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponentetabla(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><div>';
                } else {
                    return '<div style="margin-top:5px;margin-bottom:5px;"><div class="table-responsive"><table class="table"' + $("#" + p2 + p1).html() + '</table></div></div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponentetabla(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <button type="button" id="button-clear" class="btn btn-danger" onclick="eliminarcomponente(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-trash" aria-hidden="true"></i></button><div>';
                }


            }
        }).on("mouseenter", function () {
            var _this = this;
            $(this).popover("show");
            $('.poptablatd').popover("hide");
            $(".popover").on("mouseleave", function () {
                $(_this).popover('hide');
            });
        }).on("mouseleave", function () {
            var _this = this;
            setTimeout(function () {
                if (!$(".popover:hover").length) {
                    $(_this).popover("hide");
                }
            }, 300);
        }).on("show.bs.popover", function () {
            $($(this).data("bs.popover").getTipElement()).css("max-width", "100%");
        });



        $('.poptablatd').popover({
            animation: false,
            html: true,
            title: function () {
                var p1 = $(this).data("parametrouno");
                var p2 = $(this).data("parametrodos");
                var p3 = $(this).data("parametrotres");
                var p4 = $(this).data("parametroi");
                var p5 = $(this).data("parametroj");
                var p6 = $(this).data("tipo");
                return '<span class="text-info"><strong>Acciones Columna (' + (p4 + 1) + '-' + (p5 + 1) + ')</strong></span>' +
                    '&nbsp;&nbsp;<button onclick="$(this).closest(\'div.popover\').popover(\'hide\');" type="button" class="close" aria-hidden="true">&times;</button>';


            },
            sanitize: false,
            placement: 'top',
            trigger: 'click',
            content: function () {
                var p1 = $(this).data("parametrouno");
                var p2 = $(this).data("parametrodos");
                var p3 = $(this).data("parametrotres");
                var p4 = $(this).data("parametroi");
                var p5 = $(this).data("parametroj");
                var p6 = $(this).data("tipo");
                if (p3 == "vacio") {
                    return '<div style="margin-top:5px;margin-bottom:5px;">' + $("#" + p2 + p1 + p4 + p5).html() + '</div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponentetabla(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><div>';
                } else {
                    return '<div style="margin-top:5px;margin-bottom:5px;">' + $("#" + p2 + p1 + p4 + p5).html() + '</div><div style="margin-top:15px;margin-bottom:5px;" class="text-right"><button type="button" class="btn btn-success" onclick="editarcomponentetabla(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> <button type="button" id="button-clear" class="btn btn-danger" onclick="eliminarcomponentetabla(' + p1 + ',\'' + p2 + '\',\'' + p3 + '\',' + p4 + ',' + p5 + ',\'' + p6 + '\')"><i class="fa fa-trash" aria-hidden="true"></i></button><div>';
                }


            }
        }).on("mouseenter", function () {
            var _this = this;
            $(this).popover("show");
            $('.poptablapadre').popover("hide");
        }).on("show.bs.popover", function () {
            $($(this).data("bs.popover").getTipElement()).css("max-width", "100%");
        });
        $("#lienzo").trigger('create');
    }

}
/******************************************************************************* */
/***************************** Funcion para editar componente tabla ***************** */
function editarcomponentetabla(idpadre, componente, tipo, fila, columna, nuevotipo) {
    $(".popover").popover('hide');
    console.log("idpadre", idpadre);
    console.log("componente", componente);
    console.log("tipo", tipo);
    console.log("fila", fila);
    console.log("columna", columna);
    console.log("nuevotipo", nuevotipo);
    $("#comptitle").html("");
    $("#compbody").html("");
    $("#compfooter").html("");
    $("#inputtext").val("");
    if (nuevotipo == "fila") {

    }
    if (nuevotipo == "columna") {
        if (tipo == "vacio") {
            $("#comptitle").html("Agregar Componente:");
            var contenido = '<div class="form-check">' +
                '<label class="form-check-label">' +
                'a la Columna (' + (fila + 1) + '-' + (columna + 1) + ')' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios1" value="imagen">' +
                '<label class="form-check-label" for="exampleRadios1">' +
                'Imagen' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios2" value="texto">' +
                '<label class="form-check-label" for="exampleRadios2">' +
                'Texto' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios3" value="tabla">' +
                '<label class="form-check-label" for="exampleRadios3">' +
                'Tabla' +
                '</label>' +
                '<div class="form-group" id="infotablas" style="display:none;">' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox" class="col-sm-3 col-form-label"># Filas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBoxError"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox1" class="col-sm-3 col-form-label"># Columnas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox1" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBox1Error"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios4" value="texto">' +
                '<label class="form-check-label" for="exampleRadios4">' +
                'Separador' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios5" value="eliminar" disabled>' +
                '<label class="form-check-label" for="exampleRadios5">' +
                'Eliminar' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios6" value="anexar" disabled>' +
                '<label class="form-check-label" for="exampleRadios6">' +
                'Anexar' +
                '</label>' +
                '</div>' +
                '<input type="hidden" id="inputtext" name="inputtext"><input type="hidden" id="srcmodal" name="srcmodal"><input type="hidden" id="idpadremodal" name="idpadremodal" value="' + idpadre + '"><input type="hidden" id="componentemodal" name="componentemodal" value="' + componente + '"><input type="hidden" id="tipomodal" name="tipomodal" value="' + tipo + '"><input type="hidden" id="filamodal" name="filamodal" value="' + fila + '"><input type="hidden" id="columnamodal" name="columnamodal" value="' + columna + '"><input type="hidden" id="nuevotipomodal" name="nuevotipomodal" value="' + nuevotipo + '"><input type="hidden" id="estadomodal" name="estadomodal" value="nuevo">';
        } else {
            $("#comptitle").html("Editar Componente:");
            var cont = $("#" + componente + idpadre + fila + columna + "").html();
            var contenido = '<div class="col-md-12 mb-3 pb-5 border border-dark">' + cont + '</div><div class="form-check">' +
                '<label class="form-check-label">' +
                'Columna (' + (fila + 1) + '-' + (columna + 1) + ')' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios1" value="imagen">' +
                '<label class="form-check-label" for="exampleRadios1">' +
                'Imagen' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios2" value="texto">' +
                '<label class="form-check-label" for="exampleRadios2">' +
                'Texto' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios3" value="tabla">' +
                '<label class="form-check-label" for="exampleRadios3">' +
                'Tabla' +
                '</label>' +
                '<div class="form-group" id="infotablas" style="display:none;">' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox" class="col-sm-3 col-form-label"># Filas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBoxError"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '<div class="form-group row">' +
                '<label for="intLimitTextBox1" class="col-sm-3 col-form-label"># Columnas</label>' +
                '<div class="col-sm-9">' +
                '<input type="text" class="form-control" placeholder="Valor mínimo 1" id="intLimitTextBox1" value="1">' +
                '</div>' +
                '<div class="col-sm-12">' +
                '<small style="color: red; display:none" id="intLimitTextBox1Error"> Ingrese un valor numérico</small>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios4" value="texto">' +
                '<label class="form-check-label" for="exampleRadios4">' +
                'Separador' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios5" value="eliminar" disabled>' +
                '<label class="form-check-label" for="exampleRadios5">' +
                'Eliminar' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input editcol" type="radio" name="exampleRadios" id="exampleRadios6" value="anexar" disabled>' +
                '<label class="form-check-label" for="exampleRadios6">' +
                'Anexar' +
                '</label>' +
                '</div>' +
                '<input type="hidden" id="inputtext" name="inputtext"><input type="hidden" id="srcmodal" name="srcmodal"><input type="hidden" id="idpadremodal" name="idpadremodal" value="' + idpadre + '"><input type="hidden" id="componentemodal" name="componentemodal" value="' + componente + '"><input type="hidden" id="tipomodal" name="tipomodal" value="' + tipo + '"><input type="hidden" id="filamodal" name="filamodal" value="' + fila + '"><input type="hidden" id="columnamodal" name="columnamodal" value="' + columna + '"><input type="hidden" id="nuevotipomodal" name="nuevotipomodal" value="' + nuevotipo + '" <input type="hidden" id="estadomodal" name="estadomodal" value="contenido">';
        }

        var botonera = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    }
    if (nuevotipo == "tabla") {
        var contenido = '<div class="form-check">' +
            '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios1" value="imagen" disabled>' +
            '<label class="form-check-label" for="exampleRadios1">' +
            'Imagen' +
            '</label>' +
            '</div>' +
            '<div class="form-check">' +
            '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios2" value="texto">' +
            '<label class="form-check-label" for="exampleRadios2">' +
            'Texto' +
            '</label>' +
            '</div><input type="hidden" id="inputtext" name="inputtext"><input type="hidden" id="srcmodal" name="srcmodal">';
        var botonera = '<button type="button" class="btn btn-primary"  onclick="agregartextoeditado(\'' + componente + '\')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
    }

    $("#compbody").html(contenido);
    $("#compfooter").html(botonera);
    $("#componentes").modal("show");
}
/******************************************************************************* */
/***************************** Funcion para editar componente ***************** */
function editarcomponente(idpadre, componente, tipo) {
    $(".popover").popover('hide');
    console.log("idpadre", idpadre);
    console.log("componente", componente);
    console.log("tipo", tipo);
    if (componente == "titulodoc") {
        $("#comptitle").html("");
        $("#compbody").html("");
        $("#compfooter").html("");
        $("#inputtext").val("");
        if (tipo == "vacio") {
            var botonera = '';
        }
        if (tipo == "texto") {

            $("#compbody").html('<div class="form-group">' +
                '<label for="textoeditado">Texto a Editar</label>' +
                '<input type="text" class="form-control" id="textoeditado" aria-describedby="Texto Editado" placeholder="Ingrese su texto" value="' + $("#texto" + componente + "").html() + '">' +
                '<small id="textoerror" style="color:red;display:none;">Ingrese su texto</small>' +
                '</div>');
            var botonera = '<button type="button" class="btn btn-primary"  onclick="agregartextoeditado(\'' + componente + '\')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
        }
        if (tipo == "vacio") {
            var contenido = '<div class="form-check">' +
                '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios1" value="imagen" disabled>' +
                '<label class="form-check-label" for="exampleRadios1">' +
                'Imagen' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios2" value="texto">' +
                '<label class="form-check-label" for="exampleRadios2">' +
                'Texto' +
                '</label>' +
                '</div><input type="hidden" id="inputtext" name="inputtext"><input type="hidden" id="srcmodal" name="srcmodal">';

            $("#inputtextnew").val(componente);
            $("#compbody").html(contenido);
        }
        var texto1 = "";
        $("#comptitle").html("Editar Componente:");
        $("#compfooter").html(botonera);
        $("#componentes").modal("show");
    }
    if (componente == "encabezado1" || componente == "encabezado2" || componente == "encabezado3" || componente == "encabezado4") {
        $("#comptitle").html("");
        $("#compbody").html("");
        $("#compfooter").html("");
        $("#inputtext").val("");
        if (tipo == "vacio") {
            var botonera = '';
        }
        if (tipo == "texto") {
            $("#compbody").html('<div class="form-group">' +
                '<label for="textoeditado">Texto a Editar</label>' +
                '<input type="text" class="form-control" id="textoeditado" aria-describedby="Texto Editado" placeholder="Ingrese su texto" value="' + $("#texto" + componente + "").html() + '">' +
                '<small id="textoerror" style="color:red;display:none;">Ingrese su texto</small>' +
                '</div>');
            var botonera = '<button type="button" class="btn btn-primary"  onclick="agregartextoeditado(\'' + componente + '\')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>';
        }
        if (tipo == "imagen") {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<div class="custom-file" lang="es">' +
                '<input type="file" class="custom-file-input" id="customFileInput" aria-describedby="customFileInput">' +
                '<label class="custom-file-label" for="customFileInput"></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" id="customFileInputchamge" onclick="cambiarimagencomponente(\'' + componente + '\')">Cambiar</button>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none;color:red;"><small>Debe adjuntar una imagen</small></div>' +
                '</div><input type="hidden" id="inputtext" name="inputtext">';
            $("#compbody").html('<div class="text-center" id="divImageMediaPreview" style="margin-top:15px;"></div>');
        }
        if (tipo == "vacio") {
            var contenido = '<div class="form-check">' +
                '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios1" value="imagen">' +
                '<label class="form-check-label" for="exampleRadios1">' +
                'Imagen' +
                '</label>' +
                '</div>' +
                '<div class="form-check">' +
                '<input class="form-check-input edit" type="radio" name="exampleRadios" id="exampleRadios2" value="texto">' +
                '<label class="form-check-label" for="exampleRadios2">' +
                'Texto' +
                '</label>' +
                '</div><input type="hidden" id="inputtext" name="inputtext"><input type="hidden" id="srcmodal" name="srcmodal">';

            $("#inputtextnew").val(componente);
            $("#compbody").html(contenido);
        }

        var texto1 = "";
        $("#comptitle").html("Editar Componente:");

        //$("#compfooter").html('<button type="button" class="btn btn-primary"  onclick="agregartexto('+texto1+','+tipo+')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
        $("#compfooter").html(botonera);
        //$("#inputtext").val(contenido);
        $("#componentes").modal("show");
    }
}
/******************************************************************************* */
/***********************************Funcion que oculta los div de eventos ***************** */
function ocultar() {
    $("#divmen").removeClass("col-sm-2");
    $("#divcon").removeClass("col-sm-10");
    $("#divcon").addClass("col-sm-12");
    $("#divmen").css("display", "none");
}
/******************************************************************************* */
/***********************************Funcion que muestra panel de eventos ***************** */
function ver() {
    $("#divmen").addClass("col-sm-2");
    $("#divcon").removeClass("col-sm-12");
    $("#divcon").addClass("col-sm-10");
    $("#divmen").css("display", "block");
}
/******************************************************************************* */
/********Funcion que muestra modal para seleccionar componente ***************** */
function mostrarmodaltexto(iddiv, tipo) {

    $("#comptitle").html("");
    $("#compbody").html("");
    $("#compfooter").html("");
    $("#inputtextHelp").html("");
    $("#inputtext").val("");
    var text = "";
    var texto1 = "";
    if (tipo == 1) {
        text = "Ingrese su Título: ";
        texto1 = iddiv.replace('h1', '');
    }
    if (tipo == 2) {
        text = "Ingrese su Sub-Título: ";
        texto1 = iddiv.replace('h3', '');
    }
    if (tipo == 3) {
        text = "Ingrese su Parrafo: ";
        texto1 = iddiv.replace('p', '');

    }
    iddiv.replace('h1', '');
    $("#comptitle").html("Estimado Usuario:");
    $("#compbody").html('<div class="form-group"><label for="inputtext">' + text + '</label><textarea class="form-control" id="inputtext" aria-describedby="inputtextHelp" placeholder="Ingrese su Texto" rows="3"></textarea><small id="inputtextHelp" class="form-text text-danger"></small></div><div class="form-group"><label for="textoanexoemp">Etiquetas Empresa</label><select class="form-control" id="textoanexoemp"><option value="0">Seleccione la etiqueta</option><option  value="%nombreempresa%">Nombre</option><option  value="%rutempresa%">Rut</option><option  value="%regionempresa%">Región</option><option  value="%comunaempresa%">Comuna</option><option  value="%direccionempresa%">Direccción</option></select></div><div class="form-group"><label for="textoanexocon">Etiquetas Contacto</label><select class="form-control" id="textoanexocon"><option value="0">Seleccione la etiqueta</option><option  value="%nombrecontacto%">Nombre</option><option  value="%apellidocontacto%">Apellido</option><option  value="%cargocontacto%">Cargo</option><option  value="%emailcontacto%">Email</option><option  value="%telefonocontacto%">Teléfono</option></select></div>');
    $("#compfooter").html('<button type="button" class="btn btn-primary"  onclick="agregartexto(' + texto1 + ',' + tipo + ')">Editar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
    $("#inputtext").css("font-size", "14px");
    $("#inputtext").val($("#" + iddiv).html());
    $("#componentes").modal("show");
}

function mostrarmodal(iddiv, tipo) {

    $("#comptitle").html("");
    $("#compbody").html("");
    $("#compfooter").html("");
    $("#inputtextHelp").html("");
    $("#inputtext").val("");
    var text = "";
    if (tipo == 1) {
        text = "Ingrese su Título: ";
    }
    if (tipo == 2) {
        text = "Ingrese su Sub-Título: ";
    }
    if (tipo == 3) {
        text = "Ingrese su Parrafo: ";

    }

    $("#comptitle").html("Estimado Usuario:");
    $("#compbody").html('<div class="form-group"><label for="inputtext">' + text + '</label><textarea class="form-control" id="inputtext" aria-describedby="inputtextHelp" placeholder="Ingrese su Texto" rows="3"></textarea><small id="inputtextHelp" class="form-text text-danger"></small></div><div class="form-group"><label for="textoanexoemp">Etiquetas Empresa</label><select class="form-control" id="textoanexoemp"><option value="0">Seleccione la etiqueta</option><option  value="%nombreempresa%">Nombre</option><option  value="%rutempresa%">Rut</option><option  value="%regionempresa%">Región</option><option  value="%comunaempresa%">Comuna</option><option  value="%direccionempresa%">Direccción</option></select></div><div class="form-group"><label for="textoanexocon">Etiquetas Contacto</label><select class="form-control" id="textoanexocon"><option value="0">Seleccione la etiqueta</option><option  value="%nombrecontacto%">Nombre</option><option  value="%apellidocontacto%">Apellido</option><option  value="%cargocontacto%">Cargo</option><option  value="%emailcontacto%">Email</option><option  value="%telefonocontacto%">Teléfono</option></select></div>');
    $("#compfooter").html('<button type="button" class="btn btn-primary"  onclick="agregartexto(' + iddiv + ',' + tipo + ')">Agregar Texto</button><button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="eliminardiv(' + iddiv + ');">Cancelar</button>');
    $("#inputtext").css("font-size", "14px");
    $("#componentes").modal("show");
    /*$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'info_clientes',
        data: {_token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function(msg) {
        var json = JSON.parse(msg);
        if(json.status == "ok")
        {
        var json = JSON.parse(msg);
        var html = "";
        for (let [key, value] of Object.entries(json.clientes)) {
            userdat = json.clientes[key].nombre_cliente;
            if(key == 0)
            {
                html += "<option value='0' selected>Nombre Empresa</option><option value='1'>}Email</option><option value='2'>Teléfono</option>";
            } 
            else{
                html += "<option value='"+userdat+"'>"+userdat+"</option>";
            }
                    
        }
                $("#comptitle").html("Campo seleccionable:");
                $("#compbody").html("<select class='form-control' id='selectemp' onchange='cambiatexto()'><option value='%NombreEmpresa%' selected>Nombre Empresa</option><option value='%Email%'>Email</option><option value='%Telefono%'>Teléfono</option></select>");
                $("#compfooter").html('<button type="button" class="btn btn-primary"  onclick="agregartexto('+iddiv+')">Agregar Componente</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
                $("#componentes").modal("show");
        }
        else
        {
        $("#exampleModalLabel").html("Presentamos errores en su Formulario");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        }
    }).fail(function() {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });*/


}
$('#componentes').on('shown.bs.modal', function (e) {
    /******************************************************************************* */
    /********Funcion que permite el numero de filas ***************** */
    if ($("#intLimitTextBox").length) {
        setInputFilter(document.getElementById("intLimitTextBox"), function (value) {
            return /^\d*$/.test(value) && (value === "" || (parseInt(value) <= 50 && parseInt(value) >= 1));
        });
    }

    /******************************************************************************* */
    /********Funcion que permite el numero de columnas ***************** */
    if ($("#intLimitTextBox1").length) {
        setInputFilter(document.getElementById("intLimitTextBox1"), function (value) {
            return /^\d*$/.test(value) && (value === "" || (parseInt(value) <= 10 && parseInt(value) >= 1));
        });
    }


    /******************************************************************************* */
    /********Funcion que agrega etiquetas empresa Texto ***************** */
    $('#textoanexoemp').on('change', function () {
        var texto = $('#inputtext').val();
        $('#inputtext').val(texto + " " + $(this).find(":selected").val());
    });

    /******************************************************************************* */
    /********Funcion que agrega etiquetas empresa Texto ***************** */
    $('#textoanexocon').on('change', function () {
        var texto = $('#inputtext').val();
        $('#inputtext').val(texto + " " + $(this).find(":selected").val());
    });
    /******************************************************************************* */
    /********Funcion que cambia imagen modal componentes  ***************** */
    $('#customFileInput').on('change', function () {

        if (typeof (FileReader) != "undefined") {
            var dvPreview = $("#divImageMediaPreview");
            dvPreview.html("");
            $($(this)[0].files).each(function () {
                var file = $(this);
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = $("<img id='imagentransitoria' />");
                    img.attr("style", "width: 250px; height:70px; padding: 10px; border: solid gray 1px;");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                    $("#inputtext").val(e.target.result);
                }
                reader.readAsDataURL(file[0]);
                //$("#componentes").trigger('create'); 
                //var base64 = getBase64Image(document.getElementById("imagentransitoria"));

            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
    /******************************************************************************* */
    /********Funcion que controla footer modal agregar componente columna***************** */
    $('.editcol').on('change', function () {
        if ($("#exampleRadios1").is(":checked")) {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<div class="custom-file" lang="es">' +
                '<input type="file" class="custom-file-input" id="customFileInputtwo" aria-describedby="customFileInputtwo" onchange="loadFile(event)">' +
                '<label class="custom-file-label" for="customFileInputtwo"></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" id="customFileInputchamge" onclick="cambiarimagencomponentenew()">Agregar</button>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe adjuntar una imagen</small></div>' +
                '<div class="text-center" id="divImageMediaPreviewtwo" style="margin-top:15px;"></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        } else if ($("#exampleRadios2").is(":checked")) {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<input type="text" id="textomodal" class="form-control" placeholder="Inghrese su texto" aria-label="Ingrese su texto" aria-describedby="Ingrese su texto">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" onclick="agregarcomponentecolumna()">Agregar</button>' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe ingresar su texto</small></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        } else if ($("#exampleRadios3").is(":checked")) {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<div class="custom-file" lang="es">' +
                '<input type="file" class="custom-file-input" id="customFileInputtwo" aria-describedby="customFileInputtwo" onchange="loadFile(event)">' +
                '<label class="custom-file-label" for="customFileInputtwo"></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" id="customFileInputchamge" onclick="cambiarimagencomponentenew()">Agregar</button>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe adjuntar una imagen</small></div>' +
                '<div class="text-center" id="divImageMediaPreviewtwo" style="margin-top:15px;"></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        } else if ($("#exampleRadios4").is(":checked")) {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<div class="custom-file" lang="es">' +
                '<input type="file" class="custom-file-input" id="customFileInputtwo" aria-describedby="customFileInputtwo" onchange="loadFile(event)">' +
                '<label class="custom-file-label" for="customFileInputtwo"></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" id="customFileInputchamge" onclick="cambiarimagencomponentenew()">Agregar</button>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe adjuntar una imagen</small></div>' +
                '<div class="text-center" id="divImageMediaPreviewtwo" style="margin-top:15px;"></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        } else {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<input type="text" id="textomodal" class="form-control" placeholder="Inghrese su texto" aria-label="Ingrese su texto" aria-describedby="Ingrese su texto">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" onclick="cambiarimagencomponentetexto()">Agregar</button>' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe ingresar su texto</small></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        }
    });
    /******************************************************************************* */
    /********Funcion que controla footer modal agregar componente simple***************** */
    $('.edit').on('change', function () {
        if ($("#exampleRadios1").is(":checked")) {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<div class="custom-file" lang="es">' +
                '<input type="file" class="custom-file-input" id="customFileInputtwo" aria-describedby="customFileInputtwo" onchange="loadFile(event)">' +
                '<label class="custom-file-label" for="customFileInputtwo"></label>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" id="customFileInputchamge" onclick="cambiarimagencomponentenew()">Agregar</button>' +
                '</div>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe adjuntar una imagen</small></div>' +
                '<div class="text-center" id="divImageMediaPreviewtwo" style="margin-top:15px;"></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        } else {
            var botonera = '<div class="container">' +
                '<div class="input-group">' +
                '<input type="text" id="textomodal" class="form-control" placeholder="Inghrese su texto" aria-label="Ingrese su texto" aria-describedby="Ingrese su texto">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-primary" type="button" onclick="cambiarimagencomponentetexto()">Agregar</button>' +
                '<button class="btn btn-success" type="button" id="customFileInputcancel" data-dismiss="modal">Cancelar</button>' +
                '</div>' +
                '</div>' +
                '<div class="text-left" id="errorimagen" style="display:none; color:red;"><small>Debe ingresar su texto</small></div>' +
                '</div>';
            $("#compfooter").html(botonera);
        }
    });
});

function cambiarimagencomponente(idcomp) {
    if ($("#customFileInput").val().length == 0) {
        $("#errorimagen").css("display", "block");
    } else {
        $("#componentes").modal("hide");
        $("#imagen" + idcomp + "").attr('src', $("#inputtext").val());
    }

}

function cambiarimagencomponentenew() {

    if ($("#customFileInputtwo").val().length == 0) {
        $("#errorimagen").css("display", "block");
    } else {
        $("#componentes").modal("hide");
        var div = $("#inputtextnew").val();
        var dvPreview = $("#" + div + "");
        dvPreview.html("");
        dvPreview.html('<img id="imagen' + div + '" style="height: 70px; width: 250px;" src="' + $("#inputtextnews").val() + '"></img>');
        dvPreview.data("parametrotres", "imagen");
    }
}

function agregarcomponentecolumna() {

    if ($("#textomodal").val().length == 0) {
        $("#errorimagen").css("display", "block");
    } else {
        $("#componentes").modal("hide");
        var div = $("#componentemodal").val() + $("#idpadremodal").val() + $("#filamodal").val() + $("#columnamodal").val();
        if ($("#estadomodal").val() == "nuevo") {
            var dvPreview = $("#" + div + "");
            dvPreview.html("");
            dvPreview.html($("#textomodal").val());
            dvPreview.data("parametrotres", "texto");
        } else {
            var dvPreview = $("#" + div + "");
            var contenido = dvPreview.html();
            dvPreview.html("");
            dvPreview.html(contenido + " " + $("#textomodal").val());
            dvPreview.data("parametrotres", "texto");
        }

    }
}

function cambiarimagencomponentetexto() {

    if ($("#textomodal").val().length == 0) {
        $("#errorimagen").css("display", "block");
    } else {
        $("#componentes").modal("hide");
        var div = $("#inputtextnew").val();
        var dvPreview = $("#" + div + "");
        dvPreview.html("");
        if (div == "encabezado4") {
            dvPreview.html('<p class="texto" id="texto' + div + '"  style="text-align: center;margin-top: 60px;margin-bottom: 40px;padding-top: 20px; border-top: 3px solid #142444;">' + $("#textomodal").val() + '</p>');
        } else {
            dvPreview.html('<h4 class="texto" id="texto' + div + '">' + $("#textomodal").val() + '</h4>');
        }

        dvPreview.data("parametrotres", "texto");
    }
}

function agregartextoeditado(componente) {
    if ($("#textoeditado").val().length == 0) {
        $("#errortexto").css("display", "block");
    } else {
        $("#componentes").modal("hide");
        $("#texto" + componente + "").html("");
        $("#texto" + componente + "").html($("#textoeditado").val());
    }
}

function eliminarcomponente(id, componente, tipo) {
    $(".popover").popover('hide');
    $("#comptitle").html("Estimado Usuario:");
    $("#compbody").html('<strong>Está seguro de eliminar este componente?');
    $("#compfooter").html('<button type="button" class="btn btn-danger"  onclick="eliminarcomponentemodal(\'' + componente + '\',' + id + ',\'' + tipo + '\')">Eliminar</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
    $("#componentes").modal("show");
}

function eliminarcomponentemodal(componente, id, tipo) {
    console.log(componente + "*****" + id + "****" + tipo);
    if (tipo == "tabla") {
        $("#" + componente + id + "").remove();
    } else {
        $("#" + componente + "").html("");
        if (componente == "encabezado4") {
            $("#" + componente + "").html('<p class="vacio borrar" id="p' + componente + id + '" style="text-align: center;margin-top: 60px;margin-bottom: 40px;padding-top: 20px; border-top: 3px solid #142444;">[Agregar Contenido]</p>');
        } else {
            $("#" + componente + "").html('<p class="vacio borrar" id="p' + componente + id + '">[Agregar Contenido]</p>');
        }

        $("#" + componente + "").data("parametrotres", "vacio");

    }
    $("#componentes").modal("hide");

}
var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
        var dvPreview = $("#divImageMediaPreviewtwo");
        dvPreview.html("");
        var img = $("<img id='imagentransitoria' />");
        img.attr("style", "width: 250px; height:70px; padding: 10px; border: solid gray 1px;");
        img.attr("src", reader.result);
        dvPreview.append(img);
        $("#inputtextnews").val(reader.result);
        console.log("reader.result", reader.result)
        //inputtext
        //$("#inputtext").val(event.target.result);
        //var output = document.getElementById('output');
        //output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};

/******************************************************************************* */
/********Funcion que agrega html a lienzo ***************** */
function agregartexto(iddiv, tipo) {
    $('#inputtextHelp').html("");
    if ($.trim($("#inputtext").val()) == "" || $("#inputtext").val().length == 0) {
        $('#inputtextHelp').html("Debe Ingresar su Texto.");

    } else {
        var textnew = "";
        if (tipo == 1) {
            textnew = "<h1 id='h1" + iddiv + "'>" + $("#inputtext").val() + "</h1>";
        }
        if (tipo == 2) {
            textnew = "<h3 id='h3" + iddiv + "'>" + $("#inputtext").val() + "</h3>";
        }
        if (tipo == 3) {
            textnew = "<p id='p" + iddiv + "'>" + $("#inputtext").val() + "</p>";
            $(".textparrafo").mouseover(function () {
                flag = false;
                console.log("agregartexto", flag);
                console.log("dentro div");
            }).mouseout(function () {
                flag = true;
                console.log("agregartexto", flag);
                console.log("fuera");
            });
        }
        $('#' + iddiv + '').html(textnew);
        $("#lienzo").trigger('create');
        $("#componentes").modal("hide");
    }
}

function eliminardiv(iddiv) {
    $('#' + iddiv + '').remove();
}
/******************************************************************************* */
/********Funcion que cambia el contenido del lienzo ***************** */
function cambiatexto() {
    $('#emphi').val($('#selectemp').val());


}
/******************************************************************************* */
/********Funcion que muestra modal para confirmar guardado del template ******** */
function guardartemplates() {
    $("#comptitle").html("");
    $("#compbody").html("");
    $("#compfooter").html('');
    $("#componentes").modal("hide");
    var contenido = $.trim($('#lienzo').html());
    if (contenido == "") {
        $("#comptitle").html("Error al guardar:");
        $("#compbody").html("No hay componentes en su template");
        $("#compfooter").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
        $("#componentes").modal("show");

    } else {
        $("#comptitle").html("Estimado Usuario:");
        $("#compbody").html('<div class="form-group"><label for="nombrelienzo">Nombre del Template(*)</label><input type="text" class="form-control" id="nombrelienzo" aria-describedby="_nombrelienzo" placeholder="Ingrese el nombre del template" maxlenght="15"><small id="_nombrelienzo" class="form-text text-muted" style="color:red;"></small></div>');
        $("#compfooter").html('<button type="button" class="btn btn-primary" onclick="terminaringreso();">Guardar</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
        $("#componentes").modal("show");
    }

}

/******************************************************************************* */
/********Funcion que finaliza el guardado del template ******** */
function terminaringreso() {

    $('#_nombrelienzo').html('');
    if ($.trim($('#nombrelienzo').val()) == "") {
        $('#_nombrelienzo').html('Ingrese el nombre del template');
        return false;
    } else {

        updateTemplateContent();
    }
}

function updateTemplateContent() {

    var contenido = tinyMCE.get('textareapersonalizado').getContent();
    var nombreli = $.trim($('#nombrelienzo').val());
    contenido = '<div class="container"><div class="card"><div class="card-body">' + contenido + '</div></div></div>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token]').attr('content')
        }
    });
    $.ajax({
        type: "POST",
        url: url_prev + 'send_html',
        data: {
            nombreli: nombreli,
            html: contenido,
            templateId: editedtemplateID,
            _token: $('input[name="_token"]').val()
        }, //esto es necesario, por la validacion de seguridad de laravel
        datatype: "json",
    }).done(function (msg) {
        var json = JSON.parse(msg);
        if (json.status == "ok") {
            $("#lienzo").html("");
            $("#comptitle").html("");
            $("#compbody").html("");
            $("#compfooter").html('');
            $("#componentes").modal("hide");
            resetTemplateEditing();

        } else {
            $("#exampleModalLabel").html("Presentamos errores en su Formulario");
            $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
            $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
            $("#modalExitosa").modal("show");
        }
    }).fail(function () {
        $("#exampleModalLabel").html("Presentamos en la Plataforma");
        $("#modalbody").html("No fue posible actualizar su información. Inténtelo nuevamente.");
        $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>');
        $("#modalExitosa").modal("show");
        console.log("error editardatos()");
    });

}

function resetTemplateEditing() {

    $("#exampleModalLabel").html("Template");
    $("#modalbody").html("Cambios guardados exitosamente    ");
    $("#modalfooter").html('<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>');
    $("#modalExitosa").modal("show");

    $("#a_templates").trigger("click");
    isTemplateEditing = false;
    editedtemplateID = '';
    tinyMCE.get('textareapersonalizado').setContent('');

}


/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
function mostrarContrasena() {
    var tipo = document.getElementById("modal_pass");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function mostrarContrasenaadd() {
    var tipo = document.getElementById("modal_pass_add");
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function valideKey(evt) {

    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    if (code == 8) { // backspace.
        return true;
    }
    if (code == 45) { // -.
        return true;
    } else if (code == 107 || code == 75) { // kK.
        return true;
    } else if (code >= 48 && code <= 57) { // solo números.
        return true;
    } else { // other keys.
        return false;
    }
}
var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut: function (rutCompleto) {
        rutCompleto = rutCompleto.replace("‐", "-");
        if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto))
            return false;
        var tmp = rutCompleto.split('-');
        var digv = tmp[1];
        var rut = tmp[0];
        if (digv == 'K') digv = 'k';

        return (Fn.dv(rut) == digv);
    },
    dv: function (T) {
        var M = 0,
            S = 1;
        for (; T; T = Math.floor(T / 10))
            S = (S + T % 10 * (9 - M++ % 6)) % 11;
        return S ? S - 1 : 'k';
    }
}
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/***************************Resetear lienzo componentes************************* */
function resetlienzo() {
    if ($("#lienzo").html() == "") {
        $("#comptitle").html("Estimado Usuario:");
        $("#compbody").html('<strong>No hay componentes creados en su área de trabajo.');
        $("#compfooter").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
        $("#componentes").modal("show");
    } else {
        $("#comptitle").html("Estimado Usuario:");
        $("#compbody").html('<strong>Está acción eliminará los componentes creados hasta el momento.');
        $("#compfooter").html('<button type="button" class="btn btn-danger"  onclick="resetlienzonow()">Eliminar</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>');
        $("#componentes").modal("show");
    }

}

function resetlienzonow() {
    $("#lienzo").html("");
    $("#componentes").modal("hide");
}
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */
/******************************************************************************* */

var winWidth = $(window).width();

function sidebarWidth() {
    if (winWidth > 375) {
        //$('.sidebar-container').removeClass('col-xs-12');
        //$('.sidebar-container').addClass('col-xs-6');
        console.log("1", winWidth);
    } else {
        console.log("2", winWidth);
        //$('.sidebar-container').removeClass('col-xs-6');
        //$('.sidebar-container').addClass('col-xs-12');
    };
};

sidebarWidth();
$(window).on("resize", function (event) {
    var w = $(this).width();
    if (w < 1200) {
        $('#encabezado1').removeClass('col-md-4');
        $('#encabezado1').addClass('col-xs-12');
        $('#encabezado2').removeClass('col-md-4');
        $('#encabezado2').addClass('col-xs-12');
        $('#encabezado3').removeClass('col-md-4');
        $('#encabezado3').addClass('col-xs-12');
        $('#prueba1').removeClass('col-md-4');
        $('#prueba1').addClass('col-xs-12');
        $('#prueba2').removeClass('col-md-4');
        $('#prueba2').addClass('col-xs-12');
        $('#prueba3').removeClass('col-md-4');
        $('#prueba3').addClass('col-xs-12');
        $("#propuesta_detalle").trigger('create');
        console.log('menos de 1200');
    } else {
        $('#encabezado1').removeClass('col-xs-12');
        $('#encabezado1').addClass('col-md-4');
        $('#encabezado2').removeClass('col-xs-12');
        $('#encabezado2').addClass('col-md-4');
        $('#encabezado3').removeClass('col-xs-12');
        $('#encabezado3').addClass('col-md-4');
        $('#prueba1').removeClass('col-xs-12');
        $('#prueba1').addClass('col-md-4');
        $('#prueba2').removeClass('col-xs-12');
        $('#prueba2').addClass('col-md-4');
        $('#prueba3').removeClass('col-xs-12');
        $('#prueba3').addClass('col-md-4');
        $("#propuesta_detalle").trigger('create');
        console.log('más de 1200');
    }

});

function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup"].forEach(function (event) {
        textbox.addEventListener(event, function () {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}