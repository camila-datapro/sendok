<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class ProductoModel extends Model
{
    public static function listProductos(){
        $results = DB::select("select * from producto" );
        return $results;
    }

    public static function listProductosOptimized(){
        $results = DB::select("select * from producto" );
        return json_encode($results);
    }

    public static function obtenerProducto($idProducto){
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
        $tiene_folleto = $json_datos->tiene_folleto;
        $nombre_proveedor = $json_datos->nombre_proveedor;

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
            numero_fabricacion,
            tiene_folleto,
            proveedor
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
                '".$numero_fabricacion."',
                ".intval($tiene_folleto).",
                '".$nombre_proveedor."'
            )"; 
        $results = DB::insert($query);         
        return $results;
    }


    public static function insertarProductos($productos_json){
        $productos = json_decode($productos_json,true);
        Log::debug($productos);
        for($i=0;$i<(sizeOf($productos)-1);$i++){
        $clase = "producto";
        $nombre = $productos[$i]["nombre_producto"];
        $valor = $productos[$i]["valor_producto"];
        $descripcion = $productos[$i]["descripcion_producto"];
        $tipo_cambio = "usd";
        $stock = $productos[$i]["stock"];
        $costo = $productos[$i]["costo"];
        $margen = $productos[$i]["margen"];
        $numero_interno = $productos[$i]["numero_interno"];
        $numero_fabricacion = $productos[$i]["numero_fabricacion"];
        $nombre_proveedor = $productos[$i]["nombre_proveedor"];
        $tiene_folleto = 0;

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
            numero_fabricacion,
            tiene_folleto,
            proveedor            
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
                '".$numero_fabricacion."',
                ".intval($tiene_folleto).",
                '".$nombre_proveedor."'
            )"; 
        $results = DB::insert($query);  
        }       
        return $results;
    }


    public static function eliminarProducto($id_producto){       
        $results = DB::delete("delete from producto 
        where id_producto = '".$id_producto."';");            
    return $results;
    }
}
