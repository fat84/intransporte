@extends('layouts.app')

@section('content')

    <?php
    $inicio = new Carbon\Carbon('first day of this month');
    $fin = new Carbon\Carbon('last day of this month');
    ?>
    <div class="card">
        <div class="card-block">
            <div class="m-b-1">
                <h6>Generar reporte por vehiculo</h6>
                <hr/>
            </div>
            <div class="row">
                <form action="{{url('reporte/general/vehiculos')}}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-12">
                        Seleccione el rango de fechas para generar el reporte:
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label class="control-label" for="focusedInput">Fecha inicio:</label>
                            <input class="form-control" id="focusedInput" name="fecha_inicio" type="date"
                                   value="@if(empty($fecha_inicio)==false){{$fecha_inicio}}@else{{$inicio->format('Y-m-d')}}@endif"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label class="control-label" for="focusedInput">Fecha final:</label>
                            <input class="form-control" id="focusedInput" name="fecha_final" type="date"
                                   value="@if(empty($fecha_final)==false){{$fecha_final}}@else{{$fin->format('Y-m-d')}}@endif"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-sm">
                            <label class="control-label" for="focusedInput">&nbsp;</label>
                            <button class="btn btn-success btn-sm">Generar reporte</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if(empty($informacion_consolidado)== false)
        <?php
        $total_enviado = 0; $total_despachos = 0;
        ?>
        <div class="card">
            <div class="card-block">
                <div class="m-b-1">
                    <h6>Información consolidada por vehiculos</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>VEHICULO</th>
                                <th>No. DESPACHOS</th>
                                <th>TOTAL ENVIADO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($informacion_consolidado as $row)
                                <?php
                                $total_enviado += $row->cantidad_total;
                                $total_despachos += $row->num_despachos;
                                ?>
                                <tr>
                                    <td>{{$row->placa}}</td>
                                    <td>{{number_format($row->num_despachos,0)}}</td>
                                    <td>{{number_format($row->cantidad_total,2) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr style="font-weight: bold">
                                <td>TOTALES</td>
                                <td>{{number_format($total_despachos,0)}}</td>
                                <td>{{number_format($total_enviado,2)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="m-b-1">
                    <h6>Graficas estadísticas</h6>
                    <hr/>
                    <div class="col-md-12" style="height: 450px" id="container2">

                    </div>
                </div>
            </div>
        </div>
        <?php
        $total_enviado = 0; $total_despachos = 0;
        ?>
        <div class="card">
            <div class="card-block">
                <div class="m-b-1">
                    <h6>Información total de gastos por vehiculo</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>PLACA</th>
                                <th>VEHICULO</th>
                                <th>GASTADO</th>
                                <th>INGRESOS</th>
                                <th>RESULTADO</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach($gasto_vehiculos as $row)
                                <?php
                                $total_enviado += $row->total_gasto;
                                //$total_despachos += $row->num_despachos;
                                ?>
                                <tr>
                                    <td>{{$row->placa}}</td>
                                    <td>{{$row->vehiculo_info}}</td>
                                    --}}{{--<td>{{number_format($row->no_gastos,0)}}</td>--}}{{--
                                    <td>{{number_format($row->total_gasto,2) }}</td>
                                    <td>{{number_format($row->total_ingreso,2) }}</td>
                                    <td>{{number_format( ($row->total_ingreso - $row->total_gasto) , 2) }}</td>
                                </tr>
                            @endforeach--}}
                            @foreach($vehiculos as $row)
                                <?php
                                $gastado = 0;
                                $ingresos = 0;
                                ?>
                                <tr>
                                    <td>{{$row->placa}}</td>
                                    <td>{{$row->marca}} {{$row->modelo}}</td>
                                    <td>
                                        @foreach($row->VehiculoGasto as $gasto)
                                            <?php $gastado += $gasto->valor; ?>
                                        @endforeach
                                        {{$gastado}}
                                    </td>
                                    <td>
                                        @foreach($row->VehiculoTercero as $vt)
                                            @foreach($vt->despacho as $des)
                                                @foreach($des->Detalles as $detalle)
                                                    <?php $ingresos += ($detalle->cantidad * $detalle->valor_unidad); ?>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        {{$ingresos}}
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr style="font-weight: bold">
                                <td colspan="3">TOTALES</td>
                                <td>{{number_format($total_enviado,2)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!--<div class="m-b-1">
                    <h6>Grafica</h6>
                    <hr/>
                    <div class="col-md-12" style="height: 450px" id="container3">

                    </div>
                </div>-->
            </div>
        </div>
        <div class="card">
            <div class="card-block">
                <div class="m-b-1">
                    <h6>Información despachos por vehiculo y dia calendario</h6>
                    <hr/>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>VEHICULO</th>
                                <th>OBRA</th>
                                <th>No. DESPACHOS</th>
                                <th>TOTAL ENVIADO</th>
                                <th>FECHA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($informacion_por_dias as $row)
                                <?php
                                $total_enviado += $row->cantidad_total;
                                $total_despachos += $row->num_despachos;
                                ?>
                                <tr>
                                    <td>{{$row->placa}}</td>
                                    <td>{{$row->nombre_obra}}</td>
                                    <td>{{number_format($row->num_despachos,0)}}</td>
                                    <td>{{number_format($row->cantidad_total,2) }}</td>
                                    <td>{{$row->fecha}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr style="font-weight: bold">
                                <td colspan="2">TOTALES</td>
                                <td>{{number_format($total_despachos,0)}}</td>
                                <td>{{number_format($total_enviado,2)}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="m-b-1">
                    <h6>Grafica</h6>
                    <hr/>
                    <div class="col-md-12" style="height: 450px" id="container1">

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    @if(empty($informacion_consolidado)== false)


        <script src="{{asset('Highcharts/code/highcharts.js')}}"></script>
        <script src="{{asset('Highcharts/code/highcharts-3d.js')}}"></script>
        <script src="{{asset('Highcharts/code/modules/exporting.js')}}"></script>
        <script>
            //Grafica por dias
            Highcharts.chart('container1', {
                chart: {
                    type: 'spline'
                },
                title: {
                    text: 'Vehiculos graficado por dias calendario'
                },
                subtitle: {
                    text: 'Del {{$fecha_inicio}} al {{$fecha_final}}'
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { // don't display the dummy year
                        day: '%Y<br/>%m-%d',
                        week: '%Y<br/>%m-%d',
                        month: '%Y-%m',
                        year: '%Y'
                    },
                    title: {
                        text: 'Fecha'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Cantidad unidades transportadas'
                    },
                    min: 0
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: '{point.x:%e. %b}: {point.y:.2f} Unds'
                },

                plotOptions: {
                    spline: {
                        marker: {
                            enabled: true
                        }
                    }
                },

                <?php
                    $codigo_prod = '';
                    $data = '';
                    foreach ($informacion_por_dias as $row) {
                        if ($codigo_prod != $row->placa && $codigo_prod == '') {
                            $data .= "name: '" . $row->placa . "' , data: [ ";
                            $codigo_prod = $row->placa;
                        } else if ($codigo_prod != $row->placa && $codigo_prod != '') {
                            $codigo_prod = $row->placa;
                            $data .= "]}, {name: '" . $row->placa . "' , data: [ ";
                        }
                        $fecha = \explode('-', $row->fecha);
                        $data .= "[Date.UTC($fecha[0], " . ($fecha[1] - 1) . ", $fecha[2]), $row->cantidad_total],";
                    }
                    $data .= "]";
                    ?>
                series: [{
                    {!!$data!!}
                }]

            });

            //grafica torta del total
            Highcharts.chart('container2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Grafica consolodido por vehiculo'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.y} unds</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                            }
                        }
                    }
                },
                <?php
                    $codigo_prod = '';
                    $data = '';
                    foreach ($informacion_consolidado as $row) {
                        $data .= "{
                        name: '$row->placa',
                        y: $row->cantidad_total
                    },";
                    }
                    ?>
                series: [{
                    name: 'Porductos ',
                    colorByPoint: true,
                    data: [
                        {!! $data !!}
                    ]
                }]
            });

        </script>
    @endif
@endsection