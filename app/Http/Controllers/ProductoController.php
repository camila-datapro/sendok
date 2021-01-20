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

        $json_datos= $request["json_datos"];
        $json_datos = str_replace("[","",$json_datos);
        $json_datos = str_replace("]","",$json_datos);
        $datos = json_decode($json_datos);
        $response = ProductoModel::crearProducto($datos);
        return $response;
    }

    public function removeProducto(Request $request){
        
        $id_producto = $request['id_producto'];
        return ProductoModel::eliminarProducto($id_producto);
    }

    public function getProducto(Request $request){
        
        $id_producto = $request['id_producto'];
        return ProductoModel::obtenerProducto($id_producto);
    }
}
