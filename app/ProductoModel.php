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

    public static function crearProducto($clase, $nombre, $valor, $descripcion, $tipo_cambio, $stock, $costo, $margen, $numero_interno, $numero_fabricacion){
        
        $results = DB::insert("insert into producto (
            clase,
            nombre_producto,
            valor_producto,
            descripcion_producto,
            tipo_cambio,
            stock,
            costo,
            margen,
            numero_interno,
            numero_fabricacion
            ) VALUES (
                '".$clase."',
                '".$nombre."',   
                ".intval($valor).",      
                '".$descripcion."',
                '".$tipo_cambio."',
                ".intval($stock).",
                ".intval($costo).",
                ".intval($margen).",
                '".$numero_interno."',
                '".$numero_fabricacion."'
            )");         
        return $results;
    }

    public static function eliminarProducto($id_producto){       
        $results = DB::delete("delete from producto 
        where id_producto = '".$id_producto."';");            
    return $results;
    }
}
