<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Ciudad;
use intransporte\Http\Requests\ObraRequest;
use intransporte\Obra;
use Illuminate\Support\Facades\DB;
use intransporte\Tercero;

class ObraController extends Controller
{
    //
    public function index(Request $request){
        if ($request->ajax()) {
            $terceros = DB::table('obra')
                ->leftJoin('ciudad','ciudad.id','=','obra.ciudad_id')
                ->leftJoin('tercero','tercero.id','=','obra.tercero_id')
                ->select('obra.*', 'ciudad.nombre_ciudad', 'ciudad.nombre_departamento','tercero.nombre as nombre_tercero')->get();

            return response()->json(['obras'=>$terceros]);
        }
        return view('obras.lista');
    }

    public function guardar(ObraRequest $request){
        $obra = new Obra($request->all());
        $mensaje = 'error';
        if ($obra->save()){
            $mensaje='ok';
        }
        return redirect('/obras')->with(['mensaje'=>$mensaje]);
    }

    public function editar($id){
        $obra = Obra::find($id);
        $terceros = Tercero::all();
        $ciudades = Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
        return view('obras.editar',['obra'=>$obra, 'terceros'=>$terceros, 'ciudades'=>$ciudades]);
    }

    public function guardarEditar(ObraRequest $request){
        $obra = Obra::find($request->id);
        $obra->nombre = $request->nombre;
        $obra->tercero_id = $request->tercero_id;
        $obra->ciudad_id = $request->ciudad_id;
        $obra->direccion = $request->direccion;
        $obra->telefono = $request->telefono;
        $obra->encargado = $request->encargado;
        $obra->activo = $request->activo;
        $mensaje = 'error';
        if ($obra->save()){
            $mensaje='ok';
        }
        return redirect('/obras')->with(['mensaje'=>$mensaje]);
    }



}
