<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Support\Facades\Log;

class ClienteModel extends Model
{
    protected $table = 'cliente_destino';

    public static function obtenerCliente($id_cliente){
        $results = DB::select("select * from cliente_destino where id_cliente = '".$id_cliente."'" );
        return $results;
    }

    public static function crearCliente($json_datos){    


        $nombre = $json_datos->nombre;
        $rut = $json_datos->rut;
        $email = $json_datos->email;
        $fono = $json_datos->fono;
        $idRegion = $json_datos->id_region;
        $idProvincia = $json_datos->id_provincia;
        $idComuna = $json_datos->id_comuna;
        $direccion = $json_datos->direccion;
        $contacto_nombre = $json_datos->nombre_contacto;
        $contacto_cargo = $json_datos->cargo_contacto;

        $query = "insert into cliente_destino (
            rut_cliente,
            nombre_cliente,
            fono_cliente,
            id_comuna_cliente,
            id_provincia_cliente,
            id_region_cliente,
            email_cliente,
            direccion_cliente,
            nombre_contacto,
            cargo_contacto
            ) VALUES (
                '".$rut."',
                '".$nombre."',   
                ".intval($fono).",      
                ".intval($idComuna).",  
                ".intval($idProvincia).",     
                ".intval($idRegion).",            
                '".$email."',                
                '".$direccion."',
                '".$contacto_nombre."',
                '".$contacto_cargo."'
            )";
        $results = DB::insert($query);                            
        return $results;
    }

    public static function eliminarCliente($id_cliente){       
        $results = DB::delete("delete from cliente_destino 
        where id_cliente = '".$id_cliente."';");            
    return $results;
    }


    public static function editarCliente($json_datos){    
        $array_datos = json_decode($json_datos,true);
        $json_datos = $array_datos[0];
        $id_cliente = $json_datos["id_cliente"];
        $nombre = $json_datos["nombre"];
        $rut = $json_datos["rut"];
        $email = $json_datos["email"];
        $fono = $json_datos["fono"];
        $idRegion = $json_datos["id_region"];
        $idProvincia = $json_datos["id_provincia"];
        $idComuna = $json_datos["id_comuna"];
        $direccion = $json_datos["direccion"];
        $contacto_nombre = $json_datos["nombre_contacto"];
        $contacto_cargo = $json_datos["cargo_contacto"];

        $query = "update cliente_destino 
        set
            rut_cliente ='".$rut."',
            nombre_cliente ='".$nombre."', 
            fono_cliente =".intval($fono).",    
            id_comuna_cliente =".intval($idComuna).",  
            id_provincia_cliente =".intval($idProvincia).", 
            id_region_cliente =".intval($idRegion).", 
            email_cliente ='".$email."', 
            direccion_cliente ='".$direccion."',
            nombre_contacto ='".$contacto_nombre."',
            cargo_contacto ='".$contacto_cargo."'
            where id_cliente = '".intval($id_cliente)."'";

        $results = DB::update($query);                            
        return $results;
    }

}
