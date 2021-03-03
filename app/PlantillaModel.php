<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use DB;
class PlantillaModel extends Model
{
    protected $table = "plantilla_correo";

    public static function crearPlantilla($json_datos){
        $array_datos = json_decode($json_datos,true);
        $array_datos = $array_datos[0];
        $nombre = $array_datos["nombre"];
        $asunto = $array_datos["asunto"];
        $cuerpo = $array_datos["cuerpo"];
        $id_usuario = $array_datos["id_usuario"];
        $results = DB::insert("insert into plantilla_correo(
            nombre_plantilla,
            asunto,
            cuerpo_mensaje,
            id_usuario_plantilla
        ) 
        values(
            '".$nombre."',
            '".$asunto."',
            '".$cuerpo."',
            ".intval($id_usuario)."
        )" );
        return $results;
    }

    public static function editarPlantilla($json_datos){
        $array_datos = json_decode($json_datos,true);
        $array_datos = $array_datos[0];
        $nombre = $array_datos["nombre"];
        $asunto = $array_datos["asunto"];
        $cuerpo = $array_datos["cuerpo"];
        $id_plantilla = $array_datos["id_plantilla"];
        $results = DB::update("update plantilla_correo
        set 
            nombre_plantilla ='".$nombre."',
            asunto = '".$asunto."',
            cuerpo_mensaje = '".$cuerpo."'
        ) 
       where id = ".intval($id_plantilla)."" );
        return $results;
    }

    public static function listPlantillas(){
        $results = DB::select("select * from plantilla_correo");
        return $results;
    }

    public static function eliminarPlantilla($id_plantilla){       
        $results = DB::delete("delete from plantilla_correo 
        where id = '".$id_plantilla."';");            
    return $results;
    }
}
