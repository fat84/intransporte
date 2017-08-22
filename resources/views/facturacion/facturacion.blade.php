@extends('layouts.app')
@section('nombre_pagina')
    Facturacion
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
    <button id="button" class="btn btn-default">Facturar seleccionados</button>
    <div class="row">
        <div class="col-md-12">
            <br>
            <table class="table table-bordered " id="tabla">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Prefijo</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Obra</th>
                    <th>Vendedor</th>
                   {{-- <th>Imprimir</th>--}}
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Prefijo</th>
                    <th>Numero</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Obra</th>
                    <th>Vendedor</th>
                   {{-- <th>Imprimir</th>--}}
                </tr>
                </tfoot>
                <tbody id="tbody">
                @foreach($despacho as $despacho)
                    <tr>
                        <th>{{$despacho->idDespacho}}</th>
                        <th>{{$despacho->prefijo}}</th>
                        <th>{{$despacho->numero}}</th>
                        <th>{{$despacho->fecha}}</th>
                        <th>{{$despacho->nombreTercero}}</th>
                        <th>{{$despacho->nombreObra}}</th>
                        <th>{{$despacho->nombreVendedor}}</th>
                       {{-- <th>
                            <button class="btn btn-default" onclick="facturar('{{$despacho->idDespacho}}')" >Facturar</button>
                        </th>--}}
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
           var table = $('#tabla').DataTable({
               "columnDefs": [
                   {
                       "targets": [ 0 ],
                       "visible": false,
                       "searchable": false
                   }
               ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                }
            });

            $('#tabla tbody').on( 'click', 'tr', function () {
                $(this).toggleClass('selected');
            } );

            $('#button').click( function () {
                //alert( table.rows('.selected').data() +' row(s) selected' );
                var despachos = table.rows('.selected').data();
                const idDespachos = [];
                for (var i = 0 in despachos) {
                    idDespachos[i] = despachos[i][0];
                    console.log(despachos[i][0]);

                 }
                console.log(idDespachos);
                //console.log(table.rows('.selected').data());
            });
           //showConsultaProductos();
        });
        function facturar(id) {
            swal({
                    title: "Numero de factura",
                    text: "Ingrese el nuemro de factura:",
                    type: "input",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    animation: "slide-from-top",
                    inputPlaceholder: "Escribe numero de factura"
                },
                function(inputValue){
                    if (inputValue === false) return false;

                    if (inputValue === "") {
                        swal.showInputError("Debe ingresar el numero de factura");
                        return false
                    }

                    swal("En buena hora!", "El despacho: " + inputValue, "success");
                });
        }
    </script>
@endsection