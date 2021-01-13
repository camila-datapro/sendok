<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    public static function obtenerRegion($idRegion){
        $results = DB::select("select * from region where id = ".$idRegion."" );
        return $results;
    }
}
