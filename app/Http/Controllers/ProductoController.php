<?php

namespace intransporte\Http\Controllers;

use Illuminate\Http\Request;
use intransporte\Http\Requests\ProductoRequest;
use intransporte\Producto;

class ProductoController extends Controller
{
    //
    public function index(Request $request){
        if ($request->ajax()) {
            $productos = Producto::all();
            return response()->json(['productos'=>$productos]);
        }
        return view('productos.lista');
    }

    public function nuevo(){

    }
    public function editar($id){
        $producto = Producto::find($id);
        return view('productos.editar',['producto'=>$producto]);
    }

    public function guardar(ProductoRequest $request){
        $producto = new Producto($request->all());
        $mensaje = "error";
        if($producto->save()){
            $mensaje = 'ok';
        }
        return redirect('/productos')->with(['mensaje'=>$mensaje]);
    }

    public function guardarEditar(ProductoRequest $request){
        $producto = Producto::find($request->id);
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->valor_und = $request->valor_und;
        $producto->impuesto = $request->impuesto;
        $producto->unidad_medida = $request->unidad_medida;
        $producto->es_servicio = $request->es_servicio;
        $mensaje = "error";
        if($producto->save()){
            $mensaje = 'ok';
        }
        return redirect('/productos')->with(['mensaje'=>$mensaje]);
    }
}
