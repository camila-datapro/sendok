<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;

class AdminClienteController extends Controller
{
    public function index()
    {
        return view('admin_cliente')
            ->with('clientes', ClienteModel::all());
    }
}
