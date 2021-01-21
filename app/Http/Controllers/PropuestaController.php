<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropuestaModel;

class PropuestaController extends Controller
{
    public function setPropuesta(Request $request){
        $json_datos= $request["json_datos"];
        $json_datos = str_replace("[","",$json_datos);
        $json_datos = str_replace("]","",$json_datos);
        $datos = json_decode($json_datos);
        return PropuestaModel::setPropuesta($datos);
    }
}
