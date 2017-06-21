<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1"/>
    <meta name="msapplication-tap-highlight" content="no">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="application-name" content="Milestone">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Milestone">

    <meta name="theme-color" content="#4C7FF0">

    <title>Milestone - Bootstrap 4 Dashboard Template</title>

    <!-- page stylesheets -->
    <!-- end page stylesheets -->

    <!-- build:css({.tmp,app}) styles/app.min.css -->
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="vendor/pace/themes/blue/pace-theme-minimal.css"/>
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="vendor/animate.css/animate.css"/>
    <link rel="stylesheet" href="styles/app.css" id="load_styles_before"/>
    <link rel="stylesheet" href="styles/app.skins.css"/>
    <!-- endbuild -->
</head>
<body>
@yield('content')

<script type="text/javascript">
    window.paceOptions = {
        document: true,
        eventLag: true,
        restartOnPushState: true,
        restartOnRequestAfter: true,
        ajax: {
            trackMethods: [ 'POST','GET']
        }
    };
</script>

<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/pace/pace.js"></script>
<script src="vendor/tether/dist/js/tether.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="vendor/fastclick/lib/fastclick.js"></script>
<script src="scripts/constants.js"></script>
<script src="scripts/main.js"></script>
<!-- endbuild -->

<!-- page scripts -->
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- end page scripts -->

<!-- initialize page scripts -->
<script type="text/javascript">
    $('#validate').validate();
</script>
<!-- end initialize page scripts -->

</body>
</html>