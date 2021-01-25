<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropuestaModel;

class PropuestaController extends Controller
{
    public function setPropuesta(Request $request){
        $datos= $request["datos_envio"];
        return PropuestaModel::setPropuesta($datos);
    }

    public static function getLastId(Request $request){        
        return PropuestaModel::getLastId();
    }
}
