<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComunaModel extends Model
{
    protected $table = "comuna";
    public static function obtenerCliente($idComuna){
        $results = DB::select("select * from comuna where id = '".$idComuna."'" );
        return $results;
    }
}
