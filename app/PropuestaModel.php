<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PropuestaModel extends Model
{
    
    public static function setPropuesta($datos){

       

        $id_ejecutivo = $datos->id_ejecutivo;
        $id_cliente = $datos->id_cliente;
        $id_producto=$datos->id_producto;
        $email_destino=$datos->email_destino;
        $unidades =$datos->unidades;
        $valor_s_iva =$datos->valor_s_iva;
        $iva =$datos->iva;
        $total=$datos->total;
        $nombre_cliente=$datos->nombre_cliente;
        $valor_unitario=$datos->valor_unitario;
        $nombre_producto=$datos->nombre_producto;
        $tipo_cambio=$datos->tipo_cambio;    

        $results = DB::select("insert
         into propuesta_comercial
        (
            id_ejecutivo,
            id_cliente,
            id_producto,
            email_destino,
            unidades,
            valor_s_iva,
            iva,
            total,
            nombre_cliente,
            valor_unitario,
            nombre_producto,
            tipo_cambio
         ) 
         VALUES
         (
            ".$id_ejecutivo.",
            ".$id_cliente.",
            ".$id_producto.",
            '".$email_destino."',
            ".$unidades.",
            ".$valor_s_iva.",
            ".$iva.",
            ".$total.",
            '".$nombre_cliente."',
            ".$valor_unitario.",
            '".$nombre_producto."',
            '".$tipo_cambio."'
         )");
        return $results;
    }
}
