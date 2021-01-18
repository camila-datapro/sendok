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
        $clase = $request['clase'];
        $valor = $request['valor'];
        $descripcion = $request['descripcion'];   
        $tipo_cambio = $request['tipo_cambio'];       
        $stock = $request['stock']; 
        $costo = $request['costo']; 
        $margen = $request['margen']; 
        $numero_interno = $request['numero_interno']; 
        $numero_fabricacion = $request['numero_fabricacion']; 
        $response = ProductoModel::crearProducto($clase,$nombre,$valor,$descripcion,$tipo_cambio, $stock, $costo, $margen, $numero_interno, $numero_fabricacion);
        return $response;
    }

    public function removeProducto(Request $request){
        
        $id_producto = $request['id_producto'];
        return ProductoModel::eliminarProducto($id_producto);
    }
}
