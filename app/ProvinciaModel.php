<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ProvinciaModel extends Model
{
    protected $table = "provincia";

    public static function getProvinciasByRegion($idRegion){
        $results = DB::select("select * from provincia where region_id = ".$idRegion."" );
        return $results;
    }

}
