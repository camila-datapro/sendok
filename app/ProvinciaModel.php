<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinciaModel extends Model
{
    public static function obtenerProvincia($idProvincia){
        $results = DB::select("select * from provincia where id = ".$idProvincia."" );
        return $results;
    }
}
