<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use intransporte\Despacho;
use intransporte\DespachoDetalle;
use intransporte\Venta;
use intransporte\Venta_detalle;
use Barryvdh\DomPDF\PDF;
class FacturacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $despacho = DB::table('despacho')
            ->leftJoin('tercero','tercero.id','=','despacho.tercero_id')
            ->leftJoin('obra','obra.id','=','despacho.obra_id')
            ->leftJoin('users','users.id','=','despacho.usuario_id')
            ->leftJoin('despacho_detalle','despacho_detalle.despacho_id','=','despacho.id')
            ->leftJoin('venta_detalle','venta_detalle.despacho_detalle_id','despacho_detalle.id')
            ->where('venta_detalle.id', '=', null)
            ->select('tercero.nombre as nombreTercero','despacho.numero','despacho.created_at as fecha',
                'obra.nombre as nombreObra','users.name as nombreVendedor','despacho.prefijo','despacho.id as idDespacho')
            ->groupBy('despacho.id')
            ->get();
        return view('facturacion.facturacion',compact('despacho'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $idDespachos = $request->idDespachos;

        foreach ($idDespachos as $idDespacho) {
            $des = Despacho::find($idDespacho);
            $des_detalle = DespachoDetalle::where('despacho_id', '=', $des->id)->get();
            $venta = new Venta;
            $venta->tercero_id = $des->tercero_id;
            $venta->numero = $request->numero_factura;
            $venta->user_id = \Auth::user()->id;
            $venta->total = 0;
            $venta->iva = 0;
            $venta->subtotal = 0;
            $venta->save();
            foreach ($des_detalle as $des_detalles) {
                $venta_detalle = new Venta_detalle;
                $venta_detalle->venta_id = $venta->id;
                $venta_detalle->despacho_detalle_id = $des_detalles->id;
                $venta_detalle->save();
            }
        }
        return response()->json([
            'idVenta'=>$venta->id
        ]);
    }
    public function facturaExiste(Request $request){
        $venta = Venta::where('numero','=',$request->numero_factura)->first();
        return response()->json([
            'venta'=> $venta
        ]);
    }

    public function pdfVenta($id){
        $venta = Venta::find($id);
        $venta_detalle = Venta_detalle::where('venta_id','=',$id)->get();
        $view =  \View::make('ventas.pdf', compact('venta','venta_detalle'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
