@extends('admin.admin-cab.cabecera')
@section('content')
@include('admin.admin-cab.nav')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ Auth::user()->name }}</h1>
                </div>
            </div>
            <div class="row">
                <!-- nuevos mensajes -->
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $contar_mensajes }}</div>
                                    <div>Nuevos Mensajes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.mensajes') }}">
                            <div class="panel-footer">
                                <a href="{{ route('admin.mensajes') }}">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- / nuevos mensajes -->
                <!-- nuevas tareas -->
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{ $tareas }}</div>
                                    <div>Nuevas Tareas!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <a href="{{ route('admin.hora_medica') }}">
                                    <span class="pull-left">Ver Detalles</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </a>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- / nuevas tareas -->
                <!--  nuevos tickets 
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Total de Visitas!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                /nuevos tickets -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- área chart -->
                    <div id="curve_chart" style="width: 100%; height: 500px"></div>
                    <!-- /área chart -->
                </div>

            </div>
        </div>
    </div>
 <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Tareas', 'Mensajes'],
          ['Ene',  {{ $grafico_tareas[0] }}, {{ $grafico_mensajes[0] }}],
          ['Feb',  {{ $grafico_tareas[1] }}, {{ $grafico_mensajes[1] }}],
          ['Mar',  {{ $grafico_tareas[2] }}, {{ $grafico_mensajes[2] }}],
          ['Abr',  {{ $grafico_tareas[3] }}, {{ $grafico_mensajes[3] }}],
          ['May',  {{ $grafico_tareas[4] }}, {{ $grafico_mensajes[4] }}],
          ['Jun',  {{ $grafico_tareas[5] }}, {{ $grafico_mensajes[5] }}],
          ['Jul',  {{ $grafico_tareas[6] }}, {{ $grafico_mensajes[6] }}],
          ['Ago',  {{ $grafico_tareas[7] }}, {{ $grafico_mensajes[7] }}],
          ['Sep',  {{ $grafico_tareas[8] }}, {{ $grafico_mensajes[8] }}],
          ['Oct',  {{ $grafico_tareas[9] }}, {{ $grafico_mensajes[9] }}],
          ['Nov',  {{ $grafico_tareas[10] }}, {{ $grafico_mensajes[10] }}],
          ['Dic',  {{ $grafico_tareas[11] }}, {{ $grafico_mensajes[11] }}]
        ]);

        var options = {
          title: '  Gráfico Anual',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
@endsection
