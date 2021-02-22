<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductoModel;

class AdminProductoController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    public function index(){
        return view('admin_producto')
        ->with('productos',ProductoModel::listProductosOptimized());
    }
}
