<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioModel;
use App\PlantillaModel;
use Illuminate\Support\Facades\Log;
use Auth;

class AdminUsuario extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * index
     * Carga vista de administrador de usuarios con precarga de consulta a base de datos de plantillas de correo electronico
     * @group AdminUsuario
     */
    public function index(){
        return view('admin_usuario')
        ->with("plantillas",PlantillaModel::listPlantillasByUser(Auth::user()->id));
        ;
    }

    /**
     * editarUsuario
     * @bodyParam array Request datos recibidos por post en formulario de administrador de usuarios, se envia por parámetro el id del usuario para que la función en el modelo pueda identificar a que usuario actualizar.
     * @group AdminUsuario
     */
    public function editarUsuario(Request $request){
        $datos = $request["json_datos"];
        return UsuarioModel::editarUsuario($datos);
    }

    /**
     * crearPlantilla
     * @params array Request recibe datos en formulario de administrador de usuarios, y crea una nueva plantilla en base de datos.
     * @group AdminUsuario
     */
    public function crearPlantilla(Request $request){
        
        $datos = $request["json_datos"];
        return PlantillaModel::crearPlantilla($datos);

    }

    /**
     * editarPlantilla
     * @params array Request recibe datos en formulario de administrador de usuarios, determina si existe el id de usuario y posteriormente edita el registro en base de datos.
     * @group AdminUsuario
     */
    public function editarPlantilla(Request $request){
        
        $datos = $request["json_datos"];
        return PlantillaModel::editarPlantilla($datos);

    }

    /**
     * eliminarPlantilla
     * @params array Request recibe Por medio del identificador, permite la eliminacion de una plantilla en base de datos.
     * @group AdminUsuario
     */
    public function eliminarPlantilla(Request $request){
        
        $id = $request["id"];
        Log::debug("El id a eliminar es: ".$id);
        return PlantillaModel::eliminarPlantilla($id);

    }

    /**
     * guardarHTML
     * @params array Request recibe los parametros de la creacion de pie de firma y crea un html asociado al id del usuario, el cual tendrá toda la estructura en formato HTML en la carpeta ../public/firmas/html/.
     * @group AdminUsuario
     */
    public function guardarHTML(Request $request){
        
        $html = $request["html"];
        $user_id = Auth::user()->id;
        Log::debug($html);
        Log::debug("guardarHTML".$user_id);

        file_put_contents('./firmas/html/firma_'.$user_id.'.html', $html);

        return 1;

    }

    /**
     * obtenerHTML
     * @params array Request recibe el id del usuario y encuentra la estructura HTML asociada a la firma, si esta no existe , retorna un string vacío.
     * @group AdminUsuario
     */
    public function obtenerHTML(Request $request){
        
        $user_id = Auth::user()->id;
        

        $archivo = file_get_contents('./firmas/html/firma_'.$user_id.'.html');

        return $archivo;

    }

}
