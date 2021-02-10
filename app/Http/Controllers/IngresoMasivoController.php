<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IngresoMasivoController extends Controller
{
    public function index()
    {
        return view('ingreso_masivo');
    }

}
