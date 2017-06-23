@extends('layouts.app')


@section('content')
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Registrar nuevo tercero</h6>
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
                            <select data-placeholder="Your Favorite Football Team" class="select2 m-b-1" style="width: 100%;">
                                <option>American Black Bear</option>
                                <option>Asiatic Black Bear</option>
                                <option>Brown Bear</option>
                                <option>Giant Panda</option>
                                <option>Sloth Bear</option>
                                <option>Sun Bear</option>
                                <option>Polar Bear</option>
                                <option>Spectacled Bear</option>
                            </select>
                        </div>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection