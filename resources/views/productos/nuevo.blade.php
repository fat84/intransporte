@extends('layouts.app')

@section('nombre_pagina')
    REGISTRAR PRODUCTO
@endsection

@section('content')
    <div class="card">
        <div class="card-block">
            <form action="{{url('/productos/nuevo/guardar')}}" role="form" method="POST">
                {{csrf_field()}}
                <div class="m-b-1">
                    <h6>Datos del producto</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('codigo') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Código del producto:</label>
                            <input class="form-control" id="nombre" name="codigo" type="text" value="{{old('codigo')}}">
                            @if ($errors->has('codigo'))
                                <span class="text-danger">{{ $errors->first('codigo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Nombre del producto:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="{{old('nombre')}}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('valor_und') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Valor unidad:</label>
                            <div class="input-group">
                                <span class="input-group-addon"> $ </span>
                            <input class="form-control" id="nombre" name="valor_und" type="number"
                                   value="{{old('valor_und')}}">
                            </div>
                            @if ($errors->has('valor_und'))
                                <span class="text-danger">{{ $errors->first('valor_und') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('impuesto') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Porcentaje de impuesto:</label>
                            <div class="input-group">
                                <input class="form-control" id="nombre" name="impuesto" type="text"
                                       value="{{old('impuesto')}}">
                                <span class="input-group-addon"> % </span>
                            </div>
                            @if ($errors->has('impuesto'))
                                <span class="text-danger">{{ $errors->first('impuesto') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('unidad_medida') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Unidad de medida:</label>
                            <input class="form-control" id="nombre" name="unidad_medida" type="text" value="{{old('unidad_medida')}}" placeholder="Ejemplos: KG, TONELADA, M2">
                            @if ($errors->has('unidad_medida'))
                                <span class="text-danger">{{ $errors->first('unidad_medida') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="nombre">¿Qué tipo es?:</label>
                            <div>
                                <input class="to-labelauty" type="radio" name="es_servicio" data-labelauty="Es un producto" value="0" @if(old('es_servicio')==null) checked @else@if(old('es_servicio')=="0") checked @endif />
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
                                <input class="to-labelauty" type="radio" name="es_servicio" value="1" data-labelauty="Es un servicio" @if(old('es_servicio')=="1") checked @endif/>
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
@endsection