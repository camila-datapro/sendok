<?php

namespace App\Http\Controllers;


use App\ProvinciaModel;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    /**
     * index
     * Permite obtener todo el listado de provincias desde base de datos
     * @group ProvinciaController
     * @return array array Listado de provincias
     */
    public function index(){
        return $this->getProvincias();
    }

    public function test(Request $request){
        return ProvinciaModel::all();
    }

    /**
     * getProvincias
     * Permite obtener el listado de provincias asociados a un identificador único de region
     * @bodyParam request array array que contiene los datos de request y el id de region
     * @group ProvinciaController
     * @return array array Listado de provincias
     */
    public function getProvincias(Request $request){
       $idRegion = $request['id'];
        return json_encode(ProvinciaModel::getProvinciasByRegion($idRegion));
    }
}
