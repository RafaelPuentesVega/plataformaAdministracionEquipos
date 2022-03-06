@extends('plantilla')
@section('content')
@section('css')
    <link href="http://localhost/plataforma/public/assets/js/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="http://localhost/plataforma/public/assets/js/toastr.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">


@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif" >

            <body style="background-image: url(http://localhost/plataforma/public/assets/img/background.jpg)">

                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-15">

                            <div class="card "  >
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>ORDEN DE SERVICIO N° {{ $arrayData->id_orden }} - ORDEN GENERAL</strong></h3>
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
                                            <div class="form-group">
                                                <label for="">FECHA INGRESO</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_creacion_orden }}"
                                                    id="fecha_creacion_orden" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA ESTIMADA</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_estimada_orden }}"
                                                    id="fecha_estimada_orden" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA DIAGNOSTICO</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_diagnostico_orden }}"
                                                    id="fecha_diagnostico_orden" required autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA REPARACION</label>
                                                <input disabled type="date" class="form-control"
                                                    value="{{ $arrayData->fecha_reparacion_orden }}"
                                                    id="fecha_reparacion_orden" required autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">FECHA ENTREGA</label>
                                                <input disabled type="date" class="form-control"
                                                    id="fecha_entrega_orden"
                                                    value="{{ $arrayData->fecha_entrega_orden }}"
                                                    required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabla">

                                        <div class="table-responsive-xl">

                                            <table class=" table-hover" width="100%"
                                                style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 8px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                                <tr style=" font-size: 17px;  ">
                                                    <th colspan="4"
                                                        style=" border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<label style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong> </label>  </th>
                                                    </th>
                                                </tr>
                                                <tr style=" font-size: 12px ">
                                                    <th width=""
                                                        style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong><label>Nit o C.C: &nbsp; </label>
                                                        {{ $arrayData->cliente_documento }}</strong>
                                                    </th>
                                                    <th colspan="2"
                                                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp; <strong>
                                                            <label>Nombre:&nbsp;</label>
                                                    {{ $arrayData->cliente_nombres }}</strong> </th>
                                                    <th width=""
                                                        style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<strong><label>E-Mail:&nbsp;</label>
                                                        {{ $arrayData->cliente_correo }}</strong>
                                                    </th>

                                                </tr>

                                                <tr>
                                                    <th width="20%"
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
                                                    <th width="40%"
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
                                        </div>


                                </div>
                            </div>

                            <div class="card" style="margin-top: -15px">

                                <div class="header">

                                </div>
                                <div class="content">

                                    <div class="table-responsive-xl">

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
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Accesorios:</strong></label> <br>
                                                {{ $arrayData->accesorios_orden }}
                                             </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Caracteristicas Equipo:</strong></label> <br>
                                                {{ $arrayData->caracteristicas_equipo_orden }}
                                             </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <label><strong> Daño Equipo: </strong></label> <br>
                                        {{ $arrayData->descripcion_dano_orden }}
                                    </div>
                                    <hr>
                                    <div>
                                        <label><strong> REPORTE TECNICO: </strong></label> <br>
                                        {{ $arrayData->reporte_tecnico_orden }}
                                        <br>
                                        <div style="text-align: right; margin-bottom: -20px"><label><strong>TECNICO: </strong></label>{{$arrayData->name}} </div>

                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <h5>DIAGNOSTICO</h5>
                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                @if(isset($Arraydiagnostico->descripcion_observacion))
                                                    <textarea rows="1" style=" text-align: left" class="form-control"
                                                        disabled>{{ $Arraydiagnostico->descripcion_observacion }}
                                                    </textarea>
                                                @else
                                                <textarea rows="1" style=" text-align: left" class="form-control"
                                                disabled>
                                                </textarea>
                                                @endif

                                            </div>
                                        </div>

                                    </div>
                                    @if($arrayData->estadoOrden != 3)
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
                                    @endif
                                    @if (sizeOf($anotacion) != 0)
                                        <div class="table-responsive-xl">

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
                                                            &nbsp;<strong>USUARIO</strong>

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
                                    <div class="table-responsive-xl">
                                        <table style="font-family: Verdana, sans-serif" class="table" width="100%" style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 50px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 1.5px solid">
                                            <tr style=" font-size: 13px ; background-color: #AED6F1">

                                                <th width="10%"
                                                    style="border-top-left-radius: 0.5rem;  height: 1px; font-weight:normal; text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid ">
                                                    &nbsp;<strong>Cantidad </strong>
                                                </th>
                                                <th width="60%"
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid ">
                                                    &nbsp; <strong>
                                                        Descripcion</strong> </th>
                                                <th width="15%"
                                                    style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid">
                                                    &nbsp;<strong>$ Unitario</strong>
                                                </th>
                                                <th width="15%"
                                                    style="border-top-right-radius: 0.5rem;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 2px solid">
                                                    &nbsp;<strong>$ Total</strong>
                                                </th>

                                            </tr>
                                            @if(sizeOf($repuesto) != 0)
                                                @foreach ($repuesto as $repuestos)
                                                    <tr style=" font-size: 13px " class="table-striped">
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

                                            <tr style=" font-size: 13px;text-align: center ">
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left; ; border: rgba(0, 0, 0, 0) 1px solid">
                                                 </th>
                                                <th width=""
                                                    style=" background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong style=" text-align: center">Subtotal</strong>
                                                </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>${{$totalValorRepuestos}}</strong>
                                                </th>

                                            </tr>

                                            <tr style=" font-size: 13px ">
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                    &nbsp; <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>Valor Servicio</strong>
                                                </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2px solid">
                                                    <strong>${{$arrayData->valor_servicio_orden}}</strong>
                                                <input style="display: none; margin-top: -10%;text-align: right; " type="number"
                                                        class="form-control" name="valorservicio" id="valorservicio"
                                                        placeholder="" autocomplete="off">
                                                </th>

                                            </tr>

                                            <tr style=" font-size: 13px ">
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: right; border: rgba(0, 0, 0, 0) 1px solid">
                                                    &nbsp;

                                                    </strong></th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>IVA 19%</strong><input style="width: 15px; height: 15px" title="SIN IVA" data-toggle="tooltip" data-placement="top"  class="form-check-input" type="checkbox" value="" id="checkTipoEquipo" onchange="javascript:sinIva()" autocomplete="off">
                                                </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid"><strong><div class="" style="text-align: right ; margin: 0%" id="iva">${{$arrayData->iva_orden}}</div></strong>
                                                </th>

                                            </tr>

                                            <tr style=" font-size: 13px ">
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                    &nbsp; <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>Total</strong>
                                                </th>
                                                <th width="" id="valorTotalOrden"
                                                style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2px solid">
                                                &nbsp;<strong>${{$arrayData->valor_total_orden}}</strong>
                                                </th>

                                            </tr>

                                            <tr style=" font-size: 13px ">
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left">
                                                    &nbsp;<strong> </strong>
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left">
                                                    &nbsp; <strong>
                                                    </strong> </th>
                                                <th width=""
                                                    style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2px solid">
                                                    &nbsp;<strong>Factura Numero</strong>
                                                </th>
                                                <th width=""
                                                style="background: #e0e0e0; font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2px solid">
                                                &nbsp;<strong>{{$arrayData->factura_numero_orden}}</strong>
                                            </th>

                                            </tr>

                                        </table>
                                    </div>



                                    <br><br>
                                    @if($arrayData->estadoOrden == 2)
                                        <button style="margin: 5px" class="btn btn-success btn-fill pull-right" id="btnTerminarOrden"
                                            @if (sizeOf($diagnostico) != 1)
                                            disabled title="PENDIENTE DE DIAGNOSTICO"
                                            @endif

                                                @foreach ($repuesto as $repuestos)
                                                    @if($repuestos->estado_repuesto == 1)
                                                        disabled  title="PENDIENTE DE AUTORIZAR REPUESTO"
                                                    @endif
                                                @endforeach
                                        onclick="entregarOrden()">ENTREGAR Y ENVIAR ORDEN</button>
                                    @endif
                                    <a href="{{ url('OrdenEntrada', encrypt($arrayData->id_orden)  ) }}">
                                        <button   class="btn btn-info btn-fill pull-left" style="margin: 5px"> ORDEN DE ENTRADA</button>
                                    </a>
                                    <a href="{{ url('imprimir_ordenSalida/TBydUpOeWncxZz09IiwibWFjIj/o65isMW', $arrayData->id_orden  ) }}">
                                        <button  class="btn btn-info btn-fill pull-left" style="margin: 5px"> ORDEN DE SALIDA</button>
                                    </a>
                                    <div class="clearfix"></div>

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
    <script src="http://localhost/plataforma/public/js/entregarOrden.js"></script>
@endsection


@endsection
