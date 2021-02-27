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

    public static function filtrarProductos($array_datos){
        Log::debug($array_datos);
        $nombre = $array_datos["nombre"];
        $sku = $array_datos["sku"];
        $descripcion = $array_datos["descripcion"];
        $query = "select * from producto";
        if($nombre!=""||$sku!=""||$descripcion!=""){
            $query = $query." where ";
        }
        if($nombre!=""){
            $query = $query." upper(nombre_producto) like upper('%".$nombre."%')";
        }
        if($sku!=""){
            $query = $query." upper(numero_interno) like upper('%".$sku."%')";
        }
        if($descripcion!=""){
            $query = $query." upper(descripcion_producto) like upper('%".$descripcion."%')";
        }
        Log::debug($query);
        $results = DB::select($query);
        
        return $results;
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


    
    public static function editarProducto($json_datos){
        $array_datos = json_decode($json_datos,true);
        $array_datos = $array_datos[0];
        $nombre = $array_datos["nombre_producto"];
        $valor = $array_datos["valor_producto"];
        $descripcion = $array_datos["descripcion_producto"];
        $tipo_cambio = $array_datos["tipo_cambio"];
        $stock = $array_datos["stock"];
        $costo = $array_datos["costo"];
        $margen = $array_datos["margen"];
        $numero_interno = $array_datos["numero_interno"];
        $numero_fabricacion = $array_datos["numero_fabricacion"];
        $tiene_folleto = $array_datos["tiene_folleto"];
        $nombre_proveedor = $array_datos["nombre_proveedor"];
        $id_producto = $array_datos["id_producto"];

        $query = "update producto 
        set           
            nombre_producto = '".$nombre."', 
            valor_producto = ".intval($valor).",   
            descripcion_producto =  '".$descripcion."',
            tipo_cambio = '".$tipo_cambio."',
            stock =".intval($stock).",
            costo = ".intval($costo).",
            margen = ".intval($margen).",
            numero_interno = '".$numero_interno."',
            numero_fabricacion = '".$numero_fabricacion."',
            tiene_folleto = ".intval($tiene_folleto).",
            proveedor = '".$nombre_proveedor."'
        where id_producto = ".intval($id_producto)."";
        $results = DB::update($query);         
        return $results;
    }


    public static function insertarProductos($productos_json){
        $productos = json_decode($productos_json,true);
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
