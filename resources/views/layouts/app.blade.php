<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('libs/bower/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bower/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bower/fullcalendar/dist/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/bower/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
    <script src="{{ asset('libs/bower/breakpoints.js/dist/breakpoints.min.js') }}"></script>
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    @yield('css')

    <script>
        Breakpoints();
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

    <script src="{{ asset('libs/bower/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('libs/bower/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('libs/bower/jQuery-Storage-API/jquery.storageapi.min.js') }}"></script>
    <script src="{{ asset('libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js') }}"></script>
    <script src="{{ asset('libs/bower/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
    <script src="{{ asset('assets/js/library.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('libs/bower/moment/moment.js') }}"></script>
    <script src="{{ asset('libs/bower/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
</body>
</html>
