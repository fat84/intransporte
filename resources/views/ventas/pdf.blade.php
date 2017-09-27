<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>
{{$venta->tercero->nombre}}<br>
{{$venta->tercero->documento}}<br>
{{$venta->tercero->direccion}}<br>
{{$venta->tercero->telefono}}

<br><br>
@foreach($venta_detalle as $venta_detalle)
    {{$venta_detalle->despacho_detalle->cantidad}}
    |{{$venta_detalle->despacho_detalle->producto->nombre}}
    |${{$venta_detalle->despacho_detalle->valor_unidad}}
    |${{$venta_detalle->despacho_detalle->cantidad * $venta_detalle->despacho_detalle->valor_unidad }}
@endforeach
</body>
</html>