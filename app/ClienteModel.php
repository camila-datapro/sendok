<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ClienteModel extends Model
{
    protected $table = 'cliente_destino';
    public static function obtenerCliente($rutCliente){
        $results = DB::select("select * from cliente_destino where rut_cliente = '".$rutCliente."'" );
        return $results;
    }
}
