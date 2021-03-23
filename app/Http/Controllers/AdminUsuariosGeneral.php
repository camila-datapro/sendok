<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUsuariosGeneral extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * index
     * Permite crear usuarios desde un perfil de empresa
     * @group AdminUsuario
     */
    public function index(){
        return view('admin_usuarios');                
    }
}
