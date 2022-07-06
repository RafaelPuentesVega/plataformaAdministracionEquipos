@extends('plantilla')
@section('content')
@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.11.3/datatables.min.css"/> --}}
    {{-- <link href="http://localhost/plataforma/public/bootstrap/bootstrap.css" rel="stylesheet"/> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/> --}}
    {{-- <link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/fontawesome/css/fontawesome.min.css"/> --}}
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
    <link href="{!! url('fontawesome/css/all.css" rel="stylesheet') !!}" />

    {{-- <link href="http://localhost/plataforma/public/iniciocss/bootstrap.css" rel="stylesheet" /> --}}
    <link href="{!! url('assets/js/toastr.min.css" rel="stylesheet') !!}" />
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link href="{!! url('bootstrap/bootstrap.css" rel="stylesheet') !!}" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
        <style type="text/css">
            .card label { color: black; font-weight: bold}
        </style>
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card ">
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style=" color: #ffffff ; padding-bottom :10px;">
                        <strong>CLIENTE</strong>
                    </h3>
                </div>
            </div>

            <div class="card">
                {{-- <div class="card-body"> --}}

                    <div class="container-fluid">

                        <div class="row ">
                            <div class="col-md-12">

                                <div class="content">
                                    {{-- <form action="/plataforma/public/crear_orden_servicio" method="post">
                                @csrf --}}

                                    <div class="row" required>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label style="color: black; font-weight: bold" for="">TIPO CLIENTE</label>
                                                <select style="appearance:none;"
                                                    class="js-example-basic js-states form-control" name="cliente_tipo"
                                                    id="tipocliente" required>
                                                    <option value="{{ $dataCliente->cliente_tipo }}">
                                                        {{ $dataCliente->cliente_tipo }}</option>
                                                    @if ($dataCliente->cliente_tipo != 'EMPRESA')
                                                        <option value="EMPRESA">EMPRESA</option>
                                                    @else
                                                        <option value="PERSONA">PERSONA</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        {{-- {{ $dataCliente['cliente_nombres']}} --}}
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Cedula / Nit</label>
                                                <input value="{{ $dataCliente->cliente_documento }}" type="text"
                                                    id="cliente_documento" name="cliente_documento"
                                                    class="form-control" placeholder="Numero Documento"
                                                    autocomplete="off" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombres</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <i style="color: #242424; font-size: 22px; margin: -5px"
                                                            class="bi bi-person-fill box-info pull-left"></i>
                                                    </span>
                                                    <input type="text" value="{{ $dataCliente->cliente_nombres }} "
                                                        class="form-control" name="cliente_nombres"
                                                        id="cliente_nombres" placeholder="Nombres" required
                                                        autocomplete="off" style="text-transform: uppercase"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CORREO</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"
                                                        id="basic-addon1"><strong>@</strong></span>
                                                    <input value="{{ $dataCliente->cliente_correo }}" type="email"
                                                        class="form-control" name="cliente_correo" id="cliente_correo"
                                                        placeholder="Correo Electronico" required autocomplete="off">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>DIRECCION</label>
                                                <input type="text" value="{{ $dataCliente->cliente_direccion }}"
                                                    class="form-control" name="cliente_direccion"
                                                    id="cliente_direccion" placeholder="Dirección" required
                                                    autocomplete="off" style="text-transform: uppercase"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>CELULAR</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">

                                                        <i style="color: #242424; font-size: 22px; margin: -5px"
                                                            class="bi bi-phone box-info pull-left"></i>
                                                    </span>
                                                    <input type="phone" maxlength="10"
                                                        value="{{ $dataCliente->cliente_celular }}"
                                                        class="form-control" name="cliente_celular"
                                                        id="cliente_celular" placeholder="Celular" required
                                                        autocomplete="off">
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">TELEFONO</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">
                                                        <i style="color: #242424; font-size: 17px; margin: -5px"
                                                            class="bi bi-telephone-fill box-info pull-left"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        value="{{ $dataCliente->cliente_telefono }}" maxlength="10"
                                                        name="cliente_telefono" id="cliente_telefono"
                                                        placeholder="Telefono" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">DEPARTAMENTO</label>
                                                <select class="js-example-basic js-states form-control"
                                                    name="departamento_id" id="departamentoSelect" autocomplete="off">
                                                    <option value="{{ $dataCliente->departamento_nombre }}">
                                                        {{ $dataCliente->departamento_nombre }}</option>
                                                    {{-- @foreach ($departamentos as $departamento)
                                                <option value="{{ $departamento->departamento_id }}">{{$departamento->departamento_nombre}}</option>
                                                @endforeach --}}

                                                </select>
                                            </div>



                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">MUNICIPIO</label>
                                                <div id="response-container">
                                                    <select class="js-example-basic js-states form-control"
                                                        name="municipio_id" id="municipioSelect" autocomplete="off">
                                                        <option value="{{ $dataCliente->municipio_nombre }}">
                                                            {{ $dataCliente->municipio_nombre }}</option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div id="btn-update">
                                        <button title="GUARDAR" data-toggle="tooltip" data-placement="bottom"
                                            style="padding: 5px;border: none; outline:none; text-decoration: none; margin: 10px"
                                            type="button" class="btn btn-info btn-fill pull-right "
                                            id="btnGuardarCliente" onclick="guardarCliente()">
                                            {{-- <i style="font-size: 19px" class="fas fa-save"></i> --}}
                                            <i style="font-size: 19px" class="fa-solid fa-user-pen"></i>
                                            {{-- <i style="color: #ffffff; font-size: 18px" class="bi bi-save pull-left"></i> --}}
                                            <span style="font-size: 18px; margin-block-start: 15%">Actualizar</span>
                                        </button>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">



                        <div style="margin-top: -3%" class="btn-group btn-group-justified" onchange="javascript:showContent()" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnEquipo" autocomplete="off" >
                            <label class="btn btn-outline-secondary  " for="btnEquipo" style="border-block: unset;font-size: 17px">Equipos</label>

                            <input type="radio" class="btn-check" name="btnradio" id="btnOrden" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="btnOrden" style="border-block: unset;font-size: 17px">Orden de servicio</label>
                            @if($dataCliente->cliente_tipo == "EMPRESA" || $dataCliente->cliente_tipo == "empresa")
                            <input type="radio" class="btn-check" name="btnradio" id="btnUsuarioEmpresa" autocomplete="off">
                            <label class="btn  btn-outline-secondary " for="btnUsuarioEmpresa" style="border-block: unset; font-size: 17px">Usuarios</label>
                            @endif

                        </div>
                        <hr>
                        <br><br>
                        {{-- Tabla Orden Servicio --}}

                            <div class="table-responsive-xl" id="ordenServicio" style="display: none">
                                <table id="tableOrdenServicio" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif">
                                    <thead class="thead-light">
                                        <tr  >
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Orden N°</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Fecha Ingreso</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Fecha Entrega</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Equipo</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Tecnico</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Valor total</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($arrayOrden as $orden)



                                            <tr style="font-size: 13px;height: 50px">


                                            <td class="text-center" style="font-size: 18px"><strong>{{ $orden->id_orden}}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->fecha_creacion_orden}}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->fecha_entrega_orden}}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->equipo_tipo}} - {{ $orden->equipo_marca}} - {{$orden->equipo_referencia}}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->name}}</strong></td>
                                            <td class="text-center"><strong>{{ $orden->valor_total_orden}}</strong></td>
                                            <td>
                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de cliente" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente"  >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-lines-fill box-info pull-left"></i>
                                                </button>
                                            </td>

                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Tabla Equipo --}}

                            <div class="table-responsive-xl" id="equipoCliente" style="display: none">
                                <table id="tableEquipoCliente" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr  >
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Equipo</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Marca</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Referencia</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Serial</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($arrayEquipo as $equipo)



                                            <tr style="font-size: 12px;height: 50px">


                                            <td class="text-center"><strong>{{ $equipo->equipo_tipo}}</strong></td>
                                            <td class="text-center"><strong>{{ $equipo->equipo_marca}}</strong></td>
                                            <td class="text-center"><strong>{{ $equipo->equipo_referencia}}</strong></td>
                                            <td class="text-center"><strong>{{ $equipo->equipo_serial}}</strong></td>
                                            <td>
                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de cliente" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente"  >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-lines-fill box-info pull-left"></i>
                                                </button>
                                            </td>

                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{-- Tabla Usuario Empresa --}}
                            <div class="table-responsive-xl" id="usuarioEmpresa" style="display: none">
                                <table id="tableUsuarioEmpresa" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr  >
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Dependencia</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Usuario</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Celular</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($arrayUsuarioEmpresa as $usuarioEmpresa)



                                            <tr style="font-size: 12px;height: 50px">


                                            <td class="text-center"><strong>{{ $usuarioEmpresa->usuario_dependencia}}</strong></td>
                                            <td class="text-center"><strong>{{ $usuarioEmpresa->usuario_nombre}}</strong></td>
                                            <td class="text-center"><strong>{{ $usuarioEmpresa->usuario_celular}}</strong></td>
                                            <td>
                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de cliente" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente"  >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-lines-fill box-info pull-left"></i>
                                                </button>
                                            </td>

                                        </tr>
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


@section('js')

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{!! url('js/editCliente.js') !!}"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

        })
    </script>
@endsection
@endsection
