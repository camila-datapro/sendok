<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropuestaModel;
use App\ClienteModel;
use App\ProductoModel;

class AdminDocumentoController extends Controller
{
    public function index(){
        return view('admin_documento')
        ->with("propuestas", PropuestaModel::all())
        ->with("clientes", ClienteModel::all())
        ->with("productos", ProductoModel::listProductos());
    }

}
