@extends('layouts.app')

@section('nombre_pagina')
    Vehiculos
@endsection

@section('content')
    @if($message=Session::has('message'))
        <script>
            $( document ).ready(function() {
                swal(
                    'En hora buena!',
                    '{{Session::get('message')}}',
                    'success'
                )});
        </script>
    @endif
    <div class="card">
        <div class="card-block">
            {!! Form::model($vehiculo,['route'=>['vehiculo.update',$vehiculo->id],'method'=>'PUT']) !!}
            {{ csrf_field() }}
            @if(count($errors) > 0)
                <div class="alert alert-danger sing-box" role="alert">
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{!! $errors !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="m-b-1">
                    <h6>Datos principales</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">
                            <label class="control-label" for="placa">Placa del vehiculo:</label>
                            {!! Form::text('placa',null,['class'=>'form-control','placeholder'=>'Placa del vehiculo']) !!}
                           <!-- <input required class="form-control" id="placa" name="placa" type="text" value="{{old('placa')}}">-->
                            @if ($errors->has('placa'))
                                <span class="text-danger">{{ $errors->first('placa') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('marca') ? ' has-danger' : '' }}">
                            <label class="control-label" for="">Marca del vehiculo:</label>
                            <!--<div class="m-b">-->
                            <div class="m-b">

                                {!! Form::select('marca', [
                              '' => 'Seleccione una marca',
                              'Alfa Romeo' => 'Alfa Romeo',
                              'Aston Martin' => 'Aston Martin',
                              'Audi' => 'Audi',
                              'Autovaz' => 'Autovaz',
                              'Bentley' => 'Bentley',
                              'Bmw' => 'Bmw',
                              'Cadillac' => 'Cadillac',
                              'Caterham' => 'Caterham',
                              'Chevrolet' => 'Chevrolet',
                              'Chrysler' => 'Chrysler',
                              'Citroen' => 'Citroen',
                              'Daihatsu' => 'Daihatsu',
                              'Dodge' => 'Dodge',
                              'Ferrari' => 'Ferrari',
                              'Fiat' => 'Fiat',
                              'Ford' => 'Ford',
                              'Honda' => 'Honda',
                              'Hummer' => 'Hummer',
                              'Hyundai' => 'Hyundai',
                              'Isuzu' => 'Isuzu',
                              'Jaguar' => 'Jaguar',
                              'Jeep' => 'Jeep',
                              'Kia' => 'Kia',
                              'Lamborghini' => 'Lamborghini',
                              'Lancia' => 'Lancia',
                              'Land Rover' => 'Land Rover',
                              'Lexus' => 'Lexus',
                              'Lotus' => 'Lotus',
                              'Maserati' => 'Maserati',
                              'Mazda' => 'Mazda',
                              'Mercedes Benz' => 'Mercedes Benz',
                              'MG' => 'MG',
                              'Mini' => 'Mini',
                              'Mitsubishi' => 'Mitsubishi',
                              'Morgan' => 'Morgan',
                              'Nissan' => 'Nissan',
                              'Opel' => 'Opel',
                              'Peugeot' => 'Peugeot',
                              'Porsche' => 'Porsche',
                              'Renault' => 'Renault',
                              'Rolls Royce' => 'Rolls Royce',
                              'Rover' => 'Rover',
                              'Saab' => 'Saab',
                              'Seat' => 'Seat',
                              'Skoda' => 'Skoda',
                              'Smart' => 'Smart',
                              'Ssangyong' => 'Ssangyong',
                              'Subaru' => 'Subaru',
                              'Suzuki' => 'Suzuki',
                              'Tata' => 'Tata',
                              'Toyota' => 'Toyota',
                              'Volkswagen' => 'Volkswagen',
                              'Volvo' => 'Volvo',
                              'Otro' => 'Otro'],null,['class' => 'form-control']
                                                  ) !!}
                              <!--  <select data-placeholder="" name="marca" class="select2 m-b-1"
                                        style="width: 100%;" required="">
                                    <option value="" >Seccione una marca</option>
                                    <option value="Alfa Romeo" @if(old('marca')=="Alfa Romeo") selected @endif>Alfa Romeo</option>
                                    <option value="Aston Martin" @if(old('marca')=="Aston Martin") selected @endif>Aston Martin</option>
                                    <option value="Audi" @if(old('marca')=="Audi") selected @endif>Audi</option>
                                    <option value="Autovaz @if(old('marca')=="Autovaz") selected @endif">Autovaz</option>
                                    <option value="Bentley" @if(old('marca')=="Bentley") selected @endif>Bentley</option>
                                    <option value="Bmw" @if(old('marca')=="Bmw") selected @endif>Bmw</option>
                                    <option value="Cadillac" @if(old('marca')=="Cadillac") selected @endif>Cadillac</option>
                                    <option value="Caterham" @if(old('marca')=="Carterham") selected @endif>Caterham</option>
                                    <option value="Chevrolet" @if(old('marca')=="Chevrolet") selected @endif>Chevrolet</option>
                                    <option value="Chrysler" @if(old('marca')=="Chrysler") selected @endif>Chrysler</option>
                                    <option value="Citroen" @if(old('marca')=="Citroen") selected @endif>Citroen</option>
                                    <option value="Daihatsu" @if(old('marca')=="Daihatsu") selected @endif>Daihatsu</option>
                                    <option value="Dodge" @if(old('marca')=="Dodge") selected @endif>Dodge</option>
                                    <option value="Ferrari" @if(old('marca')=="Ferrari") selected @endif>Ferrari</option>
                                    <option value="Fiat" @if(old('marca')=="Fiat") selected @endif>Fiat</option>
                                    <option value="Ford" @if(old('marca')=="Ford") selected @endif>Ford</option>
                                    <option value="Honda" @if(old('marca')=="Honda") selected @endif>Honda</option>
                                    <option value="Hummer" @if(old('marca')=="Hummer") selected @endif>Hummer</option>
                                    <option value="Hyundai" @if(old('marca')=="Hyundai") selected @endif>Hyundai</option>
                                    <option value="Isuzu" @if(old('marca')=="Isuzu") selected @endif>Isuzu</option>
                                    <option value="Jaguar" @if(old('marca')=="Jaguar") selected @endif>Jaguar</option>
                                    <option value="Jeep" @if(old('marca')=="Jeep") selected @endif>Jeep</option>
                                    <option value="Kia" @if(old('marca')=="Kia") selected @endif>Kia</option>
                                    <option value="Lamborghini" @if(old('marca')=="Lamborghini") selected @endif>Lamborghini</option>
                                    <option value="Lancia" @if(old('marca')=="Lancia") selected @endif>Lancia</option>
                                    <option value="Land Rover" @if(old('marca')=="Land Rover") selected @endif>Land Rover</option>
                                    <option value="Lexus" @if(old('marca')=="Lexus") selected @endif>Lexus</option>
                                    <option value="Lotus" @if(old('marca')=="Lotus") selected @endif>Lotus</option>
                                    <option value="Maserati" @if(old('marca')=="Maserati") selected @endif>Maserati</option>
                                    <option value="Mazda" @if(old('marca')=="Mazda") selected @endif>Mazda</option>
                                    <option value="Mercedes Benz" @if(old('marca')=="Mercedez Benz") selected @endif>Mercedes Benz</option>
                                    <option value="MG" @if(old('marca')=="MG") selected @endif>MG</option>
                                    <option value="Mini" @if(old('marca')=="Mini") selected @endif>Mini</option>
                                    <option value="Mitsubishi" @if(old('marca')=="Mitsubishi") selected @endif>Mitsubishi</option>
                                    <option value="Morgan" @if(old('marca')=="Morgan") selected @endif>Morgan</option>
                                    <option value="Nissan" @if(old('marca')=="Nissan") selected @endif>Nissan</option>
                                    <option value="Opel" @if(old('marca')=="Opel") selected @endif>Opel</option>
                                    <option value="Peugeot" @if(old('marca')=="Peugeot") selected @endif>Peugeot</option>
                                    <option value="Porsche" @if(old('marca')=="Porsche") selected @endif>Porsche</option>
                                    <option value="Renault" @if(old('marca')=="Renault") selected @endif>Renault</option>
                                    <option value="Rolls Royce" @if(old('marca')=="Rolls Royce") selected @endif>Rolls Royce</option>
                                    <option value="Rover" @if(old('marca')=="Rover") selected @endif>Rover</option>
                                    <option value="Saab" @if(old('marca')=="Saab") selected @endif>Saab</option>
                                    <option value="Seat" @if(old('marca')=="Seat") selected @endif>Seat</option>
                                    <option value="Skoda" @if(old('marca')=="Skoda") selected @endif>Skoda</option>
                                    <option value="Smart" @if(old('marca')=="Smart") selected @endif>Smart</option>
                                    <option value="Ssangyong" @if(old('marca')=="Ssangyong") selected @endif>Ssangyong</option>
                                    <option value="Subaru" @if(old('marca')=="Subaru") selected @endif>Subaru</option>
                                    <option value="Suzuki" @if(old('marca')=="Suzuki") selected @endif>Suzuki</option>
                                    <option value="Tata" @if(old('marca')=="Tata") selected @endif>Tata</option>
                                    <option value="Toyota" @if(old('marca')=="Toyota") selected @endif>Toyota</option>
                                    <option value="Volkswagen"@if(old('marca')=="Volkswagen") selected @endif>Volkswagen</option>
                                    <option value="Volvo" @if(old('marca')=="Volvo") selected @endif>Volvo</option>
                                    <option value="Otro" @if(old('marca')=="Otro") selected @endif>Volvo</option>
                                </select>-->
                                @if ($errors->has('marca'))
                                    <span class="text-danger">{{ $errors->first('marca') }}</span>
                                @endif
                            </div>
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('modelo') ? ' has-danger' : '' }}">
                            <label class="control-label" for="modelo">Modelo del vehiculo:</label>
                            {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Ej: 1992']) !!}
                           <!-- <input placeholder="ej: 1992" required class="form-control" id="modelo" name="modelo" type="text" value="{{old('modelo')}}">
                            -->
                            @if ($errors->has('modelo'))
                                <span class="text-danger">{{ $errors->first('modelo') }}</span>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr/>
                    </div>
                    <div class="col-md-12">
                        <div class="pull-right">
                            <a href="{{URL::previous() }}" class="btn btn-default m-r-xs m-b-xs"> CANCELAR </a>
                            <button type="submit" class="btn btn-success m-r-xs m-b-xs"> GUARDAR</button>
                        </div>
                    </div>
                </div>
           {!! Form::close() !!}
        </div>
    </div>

    @stop
@section('scripts')
    <script>
        $( document ).ready(function() {
            $('#tabla').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json"
                }
            });
        });
    </script>

@endsection