<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClienteModel;
use App\ProductoModel;
use App\Mail\MensajeRecibido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class DocumentoController extends Controller
{
  
    public function index()
    {
        return view('documento')
        ->with("clientes", ClienteModel::all())
        ->with("productos", ProductoModel::listProductos());
    }

    public function enviarPropuesta(Request $request){        
        $destinatario = $request["destinatario"];
        Mail::to($destinatario)->send( new MensajeRecibido);
        return 'Mensaje enviado';
    }

    public function guardarPDF(Request $request){
        $bpdf = $request["pdf"];
        file_put_contents('./documentos/propuesta.pdf', base64_decode($bpdf));
        return "OK";

    }
}
