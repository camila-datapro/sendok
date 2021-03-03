<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioModel;
use App\PlantillaModel;
use Illuminate\Support\Facades\Log;

class AdminUsuario extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        Log::debug("admin usuario");
        return view('admin_usuario')
        ->with("plantillas",PlantillaModel::listPlantillas());
        ;
    }

    public function editarUsuario(Request $request){
        $datos = $request["json_datos"];
        return UsuarioModel::editarUsuario($datos);
    }

    public function crearPlantilla(Request $request){
        Log::debug("entro a crearPlantilla");
        $datos = $request["json_datos"];
        return PlantillaModel::crearPlantilla($datos);

    }

}
