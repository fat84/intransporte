<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Http\Requests\TerceroRequest;
use intransporte\Tercero;

class TercerosController extends Controller
{
    //
    public function index(){
        $terceros = Tercero::OrderBy('nombre','asc');
        return view('terceros.lista',['terceros'=>$terceros]);

    }

    //guardar tercero en la base de datos
    public function guardar(TerceroRequest $request){

        //dd($request->ciudad_id);
        $tercero = new Tercero($request->except('_token'));
        $tercero->save();

    }
}
