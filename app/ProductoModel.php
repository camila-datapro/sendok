<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    public static function obtenerProducto($idProducto){
        $results = DB::select("select * from producto where id_producto = ".$idProducto."" );
        return $results;
    }
}
