<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="{{config('app.name')}}">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">

    <meta name="theme-color" content="#4C7FF0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- page stylesheets -->
    <link rel="stylesheet" href="{{asset('vendor/bower-jvectormap/jquery-jvectormap-1.2.2.css')}}"/>
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/dist/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/pace/themes/blue/pace-theme-minimal.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('vendor/animate.css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('styles/app.css')}}" id="load_styles_before"/>
    <link rel="stylesheet" href="{{asset('styles/app.skins.css')}}"/>
    <!-- endbuild -->
    @yield('css')
</head>
<body>

<div class="app">
    <!--sidebar panel-->
    <div class="off-canvas-overlay" data-toggle="sidebar"></div>
    <div class="sidebar-panel">
        <div class="brand">
            <!-- toggle offscreen menu -->
            <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up">
                <i class="material-icons">menu</i>
            </a>
            <!-- /toggle offscreen menu -->
            <!-- logo -->
            <a class="brand-logo text-center">
                <!--<img class="expanding-hidden" src="images/logo.png" alt=""/>-->
                <h4><b>{{config('app.name')}}</b></h4>
            </a>
            <!-- /logo -->
        </div>
        <div class="nav-profile dropdown" style="background-color: #e8e7e7">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                <div class="user-image">
                    <img src="images/avatar.jpg" class="avatar img-circle" alt="user" title="user"/>
                </div>
                <div class="user-info expanding-hidden">
                    {{Auth::user()->name}}
                    <small class="bold">Administrator</small>
                </div>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="javascript:;">Configuración</a>
                <a class="dropdown-item" href="javascript:;">Mi perfil</a>
                <a class="dropdown-item" href="javascript:;">
                    <span>Notificaciones</span>
                    <span class="tag bg-primary">34</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:;">Ayuda</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">Salir</a>
            </div>
        </div>
        <!-- main navigation -->
        <nav>
            <p class="nav-title"><u>NAVEGACIÓN</u></p>
            <ul class="nav">
                <!-- dashboard -->
                <li>
                    <a href="{{url('/home')}}">
                        <i class="material-icons text-primary">home</i>
                        <span>Inicio</span>
                    </a>
                </li>
                <!-- /dashboard -->

                <!-- productos -->
                <li>
                    <a href="#">
                        <i class="material-icons text-primary">shopping_basket</i>
                        <span>Productos</span>
                    </a>
                </li>
                <!-- /productos -->

                <!-- Terceros -->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">people</i>
                        <span>Terceros</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Nuevo tercero</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Lista de terceros</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Nueva obra</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Listado de obras</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /Terceros -->

                <!-- Vehiculos -->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">directions_car</i>
                        <span>Vehiculos</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Nuevo vehiculo</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Listado de vehiculos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Conductores asignados</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /Vehiculos -->

                <!-- Despachos -->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">rv_hookup</i>
                        <span>Despachos</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Nuevo despacho</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Listado de despachos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /Despachos -->

                <!-- Facturacion -->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">attach_money</i>
                        <span>Facturación</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Nuevo factura</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Registrar pago de factura</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Estado de cartera</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /facturacion -->
            </ul>
            <p class="nav-title"><u>REPORTES</u></p>
            <ul class="nav">
                <!-- Reportes generales, que incluyen saldos globales -->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">trending_up</i>
                        <span>Generales</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Reporte de productos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Reporte de despachos</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Reporte de vehiculos</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /Reportes generales, que incluyen saldos globales  -->

                <!-- Reportes especificos, de un cliente, o un vehiculo, o un producto-->
                <li>
                    <a href="javascript:;">
                <span class="menu-caret">
                  <i class="material-icons">arrow_drop_down</i>
                </span>
                        <i class="material-icons text-success">trending_up</i>
                        <span>Especificos</span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="#">
                                <span>Reporte un producto</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Reporte un cliente</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Reporte un vehiculo</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Reportes especificos, de un cliente, o un vehiculo, o un producto-->
                <li>
                    <hr/>
                </li>
                <!-- Configuracion, (manejo de usuarios, información de la empresa, etc) -->
                <li>
                    <a href="#">
                        <i class="material-icons text-primary">settings</i>
                        <span>Configuración</span>
                    </a>
                </li>
                <!-- /Configuracion -->
                <!-- Salir -->
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        Cerrar sesión
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <!-- /salir -->
            </ul>
        </nav>
        <!-- /main navigation -->
    </div>
    <!-- /sidebar panel -->
    <!-- content panel -->
    <div class="main-panel">
        <!-- top header -->
        <nav class="header navbar">
            <div class="header-inner">
                <div class="navbar-item navbar-spacer-right brand hidden-lg-up">
                    <!-- toggle offscreen menu -->
                    <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen">
                        <i class="material-icons">menu</i>
                    </a>
                    <!-- /toggle offscreen menu -->
                    <!-- logo -->
                    <a class="brand-logo hidden-xs-down">
                        <!--<img src="images/logo_white.png" alt="logo"/>-->
                        <b style="color:white; font-size: 1.3em">{{config('app.name')}}</b>
                    </a>
                    <!-- /logo -->
                </div>
                <a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#">
                    <span>@yield('nombre_pagina')</span>
                </a>
                <!--<div class="navbar-search navbar-item">
                    <form class="search-form">
                        <i class="material-icons">Buscador</i>
                        <input class="form-control" type="text" placeholder="Search"/>
                    </form>
                </div>-->
                <div class="navbar-item nav navbar-nav">
                    <div class="nav-item nav-link dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">Notificaciones</i>
                            <span class="tag tag-danger">4</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notifications">
                            <div class="dropdown-item">
                                <div class="notifications-wrapper">
                                    <ul class="notifications-list">
                                        <li>
                                            <a href="javascript:;">
                                                <div class="notification-icon">
                                                    <div class="circle-icon bg-success text-white">
                                                        <i class="material-icons">arrow_upward</i>
                                                    </div>
                                                </div>
                                                <div class="notification-message">
                                                    <b>Sean</b>
                                                    launched a new application
                                                    <span class="time">2 seconds ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <div class="notification-icon">
                                                    <div class="circle-icon bg-danger text-white">
                                                        <i class="material-icons">check</i>
                                                    </div>
                                                </div>
                                                <div class="notification-message">
                                                    <b>Removed calendar</b>
                                                    from app list
                                                    <span class="time">4 hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                            <span class="notification-icon">
                              <span class="circle-icon bg-info text-white">J</span>
                            </span>
                                                <div class="notification-message">
                                                    <b>Jack Hunt</b>
                                                    has
                                                    <b>joined</b>
                                                    mailing list
                                                    <span class="time">9 days ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                            <span class="notification-icon">
                              <span class="circle-icon bg-primary text-white">C</span>
                            </span>
                                                <div class="notification-message">
                                                    <b>Conan Johns</b>
                                                    created a new list
                                                    <span class="time">9 days ago</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="notification-footer">Notifications</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:;" class="nav-item nav-link nav-link-icon" data-toggle="modal"
                       data-target=".chat-panel" data-backdrop="false">
                        <i class="material-icons">chat_bubble</i>
                    </a>
                </div>
            </div>
        </nav>
        <!-- /top header -->

        <!-- main area -->
        <div class="main-content">
            <div class="content-view">
                @yield('content')
            </div>
            <!-- bottom footer -->
            <div class="content-footer">
                <nav class="footer-right">
                    <ul class="nav">
                        <li>
                            <a href="javascript:;">Feedback</a>
                        </li>
                    </ul>
                </nav>
                <nav class="footer-left">
                    <ul class="nav">
                        <li>
                            <a href="javascript:;">
                                <span>Copyright</span>
                                &copy; 2017
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- /bottom footer -->
        </div>
        <!-- /main area -->
    </div>
    <!-- /content panel -->

    <!--Chat panel-->
    <div class="modal fade sidebar-modal chat-panel" tabindex="-1" role="dialog" aria-labelledby="chat-panel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="chat-header">
                    <a class="pull-right" href="javascript:;" data-dismiss="modal">
                        <i class="material-icons">close</i>
                    </a>
                    <div class="chat-header-title">People</div>
                </div>
                <div class="modal-body flex scroll-y">
                    <div class="chat-group">
                        <div class="chat-group-header">Favourites</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-online"></span>
                            <span>Catherine Moreno</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-online"></span>
                            <span>Denise Peterson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-away"></span>
                            <span>Charles Wilson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-away"></span>
                            <span>Melissa Welch</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-no-disturb"></span>
                            <span>Vincent Peterson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Pamela Wood</span>
                        </a>
                    </div>
                    <div class="chat-group">
                        <div class="chat-group-header">Online</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-online"></span>
                            <span>Tammy Carpenter</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-away"></span>
                            <span>Emma Sullivan</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-no-disturb"></span>
                            <span>Andrea Brewer</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-online"></span>
                            <span>Betty Simmons</span>
                        </a>
                    </div>
                    <div class="chat-group">
                        <div class="chat-group-header">Other</div>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Denise Peterson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Jose Rivera</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Diana Robertson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>William Fields</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Emily Stanley</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Jack Hunt</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Sharon Rice</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Mary Holland</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Diane Hughes</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Steven Smith</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Emily Henderson</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Wayne Kelly</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Jane Garcia</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Jose Jimenez</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Rachel Burton</span>
                        </a>
                        <a href="javascript:;" data-toggle="modal" data-target=".chat-message">
                            <span class="status-offline"></span>
                            <span>Samantha Ruiz</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade chat-message" tabindex="-1" role="dialog" aria-labelledby="chat-message" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="chat-header">
                    <div class="pull-right dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:;">Profile</a>
                            <a class="dropdown-item" href="javascript:;">Clear messages</a>
                            <a class="dropdown-item" href="javascript:;">Delete conversation</a>
                            <a class="dropdown-item" href="javascript:;" data-dismiss="modal">Close chat</a>
                        </div>
                    </div>
                    <div class="chat-conversation-title">
                        <img src="images/face1.jpg" class="avatar avatar-xs img-circle m-r-1 pull-left" alt="">
                        <div class="overflow-hidden">
                            <span><strong>Charles Wilson</strong></span>
                            <small>Last seen today at 03:11</small>
                        </div>
                    </div>
                </div>
                <div class="modal-body flex scroll-y">
                    <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Yesterday</p>
                    <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                            <p>Hey.</p>
                        </div>
                    </div>
                    <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                            <p>How are the wife and kids, Taylor?</p>
                        </div>
                    </div>
                    <div class="chat-conversation-user me">
                        <div class="chat-conversation-message">
                            <p>Pretty good, Samuel.</p>
                        </div>
                    </div>
                    <p class="text-xs-center text-muted small text-uppercase bold m-b-1">Today</p>
                    <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                            <p>Curabitur blandit tempus porttitor.</p>
                        </div>
                    </div>
                    <div class="chat-conversation-user me">
                        <div class="chat-conversation-message">
                            <p>Goodnight!</p>
                        </div>
                    </div>
                    <div class="chat-conversation-user them">
                        <div class="chat-conversation-message">
                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem
                                nec elit.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-conversation-footer">
                    <button class="chat-left">
                        <i class="material-icons">face</i>
                    </button>
                    <div class="chat-input" contenteditable=""></div>
                    <button class="chat-right">
                        <i class="material-icons">photo</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--/Chat panel-->

</div>

<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="{{asset('vendor/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('vendor/pace/pace.js')}}"></script>
<script src="{{asset('vendor/tether/dist/js/tether.js')}}"></script>
<script src="{{asset('vendor/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('vendor/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('scripts/constants.js')}}"></script>
<script src="{{asset('scripts/main.js')}}"></script>
<!-- endbuild -->

<!-- page scripts -->
<script src="{{asset('vendor/flot/jquery.flot.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('vendor/flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('vendor/flot-spline/js/jquery.flot.spline.js')}}"></script>
<script src="{{asset('vendor/bower-jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('data/maps/jquery-jvectormap-us-aea.js')}}"></script>
<script src="{{asset('vendor/jquery.easy-pie-chart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js')}}"></script>
<script src="{{asset('scripts/helpers/noty-defaults.js')}}"></script>
<!-- end page scripts -->

<!-- initialize page scripts -->
<script src="{{asset('scripts/dashboard/dashboard.js')}}"></script>
<!-- end initialize page scripts -->

@yield('scripts')

</body>
</html>
