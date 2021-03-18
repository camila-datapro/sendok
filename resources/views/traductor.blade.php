<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/favicon.jpg') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a145961cd.js" crossorigin="anonymous"></script>
    <title>Sendok</title>
</head>
<body>
    <div class="container">
        <a class="button btn btn-dark btn-sm float-right" style="margin-top: 10px;" href="./home"><i class="fas fa-home" ></i> Home</a>
        <h1>Configure y encripte sus variables de entorno</h1>
        <h5 style="color:green;">1 - Modifique los parámetros que requiera en los inputs de la columna ENV desencriptado</h5>
        <div class="row">
            <div class="col-md-9" >
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Parámetro</th>
                            <th>ENV encriptado</th>
                            <th>ENV desencriptado</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                            <?php
                            for($i=0; $i< (sizeOf($parametros)); $i++){
                                echo "<tr>";
                                echo "<td id='parametro_".$i."'>".$parametros[$i]."</td>";
                                echo "<td>".$encriptados[$i]."</td>";
                                echo "<td> <input id='desencriptado_".$i."' class='form-control' value='".$desencriptados[$i]."'></input></td>";
                                echo "</tr>";
                        }
                            ?>
                        
                    </tbody>
                </table>
            </div>
            
            <div class="col-md-3">
                <input type="hidden" class="hidden" id="cantidad_parametros" name="cantidad_parametros" value="{{sizeOf($parametros)}}"/>
                <button class="btn btn-success btn-sm" style="margin-top: 30px;" onclick="generaConfiguracion()">2 - Generar nueva configuracion</button>

                <p>Genere las nuevas credenciales encriptadas</p>
                <button class="btn btn-sm btn-success" onclick="copy()">3 - Copiar </button>
                <textarea id="nueva_config" class="form-control" rows="10" style="margin-top: 10px;"></textarea>
                <p style="color:green;">4 - Reemplace los valores en la primera sección de archivo .env, <b>asegurese de guardar los cambios</b></p>
                <button class="btn btn-danger btn-sm" onclick="window.location.reload(true);">5 - Recargar página</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/vendors/js/vendor.bundle.base.js') }}"></script>
      <script src="{{ asset('/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
      <script src="{{ asset('/assets/js/shared/misc.js') }}"></script>
      <script src="{{ asset('/assets/js/demo_1/dashboard.js') }}"></script>
    <script src="{{ asset('/js/traductor.js') }}"></script>
</body>
</html>