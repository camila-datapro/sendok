<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
use Illuminate\Support\Facades\Crypt;
use \Auth;
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
        $puerto = $array_datos["port"];
        $encriptacion = $array_datos["encriptacion"];
        $id_usuario = $array_datos["id_usuario"];
        

        $query = "update users
        set
            nombre_smtp = '".Crypt::encryptString($nombre)."',
            email_smtp = '".Crypt::encryptString($email)."',
            password_smtp = '".Crypt::encryptString($password)."',
            host_smtp = '".Crypt::encryptString($host)."',
            encriptacion_smtp = '".Crypt::encryptString($encriptacion)."',
            port_smtp = '".Crypt::encryptString($puerto)."'
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

    public static function obtenerDatosSMTPUsuario($id){
        $query = "select nombre_smtp,email_smtp, password_smtp, host_smtp,port_smtp,encriptacion_smtp from users where id=".intval($id)."";
        $usuario = DB::select($query);
        $datos = json_decode(json_encode($usuario),true);
        $datos = $datos[0];
        $datos["nombre_smtp"] = ($datos["nombre_smtp"]==NULL|| $datos["nombre_smtp"]=='')?"":Crypt::decryptString($datos["nombre_smtp"]);
        $datos["email_smtp"] = ($datos["email_smtp"]==NULL|| $datos["email_smtp"]=='')?"":Crypt::decryptString($datos["email_smtp"]);
        $datos["password_smtp"] = ($datos["password_smtp"]==NULL|| $datos["password_smtp"]=='')?"":Crypt::decryptString($datos["password_smtp"]);
        $datos["host_smtp"] = ($datos["host_smtp"]==NULL|| $datos["host_smtp"]=='')?"":Crypt::decryptString($datos["host_smtp"]);
        $datos["port_smtp"] = ($datos["port_smtp"]==NULL|| $datos["port_smtp"]=='')?"":Crypt::decryptString($datos["port_smtp"]);
        
        
        $datos["encriptacion_smtp"] = ($datos["encriptacion_smtp"]==NULL|| $datos["encriptacion_smtp"]=='')?"":Crypt::decryptString($datos["encriptacion_smtp"]);
        return $datos;

    }


}
