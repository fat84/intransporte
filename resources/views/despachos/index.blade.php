@extends('layouts.app')

@section('nombre_pagina')
   Despachos
@endsection

@section('content')
    @if($message=Session::has('message'))
        <script>
            $(document).ready(function () {
                swal(
                    'En hora buena!',
                    '{{Session::get('message')}}',
                    'success'
                )
            });
        </script>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <div class="form-group {{ $errors->has('marca') ? ' has-danger' : '' }}">
                        <label class="control-label" for="">Cliente:</label>
                        <!--<div class="m-b">-->
                        <div class="m-b">
                            <select data-placeholder="" name="tercero" id="tercero" class="select2 m-b-1"
                                    style="width: 100%;" required="" onchange="obras()">
                                <option value="">Selecciona un tercero</option>
                                @foreach($terceros as $tercero)
                                    <option value="{{$tercero->id}}">{{$tercero->nombre}} - Nit. ({{$tercero->documento}})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-block">
                    <div class="form-group {{ $errors->has('marca') ? ' has-danger' : '' }}">
                        <label class="control-label" for="">Obras:</label>
                        <!--<div class="m-b">-->
                        <div class="m-b">
                            <select  name="obra" id="obra" class="form-control"
                                    style="width: 100%;" required="">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-block">
                 <button class="btn btn-success btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Productos</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody id="contenido">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">

                    <table class="table table-bordered " id="tabla">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Valor unidad</th>
                            <th>Existencia</th>
                            <th>Imp</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>Valor unidad</th>
                            <th>Existencia</th>
                            <th>Imp</th>
                            <th>Precio</th>
                            <th>Acción</th>
                        </tr>
                        </tfoot>
                        <tbody id="tbody">
                        @foreach($productos as $producto)
                            <tr>
                                <td>{{$producto->codigo}}</td>
                                <td>{{$producto->nombre}}</td>
                                <td>${{number_format($producto->valor_und)}}</td>
                                <td>{{$producto->existencia}}</td>
                                <td>%{{$producto->impuesto}}</td>
                                <td>{{$producto->precio}}</td>
                                <td><a class="btn btn-success" onclick="agregarProducto('{{$producto->id}}')">Añadir</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Despacho de productos</h4>
                </div>
                <div class="modal-body">
                    <select class="form-control" required id="vehiculo">
                        <option value="">Seleccionar vehiculo</option>
                        @foreach($vehiculo_tercero as $vehiculo_tercero)
                        @if($vehiculo_tercero->fecha_retiro == null)
                        <option value="{{$vehiculo_tercero->id}}">Conductor: {{$vehiculo_tercero->tercero->nombre}} (Placa: {{$vehiculo_tercero->vehiculo->placa}})</option>
                        @endif
                        @endforeach
                    </select><br></br>
                    <div id="botonesOp">
                        <button class="btn btn-success btn-block" id="botonDespachar" onclick="despachar()">Crear despacho</button>
                        <div id="mensajeDespacho"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('scripts')
<script src="{{asset('js/despacho.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#tabla').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
            }
        });
      

    });
</script>
@endsection