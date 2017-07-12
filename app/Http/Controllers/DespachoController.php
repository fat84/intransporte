<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Despacho;
use intransporte\DespachoDetalle;
use intransporte\Http\Controllers\Controller;
use Cart;
use intransporte\Obra;
use intransporte\Producto;
use intransporte\Tercero;
use intransporte\Vehiculo;
use intransporte\VehiculoTercero;
use DB;

class DespachoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terceros = Tercero::all();
        $productos = Producto::all();
        $vehiculo_tercero = VehiculoTercero::all();

        return view('despachos.index',compact('terceros','productos','vehiculo_tercero'));
    }

    public function consultarObras(Request $request){

        $obras = Obra::where('tercero_id','=',$request->idTercero)->get();

        return response()->json([
            'resultado'=> $obras
        ]);
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
        $producto = Producto::find($request->idProducto);
        $cart = Cart::add(['id' => $producto->id, 'name' => $producto->nombre, 'qty' => 1, 'price' => $producto->valor_und,
            'options' => ['imp' => $producto->impuesto,'existencia'=>$producto->existencia,'precio'=>$producto->precio,'codigo'=>$producto->codigo
                ,'unidad_medida'=>$producto->unidad_medida]]);
        Cart::associate($cart->rowId, \intransporte\Producto::class);
        $subtotal = Cart::subtotal();
        return response()->json([
            'content'=> $cart,
            'subtotal'=> $subtotal
        ]);
    }
    public function cartConsulta(){
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        return response()->json([
            'content'=> $cart,
            'subtotal'=> $subtotal
        ]);
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
    public function update(Request $request)
    {
        $id = $request->idProducto;
        Cart::update($id, $request->qty);
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        return response()->json([
            'content'=> $cart,
            'subtotal'=> $subtotal
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Cart::remove($request->idProducto);
        $cart = Cart::content();
        $subtotal = Cart::subtotal();
        return response()->json([
            'content'=> $cart,
            'subtotal'=> $subtotal
        ]);
    }



    public function despachar(Request $request){
        $vehiculo = $request->vehiculo;
        $tercero = Tercero::find($request->tercero);
        $obra = $request->obra;
        $usuario = \Auth::user()->id;
        //obtengo el ultimo insert del usuario
        $ultimoContador = DB::table('despacho')->where('usuario_id','=',$usuario)
            ->max('id');
        $ultimoRegistro = Despacho::find($ultimoContador);
       $despacho = 0;
        if($ultimoContador == null){
            $despacho = new Despacho;
            $despacho->prefijo = \Auth::user()->prefijo;
            $despacho->numero = +1;
            $despacho->tercero_id = $request->tercero;
            $despacho->obra_id = $obra;
            $despacho->vehiculo_tercero = $vehiculo;
            $despacho->usuario_id = \Auth::user()->id;
            $despacho->save();
        }else{
            $despacho = new Despacho;
            $despacho->prefijo = \Auth::user()->prefijo;
            $despacho->numero =$ultimoRegistro->numero +1;
            $despacho->tercero_id = $request->tercero;
            $despacho->obra_id = $obra;
            $despacho->vehiculo_tercero = $vehiculo;
            $despacho->usuario_id = \Auth::user()->id;
            $despacho->save();
        }
        foreach (Cart::content() as $producto){
            $despacho_detalle = new DespachoDetalle;
            $despacho_detalle->despacho_id = $despacho->id;
            $despacho_detalle->producto_id = $producto->id;
            $despacho_detalle->cantidad = $producto->qty;
            $despacho_detalle->save();
        }

        Cart::destroy();
    return response()->json([
        'respuesta'=>$ultimoContador
    ]);



    }
}
