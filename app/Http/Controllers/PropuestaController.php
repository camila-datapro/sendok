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

    public function updatePropuesta(Request $request){
        $datos= $request["datos_envio"];
        return PropuestaModel::updatePropuesta($datos);
    }
    
    public static function setEstadoEnviado(Request $request){
        $folio = $request["folio"];
        return PropuestaModel::setEstadoEnvio($folio);
    }
}
