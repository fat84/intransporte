<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;

class ReporteEspecificoController extends Controller
{
    //

    public function indexProducto(){
        return view('reportes.reporte_productos');
    }
}
