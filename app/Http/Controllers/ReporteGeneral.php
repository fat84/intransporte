<?php

namespace intransporte\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use intransporte\Tercero;
use intransporte\Vehiculo;

class ReporteGeneral extends Controller
{
    //

    public function indexProductos()
    {
        $terceros = Tercero::all();
        return view('reportes.reporte_productos', ['terceros'=>$terceros]);
    }

    public function generarProductos(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFinal = $request->fecha_final;
        $tercero = $request->tercero;
        $obra = $request->obra;
        $terceros = Tercero::all();


        if($obra == '*'){
            $informacion_consolidado = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', 'despacho_detalle.despacho_id')
                ->where('despacho.tercero_id', '=', $tercero)
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('producto.id')
                ->get();

            $informacion_por_dias = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', 'despacho_detalle.despacho_id')
                ->where('despacho.tercero_id', '=', $tercero)
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('producto.id', DB::raw('Date(despacho_detalle.`created_at`)'))
                ->get();

            return view('reportes.reporte_productos', [
                'terceros' => $terceros,
                'tercero_sel' =>$tercero,
                'obra' => $obra,
                'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
                'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
            ]);
        }else{
            $informacion_consolidado = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', 'despacho_detalle.despacho_id')
                ->where('despacho.tercero_id', '=', $tercero)
                ->where('despacho.obra_id' , '=', $obra)
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('producto.id')
                ->get();

            $informacion_por_dias = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', 'despacho_detalle.despacho_id')
                ->where('despacho.tercero_id', '=', $tercero)
                ->where('despacho.obra_id' , '=', $obra)
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('producto.id', DB::raw('Date(despacho_detalle.`created_at`)'))
                ->get();

            return view('reportes.reporte_productos', [
                'terceros' => $terceros,
                'tercero_sel' =>$tercero,
                'obra' => $obra,
                'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
                'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
            ]);
        }
    }

    public function indexObras()
    {
        $terceros = Tercero::all();
        return view('reportes.reporte_obras',['terceros'=>$terceros]);
    }

    public function generarObras(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFinal = $request->fecha_final;
        $tercero = $request->tercero;
        $obra = $request->obra;
        $terceros = Tercero::all();



        if($obra == '*'){

            $informacion_consolidado = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
                ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
                ->leftJoin('tercero', 'tercero.id', '=', 'obra.tercero_id')
                ->where('tercero.id','=',$tercero)
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)

                ->selectRaw('obra.id as obra_id, obra.nombre as nombre_obra, tercero.nombre as tercero, producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('obra.id')
                ->get();

            $informacion_por_dias = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
                ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->leftJoin('tercero', 'tercero.id', '=', 'obra.tercero_id')
                ->where('tercero.id','=',$tercero)
                ->selectRaw('obra.id as obra_id, obra.nombre as nombre_obra, producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('obra.id', DB::raw('Date(despacho_detalle.`created_at`)'))
                ->get();


            return view('reportes.reporte_obras', [
                'terceros'=>$terceros,
                'tercero_sel' => $tercero,
                'obra' => $obra,
                'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
                'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
            ]);


        }else{
            $informacion_consolidado = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
                ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
                ->leftJoin('tercero', 'tercero.id', '=', 'obra.tercero_id')
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->where('tercero.id','=',$tercero)
                ->where('obra.id','=',$obra)
                ->selectRaw('obra.id as obra_id, obra.nombre as nombre_obra, tercero.nombre as tercero, producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('obra.id')
                ->get();

            $informacion_por_dias = DB::table('producto')
                ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
                ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
                ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
                ->leftJoin('tercero', 'tercero.id', '=', 'obra.tercero_id')
                ->where('despacho_detalle.created_at', '>=', $fechaInicio)
                ->where('despacho_detalle.created_at', '<=', $fechaFinal)
                ->where('tercero.id','=',$tercero)
                ->where('obra.id','=',$obra)
                ->selectRaw('obra.id as obra_id, obra.nombre as nombre_obra, producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
                ->groupBy('obra.id', DB::raw('Date(despacho_detalle.`created_at`)'))
                ->get();

            return view('reportes.reporte_obras', [
                'terceros'=>$terceros,
                'tercero_sel' => $tercero,
                'obra' => $obra,
                'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
                'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
            ]);

        }

    }


    public function indexVehiculos()
    {
        return view('reportes.reporte_vehiculos');
    }

    public function generarVehiculos(Request $request)
    {

        $fechaInicio = $request->fecha_inicio;
        $fechaFinal = $request->fecha_final;

        $informacion_consolidado = DB::table('producto')
            ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
            ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
            ->leftJoin('vehiculo_tercero', 'vehiculo_tercero.id', '=', 'despacho.vehiculo_tercero')
            ->leftJoin('vehiculo', 'vehiculo.id', '=', 'vehiculo_tercero.vehiculo_id')
            ->where('despacho_detalle.created_at', '>=', $fechaInicio)
            ->where('despacho_detalle.created_at', '<=', $fechaFinal)
            ->selectRaw('	vehiculo_tercero.id,
	        vehiculo.placa,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
            ->groupBy('vehiculo.id')
            ->get();

        $informacion_por_dias = DB::table('producto')
            ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
            ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
            ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
            ->leftJoin('vehiculo_tercero', 'vehiculo_tercero.id', '=', 'despacho.vehiculo_tercero')
            ->leftJoin('vehiculo', 'vehiculo.id', '=', 'vehiculo_tercero.vehiculo_id')
            ->where('despacho_detalle.created_at', '>=', $fechaInicio)
            ->where('despacho_detalle.created_at', '<=', $fechaFinal)
            ->selectRaw('	vehiculo_tercero.id,
	        vehiculo.placa, obra.nombre as nombre_obra,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
            ->groupBy('vehiculo.id', 'obra.id', DB::raw('Date(despacho_detalle.`created_at`)'))
            ->get();


        /*$gasto_vehiculo = DB::table('vehiculo')
            ->leftJoin('vehiculo_tercero', 'vehiculo_tercero.vehiculo_id', '=', 'vehiculo.id')
            ->leftJoin('despacho', 'despacho.vehiculo_tercero', '=', 'vehiculo_tercero.id')
            ->leftJoin('despacho_detalle', 'despacho_detalle.despacho_id', '=', 'despacho.id')
            ->leftJoin('vehiculo_gasto', 'vehiculo.id', '=', 'vehiculo_gasto.vehiculo_id')
            ->whereRaw("(vehiculo_gasto.fecha >= '$fechaInicio' AND vehiculo_gasto.fecha <= '$fechaFinal' )
            OR (despacho_detalle.created_at >= '$fechaInicio' AND despacho_detalle.created_at <= '$fechaFinal')")
            ->selectRaw('vehiculo.placa,count(vehiculo_gasto.id) as no_gastos,
                	CONCAT(vehiculo.marca, \' \', vehiculo.modelo) as vehiculo_info,
	                CASE WHEN sum(vehiculo_gasto.`valor`) IS NULL THEN 0 ELSE sum(vehiculo_gasto.`valor`) END as total_gasto,
	                CASE WHEN sum(despacho_detalle.`valor_unidad` * despacho_detalle.`cantidad`) IS NULL THEN -1 ELSE sum(despacho_detalle.`valor_unidad` * despacho_detalle.`cantidad`) END as total_ingreso')
            ->groupBy('vehiculo.id')
            ->get();*/

        $vehiculos = Vehiculo::all();

        return view('reportes.reporte_vehiculos', [
            'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
            'informacion_consolidado' => $informacion_consolidado,
            'informacion_por_dias' => $informacion_por_dias,
            //'gasto_vehiculos' => $gasto_vehiculo
            'vehiculos' => $vehiculos
        ]);
    }
}
