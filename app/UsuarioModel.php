<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Crypt;
/**
 * Para escriptar los string debe utilizar
 * Crypt::encryptString())
 * 
 * Para desencriptar
 * Crypt::decryptString()
 */
class UsuarioModel extends Model
{
    protected $table = "users";

    public static function editarUsuario($json_datos){
        $array_datos = json_decode($json_datos,true);
        $array_datos = $array_datos[0];
        $nombre = $array_datos["nombre"];
        $email = $array_datos["email"];
        $cargo = $array_datos["cargo"];
        $fono = $array_datos["fono"];
        $id_usuario = $array_datos["id_usuario"];        
    
        $query = "update users 
        set           
            name = '".$nombre."', 
            email = '".$email."',   
            cargo =  '".$cargo."',
            fono = '".$fono."'
        where id = ".intval($id_usuario)."";
        Log::debug($query);
        $results = DB::update($query);         
        return $results;
    }

    public static function modificarSMTP($json_datos){
        $array_datos = json_decode($json_datos,true);
        $array_datos = $array_datos[0];
        $nombre = $array_datos["nombre"];
        $email = $array_datos["email"];
        $password = $array_datos["password"];
        $host = $array_datos["host"];
        $encriptacion = $array_datos["encriptacion"];
        $id_usuario = $array_datos["id_usuario"];

        $query = "update users
        set
            nombre_smtp = '".Crypt::encryptString($nombre)."',
            email_smtp = '".Crypt::encryptString($email)."',
            password_smtp = '".Crypt::encryptString($password)."',
            host_smtp = '".Crypt::encryptString($host)."',
            encriptacion_smtp = '".Crypt::encryptString($encriptacion)."'
            where id = ".intval($id_usuario)."";

        $results = DB::update($query);
        return $results;
    }

    public static function crearUsuario($datos){
        $query = "insert into users(
            name,
            email,
            cargo,
            fono,
            password
        ) values(
            '".$datos["name"]."',
            '".$datos["email"]."',
            '".$datos["cargo"]."',
            ".intval($datos["fono"]).",
            '".$datos["password"]."'
        )";

        $results = DB::insert($query);
        return $results;

    }
}
