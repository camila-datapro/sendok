<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProvinciaModel;

class ProvinciaController extends Controller
{
    public function index(){
        return $this->getProvincias();
    }

    public function obtenerProvincias(){

        return json_encode(ProvinciaModel::getProvinciasByRegion(1));
    }
}
