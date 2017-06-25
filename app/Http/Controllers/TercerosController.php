<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Ciudad;
use intransporte\Http\Requests\TerceroRequest;
use intransporte\Tercero;
use Yajra\Datatables\Datatables;

class TercerosController extends Controller
{

    public function index(Request $request){
        if ($request->ajax()) {
            $terceros = Tercero::all();
            return response()->json(['terceros'=>$terceros]);
        }
        return view('terceros.lista');

    }



    //guardar tercero en la base de datos
    public function guardar(TerceroRequest $request){

        //dd($request->ciudad_id);
        $tercero = new Tercero($request->except('_token'));
        $tercero->save();

    }


    public function editarForm($id){
        $tercero = Tercero::find($id);
        $ciudades = Ciudad::OrderBy('nombre_ciudad','asc');
        return view('terceros.editar',['tercero'=>$tercero, 'ciudades'=>$ciudades]);
    }


    public function editar(TerceroRequest $request){
        $tercero = Tercero::find($request->id);

    }
}
