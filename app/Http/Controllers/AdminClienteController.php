<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;
use App\RegionModel;
use App\ProvinciaModel;
use App\ComunaModel;

class AdminClienteController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index()
    {
        return view('admin_cliente')
            ->with('clientes', ClienteModel::all())
            ->with('regiones', RegionModel::all())
            ->with('provincias', ProvinciaModel::all())
            ->with('comunas', ComunaModel::all());
    }
}
