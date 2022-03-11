@extends('layouts.app')

@section('titulo', 'Avaliações Turma')

@section('cabecalho')<br>
<h3 class="h3">Listagem de Avaliações </h3>
<div class="col-md-6">
    @if(!empty($turma->nome))
        <h5>Avaliação: <b>{{$avaliacao->titulo}}</b></h5>
        <h5>Turma: <b>{{$turma->nome}}</b></h5>
        <a class="btn btn-primary" href="{{ url('avaliacao')}}"><i
                class="fas fa-arrow-left"></i> Voltar</a>
    @endif
</div>
@stop

@section('graficos')
    <h3 class="h3">Desempenho da turma</h3><br><br>
    <div class="row d-flex justify-content-center">
        <div class="col-6 ">
            <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
            <div id="chartBoxPlotTurma"></div>
            <script>
                var options = {
                    series: [
                        {
                            name: 'box',
                            type: 'boxPlot',
                            data: [
                                {
                                    x: "Competência 1",
                                    y: @json($graficosTBP['competenciasBoxPlot']["c1"])
                                },
                                {
                                    x: "Competência 2",
                                    y:  @json($graficosTBP['competenciasBoxPlot']["c2"])
                                },
                                {
                                    x: "Competência 3",
                                    y: @json($graficosTBP['competenciasBoxPlot']["c3"])
                                },
                            ]
                        },
                        {
                            name: 'outliers',
                            type: 'scatter',
                            data: [
                                {
                                    x: "Competência 1",
                                    y: @json($graficosTBP['competenciasBoxPlot']["c1_Outlier"])
                                },
                                {
                                    x: "Competência 2",
                                    y: @json($graficosTBP['competenciasBoxPlot']["c1_Outlier"])
                                },
                                {
                                    x: "Competência 3",
                                    y: @json($graficosTBP['competenciasBoxPlot']["c1_Outlier"])
                                },
                            ]
                        }
                    ],
                    chart: {
                        type: 'boxPlot',
                        height: 350
                    },
                    colors: ['#008FFB', '#FEB019'],
                    title: {
                        text: 'Gráfico por Competências - BoxPlot',
                        align: 'left'
                    },
                    /*
                    xaxis: {
                        type: 'datetime',
                        tooltip: {
                            formatter: function (val) {
                                return new Date(val).getFullYear()
                            }
                        }
                    },
                    */
                    tooltip: {
                        shared: false,
                        intersect: true
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chartBoxPlotTurma"), options);
                chart.render();
            </script>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            {{ $graficosDC['chartDelineamentoColetivo']->container()}}
            {{ $graficosDC['chartDelineamentoColetivo']->script() }}
        </div>
        <div class="col-6 ">
            {{ $graficosDC2['chartResolucaodoproblema']->container()}}
            {{ $graficosDC2['chartResolucaodoproblema']->script() }}
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-6 ">
            {{ $graficosDC3['chartAnalisedoresultado']->container()}}
            {{ $graficosDC3['chartAnalisedoresultado']->script() }}
        </div>
    </div>
@stop
