@extends('layouts.app')

@section('nombre_pagina')
    REGISTRAR TERCERO
@endsection

@section('content')
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Datos principales</h6>
                <hr/>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="nombre">Nombre / Razón social:</label>
                        <input class="form-control" id="nombre" name="nombre" type="text" value="{{old('nombre')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="">Tipo de empresa:</label>
                        <!--<div class="m-b">-->
                        <div class="m-b">
                            <select data-placeholder="" name="tipo_persona" class="select2 m-b-1" style="width: 100%;">
                                <option value="Persona natural">Persona natural</option>
                                <option value="Persona juridica">Persona Juridica</option>
                            </select>
                        </div>
                        <!--</div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="">Tipo de documento:</label>
                        <!--<div class="m-b">-->
                        <div class="m-b">
                            <select data-placeholder="" name="tipo_documento" class="select2 m-b-1"
                                    style="width: 100%;">
                                <option value="NIT">NIT</option>
                                <option value="CC">Cedula ciudadania</option>
                                <option value="CE">Cedula extranjeria</option>
                                <option value="PAS">Pasaporte</option>
                                <option value="DNI">Otro</option>
                            </select>
                        </div>
                        <!--</div>-->
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="documento">Número de documento:</label>
                        <input class="form-control" id="documento" name="documento" type="text"
                               value="{{old('documento')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="correo">Correo electrónico:</label>
                        <input class="form-control" placeholder="" id="correo" name="correo" type="email"
                               value="{{old('correo')}}">
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
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="control-label" for="">Ciudad:</label>
                    <!--<div class="m-b">-->
                    <!--<select data-placeholder="" name="ciudad_id" class="select2 m-b-1" style="width: 100%;">-->
                    <select id="select-beast" class="demo-default" placeholder="Seleccione la ciudad">
                        <option value="">Seleccione la ciudad</option>
                        @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}">{{$ciudad->nombre_ciudad}},{{$ciudad->nombre_departamento}}</option>
                        @endforeach
                    </select>
                    <!--</div>-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="documento">Teléfono:</label>
                        <input class="form-control" id="telefono" name="telefono" type="text"
                               value="{{old('telefono')}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <label class="control-label" for="documento">¿Qué tipo de tercero es?</label>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <input class="to-labelauty" type="checkbox" data-labelauty="Es cliente" checked/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <input class="to-labelauty" type="checkbox" data-labelauty="Es empleado"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <input class="to-labelauty" type="checkbox" data-labelauty="Es proveedor"/>
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
                        <button class="btn btn-success m-r-xs m-b-xs"> GUARDAR </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection