<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProductoModel extends Model
{
    public static function obtenerTipoProducto($idTipo){
        $results = DB::select("select * from tipo_producto where id_tipo_producto = ".$idTipo."" );
        return $results;
    }
}
