<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Http\Requests\TerceroRequest;
use intransporte\Tercero;

class TercerosController extends Controller
{
    //
    public function index(){

    }

    //guardar tercero en la base de datos
    public function guardar(TerceroRequest $request){
        $tercero = new Tercero($request->all());
        $tercero->save();

    }
}
