<?php

namespace intransporte\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteGeneral extends Controller
{
    //

    public function indexProductos()
    {
        return view('reportes.reporte_productos');
    }

    public function generarProductos(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFinal = $request->fecha_final;

        $informacion_consolidado = DB::table('producto')
            ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
            ->where('despacho_detalle.created_at', '>=', $fechaInicio)
            ->where('despacho_detalle.created_at', '<=', $fechaFinal)
            ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
            ->groupBy('producto.id')
            ->get();

        $informacion_por_dias = DB::table('producto')
            ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
            ->where('despacho_detalle.created_at', '>=', $fechaInicio)
            ->where('despacho_detalle.created_at', '<=', $fechaFinal)
            ->selectRaw('producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
            ->groupBy('producto.id', DB::raw('Date(despacho_detalle.`created_at`)'))
            ->get();

        return view('reportes.reporte_productos', [
            'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
            'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
        ]);
    }

    public function indexObras()
    {
        return view('reportes.reporte_obras');
    }

    public function generarObras(Request $request)
    {
        $fechaInicio = $request->fecha_inicio;
        $fechaFinal = $request->fecha_final;

        $informacion_consolidado = DB::table('producto')
            ->leftJoin('despacho_detalle', 'despacho_detalle.producto_id', '=', 'producto.id')
            ->leftJoin('despacho', 'despacho.id', '=', 'despacho_detalle.despacho_id')
            ->leftJoin('obra', 'obra.id', '=', 'despacho.obra_id')
            ->leftJoin('tercero', 'tercero.id', '=', 'obra.tercero_id')
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
            ->selectRaw('obra.id as obra_id, obra.nombre as nombre_obra, producto.codigo, producto.nombre, producto.valor_und,
            count(despacho_detalle.despacho_id) as num_despachos, sum(despacho_detalle.cantidad) as cantidad_total,
            DATE(despacho_detalle.`created_at`) as fecha')
            ->groupBy('obra.id', DB::raw('Date(despacho_detalle.`created_at`)'))
            ->get();

        return view('reportes.reporte_obras', [
            'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
            'informacion_consolidado' => $informacion_consolidado, 'informacion_por_dias' => $informacion_por_dias
        ]);

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


        $gasto_vehiculo = DB::table('vehiculo')
            ->leftJoin('vehiculo_gasto', 'vehiculo.id', '=', 'vehiculo_gasto.vehiculo_id')
            ->where('vehiculo_gasto.fecha', '>=', $fechaInicio)
            ->where('vehiculo_gasto.fecha', '<=', $fechaFinal)
            ->selectRaw('vehiculo.placa,count(vehiculo_gasto.id) as no_gastos,
                	CONCAT(vehiculo.marca, \' \', vehiculo.modelo) as vehiculo_info,
	                CASE WHEN sum(vehiculo_gasto.`valor`) IS NULL THEN 0 ELSE sum(vehiculo_gasto.`valor`) END as total_gasto')
            ->groupBy('vehiculo.id')
            ->get();

        return view('reportes.reporte_vehiculos', [
            'fecha_inicio' => $fechaInicio, 'fecha_final' => $fechaFinal,
            'informacion_consolidado' => $informacion_consolidado,
            'informacion_por_dias' => $informacion_por_dias,
            'gasto_vehiculos' => $gasto_vehiculo
        ]);
    }
}
