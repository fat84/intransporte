@extends('layouts.app')

@section('pagina_nombre')
    OBRAS
@endsection
@section('content')
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Lista de obras registradas</h6>
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
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                            <th>Tercero</th>
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
                url: '{{url('/obras')}}',
                type: 'get',
                dataType: "json",
                beforeSend: function () {
                    $("#tabla").hide();
                },
                success: function (data) {
                    var t = data.obras;
                    var Html = "";
                    for (var i = 0; i < t.length; i++) {
                        //$(".progress").attr('max', t.length);
                        //$(".progress").attr('value', (i + 1));
                        Html += '<tr>' +
                            '   <td>' + t[i].nombre + '</td>' +
                            '   <td>' + t[i].direccion +'</td>' +
                            '   <td>' + t[i].nombre_ciudad+', '+t[i].nombre_departamento + '</td>' +
                            '   <td>' + t[i].nombre_tercero + '</td>' +
                            '   <td><a href="{{url('/obras/editar')}}/' + t[i].id + '">Editar</a></td>' +
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