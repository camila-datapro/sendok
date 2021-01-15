<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class ProductoModel extends Model
{
    public static function obtenerTodosProductos(){
        $results = DB::select("select * from producto" );
        return $results;
    }
    public static function obtenerProducto($idProducto){
        $results = DB::select("select * from producto where id_producto = ".$idProducto."" );
        return $results;
    }

    public static function crearProducto($id_tipo, $nombre, $valor, $descripcion){
        $results = DB::insert("insert into producto (
            id_tipo_producto,
            nombre_producto,
            valor_producto,
            descripcion_producto
            ) VALUES (
                ".intval($id_tipo).",
                '".$nombre."',   
                ".intval($valor).",      
                '".$descripcion."'
            )");
        return $results;
    }

    public static function eliminarProducto($id_producto){       
        $results = DB::delete("delete from producto 
        where id_producto = '".$id_producto."';");            
    return $results;
    }
}
