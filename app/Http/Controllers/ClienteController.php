<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;


class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente');
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
