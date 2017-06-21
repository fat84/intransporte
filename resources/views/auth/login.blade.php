@extends('layouts.index')

@section('css')
@endsection

@section('content')

    <div class="app no-padding no-footer layout-static" style="background-color: #62a2d5;">
        <div class="session-panel">
            <div class="session">
                <div class="session-content">
                    <div class="card card-block form-layout">
                        <form role="form"  id="validate" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="text-xs-center m-b-3">
                                <img src="images/logo-icon.png" height="80" alt="" class="m-b-1"/>
                                <h5>
                                    {{config('app.name')}}
                                </h5>
                                <p class="text-muted">
                                    Inicio de sesión obligatorio
                                </p>
                            </div>
                            <fieldset class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="username">
                                    Ingrese su correo electrónico:
                                </label>
                                <input type="email" class="form-control form-control-lg" id="username" name="email" value="{{ old('email') }}" required/>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                            {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password">
                                    Ingrese su contraseña de acceso:
                                </label>
                                <input type="password" class="form-control form-control-lg" name="password" id="password" value="{{ old('password') }}" required/>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                            {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </fieldset>
                            <label class="custom-control custom-checkbox m-b-1">
                                <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Mantener mi sesión abierta en este equipo</span>
                            </label>
                            <button class="btn btn-primary btn-block btn-lg" type="submit">
                                Ingresar al sistema
                            </button>
                            <div class="divider">
                            </div>
                            <div class="text-center">
                                <p class="text-xs-center m-b-1">
                                    <a href="{{ route('password.request') }}">
                                        ¿Olvitaste tu contraseña?
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <footer class="text-xs-center p-y-1">

                </footer>
            </div>

        </div>
    </div>

@endsection
