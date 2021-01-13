<?php

namespace App\Http\Controllers;

use App\ComunaModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ComunaController extends Controller
{    
    public function getComunas(Request $request){
        //Log::debug("request camila:".$request['id']);
        $idProvincia = $request['id'];
         return json_encode(ComunaModel::getComunasByProvincia($idProvincia));
     }
}
