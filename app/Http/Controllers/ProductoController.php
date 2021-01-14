<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoModel;
class ProductoController extends Controller
{

    public function index()
    {
        return view('producto');
    }

    public function setProducto(Request $request){

        $nombre = $request['nombre'];
        $id_tipo = $request['id_tipo'];
        $valor = $request['valor'];
        $descripcion = $request['descripcion'];        
        $response = ProductoModel::crearProducto($id_tipo,$nombre,$valor,$descripcion);
        return $response;
    }
}
