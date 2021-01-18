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
        $tipo_cambio = $request['tipo_cambio'];       
        $stock = $request['stock']; 
        $costo = $request['costo']; 
        $margen = $request['margen']; 
        $response = ProductoModel::crearProducto($id_tipo,$nombre,$valor,$descripcion,$tipo_cambio, $stock, $costo, $margen);
        return $response;
    }

    public function removeProducto(Request $request){
        
        $id_producto = $request['id_producto'];
        return ProductoModel::eliminarProducto($id_producto);
    }
}
