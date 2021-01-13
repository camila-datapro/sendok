<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ComunaModel extends Model
{
    protected $table = "comuna";

    public static function getComunasByProvincia($idProvincia){
        $results = DB::select("select * from comuna where provincia_id = '".$idProvincia."'" );
        return $results;
    }
}
