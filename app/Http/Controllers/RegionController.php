<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RegionModel;

class RegionController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
}

    
    public function index(){
        return $this->getRegiones();
    }

    public function getRegiones(){

        return json_encode(RegionModel::all());
    }
}
