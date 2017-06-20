@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/core.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/misc-pages.css')}}">
    <style>
        body {
            background-color: #002a80;
        }
    </style>
@endsection

@section('content')
    <div id="back-to-home">
        <!--<a href="#" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>-->
    </div>
    <div class="simple-page-wrap">
        <div class="simple-page-logo animated swing">
            <a href="index.html">
                <span><i class="fa fa-gg"></i></span>
                <span style="font-weight: bold">{{config('app.name')}}</span>
            </a>
        </div><!-- logo -->
        <div class="simple-page-form animated flipInY" id="login-form">
            <h4 class="form-title m-b-xl text-center">Inicio de sesión obligatorio</h4>
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="sign-in-email" name="email" type="email" class="form-control"
                           placeholder="Correo electrónico" {{ old('email') }}>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        {{ $errors->first('email') }}
                                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="sign-in-password" type="password" name="password" class="form-control" placeholder="Contraseña">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                                    </span>
                    @endif
                </div>

                <div class="form-group m-b-xl">
                    <div class="checkbox checkbox-primary">
                        <input type="checkbox" id="keep_me_logged_in"
                               name="remember" {{ old('remember') ? 'checked' : '' }}/>
                        <label for="keep_me_logged_in">mantener mi sesión abierta</label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="INGRESAR">
            </form>
        </div><!-- #login-form -->

        <div class="simple-page-footer">
            <p><a href="{{ route('password.request') }}">¿OLVIDO SU CONTRASEÑA?</a></p>
            <p>
                <!--<small>Don't have an account ?</small>
                <a href="·">CREATE AN ACCOUNT</a>-->
            </p>
        </div><!-- .simple-page-footer -->


    </div><!-- .simple-page-wrap -->
@endsection
