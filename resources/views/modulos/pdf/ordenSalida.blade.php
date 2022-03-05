
    <html>

        <head>
            <title>Orden de ingreso</title>
            {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
    {{-- <link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet"> --}}

            <style>
                table,
                tr,
                td,
                th {
                    border: 1px solid black;
                    word-wrap: break-word;
                }

                table {
                    border-collapse: collapse;
                    table-layout: fixed;
                    /* font-style: courier, arial;
                    font-family: 'Inconsolata', monospace; */
                }
                .fuente {

                    font-family: 'Verdana', sans-serif; */

                }

            </style>
        </head>

        <body >

            <div class="fuente">
            <div style="text-align: center ">

                <h4 style="margin:0% ">BYG SISTEMAS - HERMES MAURICIO BRAVO RAMIREZ - ORDEN SALIDA</h4>
                <h5 style="margin:0% ">Nit: 7694923-6 Iva - Regimen Comun Calle 9 N° 8 - 19 Tel. 8722205 - 8720171 NEIVA HUILA</h5>
            </div>

            <table width="91%" style=" font-size: 10px; text-align: center">
                <tr>
                    <th width="32%" rowspan="3" style="margin-right: 50px; text-align: center; border: rgba(3, 3, 3, 0) 1.5px solid " colspan="4"><img
                        src="assets/img/logo2.png" style="height: 50px; width: 95px "> </th>

                    <th  colspan="4" style="  text-align: center ; border: rgb(0, 0, 0) 1.7px solid ; background-color:#D0D3D4 " >FEC. INGRESO</th>
                    <th colspan="4" style="text-align: center; border: rgb(0, 0, 0) 1.7px solid; background-color:#D0D3D4 " >FEC. REPARACION</th>
                    <th colspan="4" style="text-align: center; border: rgb(0, 0, 0) 1.7px solid; background-color:#D0D3D4" >FEC. ENTREGA</th>
                    <th  colspan="4" style=" text-align: center; border: rgb(0, 0, 0) 1.7px solid; background-color:#D0D3D4" >NUMERO DE ORDEN</th>

                </tr>
                <tr>
                <th colspan="4" width="17%" rowspan="2" style="font-size: 18px;text-align: center ; border: rgb(0, 0, 0) 1.7px solid">{{$fecha_ingreso}}</th>
                <th colspan="4"  width="17%" rowspan="2" style=" font-size: 18px;text-align: center; border: rgb(0, 0, 0) 1.7px solid"> {{$fecha_estimada}}</th>
                <th colspan="4" width="17%"  rowspan="2" style=" font-size: 18px;text-align: center; border: rgb(0, 0, 0) 1.7px solid"> {{$fecha_estimada}}</th>
                <th colspan="4" width="17%"  rowspan="2" style=" font-size: 23px; text-align: center; border: rgb(0, 0, 0) 1.7px solid">{{$orden}}</th>
                </tr>
                <tr>
                    {{-- AJUSTE PARA VER EL ENCABEZADO MAS DELGADO --}}
                </tr>
            </table>
            <div>
                <p style=" font-size: 11px; font-weight: bold; margin: 0% ">CLIENTE</p>
                <hr style=" border: none; border-bottom: 1px solid rgb(0, 0, 0); font-size: 1%">


                <table width="100%" style=" font-size: 11px">
                    <tr style=" font-size: 11px">
                        <th width="22%"
                            style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Nit o C.C: </strong> {{ $documento }}
                        </th>
                        <th colspan="2" width="37%"
                            style=";font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid"><strong>
                                Nombre: </strong>{{ $nombre }}</th>
                        <th width="41%"
                            style="font-size: 10px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>E-Mail: </strong> {{ $correo }}
                        </th>

                    </tr>

                    <tr>
                        <th width="25%"
                            style="height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Telefono : </strong>
                            {{$telefono}}
                        </th>
                        <th width="25%" style="font-size: 10px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong> Ciudad : </strong>
                            {{$municipio}}-{{$departamento}}
                        </th>
                        <th width="25%" style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Celular : </strong>
                            {{$celular}}
                        </th>
                        <th width="25%" style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Direccion : </strong>
                            {{$direccion}}
                        </th>

                    </tr>
                    @isset($usuario)
                    <tr>
                        <th width="35%"
                            style="height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Dependencia: </strong>
                            {{$dependencia}}
                        </th>
                        <th colspan="2" width="40%"
                            style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Usuario : </strong>
                            {{$usuario}}
                        </th>
                        <th width="25%" style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Celular Usuario : </strong>
                            {{$celular_usuario}}
                        </th>
                    </tr>
                    @endisset
                </table>
                <p style="font-size: 12px; font-weight: bold; margin: 0% ">EQUIPO</p>
                <hr style=" border: none; border-bottom: 1px solid rgb(0, 0, 0); font-size: 1%">


                <table width="100%" style="font-size: 11px">
                    <tr>
                        <th width="33%"
                            style="   height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Equipo: </strong>
                            {{$equipo}}
                        </th>
                        <th width="33%"
                            style="height: 1px;font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong> Marca: </strong>
                            {{$marca}}
                        </th>
                        <th width="33%"
                            style="height: 1px;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Referencia: </strong>
                            {{$referencia}}
                        </th>

                    </tr>

                    <tr>
                        <th width="25%"
                            style="height: 1px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            <strong>Serial : </strong>
                            {{$serial}}
                        </th>
                        <th colspan="2" width="25%"
                            style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.7px solid"><strong>
                                Verificion Func. : </strong>
                                {{$verficoFuncionamiento}}
                            </th>

                    </tr>
                </table>
                <p style="font-size: 12px; font-weight: bold; margin: 0% ">REPORTE TECNICO</p>
                <hr style=" border: none; border-bottom: 1px solid rgb(0, 0, 0); font-size: 1%">
                <table width="100%" style="font-size: 12px">
                    <tr>
                        <th width="100%"
                         style="vertical-align: top;  height: 50px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.7px solid">
                            {{$servicio}}
                        </th>

                </table>
                <div style="font-size: 13px; text-align: center">PARTES Y REPUESTOS</div>
                <table class="" width="100%"
                style="word-break: break-all;table-layout: fixed;border-collapse: collapse;border-radius: 11px;box-shadow: inset 0 0 0 1px #0000001f;  font-size: 12px; border: rgba(0, 0, 0, 0) 2.5px solid">
                <tr style=" font-size: 13px ; background-color: #D0D3D4">

                    <th width="10%"
                        style=" border: rgba(0, 0, 0, 0) 1.7px solid; border-top-left-radius: 0.2rem; height: 1px; font-weight:normal; text-align: left">
                        &nbsp;<strong>Cantidad </strong>
                    </th>
                    <th width="60%"
                        style="  border: rgba(0, 0, 0, 0) 1.7px solid;font-weight:normal;text-align: left ">
                        &nbsp; <strong>
                            Descripcion</strong> </th>
                    <th width="15%"
                        style=" border: rgba(0, 0, 0, 0) 1.7px solid;font-size: 13px ;font-weight:normal;  text-align: left">
                        &nbsp;<strong>$ Unitario</strong>
                    </th>
                    <th width="15%"
                        style="border: rgba(0, 0, 0, 0) 1.7px solid; border-top-right-radius: 0.2rem;font-size: 13px ;font-weight:normal;  text-align: left">
                        &nbsp;<strong>$ Total</strong>
                    </th>

                </tr>
                 @if(sizeOf($repuesto) != 0)
                     @foreach ($repuesto as $repuestos)
                        <tr style=" font-size: 11px ">
                            <th width=""
                                style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp; {{$repuestos->cantidad_repuesto}}
                            </th>
                            <th width="" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                            &nbsp;{{$repuestos->nombre_repuesto}}
                            </th>

                            <th width=""
                                style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid" >
                                &nbsp;<strong>${{$repuestos->valor_unitario_repuesto}}</strong>
                            </th>
                            <th width=""
                                style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                &nbsp;<strong>${{$repuestos->valor_total_repuesto}}</strong>
                            </th>

                        </tr>

                     @endforeach
                 @else
                 <tr style=" font-size: 11px ">
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                    </th>
                    <th width="" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                    </th>

                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid" >
                    </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                    </th>

                </tr>
                 @endif



                <tr style=" font-size: 12px;text-align: center; background-color: #D0D3D4  ">
                    <th width=""
                        style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong> </strong>
                    </th>
                    <th width=""
                        style="font-weight:normal;text-align: left; border:  rgba(0, 0, 0, 0) 2.5px solid ">
                        &nbsp; <strong>
                        </strong> </th>
                    <th width=""
                        style=" font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong style="text-align: center">Subtotal</strong>
                    </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2.5px solid">
                        $ {{$subTotal}}
                    </th>

                </tr>

                <tr style=" font-size: 13px ; background-color: #D0D3D4">
                    <th width=""
                        style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong> </strong>
                    </th>
                    <th width=""
                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp; <strong>
                        </strong> </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong>Valor Servicio</strong>
                    </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp; $ {{$valorServicio}}
                    </th>

                </tr>

                <tr style=" font-size: 12px ; background-color: #D0D3D4">
                    <th width=""
                        style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong> </strong>
                    </th>
                    <th width=""
                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp; <strong>
                        </strong></th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong>IVA 19%</strong>
                    </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2.5px solid">
                         $ {{$iva}}
                    </th>

                </tr>

                <tr style=" font-size: 12px ; background-color: #D0D3D4">
                    <th width=""
                     style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                    </th>
                    <th width=""
                        style="font-weight:normal;text-align: left ; border: rgba(0, 0, 0, 0) 2.5px solid">
                    </th>
                    <th width=""
                        style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 2.5px solid">
                        &nbsp;<strong>Total</strong>
                    </th>
                    <th width=""
                    style="font-size: 12px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 2.5px solid">
                    <strong> $ {{$totalOrden}}</strong>
                </th>

                </tr>

            </table>

            <br>
                {{-- <p style="font-size: 12px; font-weight: bold; margin: 0% ">TECNICO - {{$tecnico}}</p> --}}
                <table width="100%" style="font-size: 10pxs">
                    <tr>
                        <th width="100%" colspan="2"
                            style="   height: 30px; font-weight:normal; text-align: left ; border: rgb(0, 0, 0) 1px solid !important">
                            -Estimado cliente, pasados (30) treinta días de estar el equipo en nuestras instalaciones, si no
                            es reclamado a tiempo, nuestra empresa no se hace responsable por este.
                            - BYG SISTEMAS no se hace responsable por la información guardada en los discos duros de los
                            equipos, por lo tanto se recomienda hacer copias de seguridad (Backup) de los mismos
                            – Todo servicio o revisión tiene un valor mínimo de $30.000
                            – Garantía del servicio: 30 Días
                            – La garantía no cubre daños ocasionados por virus
                            – Con la firma de este documento el cliente acepta las condiciones de entrega y recibido del
                            equipo. </th>
                    </tr>
                </table>
                <br>


                <p style="font-size: 12px; font-weight: bold; margin: 0% ">Firma Cliente: ______________________________
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Tecnico : <em> <u>&nbsp;&nbsp;{{$tecnico}}&nbsp;&nbsp;&nbsp;</u> </em></p>


            </div>
        </div>



        </body>
        </html>
