<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinciaModel extends Model
{
    protected $table = "provincia";

    public static function getProvinciasByRegion($idRegion){
        $results = DB::select("select * from provincia where id = ".$idProvincia."" );
        return $results;
    }
}
