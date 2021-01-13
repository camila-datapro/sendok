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

    private function getCliente($rutCliente){
        return ClienteModel::obtenerCliente($rutCliente);
    }

    public function setCliente(Request $request){
        
        $nombre = $request['nombre'];
        $rut = $request['rut'];
        $email = $request['email'];
        $fono = $request['fono'];
        $idRegion = $request['idRegion'];
        $idProvincia = $request['idProvincia'];
        $idComuna = $request['idComuna'];
        $direccion = $request['direccion'];
        Log::debug("paso por setCliente");
        Log::debug(var_dump($request));
        return ClienteModel::crearCliente($nombre, $rut, $email, $fono, $idRegion,$idProvincia,$idComuna,$direccion);
    }
}
