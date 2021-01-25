<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;
class PropuestaModel extends Model
{
    
    public static function setPropuesta($datos){

       // tipo_cambio -> $datos[0]        
       // id producto -> $datos[1]
       // nombre producto -> $datos[2]
       // unidades producto -> $datos[3]
       // valor unitario producto -> $datos[4]
       // subtotal por producto -> $datos[5]
       // subtotal suma de todos productos -> $datos[6]
       // total con iva -> $datos[7]
       // valor del iva -> $datos[8]
       // id ejecutivo -> $datos[9]
       // id cliente -> $datos[10]
       // email cliente -> $datos[11]
       // fono cliente -> $datos[12]
       // nombre cliente -> $datos[13]

        $id_ejecutivo = $datos[9]; //ok
        $id_cliente = $datos[10];
        $email_destino= $datos[11];
        $nombre_cliente= $datos[13];

        $id_producto=$datos[1];        
        $unidades =$datos[3];
        $valor_s_iva =$datos[6];
        $iva =$datos[8];
        $total=$datos[7];      
        $valor_unitario=$datos[4];
        $nombre_producto=$datos[2];
        $tipo_cambio=$datos[0];    

        $results = DB::insert("insert
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
            ".intval($id_ejecutivo).",
            ".intval($id_cliente).",
            '".$id_producto."',
            '".$email_destino."',
            '".$unidades."',
            '".intval($valor_s_iva)."',
            '".intval($iva)."',
            ".intval($total).",
            '".$nombre_cliente."',
            '".$valor_unitario."',
            '".$nombre_producto."',
            '".$tipo_cambio."'
         )");
        return $results;
    }

    public static function getLastId(){
        $query = "select max(id_propuesta) as numero_folio from propuesta_comercial;";
        $results = DB::select($query);
        return $results;
    }
}
