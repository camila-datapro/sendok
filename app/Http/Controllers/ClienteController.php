<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;
use App\RegionModel;
use App\ProvinciaModel;
use App\ComunaModel;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente')
            ->with('regiones', RegionModel::all())
            ->with('provincias', ProvinciaModel::all())
            ->with('comunas', ComunaModel::all());
    }

    private function getClientes(){
        return ClienteModel::all();
    }

    public function getCliente(Request $request){
        $id_cliente= $request["id_cliente"];
        return ClienteModel::obtenerCliente($id_cliente);
    }

    public function setCliente(Request $request){
        $json_datos= $request["json_datos"];
        $json_datos = str_replace("[","",$json_datos);
        $json_datos = str_replace("]","",$json_datos);
        $datos = json_decode($json_datos);
        return ClienteModel::crearCliente($datos);
    }

    public function removeCliente(Request $request){
        
        $id_cliente = $request['id_cliente'];
        return ClienteModel::eliminarCliente($id_cliente);
    }
}
