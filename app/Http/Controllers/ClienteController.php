<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;
use App\RegionModel;
use App\ProvinciaModel;
use App\ComunaModel;

class ClienteController extends Controller
{
    public function index()
    {

        return view('cliente')
            ->with('regiones', RegionModel::all())
            ->with('provincias', ProvinciaModel::all())
            ->with('comunas', ComunaModel::all());
        //return ClienteModel::all();
        //return $this->getCliente("11111111-1");
    }

    private function getClientes(){
        return ClienteModel::all();
    }

    private function getCliente($rutCliente){
        return ClienteModel::obtenerCliente($rutCliente);
    }
}
