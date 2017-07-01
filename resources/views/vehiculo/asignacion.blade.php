@extends('layouts.app')
@section('content')
    <style>
        strong {
            font-weight: 900;
        }
    </style>
    <div class="row">
        @foreach($vehiculos as $vehiculo)
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <b><i class="fa fa-car"></i> Vehiculo: </b>{{$vehiculo->placa}}
                        <div class="card-controls">
                            <button data-toggle="modal" data-target="#myModal" onclick="valoresModal('{{$vehiculo->id}}','{{$vehiculo->tercero_id}}')"
                               class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil "></i> </button>
                        </div>
                    </div>
                    <div class="card-block">
                        <p class="card-text" style="font-family: monospace, serif">
                            <strong>Marca : </strong>{{$vehiculo->marca}}<br>
                            <strong>Modelo: </strong>{{$vehiculo->modelo}}<hr/>
                            <strong>Conductor actual:</strong><br>
                            {{$vehiculo->conductor_nombre== null ? "( Ninguno )":$vehiculo->conductor_nombre}}<br>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">
            <center>
                {{ $vehiculos->links() }}
            </center>
        </div>
    </div>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <div class="modal-title"><h2>Asignación de coductor</h2></div>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-block">
                            <form action="{{url('vehiculo/asignacion/asignar')}}" role="form" method="POST">
                            {{csrf_field()}}
                                <div class="row">
                                    <input type="hidden" id="vehiculo_id" name="vehiculo_id">
                                    <div class="col-md-12">
                                        <label class="control-label" for="">Asignar empleado como conductor:</label>
                                        <!--<div class="m-b">-->
                                        <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                                        <select id="select-beast"  name="tercero_id" class="demo-default" placeholder="( Ninguno )">
                                            <option value="">Seleccione el empleado</option>
                                            @foreach($terceros as $tercero)
                                                <option value="{{$tercero->id}}" @if(old('tercero_id')==$tercero->id) selected @endif>{{$tercero->nombre}}
                                                    ({{$tercero->tipo_documento}} {{$tercero->documento}})</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('tercero_id'))
                                            <span class="text-danger">{{ $errors->first('tercero_id') }}</span>
                                    @endif
                                    <!--</div>-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr/>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right">
                                            <button data-dismiss="modal" class="btn btn-default btn-sm"> CANCELAR </button>
                                            <button type="submit" class="btn btn-success btn-sm"> GUARDAR</button>
                                        </div>
                                    </div>
                                </div>
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
        function valoresModal(vehiculoid, terceroid){
            $("#vehiculo_id").val(vehiculoid);
            $("#select-beast").val(terceroid);
        }
    </script>
@endsection