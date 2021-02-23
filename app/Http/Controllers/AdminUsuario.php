<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UsuarioModel;

class AdminUsuario extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin_usuario')
        ;
    }

    public function editarUsuario(Request $request){
        $datos = $request["json_datos"];
        return UsuarioModel::editarUsuario($datos);
    }
}
