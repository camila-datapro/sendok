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


    public function index(){
        return $this->getProvincias();
    }

    public function test(Request $request){
        return ProvinciaModel::all();
    }

    public function getProvincias(Request $request){
       $idRegion = $request['id'];
        return json_encode(ProvinciaModel::getProvinciasByRegion($idRegion));
    }
}
