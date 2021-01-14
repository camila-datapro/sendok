<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;

class ClienteModel extends Model
{
    protected $table = 'cliente_destino';
    public static function obtenerCliente($rutCliente){
        $results = DB::select("select * from cliente_destino where rut_cliente = '".$rutCliente."'" );
        return $results;
    }

    public static function crearCliente($nombre, $rut, $email, $fono, $idRegion,$idProvincia,$idComuna,$direccion){       
            $results = DB::select("insert into cliente_destino (
            rut_cliente,
            nombre_cliente,
            fono_cliente,
            id_comuna_cliente,
            id_region_cliente,
            email_cliente,
            direccion_cliente
            ) VALUES (
                '".$rut."',
                '".$nombre."',   
                ".intval($fono).",      
                ".intval($idComuna).",       
                ".intval($idRegion).",            
                '".$email."',                
                '".$direccion."'
            )");

            Log::debug($results);
        return $results;
    }
}
