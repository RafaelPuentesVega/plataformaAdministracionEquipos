<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo url('assets/js/toastr.min.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="<?php echo url('assets/js/toastr.min.css'); ?>" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <style>
        table,
        tr,
        td,
        th {
            height: 32px;
        }

        #suggestionsRepuesto {
            border-radius: 15px 15px 15px 15px;
            box-shadow: 2px 2px 8px 0 rgba(0, 0, 0, .2);
            height: auto;
            position: absolute;
            /* top: 61px; */
            z-index: 9999;
            width: 60%;
        }

        #suggestionsRepuesto .suggest-element {
            border-radius: 15px 15px 15px 15px;
            background-color: #f8f8f8;
            border-top: 1px solid #f0eded;
            cursor: pointer;
            padding: 8px;
            width: 100%;
            float: left;
        }

        #btnEliminarRepuesto:hover {
            text-decoration: none;
            border: none;

        }
    </style>
<?php $__env->stopSection(); ?>

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body style="background-color:rgba(233, 233, 233, 0.295);">

                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-15">

                            <div class="card ">
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;">
                                        <strong>ORDEN DE SERVICIO N° <?php echo e($arrayData->id_orden); ?></strong>
                                    </h3>
                                </div>
                            </div>

                            <div class="card " style="border-radius: 10px 10px 10px 10px;box-shadow: 0 0 11px 4px #0000001f;">


                                <div class="header">
                                    <input disabled id="idOrden" value="<?php echo e($arrayData->id_orden); ?>" hidden>
                                    <input disabled id="totalValorRepuestos" value="<?php echo e($totalValorRepuestos); ?>" hidden>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-md-2">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <label for=""><i
                                                        style="color: rgba(0, 0, 0, 0.841); font-size: 18px"
                                                        class="fas fa-calendar-alt"></i><strong>&nbsp;FECHA
                                                        INGRESO</strong></label>
                                                <h4 style="width: 83%" class="caja" id="fecha_creacion_orden">
                                                    <?php echo e($arrayData->fecha_creacion_orden); ?></h4>

                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for=""><i
                                                        style="color: rgba(0, 0, 0, 0.841); font-size: 18px"
                                                        class="fas fa-calendar-day"></i><strong>&nbsp;FECHA
                                                        ESTIMADA</strong></label>
                                                <h4 style="width: 83%" class="caja" id="fecha_estimada">
                                                    <?php echo e($arrayData->fecha_estimada_orden); ?></h4>

                                            </div>
                                        </div>
                                        <div class="col-md-1">

                                        </div>
                                        <div class="col-md-2">
                                            <label for=""><i
                                                    style="color: rgba(0, 0, 0, 0.841); font-size: 16px"
                                                    class="fas fa-calendar"></i><strong style="font-size: 10px">FECHA
                                                    DIAGNOSTICO</strong></label>

                                            <?php if(isset($arrayData->fecha_diagnostico_orden)): ?>
                                                <h4 style="width: 83%" class="caja" id="fecha_diagnostico">
                                                    <?php echo e($arrayData->fecha_diagnostico_orden); ?></h4>
                                            <?php else: ?>
                                                <h4 style="width: 83%" class="caja" id="fecha_diagnostico">- <br> -
                                                </h4>
                                            <?php endif; ?>


                                        </div>
                                    </div>
                                </div>
                                <div class="content">

                                    <div class="tabla">


                                        <table class="table-style" width="100%"
                                            style="border-radius: 8px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

                                            <tr style=" font-size: 17px;  ">
                                                <th colspan="4"
                                                    style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1 ;height: 1%; text-align: center; font-weight:normal; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<label
                                                        style="color: #1C2833; font-size: 14px"><strong>CLIENTE</strong>
                                                    </label> </th>
                                                </th>
                                            </tr>
                                            <tr style=" font-size: 12px ">
                                                <th width="22%"
                                                    style=" height: 40px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Nit o C.C: &nbsp; </label>
                                                        <?php echo e($arrayData->cliente_documento); ?></strong>
                                                </th>
                                                <th colspan="2" width="37%"
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp; <strong>
                                                        <label>Nombre:&nbsp;</label>
                                                        <?php echo e($arrayData->cliente_nombres); ?></strong> </th>
                                                <th width="41%"
                                                    style="font-size: 11px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>E-Mail:&nbsp;</label>
                                                        <?php echo e($arrayData->cliente_correo); ?></strong>
                                                </th>

                                            </tr>

                                            <tr>
                                                <th width="30%"
                                                    style="font-size: 12px ;height: 40px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Ciudad:&nbsp;</label><?php echo e($arrayData->municipio_nombre); ?>

                                                        - <?php echo e($arrayData->departamento_nombre); ?></strong>

                                                </th>
                                                <th width="20%"
                                                    style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Telefono:&nbsp;</label><?php echo e($arrayData->cliente_telefono); ?></strong>

                                                </th>
                                                <th width="20%"
                                                    style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Celular:&nbsp;</label><?php echo e($arrayData->cliente_celular); ?></strong>

                                                </th>
                                                <th width="30%"
                                                    style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                    &nbsp;<strong><label>Direccion:&nbsp;</label><?php echo e($arrayData->cliente_direccion); ?></strong>

                                                </th>

                                            </tr>
                                            <?php if(isset($arrayData->usuario_dependencia)): ?>
                                                <tr>
                                                    <th
                                                        style="height: 38px;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp; <strong><label>Dependencia:
                                                                &nbsp;</label><?php echo e($arrayData->usuario_dependencia); ?></strong>

                                                    </th>
                                                    <th colspan="2"
                                                        style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Usuario:&nbsp;</label>
                                                            <?php echo e($arrayData->usuario_nombre); ?></strong>

                                                    </th>
                                                    <th
                                                        style="font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.0) 1.5px solid">
                                                        &nbsp;<strong><label>Celular Usuario:&nbsp;</label>
                                                            <?php echo e($arrayData->usuario_celular); ?></strong>

                                                    </th>
                                                </tr>
                                            <?php endif; ?>

                                        </table>
                                    </div>
                                </div>
                                <div class="content">

                                    <table class="table-style" width="100%"
                                        style="box-shadow: 0 0 11px 4px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">
                                        <tr>
                                            <th colspan="4"
                                                style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1;font-size: 15px; height: 1px;font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<label
                                                    style="color: #1C2833; font-size: 14px"><strong>EQUIPO</strong>
                                                </label> </th>

                                            </th>

                                        </tr>

                                        <tr style="height: 38px">
                                            <th width="20%"
                                                style=" font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<label><strong>Equipo:
                                                        &nbsp;</label><?php echo e($arrayData->equipo_tipo); ?></strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<strong><label>Marca:&nbsp;</label><?php echo e($arrayData->equipo_marca); ?>

                                                </strong>

                                            </th>
                                            <th width="30%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                &nbsp;<strong><label>Referencia:&nbsp;</label><?php echo e($arrayData->equipo_referencia); ?>

                                                </strong>

                                            </th>
                                            <th width="20%"
                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong><label>Serial:&nbsp;</label><?php echo e($arrayData->equipo_serial); ?></strong>

                                            </th>
                                        </tr>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Garantia:</strong></label>
                                                <?php echo e($arrayData->garantia_orden); ?> <br>
                                                <label><strong>Contrato:</strong></label>
                                                <?php echo e($arrayData->contrato_orden); ?>


                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Servicio:</strong></label> <br>
                                                <?php echo e($arrayData->servicio_orden); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Accesorios:</strong></label> <br>
                                                <?php echo e($arrayData->accesorios_orden); ?>

                                                <?php if($arrayData->serial_adaptador_orden != null): ?>
                                                    <div style=" ">
                                                        <label><strong>Adaptador Serial N°:</strong></label>
                                                        <?php echo e($arrayData->serial_adaptador_orden); ?>

                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5">
                                            <div class="form-group" style="margin: 0%">
                                                <label><strong>Caracteristicas Equipo:</strong></label> <br>
                                                <?php echo e($arrayData->caracteristicas_equipo_orden); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong> Daño Equipo</strong></label> <br>
                                                <?php echo e($arrayData->descripcion_dano_orden); ?>

                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><strong>Reporte Tecnico</strong></label> <br>
                                                <textarea <?php if($arrayData->estadoOrden != 1): ?> disabled <?php endif; ?>
                                                    <?php if($diagnostico != 1): ?> disabled placeholder="Guardar diagnostico" <?php endif; ?> rows="3"
                                                    id="reporteTecnico" class="form-control" maxlength="1500" placeholder="REPORTE TECNICO" autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"><?php echo e($arrayData->reporte_tecnico_orden); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="text-align: right; margin-bottom: -20px"><label><strong>TECNICO:
                                            </strong></label><?php echo e($arrayData->name); ?> </div>
                                    <hr>
                                    <div style="text-align: right; margin-top: -5px; font-size: 10px"><i><label
                                                style=" font-size: 9px">Recibido Por:</label>
                                            <?php if(isset($arrayData->user_created)): ?>
                                                <?php echo e($arrayData->user_created); ?>

                                            <?php else: ?>
                                                N/A
                                            <?php endif; ?>
                                        </i> </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label style="font-size: 14px"
                                                for=""><strong>Diagnostico</strong></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <?php if($diagnostico == 1): ?>
                                                    <div class="caja" style="text-align: left">
                                                        <?php echo e($Arraydiagnostico->descripcion_observacion); ?></div>
                                                <?php else: ?>
                                                    <textarea style="text-transform: uppercase;" rows="2" id="diagnostico" class="form-control" maxlength="1500"
                                                        placeholder="Diagnostico Tecnico" autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    <?php if($diagnostico != 1): ?>
                                                        <button title="Agregar Diagnostico" data-toggle="tooltip"
                                                            data-placement="right"
                                                            style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none;"
                                                            type="button" class="btn btn-info btn-fill  "
                                                            id="btnDiagnostico" onclick="guardarDiagnostico()">
                                                            <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                                class="bi bi-plus-lg box-info pull-left"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label style="font-size: 14px"
                                                for=""><strong>NOVEDAD</strong></label>

                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea rows="1" style="text-transform: uppercase" id="anotacion" class="form-control" maxlength="240"
                                                    placeholder="Novedades" autocomplete="off"
                                                    onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="btn-save">
                                                    <button title="Agregar Novedad" data-toggle="tooltip"
                                                        data-placement="right"
                                                        style="margin-left: 15%; margin-top: 6%; border: none; outline:none; text-decoration: none"
                                                        type="button" class="btn btn-info btn-fill "
                                                        id="btnAnotacion" onclick="guardarAnotacion()">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-plus-lg box-info pull-left"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(sizeOf($anotacion) != 0): ?>
                                        <div class="table-responsive-xl">
                                            <div style="text-align: center">ANOTACIONES</div>

                                            <table class="table table-striped" width="100%"
                                                style="text-align: center;border-radius: 10px;box-shadow: 0 0 11px 4px #0000001f; font-size: 13px; border: rgba(0, 0, 0, 0) 2.5px solid">

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
                                                        <th width="20%"
                                                            style="font-size: 12px ;font-weight:normal;  text-align: center
                                                        ; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>USER</strong>

                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $anotacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comentario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th width="20%"
                                                                style="font-size: 12px ;font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;<?php echo e($comentario->created_at_observacion); ?>


                                                            </th>
                                                            <th width="50%"
                                                                style="font-size: 12px ; font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp; <?php echo e($comentario->descripcion_observacion); ?>


                                                            </th>
                                                            <th width="30%"
                                                                style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.116) 1px solid">
                                                                &nbsp;<?php echo e($comentario->user_observacion); ?>


                                                            </th>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif; ?>
                                    <hr>
                                    <table class="" width="100%"
                                        style="border-radius: 11px;box-shadow: 0 0 11px 4px #0000001f;  font-size: 13px; border: rgba(0, 0, 0, 0) 1.5px solid">
                                        <tr style=" font-size: 13px ; background-color: #AED6F1">

                                            <th width="10%" colspan="2"
                                                style="border-top-left-radius: 0.5rem; height: 1px; font-weight:normal; text-align: center">
                                                &nbsp;<strong style="">Cantidad </strong>
                                            </th>
                                            <th width="60%" style="font-weight:normal;text-align: left ">
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
                                        <?php if(sizeOf($repuesto) != 0): ?>
                                            <?php $__currentLoopData = $repuesto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repuestos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr style=" font-size: 13px ">
                                                    <?php if($repuestos->estado_repuesto == 1 && $arrayData->estadoOrden == 1): ?>
                                                        <th width="3%"
                                                            style=" height: 1px; font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.089) 1.5px solid; border-right: #ffffff">
                                                            <button style="margin: 5%"
                                                                data-value=<?php echo e($repuestos->id_repuesto); ?>

                                                                title="Eliminar" data-toggle="tooltip"
                                                                data-placement="bottom" type="button"
                                                                class=" btnEliminarRepuesto style btn btn-close"
                                                                id="btnEliminarRepuesto">
                                                                <i style="color: red; font-size: 15px"
                                                                    class="fas fa-trash"></i>
                                                            </button>
                                                        </th>
                                                        <th width="" colspan=""
                                                            style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid; border-left: #ffffff">
                                                            &nbsp;<?php echo e($repuestos->cantidad_repuesto); ?>

                                                        </th>
                                                    <?php else: ?>
                                                        <th width="" colspan="2"
                                                            style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<?php echo e($repuestos->cantidad_repuesto); ?>

                                                        </th>
                                                    <?php endif; ?>
                                                    <th width=""
                                                        style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                        &nbsp;<?php echo e($repuestos->nombre_repuesto); ?>

                                                    </th>
                                                    <?php if($repuestos->estado_repuesto == 1): ?>
                                                        <th width="" colspan="2"
                                                            style="color: red; font-size: 13px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid"
                                                            id="valorTotalRepuesto">
                                                            &nbsp; *Pendiente de Autorizacion
                                                        </th>
                                                    <?php else: ?>
                                                        <th width=""
                                                            style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid"
                                                            id="valorTotalRepuesto">
                                                            &nbsp;<strong>$<?php echo e(number_format($repuestos->valor_unitario_repuesto, 0, ',', '.')); ?></strong>
                                                        </th>
                                                        <th width=""
                                                            style="font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                            &nbsp;<strong>$<?php echo e(number_format($repuestos->valor_total_repuesto, 0, ',', '.')); ?></strong>
                                                        </th>
                                                    <?php endif; ?>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        <tr style=" font-size: 13px " id="repuestoIngresado" hidden>
                                            <th id="cantidadRpuestoTr" width=""
                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                            </th>
                                            <th width=""
                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                            </th>
                                            <th width=""
                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                            </th>
                                            <th width=""
                                                style="font-size: 16px ;font-weight:normal;  text-align: center; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                            </th>
                                        </tr>
                                        <?php if($arrayData->estadoOrden == 1): ?>
                                            <tr id="TragregarRepuesto">
                                                <th style="border: rgba(0, 0, 0, 0.089) 1.5px solid;cursor: pointer;"
                                                    class="text-center" colspan="3">
                                                    <div id="agregarRepuesto" style="color: #a5a5a5">+ Agregar
                                                        repuesto
                                                    </div>
                                                </th>
                                                <th width="" colspan="2"
                                                    style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong></strong>
                                                </th>

                                            </tr>

                                            <tr hidden id="divAgregarRepuesto" style=" font-size: 13px ">
                                                <th
                                                    style=" height: 1px; font-weight:normal; text-align: center ; border: rgba(0, 0, 0, 0.123) 1px solid">
                                                    <button style="" title="Agregar Repuesto"
                                                        data-toggle="tooltip" data-placement="bottom"
                                                        onclick="guardarRepuesto()" title="Agregar" type="button"
                                                        class="btn btn-warning btn-fill " id="btnAgregarRepuesto">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -2px; width: 17px; height: 20px"
                                                            class="fas fa-tools box-info pull"></i>
                                                    </button>
                                                </th>
                                                <th width=""
                                                    style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0.123) 1px solid">
                                                    <input style="" type="number"
                                                        class="form-control pull-right" name="cantidadRepuesto"
                                                        id="cantidadRepuesto" placeholder="#" autocomplete="off">
                                                </th>
                                                <th width=""
                                                    style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0.185) 1px solid">
                                                    <input style="margin-top: 0% " type="text"
                                                        class="form-control pull-right" name="descripcionRepuesto"
                                                        id="descripcionRepuesto" placeholder="Nombre Repuesto"
                                                        autocomplete="off"
                                                        onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </th>
                                                <th width="" colspan="2"
                                                    style="font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                    &nbsp;<strong></strong>
                                                </th>
                                            </tr>
                                        <?php endif; ?>
                                        <tr style=" font-size: 13px;text-align: center ">
                                            <th width="" colspan="2"
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border:  rgba(0, 0, 0, 0) 1px solid 1px solid">
                                                &nbsp; <strong>
                                                    <div id="suggestionsRepuesto"></div>
                                                </strong>
                                            </th>
                                            <th width=""
                                                style=" background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong style="text-align: center">Subtotal</strong>
                                            </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                <strong>$<?php echo e(number_format($totalValorRepuestos, 0, ',', '.')); ?>

                                                </strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width="" colspan="2"
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp; <strong>
                                                </strong> </th>
                                            <th width=""
                                                style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>Valor Servicio</strong>
                                            </th>
                                            <th width=""
                                                style="font-size: 13px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;
                                                <?php if($arrayData->estadoOrden == 1): ?>
                                                    <input hidden value="<?php echo e($arrayData->valor_servicio_orden); ?>"
                                                        style="color: black;font-weight:bold ;margin-top: -10%;text-align: right; "
                                                        type="text" class="form-control number"
                                                        name="valorservicio" id="valorservicio" placeholder=""
                                                        autocomplete="off">
                                                <?php else: ?>
                                                    <strong>
                                                        <div class=""
                                                            style="font-size: 14px;color: black;text-align: right"
                                                            id="iva">$
                                                            <?php echo e(number_format($arrayData->valor_servicio_orden, 0, ',', '.')); ?>

                                                        </div>
                                                    </strong>
                                                <?php endif; ?>

                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width="" colspan="2"
                                                style=" height: 1px; font-weight:normal; text-align: left ; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width=""
                                                style="font-weight:normal;text-align: left; border: rgba(0, 0, 0, 0) 1px solid">
                                                &nbsp; <strong>
                                                </strong></th>
                                            <th width=""
                                                style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp; <strong>IVA 19%</strong>
                                                <input
                                                    style="width: 20px; height: 20px; border-radius: 1em; margin: 0%"
                                                    title="SIN IVA" data-toggle="tooltip" data-placement="top"
                                                    class="form-check-input" type="checkbox" value=""
                                                    id="checkSinIva" autocomplete="off" onchange="calcularValores()">

                                            </th>
                                            <th width=""
                                                style="font-size: 14px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>
                                                    <div class="" style="color: black;text-align: right"
                                                        id="iva">$
                                                        <?php echo e(number_format($arrayData->iva_orden, 0, ',', '.')); ?>

                                                    </div>
                                                </strong>
                                            </th>

                                        </tr>

                                        <tr style=" font-size: 13px ">
                                            <th width="" colspan="2"
                                                style=" height: 1px; font-weight:normal; text-align: left ">
                                                &nbsp;<strong> </strong>
                                            </th>
                                            <th width="" style="font-weight:normal;text-align: left">
                                                &nbsp; <strong>
                                                </strong> </th>
                                            <th width=""
                                                style="background: #e0e0e0;font-size: 13px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">
                                                &nbsp;<strong>Total</strong>
                                            </th>
                                            <th width="" id="valorTotalOrden"
                                                style="color: black; font-size: 14px ;font-weight:normal;  text-align: right; border: rgba(0, 0, 0, 0) 1.5px solid">
                                                <strong>
                                                    <div style="text-align: right " id="valorTotalOrde">
                                                        $<?php echo e(number_format($arrayData->valor_total_orden, 0, ',', '.')); ?>

                                                    </div>
                                                </strong>
                                            </th>
                                        </tr>

                                    </table>



                                    <?php if($arrayData->estadoOrden == 1): ?>
                                        <br><br> <button class="btn btn-success btn-fill pull-right"
                                            <?php if($diagnostico != 1): ?> id="btnPendDiag" title="PENDIENTE DE DIAGNOSTICO"
                                    <?php elseif($pendAutRep >= 1): ?>
                                    id="btnPendRep" title="PENDIENTE DE AUTORIZAR" data-value=<?php echo e($pendAutRep); ?>

                                    <?php else: ?>
                                    id="btnTerminarOrden" <?php endif; ?>>TERMINAR
                                            ORDEN</button>

                                        <div class="clearfix"></div>
                                    <?php endif; ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo url('assets/js/toastr.min.js'); ?>"></script>
    <script src="<?php echo url('js/editOrden.js?version=1.0'); ?>"></script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/ordenServicio/editarordeservicio.blade.php ENDPATH**/ ?>