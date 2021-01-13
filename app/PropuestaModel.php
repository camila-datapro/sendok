<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropuestaModel extends Model
{
    public static function obtenerPropuesta($idPropuesta){
        $results = DB::select("select * from propuesta where id_propuesta = ".$idPropuesta."" );
        return $results;
    }
}
