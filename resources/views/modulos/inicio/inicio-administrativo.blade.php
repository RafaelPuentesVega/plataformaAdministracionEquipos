@extends('plantilla')
@section('css')
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    {{-- <link href="{!! url('iniciocss/bootstrap.css') !!}" rel="stylesheet" /> --}}
    <link href="{!! url('css/sb-edit.css') !!}" rel="stylesheet" />
    <link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
@endsection
@section('content')

    <div class="main-panel">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">



                    <body style="background-color:rgba(233, 233, 233, 0.295);">

                        <div class="row">

                            <div class="col-xl-3 col-md-6 mb-3">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Ordenes Creadas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cantOrdenes}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-3">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Ingreso Total</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{number_format($priceOrdenes['total'] , 0, ',', '.')}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-3">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Pendiente Factura
                                                    <span style="color: black; font-size: 18px"> {{$PendienteFacturar}}</span>
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$porcentaje}}%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="progress progress-xl mr-2">
                                                            <div class="progress-bar bg-info" role="progressbar"
                                                                style="width: {{$porcentaje}}%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6 mb-3">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Pendiente Entregar</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$Pendientes}}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Ordenes de servicio {{$añoActual}}</h6>

                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="myAreaChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pie Chart -->
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Equipos en Reparacion <span style="font-size: 15px; color: black"> {{$ordenesReparacion}}</span></h6>
                                        {{-- <div class="dropdown no-arrow">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                                aria-labelledby="dropdownMenuLink">
                                                <div class="dropdown-header">Dropdown Header:</div>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="chart-pie pt-4 pb-2">
                                            <canvas id="myPieChart"></canvas>
                                        </div>
                                        <div class="mt-4 text-center small">
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-danger"></i>{{$tamañoVencidas}} Vencidas
                                            </span>
                                            <span class="mr-2">
                                                <i class="fas fa-circle text-success"></i>{{$tamañovigentes}} Vigentes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>



    </div>




    </div>
    </div>
@section('js')
    {{-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> --}}


    <script src="{!! url('js/jquery.min.js') !!}"></script>
    {{-- <script src="{!! url('assets/js/toastr.min.js') !!}"></script> --}}

    {{-- <script src="{!! url('js/inicio.js') !!}"></script> --}}
    <script src="{!! url('chart.js/Chart.min.js') !!}" ></script>

    <!-- Page level custom scripts -->
    <script src="{!! url('chart.js/grafico/chart-area-demo.js') !!}" ></script>
    <script src="{!! url('chart.js/grafico/chart-pie-demo.js') !!}" ></script>

<script type="text/javascript">
// Grafica de lineas
var cantidadOrdenes= new Object();;
enero = "<?= json_encode($enero) ?>";
febrero = "<?= json_encode($febrero) ?>";
marzo = '<?= json_encode($marzo) ?>';
abril = "<?= json_encode($abril) ?>";
mayo = "<?= json_encode($mayo) ?>";
junio = "<?= json_encode($junio) ?>";
julio = "<?= json_encode($julio) ?>";
agosto = "<?= json_encode($agosto) ?>";
septiembre = "<?= json_encode($septiembre) ?>";
octubre = "<?= json_encode($octubre) ?>";
noviembre = "<?= json_encode($noviembre) ?>";
diciembre = "<?= json_encode($diciembre) ?>";

var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
    datasets: [{
      label: "Cantidad",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [1],
          zeroLineBorderDash: [1]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
//Grafica de Torta
ordenesVigentes = "<?= json_encode($tamañovigentes) ?>";
ordenesVencidas = "<?= json_encode($tamañoVencidas) ?>";
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Vigentes", "Vencidas"],
    datasets: [{
      data: [ordenesVigentes, ordenesVencidas],
      backgroundColor: ['#1cc88a', '#F48358'],
      hoverBackgroundColor: ['#17a673','#f5a182' ],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

    </script>

@endsection
@endsection
