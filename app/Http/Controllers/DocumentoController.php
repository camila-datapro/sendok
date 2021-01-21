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
        Mail::to('cfigueroa@datapro.cl')->send( new MensajeRecibido);
        return 'Mensaje enviado';
    }

    public function guardarPDF(Request $request){
        Log::debug("test");
        $bpdf = base64_encode($request["pdf"]);
        Log::debug($bpdf);
    
        file_put_contents('./pdf/'.'propuesta.pdf', base64_decode($bpdf));
        return "guardado PDF OK";

    }
}
