<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;

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
}
