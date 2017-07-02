@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Lista de gastos registrados a vehiculos</h6>
                <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal"
                        style="position: absolute; top: 10px; right: 30px;"
                        data-target="#myModal">
                    Nuevo gasto
                </button>
                <hr/>
            </div>
            <div class="row">
                <div class="col-md-12" id="progress">
                    <br>
                    <br>
                    <h3>
                        <center>Cargando...</center>
                    </h3>
                    <br>
                    <br>
                </div>
                <div class="col-md-12">
                    <br>
                    <table class="table table-bordered " id="tabla">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Vehiculo placa</th>
                            <th>Registrado por</th>
                            <th>Valor</th>
                            <th></th>
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


    <!-- Modal para registrar -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <div class="modal-title"><h2>Registrar nuevo vehiculo</h2></div>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-block">
                            {!! Form::open(['action' => 'VehiculoController@store']) !!}
                            <form action="{{url('vehiculos/g')}}" role="form" method="POST">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="control-label" for="">Seleccione el vehiculo del gasto:</label>
                                        <!--<div class="m-b">-->
                                        <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                                        <select id="select-beast" name="vehiculo_id" class="demo-default"
                                                placeholder="Seleccione el vehiculo asociado">
                                            <option value="">Seleccione el vehiculo asociado</option>
                                            @foreach($vehiculos as $vehiculo)
                                                <option value="{{$vehiculo->id}}"
                                                        @if(old('vehiculo_id')==$vehiculo->id) selected @endif>{{$vehiculo->placa}}
                                                    ({{$vehiculo->marca}} {{$vehiculo->modelo}})
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('vehiculo_id'))
                                            <span class="text-danger">{{ $errors->first('vehiculo_id') }}</span>
                                    @endif
                                    <!--</div>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label" for="focusedInput">Descripción del
                                                gasto:</label>
                                            <input class="form-control" name="concepto" type="text"
                                                   value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" for="focusedInput">Valor:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">$</span>
                                                <input type="text" name="valor" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button data-dismiss="modal" class="btn btn-default m-r-xs m-b-xs">
                                                CANCELAR </button>
                                            <button type="submit" class="btn btn-success m-r-xs m-b-xs"> GUARDAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(function () {
            $.ajax({
                url: '{{url('vehiculo/gastos/lista')}}',
                type: 'get',
                dataType: "json",
                beforeSend: function () {
                    $("#tabla").hide();
                },
                success: function (data) {
                    var t = data.gastos;
                    var Html = "";
                    for (var i = 0; i < t.length; i++) {
                        //$(".progress").attr('max', t.length);
                        //$(".progress").attr('value', (i + 1));
                        Html += '<tr>' +
                            '   <td>' + t[i].fecha + '</td>' +
                            '   <td>' + t[i].placa + ' ' + '</td>' +
                            '   <td>' + t[i].usuario_nombre + '</td>' +
                            '   <td>' + t[i].valor + '</td>' +
                            '   <td><a href="{{url('/terceros/editar')}}/' + t[i].id + '">Ver</a></td>' +
                            '   <td><a href="{{url('/terceros/editar')}}/' + t[i].id + '">Editar</a></td>' +
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
