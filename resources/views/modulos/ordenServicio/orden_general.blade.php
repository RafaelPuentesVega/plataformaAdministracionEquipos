@extends('plantilla')
@section('content')
@section('css')
    <link href="http://localhost/plataforma/public/assets/js/toastr.min.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="http://localhost/plataforma/public/bootstrap/bootstrap.css" rel="stylesheet"/>

    {{-- <link href="https://fonts.googleapis.com/css2?family=Inconsolata&family=Roboto:ital@1&display=swap" rel="stylesheet"> --}}


@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body >

                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card "  >
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>ORDEN GENERAL</strong></h3>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="container-fluid">
                                            <div class="row ">

                                        <div class="col-md-15">
                                       <button class="btn btn-close" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                         BUSQUEDA AVANZADA
                                        </h4>
                                      </div>
                                    </div>
                                </div>
                                    </button>
                                </div>
                                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class="content">

                                                <div class="row ">
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <label for="">N° Orden</label>
                                                            <input type="number" id="numero_orden" name="numero_orden"
                                                                class="form-control" placeholder="N° Orden" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Fecha Ingreso</label>
                                                            <input type="date" id="fecha_ingreso" name="fecha_ingreso"
                                                                class="form-control" placeholder="Fecha de ingreso"
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Tecnico</label>
                                                            <select class="js-example-basic js-states form-control"
                                                                name="cliente_tipo" id="tipocliente" required>
                                                                <option value=>Seleccionar...</option>
                                                                @foreach ($tecnico as $Tecnico)
                                                                    <option value={{ $Tecnico->id }}>{{ $Tecnico->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <div class="form-group">
                                                            <label>SERIAL</label>
                                                            <input type="text" class="form-control" name="serial" id="serial"
                                                                placeholder="Serial" required autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="form-group">
                                                            <label>Cedula Cliente</label>
                                                            <input type="text" class="form-control" name="cedula_cliente"
                                                                id="cedula_cliente" placeholder="Cedula Cliente" required
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <div class="form-group">
                                                            <label>Nombre Cliente</label>
                                                            <input type="text" class="form-control" name="nombre_cliente"
                                                                id="nombre_cliente" placeholder="Nombre Cliente" required
                                                                autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <div class="form-group">
                                                            <label>Buscar</label>
                                                            <button class="btn btn-success">BUSCAR</button>
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

                        <div class="col-md-12">

                            <div class="table-responsive-xl">
                                <table class="table table-hover" style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr >
                                            <th width="8%"
                                                style=" font-size: 12px ;font-weight:normal; text-align: center ">
                                                &nbsp;<strong>N° Orden </strong>

                                            </th>
                                            <th width="9%"
                                                style="font-size: 12px ; font-weight:normal;text-align: rigth">
                                                &nbsp;<strong>Fecha <br> Ingreso</strong>

                                            </th>

                                            <th width="10%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Cedula</strong>

                                            </th>
                                            <th width="24%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Cliente</strong>

                                            </th>
                                            <th width="20%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Equipo</strong>

                                            </th>
                                            <th width="20%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Tecnico</strong>

                                            </th>
                                            <th width="11%" style="font-size: 11px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Valor Servicio</strong>

                                            </th>
                                            <th width="8%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>IVA</strong>

                                            </th>
                                            <th width="10%" style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                                &nbsp;<strong>Valor Total</strong>

                                            </th>
                                            <th width="3%" style="font-size: 12px ;font-weight:normal;  text-align: left">

                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordenServicio as $OrdenServicio)


                                                    @if ($OrdenServicio->fecha_estimada_orden < date('Y-m-d') && $OrdenServicio->estadoOrden == 1)
                                                    <tr  onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'" class="table-danger" style="cursor: pointer; background-color: #E74C3C">
                                                        {{-- {{-- ORDEN VENCIDA --}}

                                                    @elseif($OrdenServicio->estadoOrden == 1)
                                                    <tr onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'" class="table" style="cursor: pointer;background-color: #faefff7e">
                                                        {{-- {{-- ORDEN RECIEN INGRESO --}}
                                                    @elseif($OrdenServicio->estadoOrden == 2)
                                                    <tr onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"class="table-success" style="cursor: pointer;background-color: #28B463">
                                                        {{-- {{-- ORDEN LISTA PARA ENTREGAR --}}
                                                    @elseif($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null)
                                                    <tr  class="table-warning" style="cursor: pointer;background-color: #FFFF00">
                                                        {{-- {{-- ORDEN ENTREGADA SIN FACTURA --}}
                                                    @elseif($OrdenServicio->estadoOrden == 3)
                                                    <tr onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"class="table-primary" style="cursor: pointer;">
                                                        {{-- {{-- ORDEN ENTREGADA --}}
                                                    @else
                                                    <tr onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'" style="cursor: pointer;background-color: #ffffff7e">
                                                    @endif
                                                {{-- <tr style="background-color: #ffffff7e" > --}}


                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="height: 55px;font-size: 16px ; text-align: center ">
                                                    <strong>{{ $OrdenServicio->id_orden }}</strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 12px ; font-weight:normal;text-align: left">
                                                    <strong>{{ $OrdenServicio->fecha_creacion_orden }}</strong>

                                                </th>

                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 12px ;font-weight:normal; text-align: left ">
                                                    <strong>{{ $OrdenServicio->cliente_documento }}</strong>

                                                </th>

                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"

                                                    style="font-size: 11px ; font-weight:normal;text-align: left">

                                                    <strong>{{ $OrdenServicio->cliente_nombres }}</strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 11px ;font-weight:normal;  text-align: left">
                                                    <strong>{{ $OrdenServicio->equipo_tipo }}- {{ $OrdenServicio->equipo_marca }} -
                                                    {{ $OrdenServicio->equipo_referencia }}</strong>
                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 11px ;font-weight:normal; text-align: left ">
                                                    <strong>{{ $OrdenServicio->name }}</strong> </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 14px ;font-weight:normal; text-align: left ">
                                                    <strong>${{number_format($OrdenServicio->valor_servicio_orden  , 0, ',', '.') }}</strong>
                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 14px ; font-weight:normal;text-align: left">
                                                    <strong> ${{ number_format($OrdenServicio->iva_orden , 0, ',', '.')  }}</strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/{{encrypt($OrdenServicio->id_orden)}}'"
                                                    style="font-size: 14px ; font-weight:normal;text-align: left">
                                                    <strong>${{ number_format($OrdenServicio->valor_total_orden , 0, ',', '.') }}</strong>
                                                </th>

                                                <th  style="font-size: 12px ;font-weight:normal;  text-align: center">
                                                    {{-- VALIDAMOS SI LA ORDEN ESTA ENTREGADA Y NO TIENE FACTURA - PARA HABILIAR EL BOTON DE FACTURA --}}
                                                    @if($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null && auth()->user()->rol == "ADMINISTRATIVO")
                                                        <button title="FACTURAR" data-toggle="tooltip" data-placement="left" style="border: none; outline:none; text-decoration: none; margin: 0px; margin-bottom: 10px" type="submits" class="btn btn-success btn-fill  pull-right " id="btnGuardarCliente" onclick="facturaNumero('{{ $OrdenServicio->id_orden }}')" >
                                                            <i style="color: #ffffff; font-size: 25px; margin: -9px;" class="bi bi-currency-dollar box-info pull-left"></i>
                                                        </button>
                                                    @endif

                                                    {{-- <a href="{{ url('ordenGeneral', encrypt($OrdenServicio->id_orden) ) }}">
                                                    <button title="VER ORDEN" data-toggle="tooltip" data-placement="left" style="border: none; outline:none; text-decoration: none; margin: 0px" type="submits" class="btn btn-orden btn-fill  pull-right " id="btnGuardarCliente" >
                                                        <i style="color: #ffffff; font-size: 25px; margin: -9px;" class="bi bi-file-text box-info pull-left"></i>
                                                    </button>
                                                    <a> --}}
                                                </th>
                                            <tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
        </div>
    </div>
</div>
</div>
@include('modulos.ordenServicio.modalFacturaNumero')

@section('js')
    <script src="http://localhost/plataforma/public/js/jquery.min.js"></script>
    <script src="http://localhost/plataforma/public/assets/js/toastr.min.js"></script>
    <script src="http://localhost/plataforma/public/js/facturaNumero.js"></script>
    <script>
   $(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })

    </script>


@endsection


@endsection
