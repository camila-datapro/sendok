<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropuestaController extends Controller
{
  
    public function index()
    {
        return view('propuesta');
    }
}
