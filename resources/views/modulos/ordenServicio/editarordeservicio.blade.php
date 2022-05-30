@extends('plantilla')
@section('content')
@section('css')
    <link href="http://localhost/plataforma/public/assets/js/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="http://localhost/plataforma/public/assets/js/toastr.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <style>
        table,
        tr,
        td,
        th {
            height: 32px;
            word-break: break-all;
            table-layout: fixed;
            border-collapse: collapse;
        }

    </style>
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body style="background-color:rgba(233, 233, 233, 0.295);">

                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-15">

                            <div class="card "  >
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>ORDEN DE SERVICIO N° {{ $arrayData->id_orden }}</strong></h3>
                                </div>
                            </div>

                            <div class="card ">


                                <div class="header">
                                    <input disabled id="idOrden" value="{{ $arrayData->id_orden }}" hidden>
                                    <input disabled id="totalValorFinal" value="{{ $totalValorRepuestos }}" hidden>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA INGRESO</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_creacion_orden }}"
                                                    id="fecha_creacion_orden" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA DIAGNOSTICO</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_diagnostico_orden }}"
                                                    id="fecha_diagnostico" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA ESTIMADA ENTREGA</label>
                                                <input disabled type="date" class="form-control"
                                                    id="fecha_estimada_entrega"
                                                    value="{{ $arrayData->fecha_estimada_orden }}" placeholder="Equipo"
                                                    required autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabla">


                                        <table class="table-hover" width="100%"
                                            style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 8px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                            <tr style=" font-size: 17px;  ">
                                                <th colspan="4"
                                                    style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong> </label>  </th>
                                                </th>
                                            </tr>
                                            <tr style=" font-size: 12px ">
                                                <th width="22%"
                                                    style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>Nit o C.C: &nbsp; </label>
                                                    {{ $arrayData->cliente_documento }}</strong>
                                                </th>
                                                <th colspan="2" width="37%"
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp; <strong>
                                                        <label>Nombre:&nbsp;</label>
                                                   {{ $arrayData->cliente_nombres }}</strong> </th>
                                                <th width="41%"
                                                    style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>E-Mail:&nbsp;</label>
                                                    {{ $arrayData->cliente_correo }}</strong>
                                                </th>

                                            </tr>

                                            <tr>
                                                <th width="30%"
                                                    style="font-size: 12px ;height: 40px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>Ciudad:&nbsp;</label>{{ $arrayData->municipio_nombre }}
                                                    - {{ $arrayData->departamento_nombre }}</strong>

                                                </th>
                                                <th width="20%"
                                                    style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>Telefono:&nbsp;</label>{{ $arrayData->cliente_telefono }}</strong>

                                                </th>
                                                <th width="20%"
                                                    style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>Celular:&nbsp;</label>{{ $arrayData->cliente_celular }}</strong>

                                                </th>
                                                <th width="30%"
                                                    style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong><label>Direccion:&nbsp;</label>{{ $arrayData->cliente_direccion }}</strong>

                                                </th>

                                            </tr>
                                            @isset($arrayData->usuario_dependencia)
                                                <tr>
                                                    <th
                                                        style="height: 38px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp; <strong><label>Dependencia:
                                                                &nbsp;</label>{{ $arrayData->usuario_dependencia }}</strong>

                                                    </th>
                                                    <th colspan="2"
                                                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong><label>Usuario:&nbsp;</label>
                                                        {{ $arrayData->usuario_nombre }}</strong>

                                                    </th>
                                                    <th
                                                        style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong><label>Celular Usuario:&nbsp;</label>
                                                        {{ $arrayData->usuario_celular }}</strong>

                                                    </th>
                                                </tr>
                                            @endisset

                                        </table>

                                        {{-- <div class="content">
                                        {{--
                                        <form action="/plataforma/public/crear_orden_servicio" method="post">
                                            @csrf


                                            <div class="row" required>
                                                <div class="col-md-2">
                                                    <div class="form-group" >
                                                        <label for="">TIPO CLIENTE<div style="color: black"> EMPRESA</div></label>


                                                    </div>
                                                </div>

                                                <div class="col-md-2">
                                                    <div class="form-group" >
                                                        <label for="">Nit - CC<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">NOMBRE<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">CORREO<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">


                                                <div class="col-md-4">
                                                    <div class="form-group" >
                                                        <label for="">DIRECCION<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CELULAR<div style="color: black"> EMPRESA</div></label>

                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">TELEFONO<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">CIUDAD<div style="color: black"> NEIVA - HUILA</div></label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row"  id="empresas"  >
                                                <hr style=" border: none; border-bottom: 1px solid rgba(161, 156, 156, 0.473); font-size: 1%">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">TIPO CLIENTE<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">TIPO CLIENTE<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">TIPO CLIENTE<div style="color: black"> EMPRESA</div></label>

                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label >Agregar</label>
                                                        <div class="btn-save">
                                                            <button title="GUARDAR" style="margin-left: 15%; border: none; outline:none; text-decoration: none" type="submits" class="btn btn-success btn-fill  btn-round " id="btnGuardarEmpresa" onclick="guardarUsuarioEmpresa()" >
                                                                <i style="color: #ffffff; font-size: 13px" class="bi bi-plus box-info pull-left"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        {{-- </form> --}}

                                    </div>
                                </div>
                            </div>

                            <div class="card" style="margin-top: -15px">

                                <div class="header">

                                </div>
                                <div class="content">


                                    {{-- <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">EQUIPO</label>
                                                <input type="text" class="form-control" id="equipo_tipo" placeholder="Equipo"  required autocomplete="off" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                         </div>

                                            <div class="col-md-2">
                                            <div class="form-group">
                                                    <label>MARCA</label>
                                                        <input type="text" class="form-control" id="equipo_marca" placeholder="Marca"   required autocomplete="off" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>RFERENCIA</label>
                                                        <input type="text" class="form-control" id="equipo_referencia" placeholder="Referencia" required autocomplete="off" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>

                                             <div class="col-md-2">
                                                <div class="form-group">
                                                        <label>SERIAL</label>
                                                            <input type="text" maxlength="6" class="form-control"  id="equipo_serial" placeholder="Serial" required autocomplete="off">
                                                </div>
                                             </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">VERI. FUNC</label>
                                                        <select class="js-example-basic-multiple js-states form-control" id="verificacion_funcionamiento" required >
                                                            <option >Seleccione..</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO" >NO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label >Save</label>
                                                               <button id="btnGuardarEquipo" class="btn btn-info btn-fill" onclick="guardarEquipoOrden()">Guardar </button>
                                                    </div>
                                                 </div>

                                    </div> --}}
                                    <table class="" width="100%"
                                        style="border-collapse: collapse;border-radius: 8px;box-shadow: inset 0 0 0 1px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                                        <tr>
                                            <th colspan="4"
                                                style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1;font-size: 15px; height: 1px;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>EQUIPO</strong> </label>  </th>

                                            </th>

                                        </tr>

                                        <tr style="height: 38px">
                                            <th width="20%"
                                                style=" font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<label><strong>Equipo:
                                                        &nbsp;</label>{{ $arrayData->equipo_tipo }}</strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong><label>Marca:&nbsp;</label>{{ $arrayData->equipo_marca }}
                                                </strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong><label>Referencia:&nbsp;</label>{{ $arrayData->equipo_referencia }}
                                                </strong>

                                            </th>
                                            <th width="20%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1px solid">
                                                &nbsp;<strong><label>Serial:&nbsp;</label>{{ $arrayData->equipo_serial }}</strong>

                                            </th>
                                        </tr>
                                    </table>

                                    <hr>

                                    <div><label><strong>Accesorios</strong></label> <br>
                                        {{ $arrayData->accesorios_orden }}</div>

                                    <hr>
                                    <div>
                                        <label><strong>Caracteristicas Equipo</strong></label> <br>
                                        {{ $arrayData->caracteristicas_equipo_orden }}
                                    </div>
                                    <hr>
                                    <div>
                                        <label><strong> Daño Equipo</strong></label> <br>
                                        {{ $arrayData->descripcion_dano_orden }}
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea
                                                @if($arrayData->estadoOrden != 1) disabled @endif
                                                @if (sizeOf($diagnostico) != 1) disabled placeholder="Guardar diagnostico" @endif
                                                rows="3" id="reporteTecnico" class="form-control" maxlength="240" placeholder="REPORTE TECNICO" autocomplete="off" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">{{$arrayData->reporte_tecnico_orden}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                        <div style="text-align: right; margin-bottom: -20px"><label><strong>TECNICO: </strong></label>{{$arrayData->name}} </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                @if (sizeOf($diagnostico) == 1)
                                                    <textarea rows="1" style=" text-align: left" class="form-control"
                                                        disabled>{{ $Arraydiagnostico->descripcion_observacion }}
                                            </textarea>
                                                @else
                                                    <textarea style="text-transform: uppercase;" rows="1"
                                                        id="diagnostico" class="form-control" maxlength="240"
                                                        placeholder="Diagnostico Tecnico" autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    @if (sizeOf($diagnostico) != 1)
                                                        <button title="Agregar Diagnostico" data-toggle="tooltip" data-placement="right"
                                                            style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none;"
                                                            type="button" class="btn btn-info btn-fill  "
                                                            id="btnDiagnostico" onclick="guardarDiagnostico()">
                                                            <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                                class="bi bi-plus-lg box-info pull-left"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea rows="1" style="text-transform: uppercase" id="anotacion"
                                                    class="form-control" maxlength="240" placeholder="Novedades"
                                                    autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    <button title="Agregar Novedad" data-toggle="tooltip" data-placement="right"
                                                        style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none"
                                                        type="button" class="btn btn-info btn-fill " id="btnAnotacion"
                                                        onclick="guardarAnotacion()">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-plus-lg box-info pull-left"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (sizeOf($anotacion) != 0)
                                        <div class="table-responsive-xl">
                                            <div style="text-align: center">ANOTACIONES</div>

                                            <table class="table table-striped" width="100%"
                                                style="text-align: center; border-collapse: collapse;border-radius: 10px;box-shadow: inset 0 0 0 1px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                                <thead class="thead-light">
                                                    <tr
                                                        style="background-color: rgba(226, 226, 226, 0.295);; height: 38px">
                                                        <th width="16%"
                                                            style=" font-size: 12px ;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>FECHA </strong>

                                                        </th>
                                                        <th width="64%"
                                                            style="font-size: 12px ; font-weight:normal;text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong> NOVEDADES</strong>

                                                        </th>
                                                        <th width="20%" style="font-size: 12px ;font-weight:normal;  text-align: center
                                                        ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>USER</strong>

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($anotacion as $comentario)
                                                        <tr>
                                                            <th width="20%"
                                                                style="font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;{{ $comentario->created_at_observacion }}

                                                            </th>
                                                            <th width="50%"
                                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp; {{ $comentario->descripcion_observacion }}

                                                            </th>
                                                            <th width="30%"
                                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;{{ $comentario->user_observacion }}

                                                            </th>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                    <hr>
                                    <table class="" width="100%"
                                        style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 11px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 1.5px solid">
                                        <tr style=" font-size: 13px ; background-color: #AED6F1">

                                            <th width="10%"
                                                style=" border-top-left-radius: 0.5rem; height: 1px; font-weight:normal; text-align: left">
                                                &nbsp;<strong>Cantidad </strong>
                                            </th>
                                            <th width="60%"
                                                style="font-weight:normal;text-align: left ">
                                                &nbsp; <strong>
                                                    Descripcion</strong> </th>
                                            <th width="15%"
                                                style="font-size: 13px ;font-weight:normal;  text-align: left">
                                                &nbsp;<strong>$ Unitario</strong>
                                            </th>
                                            <th width="15%"
                                                style="border-top-right-radius: 0.5rem;font-size: 13px ;font-weight:normal;  text-align: left">
                                                &nbsp;<strong>$ Total</strong>
                                            </th>

                                        </tr>
                                        @if(sizeOf($repuesto) != 0)
                                            @foreach ($repuesto as $repuestos)
                                                <tr style=" font-size: 13px ">
                                                    <th width=""
                                                        style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;{{ $repuestos->cantidad_repuesto }}
                                                    </th>
                                                    <th width="" style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;{{ $repuestos->nombre_repuesto }}
                                                    </th>
                                                    @if($repuestos->estado_repuesto == 1)
                                                    <th width="" colspan="2"
                                                        style="color: red; font-size: 13px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid" id="valorTotalRepuesto">
                                                        &nbsp; Pendiente de Autorizacion
                                                    </th>
                                                    @else
                                                    <th width=""
                                                        style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid" id="valorTotalRepuesto">
                                                        &nbsp;<strong>${{ $repuestos->valor_unitario_repuesto }}</strong>
                                                    </th>
                                                    <th width=""
                                                        style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong>${{ $repuestos->valor_total_repuesto }}</strong>
                                                    </th>
                                                    @endif

                                                </tr>
                                            @endforeach
                                        @endif
                                            <tr style=" font-size: 13px " id="repuestoIngresado" hidden>
                                            <th id="cantidadRpuestoTr" width="" style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"></th>
                                            <th width="" style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"></th>
                                            <th width="" style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"></th>
                                            <th width="" style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"></th>
                                            </tr>
                                        <tr style=" font-size: 13px ">
                                            <th width=""
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.123) 1px solid">
                                                <input style="margin-top: 0%; width: 60px " type="number"
                                                class="form-control pull-right" name="cantidadRepuesto" id="cantidadRepuesto"
                                                placeholder="#" autocomplete="off"
                                                >

                                                <button  title="Agregar Repuesto" data-toggle="tooltip" data-placement="bottom" onclick="guardarRepuesto()" title="Agregar" style="margin-left: 10%;margin-top: 2%; border: none; outline:none; text-decoration: none" type="button" class="btn btn-warning btn-fill pull-left " id="btnAgregarRepuesto">
                                                    <i style="color: #ffffff; font-size: 15px; margin: -2px; width: 17px; height: 20px" class="bi bi-plus-lg box-info pull-left"></i>
                                                </button>

                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.185) 1px solid">
                                                <input style="margin-top: 0% " type="text"
                                                class="form-control pull-right" name="descripcionRepuesto" id="descripcionRepuesto"
                                                placeholder="Nombre Repuesto" autocomplete="off"
                                                onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">

                                            </th>
                                            <th width="" colspan="2"
                                                style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong></strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px;text-align: center ">
                                            <th width=""
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border:  rgba(0, 0, 0, 0) 1px solid 1px solid">
                                                &nbsp; <strong>
                                                </strong>
                                            </th>
                                            <th width=""
                                                style=" font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong style="text-align: center">Subtotal</strong>
                                            </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                <strong>${{$totalValorRepuestos}}
                                                </strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width=""
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp; <strong>
                                                </strong> </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>Valor Servicio</strong>
                                            </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;
                                                <input value="{{$arrayData->valor_servicio_orden}}" style="color: black;font-weight:bold ;margin-top: -10%;text-align: right; " type="number"class="form-control" name="valorservicio" id="valorservicio" placeholder="" autocomplete="off">
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width=""
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp; <strong>
                                                </strong></th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp; <strong>IVA 19%</strong>
                                            </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>
                                                    <div class="" style="color: black;text-align: right" id="iva">$ {{$arrayData->iva_orden}}
                                                    </div>
                                                </strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width=""
                                                style=" height: 1px; font-weight:normal; text-align: left ">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left">
                                                &nbsp; <strong>
                                                </strong> </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>Total</strong>
                                            </th>
                                            <th width=""
                                            style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                            &nbsp;<input readonly = "readonly" value= "${{$arrayData->valor_total_orden}}" style="color: black;font-weight: bold; font-size: 14px; margin-top: -10%;text-align: right; " type="text" class="form-control" name="valorTotal" id="valorTotal"placeholder="" autocomplete="off">
                                        </th>

                                        </tr>

                                    </table>



                                    @if ( $arrayData->estadoOrden  == 1)
                                    <br><br> <button class="btn btn-success btn-fill pull-right" id="btnTerminarOrden"

                                    @if (sizeOf($diagnostico) != 1)
                                    disabled title="PENDIENTE DE DIAGNOSTICO"
                                    @endif

                                    @foreach ($repuesto as $repuestos)
                                    @if($repuestos->estado_repuesto == 1)
                                        disabled  title="PENDIENTE DE AUTORIZAR REPUESTO"
                                    @endif
                                    @endforeach

                                    onclick="terminarOrden()">
                                        TERMINAR ORDEN</button>
                                    <div class="clearfix"></div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


@section('js')
    <script src="http://localhost/plataforma/public/js/jquery.min.js"></script>
    <script src="http://localhost/plataforma/public/assets/js/toastr.min.js"></script>
    <script src="http://localhost/plataforma/public/js/editOrden.js"></script>
@endsection


@endsection
