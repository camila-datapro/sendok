<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoProductoModel;
use DB;

class TipoProductoController extends Controller
{
    public static function getTiposDeProducto(){
        return json_encode(TipoProductoModel::all());
    }
}
