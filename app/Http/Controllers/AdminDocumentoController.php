<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropuestaModel;
use App\ClienteModel;
use App\ProductoModel;

class AdminDocumentoController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}
    /**
     * index
     * Carga vista de administrador de documento con precarga de consulta a base de datos de clientes , propuestas y productos
     * @group AdminDocumentoController
     */
    public function index(){
 
  
    	$propuestas = PropuestaModel::all()->sortByDesc("fecha_creacion");


        return view('admin_documento')
        ->with("propuestas", $propuestas)
        ->with("clientes", ClienteModel::listarClientes())
        ->with("productos", ProductoModel::listProductos());
    }

}
