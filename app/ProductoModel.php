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
        Log::debug("id producto:".$idProducto);
        $results = DB::select("select * from producto where id_producto = ".$idProducto."" );
        return $results;
    }

    public static function crearProducto($json_datos){

        $clase = $json_datos->clase;
        $nombre = $json_datos->nombre_producto;
        $valor = $json_datos->valor_producto;
        $descripcion = $json_datos->descripcion_producto;
        $tipo_cambio = $json_datos->tipo_cambio;
        $stock = $json_datos->stock;
        $costo = $json_datos->costo;
        $margen = $json_datos->margen;
        $numero_interno = $json_datos->numero_interno;
        $numero_fabricacion = $json_datos->numero_fabricacion;

        $query = "insert into producto (
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
            )"; 
        $results = DB::insert($query);         
        return $results;
    }

    public static function eliminarProducto($id_producto){       
        $results = DB::delete("delete from producto 
        where id_producto = '".$id_producto."';");            
    return $results;
    }
}
