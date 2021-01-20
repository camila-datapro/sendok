<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;
use App\ProductoModel;
use App\Mail\MensajeRecibido;
use Illuminate\Support\Facades\Mail;

class DocumentoController extends Controller
{
  
    public function index()
    {
        return view('documento')
        ->with("clientes", ClienteModel::all())
        ->with("productos", ProductoModel::obtenerTodosProductos());

    }

    public function enviarPropuesta(Request $request){
        Session::put('pdf_64', $request["pdf_64"]);
        Mail::to('cfigueroa@datapro.cl')->send( new MensajeRecibido);
        return 'Mensaje enviado';
    }
}
