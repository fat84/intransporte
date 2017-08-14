function obras() {
    idTercero = $('#tercero').val();

    if (idTercero == '') {
        swal(
            'Algo salio mal!',
            'Debe seleccionar un tercero',
            'error'
        );
        $('#obra').html(' ');
    } else {
        var parametros = {
            'idTercero': idTercero,
        };
        var ruta = '/consultarObras';
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            dataType: 'json',
            data: parametros,
            success: function (data) {
                console.log(data);
                if (data.resultado.length <= 0) {
                    swal(
                        'Algo salio mal!',
                        'Este tercero no tiene obras',
                        'error'
                    );
                    $('#obra').html('<option value="">Sin obras</option>');
                } else {
                    const a = data;
                    b = a.resultado;
                    resultado = "";
                    for (var i = 0 in b) {
                        resultado += '<option value="' + b[i].id + '">' + b[i].nombre + '</option>';
                    }
                    $('#obra').html(resultado);
                }

            }
        });
    }
}


function agregarProducto(idProducto) {
    var parametros = {
        'idProducto': idProducto,
    };
    var ruta = '/addProducto';
    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            //  console.log(data)
           // showProductos(data);
            showConsultaProductos()
        }
    });
}
function showConsultaProductos() {
    var parametros = {
       // 'idProducto': idProducto,
    };
    var ruta = '/cartConsulta';
    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            //  console.log(data)
            showProductos(data);
        }
    });
}

function showProductos(data) {
    console.log(data);
    const a = data;
    b = a.content;
    resultado = "";
    totalImpuesto = 0;
    totalCuenta = 0;
    imp = 0;
    subtotal = 0;
    impDivido = 0;
    for (var i = 0 in b) {
        cantidad = parseFloat(b[i].qty);
        precio = parseFloat(b[i].price);
        impuesto = parseFloat(b[i].options.imp);
        impDivido = impuesto/100;
        console.log(impuesto);
        imp = precio * impDivido;
        totalImpuesto += imp*cantidad;
        totalCuenta += (precio*cantidad);
        subtotal += precio * cantidad;

        resultado += '<tr>' +
            '<td>' + b[i].name + '</td>' +
            '<td><a data-toggle="modal" data-target=".bd-example-modal-precio" onclick="cambiarPrecio(\''+b[i].rowId+'\',\''+precio+'\')">' +accounting.formatMoney(precio) + '</a></td>' +
            '<td><input type="number" id="qty'+b[i].id+'" class="form-control" value="'+cantidad+'" onchange="actualizarCantidad(\''+b[i].rowId+'\',\''+b[i].id+'\')"></td>' +
            '<td>' +accounting.formatMoney(precio * cantidad)  + '</td>' +
            '<td><i class="material-icons text-danger" onclick="eliminarProducto(\''+b[i].rowId+'\')">delete</i></td>' +
            '</tr>';
    }
    detallado = '<tr>' +
        '<td></td>' +
        '<td></td>' +
        '<td style="font-size: 17px;font-weight: bold">Subtotal:</td>' +
        '<td style="font-size: 17px;font-weight: bold">'+accounting.formatMoney(subtotal)+'</td>' +
        '<td></td>' +
        '</tr>';
    detallado2 = '<tr>' +
        '<td></td>' +
        '<td></td>' +
        '<td style="font-size: 17px;font-weight: bold">Impuestos:</td>' +
        '<td style="font-size: 17px;font-weight: bold">'+accounting.formatMoney(totalImpuesto)+'</td>' +
        '<td></td>' +
        '</tr>';
    detallado3 = '<tr>' +
        '<td></td>' +
        '<td></td>' +
        '<td style="font-size: 17px;font-weight: bold">Total cuenta:</td>' +
        '<td style="font-size: 17px;font-weight: bold">'+accounting.formatMoney(totalCuenta+totalImpuesto)+'<input hidden  value="'+totalCuenta+'" id="totalcuentaCarrito"></td>' +
        '<td></td>' +
        '</tr>';
    botonesPago = '<tr>' +
        '<td></td>' +
        '<td></td>' +
        '<td></td>' +
        '<td><a class="btn btn-success btn-block " data-toggle="modal" data-target=".bd-example-modal" onclick="facturarProductos()">Despachar</a></td>' +
        '<td></td>' +
        '</tr>';
    $('#contenido').html(resultado+detallado+detallado2+detallado3+botonesPago);
}

function cambiarPrecio(id,precio) {
    $('#idRowNuevoPrecio').val(id);
    $('#nuevoPrecio').val(precio);
}
function actualizarPrecio() {
   idRow = $('#idRowNuevoPrecio').val();
   nuevoPrecio = $('#nuevoPrecio').val();
   if(nuevoPrecio == ''){
       swal(
           'Algo salio mal!',
           'el precio no puede estar vacio',
           'error'
       );
       return false;
   }else {
       var parametros = {
           'idProducto': idRow,
           'nuevoPrecio': nuevoPrecio,

       };
       var ruta = '/actualizarPrecio';
       $.ajax({
           url: ruta,
           headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
           type: 'POST',
           dataType: 'json',
           data: parametros,
           success: function (data) {
               //  console.log(data)
               showProductos(data);
               swal(
                   'En hor buena',
                   'el precio ha sido actualizado',
                   'success'
               );
           }
       });
   }
}
function facturarProductos() {
    totalCuenta = $('#totalcuentaCarrito').val();
    $('#totalApagar').html(accounting.formatMoney(totalCuenta));
}

function dineroRecibido() {
    dinerorecibio = parseFloat($('#dineroRecibido').val());
    cuenta = parseFloat($('#totalcuentaCarrito').val());
    vueltos = dinerorecibio - cuenta;
    $('#vueltos').val(accounting.formatMoney(vueltos));

    if(vueltos >= 0){
        $('#botonFactura').html('<a class="btn btn-block btn-success" onclick="facturar(vueltos)">Generar Despacho</a>');
    }else {
        $('#botonFactura').html('')
    }

}

function despachar() {

    tercero = $('#tercero').val();
    obra = $('#obra').val();
    vehiculo = $('#vehiculo').val();
    cuenta = $('#totalcuentaCarrito').val();
    var parametros = {
        'tercero':tercero,
        'obra':obra,
        'vehiculo':vehiculo
    };
    var ruta = '/despachar';
    if(tercero == ''){
        swal(
            'Algo salio mal!',
            'Debe seleccionar un tercero',
            'error'
        );
        return false;
    } else  if(obra == ''){
        swal(
            'Algo salio mal!',
            'Debe seleccionar una Obra',
            'error'
        );
        return false;
    }else if (vehiculo == ''){
        swal(
            'Algo salio mal!',
            'Debe seleccionar un Vehiculo',
            'error'
        );
        return false;
    }else if (cuenta <= 0){
        swal(
            'Algo salio mal!',
            'No hay productos, debe habe por lo menos un producto',
            'error'
        );
        return false;
    }
    else {
        $( "#botonDespachar" ).prop( "disabled", true );
        $( "#botonDespachar" ).html( "Despachando espere..." );
        $.ajax({
            url: ruta,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            dataType: 'json',
            data: parametros,
            success: function (data) {
            console.log(data)
                $( "#botonDespachar" ).prop( "disabled", false );
                $( "#botonDespachar" ).html( "Despachando espere..." );
                $('#botonesOp').html(' <button class="btn btn-success btn-block" onclick="recibo(\''+data.idDespacho+'\')">Imprimir recibo</button><br>' +
                                    ' <button class="btn btn-success btn-block" onclick="recargar()">Crear nuevo despacho</button>');
              //  window.open('/invoice/'+data.idDespacho,'_blank');
                //  window.location="/invoice/"+data.idDespacho;

                swal(
                    'En hora buena!',
                    'Despacho compleatado',
                    'success'
                );
              //  location.reload();
            }
        });
    }
}

function recibo(dato) {
    window.open('/invoice/'+dato,'_blank');
}
function recargar() {
    location.reload();
}
function actualizarCantidad(idRow,idProducto) {
    qty =$('#qty'+idProducto).val();
    var parametros = {
        'idProducto': idRow,
        'qty':qty
    };
    var ruta = '/actualizarCantidad';
    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            //  console.log(data)
            showProductos(data);
        }
    });
}

function eliminarProducto(idRow) {
    var parametros = {
        'idProducto': idRow,
    };
    var ruta = '/eliminarProducto';
    $.ajax({
        url: ruta,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        dataType: 'json',
        data: parametros,
        success: function (data) {
            //  console.log(data)
            showProductos(data);
        }
    });
}


