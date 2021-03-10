<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PHPDocumentador extends Controller
{
    //
    public function index()
    {
        return view('apidoc/index');
    }
}
