<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpresaModel extends Model
{
    public static function obtenerEmpresa($rutEmpresa){
        $results = DB::select("select * from empresa_origen where upper(rut_empresa) = upper('".$rutEmpresa."')" );
        return $results;
    }
}
