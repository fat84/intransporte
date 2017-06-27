@extends('layouts.app')

@section('nombre_pagina')
    EDITAR OBRA
@endsection

@section('content')
    <div class="card">
        <div class="card-block">
            <form action="{{url('/obras/editar/guardar')}}" role="form" method="POST">
                {{csrf_field()}}
                <div class="m-b-1">
                    <h6>Tercero asociado</h6>
                    <hr/>
                </div>
                <div class="row">
                    <input type="hidden" name="id" value="{{$obra->id}}">
                    <div class="col-md-12">
                        <label class="control-label" for="">Seleccione el tercero al que pertenece la obra:</label>
                        <!--<div class="m-b">-->
                        <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                        <select id="select-beast" name="tercero_id" class="demo-default" placeholder="Seleccione el tercero asociado">
                            <option value="">Seleccione el tercero</option>
                            @foreach($terceros as $tercero)
                                <option value="{{$tercero->id}}" @if(old('tercero_id')==null && $obra->tercero_id==$tercero->id) selected @elseif(old('tercero_id')==$tercero->id) selected @endif>{{$tercero->nombre}}
                                    ({{$tercero->tipo_documento}} {{$tercero->documento}})</option>
                            @endforeach
                        </select>
                        @if ($errors->has('tercero_id'))
                            <span class="text-danger">{{ $errors->first('tercero_id') }}</span>
                    @endif
                    <!--</div>-->
                    </div>
                </div>
                <div class="m-b-1">
                    <br>
                    <h6>Datos de la Obra</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Nombre de la obra:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="@if(old('nombre')==null){{$obra->nombre}}@else{{old('nombre')}}@endif">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="direccion">Dirección:</label>
                            <input class="form-control" id="direccion" name="direccion" type="text"
                                   value="@if(old('direccion')==null){{$obra->direccion}}@else{{old('direccion')}}@endif">
                            @if ($errors->has('direccion'))
                                <span class="text-danger">{{ $errors->first('direccion') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="">Ciudad:</label>
                        <!--<div class="m-b">-->
                        <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                        <select id="select-beast2" name="ciudad_id" class="demo-default" placeholder="Seleccione la ciudad">
                            <option value="">Seleccione la ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->id}}" @if(old('ciudad_id')==null && $obra->ciudad_id==$ciudad->id) selected  @elseif(old('ciudad_id')==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}
                                    ,{{$ciudad->nombre_departamento}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ciudad_id'))
                            <span class="text-danger">{{ $errors->first('ciudad_id') }}</span>
                        @endif
                    <!--</div>-->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="documento">Teléfono:</label>
                            <input class="form-control" id="telefono" name="telefono" type="text"
                                   value="@if(old('telefono')==null){{$obra->telefono}}@else{{old('telefono')}}@endif">
                            @if ($errors->has('telefono'))
                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('encargado') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Nombre del encargado o contacto en la obra:</label>
                            <input class="form-control" id="nombre" name="encargado" type="text" value="@if(old('encargado')==null){{$obra->encargado}}@else{{old('encargado')}}@endif">
                            @if ($errors->has('encargado'))
                                <span class="text-danger">{{ $errors->first('encargado') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="nombre">Estado de la obra:</label>
                            <div>
                                <input class="to-labelauty" type="radio" name="activo" data-labelauty="Activo" value="1" @if(old('activo')==null && $obra->activo) checked @elseif(old('activo')=="1") checked @endif />
                            </div>
                            @if ($errors->has('es_servicio'))
                                <span class="text-danger">{{ $errors->first('es_servicio') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">&nbsp;</label>
                            <div>
                                <input class="to-labelauty" type="radio" name="activo" value="0" data-labelauty="Terminada" @if(old('activo')==null && $obra->activo==false) checked  @elseif(old('activo')=="0") checked @endif/>
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
                            <a href="{{url("/home")}}" class="btn btn-default m-r-xs m-b-xs"> CANCELAR </a>
                            <button type="submit" class="btn btn-success m-r-xs m-b-xs"> GUARDAR</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#select-beast2').selectize({
                create: false,
                sortField: 'text'
            });
        });
    </script>
@endsection