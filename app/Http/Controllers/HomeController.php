<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropuestaModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')
        ->with("propuestas_30_dias", PropuestaModel::getEstUltimosTreinta())
        ->with("propuestas_total", PropuestaModel::getEstTotales())
        ->with("propuestas_enviadas", PropuestaModel::getEstEnviadas())
        ->with("enviadas_30_dias", PropuestaModel::getEstEnviadasUltimosTreinta());
    }
}
