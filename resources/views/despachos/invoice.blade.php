<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Invoice</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Despacho numero: {{$despacho->numero}}</h4>
            <h4>Prefijo: {{$despacho->prefijo}}</h4>
            <div class="col-md-6">Cliente<br>
                Nombre: {{$tercero->nombre}}<br>
                Nit: {{$tercero->documento}}<br>
                Telefono: {{$tercero->telefono}}<br>
                Obra: {{$obra->nombre}}<br>
                Direccion obra: {{$obra->direccion}}
            </div>
            <div class="col-md-6">Vendedor<br>
            Nombre: {{$user->name}}<br><br>
                fecha de venta : {{$despacho->created_at}}
            </div>
        </div>
        <div><br>
       <br>
            Transporte<br>
            Vehiculo: {{$vehiculo_terero->vehiculo->marca}} ({{$vehiculo_terero->vehiculo->placa}}) <br>
            Conductor:{{$vehiculo_terero->tercero->nombre}} <br>
        </div>
        <br>
        <table class="table">
            <tr>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <tbody>
            <?php
            $subtotal = 0;
            $impuestos = 0;
            $total = 0;
            $imp = 0;
            ?>
            @foreach($invoice as $item)
                <?php
                $imp = $item->impuestoProducto /100;
                $subtotal += $item->precioProducto*$item->cantidadPedida;
                $impuestos += ($item->precioProducto * $imp)*$item->cantidadPedida;
                $total = ($item->precioProducto*$item->cantidadPedida)+$imp;
                ?>
                <tr>
                    <td>{{$item->codigoProducto}}</td>
                    <td>{{$item->nombreProducto}}</td>
                    <td>{{$item->cantidadPedida}}</td>
                    <td>${{number_format($item->cantidadPedida * $item->precioProducto)}}</td>
                </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>Subtotal:</td>
                <td>${{number_format($subtotal)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Impuestos:</td>
                <td>${{number_format($impuestos)}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Total:</td>
                <td>${{number_format($subtotal+$impuestos)}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</div>




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>