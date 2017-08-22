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
                    resultado += '<option value="*">Todas las obras</option>';
                    for (var i = 0 in b) {
                        resultado += '<option value="' + b[i].id + '">' + b[i].nombre + '</option>';
                    }
                    $('#obra').html(resultado);
                }

            }
        });
    }
}

function obras(id, tercero_sel) {
    idTercero = tercero_sel;

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
                    resultado += '<option value="*" '+(id=="*"?' selected ': '')+'>Todas las obras</option>';
                    for (var i = 0 in b) {
                        resultado += '<option value="' + b[i].id + '" '+(id==b[i].id?' selected ': '')+'>' + b[i].nombre + '</option>';
                    }
                    $('#obra').html(resultado);
                }

            }
        });
    }
}
