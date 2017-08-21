<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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
            ->select('tercero.nombre as nombreTercero','despacho.numero','despacho.created_at as fecha',
                'obra.nombre as nombreObra','users.name as nombreVendedor','despacho.prefijo','despacho.id as idDespacho')
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
        //
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
