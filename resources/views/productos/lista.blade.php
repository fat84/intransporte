@extends('layouts.app')

@section('pagina_nombre')
    PRODUCTOS
@endsection
@section('content')
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Lista de productos registrados</h6>
                <hr/>
            </div>
            <div class="row">
                <div class="col-md-12" id="progress">
                    <br>
                    <br>
                    <h3><center>Cargando...</center></h3>
                    <br>
                    <br>
                </div>
                <div class="col-md-12">
                    <br>
                    <table class="table table-bordered " id="tabla">
                        <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Valor unidad</th>
                            <th>Unidad</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $.ajax({
                url: '{{url('/productos')}}',
                type: 'get',
                dataType: "json",
                beforeSend: function () {
                    $("#tabla").hide();
                },
                success: function (data) {
                    var t = data.productos;
                    var Html = "";
                    for (var i = 0; i < t.length; i++) {
                        //$(".progress").attr('max', t.length);
                        //$(".progress").attr('value', (i + 1));
                        Html += '<tr>' +
                            '   <td>' + t[i].codigo + '</td>' +
                            '   <td>' + t[i].nombre +'</td>' +
                            '   <td>$ ' + parseFloat(t[i].valor_und).formatMoney(2) + '</td>' +
                            '   <td>' + t[i].unidad_medida + '</td>' +
                            '   <td>' +(+ t[i].es_servicio=="1"?"Servicio":"Producto") + '</td>' +
                            '   <td><a href="{{url('/productos/editar')}}/' + t[i].id + '">Editar</a></td>' +
                            '</tr>';

                    }
                    $("#tbody").html(Html);
                },
                complete: function () {
                    $('#tabla').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                        }
                    });
                    $("#tabla").show();
                    $("#progress").hide();
                }
            });
        });
    </script>
@endsection