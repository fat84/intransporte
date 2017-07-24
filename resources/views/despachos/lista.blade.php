@extends('layouts.app')

@section('nombre_pagina')
    Lista de Despachos
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
        <div class="col-md-12">
            <br>
            <table class="table table-bordered " id="tabla">
                <thead>
                <tr>
                    <th>Prefijo</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Obra</th>
                    <th>Vendedor</th>
                    <th>Imprimir</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Prefijo</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Obra</th>
                    <th>Vendedor</th>
                    <th>Imprimir</th>
                </tr>
                </tfoot>
                <tbody id="tbody">
                    @foreach($despacho as $despacho)
                        <tr>
                            <th>{{$despacho->prefijo}}</th>
                            <th>{{$despacho->numero}}</th>
                            <th>{{$despacho->fecha}}</th>
                            <th>{{$despacho->nombreTercero}}</th>
                            <th>{{$despacho->nombreObra}}</th>
                            <th>{{$despacho->nombreVendedor}}</th>
                            <th>
                                <a href="invoice/{{$despacho->idDespacho}}" target="_blank">Imprimir</a>
                            </th>
                        </tr>
                        @endforeach

                </tbody>
            </table>
            <br>
        </div>
    </div>






@stop
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#tabla').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                }
            });
            showConsultaProductos();

        });
    </script>
@endsection