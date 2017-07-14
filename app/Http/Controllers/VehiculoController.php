<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Http\Controllers\Controller;
use intransporte\Http\Requests\VehiculoGastoRequest;
use intransporte\Http\Requests\VehiculoRequest;
use intransporte\Tercero;
use intransporte\Vehiculo;
use Illuminate\Support\Facades\DB;
use intransporte\VehiculoGasto;
use intransporte\VehiculoTercero;


class VehiculoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //   $vehiculos = Vehiculo::all();
        $vehiculos = Vehiculo::withTrashed()->where('id', '>', 0)->get();
        return view('vehiculo.index', compact('vehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = Vehiculo::create([
            'placa' => $request->placa,
            'marca' => $request->marca,
            'modelo' => $request->modelo
        ]);
        return redirect('vehiculo')->with('message', 'vehiculo creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculo.editar', ['vehiculo' => $vehiculo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoRequest $request, $id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->fill($request->all());
        $vehiculo->save();
        return redirect('vehiculo/' . $id . '/edit')->with('message', 'vehiculo actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Vehiculo::find($id)->delete();
        return redirect('vehiculo')->with('message', 'Vehiculo deshabilitado correctamente');
    }

    public function habilitar($id)
    {
        $data = Vehiculo::withTrashed()->where('id', '=', $id)->restore();
        return redirect('vehiculo')->with('message', 'Vehiculo habilitado :)');
    }

    public function listaAsignacion()
    {
        $terceros = Tercero::where('es_empleado', '=', '1')->get();
        $vehiculos = DB::table('vehiculo')
            ->leftJoin('vehiculo_tercero', 'vehiculo.id', '=', 'vehiculo_tercero.vehiculo_id')
            ->leftJoin('tercero', 'tercero.id', '=', 'vehiculo_tercero.tercero_id')
            ->select('vehiculo.*', 'tercero.nombre as conductor_nombre', 'tercero.documento as coductor_documento', 'tercero.id as tercero_id')
            ->whereNull('fecha_retiro')
            ->paginate(9);
        return view('vehiculo.asignacion', ['vehiculos' => $vehiculos, 'terceros' => $terceros]);


    }

    public function asignarConductor(Request $request)
    {
        DB::table('vehiculo_tercero')
            ->where('vehiculo_tercero.vehiculo_id', '=', $request->vehiculo_id)
            ->update(['vehiculo_tercero.fecha_retiro' => date('Y-m-d')]);


        $var = new VehiculoTercero();
        $var->vehiculo_id = $request->vehiculo_id;
        $var->tercero_id = $request->tercero_id;
        $var->fecha_asignacion = date('Y-m-d');
        if ($var->save()) {
            return redirect('vehiculo/asignacion/lista')->with(['success' => 'Conductor asignado correctamente']);
        } else {
            return redirect('vehiculo/asignacion/lista')->with(['warning' => 'Conductor no pudo ser asignado. Intente nuevamente']);
        }
    }

    public function listaGastosVehiculos(Request $request)
    {

        if ($request->ajax()) {

            $lista_gastos = DB::table('vehiculo_gasto')
                ->leftJoin('vehiculo', 'vehiculo.id', '=', 'vehiculo_gasto.vehiculo_id')
                ->leftJoin('users', 'users.id', '=', 'vehiculo_gasto.user_id')
                ->select('vehiculo_gasto.id', 'vehiculo.id as vehiculo_id', 'vehiculo.placa', 'users.name as usuario_nombre',
                    'vehiculo_gasto.concepto', 'vehiculo_gasto.valor','vehiculo_gasto.fecha')
                ->orderBy('vehiculo_gasto.fecha','desc')->get();

            return response()->json(['gastos' => $lista_gastos]);
        }else{
            $vehiculos = Vehiculo::all();
            return view('vehiculo_gasto.lista',['vehiculos'=>$vehiculos]);
        }

    }

    public function guardarGastosVehiculos(VehiculoGastoRequest $request){
        $gasto = new VehiculoGasto($request->except('_token'));
        if(\Auth::user()->id != $gasto->user_id){
            return redirect('vehiculo/gastos/lista')->with(['warning' => 'Estas intentando registrar un gasto como otro usuario. Intenta de nuevo.']);
        }
        if($gasto->save()){
            return redirect('vehiculo/gastos/lista')->with(['success' => 'Gasto registrado correctamente correctamente']);
        }else{
            return redirect('vehiculo/gastos/lista')->with(['warning' => 'Gasto no pudo ser registrado. Intente nuevamente']);
        }
    }
}
