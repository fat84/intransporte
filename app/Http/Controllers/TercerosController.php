<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Ciudad;
use intransporte\Http\Requests\TerceroRequest;
use intransporte\Tercero;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

class TercerosController extends Controller
{

    public function index(Request $request){
        if ($request->ajax()) {
            $terceros = DB::table('tercero')
                ->leftJoin('ciudad','ciudad.id','=','tercero.ciudad_id')
                ->select('tercero.*', 'ciudad.nombre_ciudad', 'ciudad.nombre_departamento')->get();

            return response()->json(['terceros'=>$terceros]);
        }
        return view('terceros.lista');

    }



    //guardar tercero en la base de datos
    public function guardar(TerceroRequest $request){

        //dd($request->ciudad_id);
        $tercero = new Tercero($request->except('_token'));
        $mensaje = "error";
        if($tercero->save()){
            $mensaje = "tercero agregado correctamente";
        }
        if($tercero->es_cliente == '1'){
            return redirect('/obras/nuevo/'.$tercero->id)->with(['success'=>$mensaje.', ahora puede agregarle obras para poder hacerle despachos']);
        }
        return redirect('/terceros')->with(['success'=>$mensaje]);

    }


    public function editarForm($id){
        $tercero = Tercero::find($id);
        $ciudades = Ciudad::orderBy('nombre_ciudad', 'ASC')->get();
        return view('terceros.editar',['tercero'=>$tercero, 'ciudades'=>$ciudades]);
    }


    public function editar(TerceroRequest $request){
        $tercero = Tercero::find($request->id);
        $tercero->nombre = $request->nombre;
        $tercero->tipo_persona = $request->tipo_persona;
        $tercero->tipo_documento = $request->tipo_documento;
        $tercero->documento = $request->documento;
        $tercero->correo = $request->correo;
        $tercero->direccion = $request->direccion;
        $tercero->ciudad_id = $request->ciudad_id;
        $tercero->telefono = $request->telefono;
        $tercero->es_cliente = $request->es_cliente;
        $tercero->es_empleado = $request->es_empleado;
        $tercero->es_proveedor = $request->es_proveedor;
        $mensaje = "error";
        if($tercero->save()){
            $mensaje = "ok";
        }
        return redirect('/terceros')->with(['mensaje'=>$mensaje]);
    }
}
