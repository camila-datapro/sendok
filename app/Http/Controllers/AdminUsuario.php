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

    public function index(){
        return view('admin_usuario')
        ->with("plantillas",PlantillaModel::listPlantillasByUser(Auth::user()->id));
        ;
    }

    public function editarUsuario(Request $request){
        $datos = $request["json_datos"];
        return UsuarioModel::editarUsuario($datos);
    }

    public function crearPlantilla(Request $request){
        
        $datos = $request["json_datos"];
        return PlantillaModel::crearPlantilla($datos);

    }

    public function editarPlantilla(Request $request){
        
        $datos = $request["json_datos"];
        return PlantillaModel::editarPlantilla($datos);

    }
    public function eliminarPlantilla(Request $request){
        
        $id = $request["id"];
        Log::debug("El id a eliminar es: ".$id);
        return PlantillaModel::eliminarPlantilla($id);

    }

}
