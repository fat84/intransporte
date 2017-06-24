@extends('layouts.app')

@section('nombre_pagina')
    REGISTRAR TERCERO
@endsection

@section('content')
    <div class="card">
        <div class="card-block">
            <form action="{{url('/terceros/nuevo/guardar')}}" role="form" method="POST">
                {{csrf_field()}}
                <div class="m-b-1">
                    <h6>Datos principales</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="control-label" for="nombre">Nombre / Razón social:</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="{{old('nombre')}}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tipo_persona') ? ' has-danger' : '' }}">
                            <label class="control-label" for="">Tipo de empresa:</label>
                            <!--<div class="m-b">-->
                            <div class="m-b">
                                <select data-placeholder="" name="tipo_persona" class="select2 m-b-1"
                                        style="width: 100%;">
                                    <option value="Persona natural" @if(old('tipo_persona')=="Persona natural") selected @endif>Persona natural</option>
                                    <option value="Persona juridica" @if(old('tipo_persona')=="Persona juridica") selected @endif >Persona Juridica</option>
                                </select>
                                @if ($errors->has('tipo_persona'))
                                    <span class="text-danger">{{ $errors->first('tipo_persona') }}</span>
                                @endif
                            </div>
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('tipo_documento') ? ' has-danger' : '' }}">
                            <label class="control-label" for="">Tipo de documento:</label>
                            <!--<div class="m-b">-->
                            <div class="m-b">
                                <select data-placeholder="" name="tipo_documento" class="select2 m-b-1"
                                        style="width: 100%;">
                                    <option value="NIT" @if(old('tipo_documento')=="NIT") selected @endif >NIT</option>
                                    <option value="CC" @if(old('tipo_documento')=="CC") selected @endif >Cedula ciudadania</option>
                                    <option value="CE" @if(old('tipo_documento')=="CE") selected @endif >Cedula extranjeria</option>
                                    <option value="PAS" @if(old('tipo_documento')=="PAS") selected @endif >Pasaporte</option>
                                    <option value="DNI" @if(old('tipo_documento')=="DNI") selected @endif >Otro</option>
                                </select>
                                @if ($errors->has('tipo_documento'))
                                    <span class="text-danger">{{ $errors->first('tipo_documento') }}</span>
                                @endif
                            </div>
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('documento') ? ' has-danger' : '' }}">
                            <label class="control-label" for="documento">Número de documento:</label>
                            <input class="form-control" id="documento" name="documento" type="text"
                                   value="{{old('documento')}}">
                            @if ($errors->has('documento'))
                                <span class="text-danger">{{ $errors->first('documento') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 {{ $errors->has('correo') ? ' has-danger' : '' }}">
                        <div class="form-group">
                            <label class="control-label" for="correo">Correo electrónico:</label>
                            <input class="form-control" placeholder="" id="correo" name="correo" type="email"
                                   value="{{old('correo')}}">
                            @if ($errors->has('correo'))
                                <span class="text-danger">{{ $errors->first('correo') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="m-b-1">
                    <br><br>
                    <h6>Información de contacto</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" for="direccion">Dirección:</label>
                            <input class="form-control" id="direccion" name="direccion" type="text"
                                   value="{{old('direccion')}}">
                            @if ($errors->has('direccion'))
                                <span class="text-danger">{{ $errors->first('direccion') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="control-label" for="">Ciudad:</label>
                        <!--<div class="m-b">-->
                        <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                        <select id="select-beast" name="ciudad_id" class="demo-default" placeholder="Seleccione la ciudad">
                            <option value="">Seleccione la ciudad</option>
                            @foreach($ciudades as $ciudad)
                                <option value="{{$ciudad->id}}" @if(old('ciudad_id')==$ciudad->id) selected @endif>{{$ciudad->nombre_ciudad}}
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
                                   value="{{old('telefono')}}">
                            @if ($errors->has('telefono'))
                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="control-label" for="documento">¿Qué tipo de tercero es?</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <input class="to-labelauty" type="checkbox" name="es_cliente" data-labelauty="Es cliente" value="1" @if(Empty(old('es_cliente'))) checked @elseif(old('es_cliente')=="1") checked @endif />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <input class="to-labelauty" type="checkbox" data-labelauty="Es empleado" name="es_empleado" value="1" @if(old('es_empleado')=="1") checked @endif />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <input class="to-labelauty" type="checkbox" data-labelauty="Es proveedor" name="es_proveedor" value="1" @if(old('es_proveedor')=="1") checked @endif/>
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