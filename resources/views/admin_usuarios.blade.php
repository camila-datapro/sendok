@extends('layouts.menu_lateral')
@section('headers')
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
    <meta name="csrg-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sendok</title>
    <link rel="stylesheet" href=" {{ asset('/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/css/vendor.bundle.addons.css') }}">
    <link href="{{ asset('/css/select_buscador.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/demo_1/style.css') }}">

    <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
    <script>
    tinymce.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        height: "600px",
        width: "100%",
        images_upload_url: '/uploader/uploader.php',
        plugins: 'advlist autolink lists link image paste charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table contextmenu directionality emoticons template paste textcolor colorpicker textpattern',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor table | datdinamicos',
        paste_data_images: true,
        content_css:"/css/documento.css",
        table_grid: true,
        table_class_list: [
    {title: 'None', value: ''},
    {title: 'No Borders', value: 'table_no_borders'},
    {title: 'Borders',
      menu: [
        {title: 'Highlight and Expand', value: 'table_highlight_expand'}
      ]
    } 
  ],
        table_cell_class_list: [
    {title: 'None', value: ''},
   
    {title: 'Highlight', value: 'headingCell'}
  ],
 
  


        image_title: true,
  automatic_uploads: true,
 
  images_file_types: 'jpg,png',

        file_picker_types: 'image',
  /* and here's our custom image picker*/
  file_picker_callback: function (cb, value, meta) {
    var input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');

    input.onchange = function () {
      var file = this.files[0];

      var reader = new FileReader();
      reader.onload = function () {
        /*
          Note: Now we need to register the blob in TinyMCEs image blob
          registry. In the next release this part hopefully won't be
          necessary, as we are looking to handle it internally.
        */
        var id = 'blobid' + (new Date()).getTime();
        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        var base64 = reader.result.split(',')[1];
        var blobInfo = blobCache.create(id, file, base64);
        blobCache.add(blobInfo);

        /* call the callback and populate the Title field with the file name */
        cb(blobInfo.blobUri(), { title: file.name });
      };
      reader.readAsDataURL(file);
    };

    input.click();
  },

        setup: function(editor) {
            editor.addButton('datdinamicos', {
                type: 'menubutton',
                text: 'Datos Dinámicos',
                icon: false,
                menu: [{
                        text: 'Datos Empresa',
                        menu: [{
                                text: 'Nombre Empresa',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%nombreempresa%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Rut Empresa',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%rutempresa%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Region Empresa',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%regionempresa%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Comuna Empresa',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%comunaempresa%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Dirección Empresa',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%direccionempresa%</em>&nbsp;');
                                }
                            }
                        ]
                    },
                    {
                        text: 'Datos Contacto',
                        menu: [ 
                            {
                                text: 'Nombre Contacto',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%nombrecontacto%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Apellido Contacto',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%apellidocontacto%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Cargo Contacto',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%cargocontacto%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Email Contacto',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%emailcontacto%</em>&nbsp;');
                                }
                            },
                            {
                                text: 'Teléfono Contacto',
                                onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%telefonocontacto%</em>&nbsp;');
                                }
                            }
                        ]
                    },
                 
                    {
                        text: 'Product Grid',
                        onclick: function() {
                                    editor.insertContent(
                                        '&nbsp;<em>%ProductGrid%</em>&nbsp;');
                                }
              
                    }
                ]
            });
        }
    });
    </script>
    <style>
    .latder {
        float: left !important;
        width: 50% !important;
    }

    .latizq {
        float: right !important;
        width: 50% !important;
    }

    .btn-group-dynamic {
        display: table;
        width: 100%
    }

    .btn-group-dynamic>.btn {
        display: table-cell;
    }

    .btn-group-dynamic>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
        border-radius: 0px;
    }

    .btn-group-dynamic>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .btn-group-dynamic>.btn:last-child:not(:first-child):not(.dropdown-toggle) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    @media (min-width: 768px) {
        .btn-group-dynamic>.btn {
            display: inline-block;
            margin-right: 20px
        }

        .btn-group-dynamic>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
            border-radius: 5px;
        }

        .btn-group-dynamic>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .btn-group-dynamic>.btn:last-child:not(:first-child):not(.dropdown-toggle) {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
        }
    }

    #colmm {
        width: 260px;
        height: 160px;
        background-color: orange;
    }

    #colm3 {
        width: 260px;
        height: 160px;
        background-color: yellow;
    }

    caption {
        caption-side: top;
        font-size: 18px;
        font-family: 'georgia';
        font-weight: bold;
        text-align: center;
        padding: 15px;
    }

    .vacio {
        color: #6c757d !important;
    }

    .custom-file-input~.custom-file-label::after {
        content: "Seleccionar";
    }

    .table-responsive-oscar {
        min-height: .01%;
        overflow-x: auto;
    }

    @media screen and (max-width: 767px) {
        .table-responsive-oscar {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd;
        }

        .table-responsive-oscar>.table {
            margin-bottom: 0;
            border: 1px solid gray;
        }

        .table-responsive-oscar>.table>thead>tr>th,
        .table-responsive-oscar>.table>tbody>tr>th,
        .table-responsive-oscar>.table>tfoot>tr>th,
        .table-responsive-oscar>.table>thead>tr>td,
        .table-responsive-oscar>.table>tbody>tr>td,
        .table-responsive-oscar>.table>tfoot>tr>td {
            white-space: nowrap;
        }
    }
    </style>
</head>
@endsection
@section('body1')

<body>
    <input type="hidden" id="regval" value="<?=$region;?>" />
    <input type="hidden" id="comval" value="<?=$comuna;?>" />
    <input type="hidden" id="divpadre" value="" />
    <input type="hidden" id="inputtextnew" name="inputtextnew">
    <input type="hidden" id="inputtextnews" name="inputtextnews">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @endsection
        @section('body2')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="background: white;">
                <!-- Page Title Header Starts-->
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title" id="titulo_usuario">Administrador Empresa</h4>
                        </div>
                    </div>
                </div>
                <!-- Page Title Header Ends-->
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="row">
                                <ul class="nav nav-tabs" style="border-bottom: 2px solid;border-color: #cdd6dc;">
                                    <li class="nav-item">
                                        <button class="nav-link active btn-primary" id="a_mi_empresa">Mi
                                            empresa</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link btn-light" id="a_usuarios">Usuarios</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link btn-light" id="a_templates">Templates</button>
                                    </li>
                                </ul>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="container" id="div_mi_empresa">
                                <div class="col-md-12">
                                    <form id="form_mi_empresa">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <label class="col-md-1">Nombre(*)</label>
                                                <div class="col-md-5">
                                                    <input type="text" maxlength="100" class="form-control"
                                                        id="nombre_empresa" value="<?=$nombre;?>" required>
                                                </div>
                                                <label class="col-md-1">Rut(*)</label>
                                                <div class="col-md-5">
                                                    <input type="text" maxlength="10" class="form-control"
                                                        id="rut_empresa" value="<?=$rut?>"
                                                        onkeypress="return valideKey(event);" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label for="region" class="col-md-1">Región(*)</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="region"
                                                        onchange="getComunasRegion();" required>
                                                        <option value="">Seleccione una Región</option>
                                                        <?php                  
                                                for($i=0;$i<sizeOf($regiones);$i++){
                                                   echo "<option value='".$regiones[$i]->id."'>".$regiones[$i]->region."</option>";
                                                }
                                                ?>
                                                    </select>
                                                </div>
                                                <label for="provincia" class="col-md-1">Comuna(*)</label>
                                                <div class="col-md-5">
                                                    <select class="form-control" id="comuna" required>
                                                        <option value="">Seleccione una Comuna </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <label class="col-md-1">Direccion(*)</label>
                                                <div class="col-md-5">
                                                    <input class="form-control" value="<?=$dir;?>"
                                                        id="direccion_empresa" required>
                                                </div>
                                                <label class="col-md-1">Fono(*)</label>
                                                <div class="col-md-5">
                                                    <input type="text" maxlength="12" class="form-control"
                                                        id="fono_empresa" value="<?=$tel;?>"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                        required>
                                                </div>
                                            </div>
                                            <br>
                                            <!--<div class="row">
                                       <label class="col-md-1">Imagen</label>
                                       <div class="col-md-5">
                                           <button class="btn btn-primary float-left" data-toggle="modal" data-target="#uploadModal">Cambiar</button>
                                       </div>
                                    </div>-->
                                        </div>
                                        </br>
                                        <button class="btn btn-success float-right"
                                            id="guardar_empresa">Guardar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="div_nuevos_usuarios" style="display:none;">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <button class="btn btn-success float-left ml-3"
                                                onclick="agregarusuario();"><i class="fas fa-plus"
                                                    aria-hidden="true"></i>Nuevo Usuario</button>

                                        </div>
                                        <div class="col-lg-12 table-responsive">
                                            <table class="table table-hover responsive display nowrap mb-3 w-100"
                                                cellspacing="0" id="tabla_usuarios">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Cargo</th>
                                                        <th scope="col">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodytabla">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row 100vh" id="div_templates" style="display:none;">
                            <div class="container" id="contenedortablatemp">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 mb-3">
                                            <button class="btn btn-success float-left ml-3" onclick="newtemplate();"
                                                data-toggle='tooltip' data-placement='top' title='Nuevo Template'><i
                                                    class="fas fa-plus" aria-hidden="true"></i>Nuevo Template</button>

                                        </div>
                                        <div class="col-lg-12 table-responsive">
                                            <table class="table table-hover responsive display nowrap mb-3 w-100"
                                                cellspacing="0" id="tabla_templates">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Nombre</th>
                                                        <th scope="col" class="text-right">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bodytemplates">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container-fluid 100vh" style="display:none;" id="contenedortemplate">
                                <div class="row 100vh">
                                    <form class="col-lg-12">
                                        <div class="form-group col-lg-12">
                                            <textarea class="form-control mceEditor"
                                                id="textareapersonalizado"></textarea>
                                            <button type="button" id="guardartemplate"
                                                class="btn btn-primary float-right mt-3">Guardar Template</button>
                                            <button type="button" id="limpiartemplate"
                                                class="btn btn-warning float-right mt-3">Limpiar</button>
                                            <form>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- seccion modales-->
        <div class="modal fade" id="modalExitosa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Operación exitosa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalbody">
                        Se ha realizado la operación de forma exitosa.
                    </div>
                    <div class="modal-footer" id="modalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="window.location.reload();">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <!--contenido modal crear nueva plantilla-->
        <!-- fin contenido modal crear nueva plantilla-->
        <div class="modal fade" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-center content-justify-center">
                            <input type="hidden" id="modal_id_eliminar" style="display:none;" />
                            <h4>¿Está seguro de eliminar el elemento? : </h4>
                            <h4 id="modal_eliminar_nombre"></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-primary" id="eliminar_plantilla"
                            onclick="eliminarPlantilla();">Si, eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="componentes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="comptitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="compbody">
                    </div>
                    <div class="modal-footer" id="compfooter">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.reload();">OK</button>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="extraLargeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleextra"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body" id="bodyextra">
                    </div>
                    <div class="modal-footer" id="footerextra">

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div id="uploadModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">File upload form</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form method='post' action='' enctype="multipart/form-data">
                            Select file : <input type='file' name='file' id='file' class='form-control'><br>
                            <input type='button' class='btn btn-info' value='Upload' id='btn_upload'>
                        </form>

                        <!-- Preview-->
                        <div id='preview'></div>
                    </div>

                </div>

            </div>
        </div>


        <!-- fin seccion modales-->
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
        <script src="{{ asset('/assets/js/shared/off-canvas.js') }}"></script>
        <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
        <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
        <script src="{{ asset('/js/utilidades.js') }}"></script>
        <script src="{{ asset('/js/admin_usuarios_general.js') }}"></script>
        <script src="{{ asset('/js/popper.min.js') }}"></script>
        <!--<script src="{{ asset('/js/dataTables.min.js') }}"></script>-->
        <script src="{{ asset('/js/dataTables.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <!-- <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="{{ asset('/js/jquery-ui.js')}}"></script>-->
        <script>
        $(document).ready(function() {
            $(".mceEditor").val("");

        });
        $("#guardartemplate").click(function() {
            var ed = $.trim(tinyMCE.get('textareapersonalizado').getContent());
            if (ed == "") {
                $("#comptitle").html("Error al guardar:");
                $("#compbody").html("No hay componentes en su template");
                $("#compfooter").html(
                    '<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'
                    );
                $("#componentes").modal("show");

            } else {
                if (isTemplateEditing == false) {
                    $("#comptitle").html("Estimado Usuario:");
                    $("#compbody").html(
                        '<div class="form-group"><label for="nombrelienzo">Nombre del Template(*)</label><input type="text" class="form-control" id="nombrelienzo" aria-describedby="_nombrelienzo" placeholder="Ingrese el nombre del template" maxlenght="15"><small id="_nombrelienzo" class="form-text text-muted" style="color:red;"></small></div>'
                        );
                    $("#compfooter").html(
                        '<button type="button" class="btn btn-primary" onclick="terminaringreso();">Guardar</button><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>'
                        );
                    $("#componentes").modal("show");
                } else {
                    updateTemplateContent();
                }


            }
        });
        $("#limpiartemplate").click(function() {
            tinyMCE.get('textareapersonalizado').setContent('');
        });
        </script>
</body>

</html>
@endsection