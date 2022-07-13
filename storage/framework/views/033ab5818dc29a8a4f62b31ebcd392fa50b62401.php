<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo url('assets/js/toastr.min.css" rel="stylesheet'); ?>" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="<?php echo url('bootstrap/bootstrap.css" rel="stylesheet'); ?>"/>

    


<?php $__env->stopSection(); ?>

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
                                                                <?php $__currentLoopData = $tecnico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value=<?php echo e($Tecnico->id); ?>><?php echo e($Tecnico->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <tr  >
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
                                                <strong>Estado Orden</strong>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $ordenServicio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OrdenServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                                                <tr  style="cursor: pointer;background-color: #ffffff7e">
                                                


                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="height: 55px;font-size: 16px ; text-align: center ">
                                                    <strong><?php echo e($OrdenServicio->id_orden); ?></strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 12px ; font-weight:normal;text-align: left">
                                                    <strong><?php echo e($OrdenServicio->fecha_creacion_orden); ?></strong>

                                                </th>

                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 12px ;font-weight:normal; text-align: left ">
                                                    <strong><?php echo e($OrdenServicio->cliente_documento); ?></strong>

                                                </th>

                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"

                                                    style="font-size: 11px ; font-weight:normal;text-align: left">

                                                    <strong><?php echo e($OrdenServicio->cliente_nombres); ?></strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 11px ;font-weight:normal;  text-align: left">
                                                    <strong><?php echo e($OrdenServicio->equipo_tipo); ?>- <?php echo e($OrdenServicio->equipo_marca); ?> -
                                                    <?php echo e($OrdenServicio->equipo_referencia); ?></strong>
                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 11px ;font-weight:normal; text-align: left ">
                                                    <strong><?php echo e($OrdenServicio->name); ?></strong> </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 14px ;font-weight:normal; text-align: left ">
                                                    <strong>$<?php echo e(number_format($OrdenServicio->valor_servicio_orden  , 0, ',', '.')); ?></strong>
                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 14px ; font-weight:normal;text-align: left">
                                                    <strong> $<?php echo e(number_format($OrdenServicio->iva_orden , 0, ',', '.')); ?></strong>

                                                </th>
                                                <th onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'"
                                                    style="font-size: 14px ; font-weight:normal;text-align: left">
                                                    <strong>$<?php echo e(number_format($OrdenServicio->valor_total_orden , 0, ',', '.')); ?></strong>
                                                </th>

                                                <th  style="font-size: 12px ;font-weight:normal;  text-align: center">
                                                    
                                                    <?php if($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null && auth()->user()->rol == "ADMINISTRATIVO"): ?>
                                                        <button title="NUMERO DE FACTURA" data-toggle="tooltip" data-placement="left" style="border: none; outline:none; text-decoration: none; margin: 0px; margin-bottom: 10px" type="button" class="btn btn-success btn-fill  pull-right " id="btnGuardarCliente" onclick="facturaNumero('<?php echo e($OrdenServicio->id_orden); ?>')" >
                                                            <i style="font-size: 19px;  margin: -20px%" class="fas fa-file-invoice-dollar"></i>
                                                        </button>
                                                    <?php endif; ?>

                                                    <?php if($OrdenServicio->fecha_estimada_orden < date('Y-m-d') && $OrdenServicio->estadoOrden == 1): ?>
                                                        
                                                            <span style="float: left;" class="badge badge-pill badge-danger">Vencida</span>


                                                    <?php elseif($OrdenServicio->estadoOrden == 1): ?>
                                                        
                                                            <span style="float: left;" class="badge badge-pill badge-info">Reparacion</span>
                                                    <?php elseif($OrdenServicio->estadoOrden == 2): ?>
                                                        
                                                            <span style="float: left;" class="badge badge-pill badge-success">Lista Para Entregar</span>
                                                    <?php elseif($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null): ?>
                                                        
                                                            <span style="float: left;" class="badge badge-pill badge-warning">Facturacion</span>
                                                    <?php elseif($OrdenServicio->estadoOrden == 3): ?>
                                                        <span style="float: left;" class="badge badge-pill badge-primary">Entregada</span>
                                                        
                                                    <?php endif; ?>
                                                </th>

                                            <tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php echo $__env->make('modulos.ordenServicio.modalFacturaNumero', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo url('assets/js/toastr.min.js'); ?>"></script>
    <script src="<?php echo url('js/facturaNumero.js'); ?>"></script>
    <script>
   $(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })

    </script>


<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/ordenServicio/orden_general.blade.php ENDPATH**/ ?>