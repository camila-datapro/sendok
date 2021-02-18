<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoModel;
use Illuminate\Support\Facades\Log;
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

    public function insertarProductos(Request $request){
        $array_productos = $request["productos"];
        $response = ProductoModel::insertarProductos($array_productos);
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

    public function listProductos(Request $request){
        return ProductoModel::listProductos();

    }

    public function listProductosOptimized(Request $request){
        return ProductoModel::listProductosOptimized();

    }

    public function editarProducto(Request $request){
        $datos = $request["json_datos"];
        return ProductoModel::editarProducto($datos);
    }

}
