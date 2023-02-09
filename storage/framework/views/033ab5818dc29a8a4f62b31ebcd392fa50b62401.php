<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo url('assets/js/toastr.min.css" rel="stylesheet'); ?>" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="<?php echo url('bootstrap/bootstrap.css" rel="stylesheet'); ?>" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
<?php $__env->stopSection(); ?>

<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

            <body>
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="card ">
                                <div class="header" style="background-color: #06419f">
                                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;">
                                        <strong>ORDEN GENERAL</strong>
                                    </h3>
                                </div>
                            </div>
                            <div class="card ">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="container-fluid">
                                            <div class="row ">

                                                <div class="col-md-15">
                                                    <button style="border: none;width: 100%"
                                                        class="btn btn-close collapsed " role="button"
                                                        data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapseOne" aria-expanded="false"
                                                        aria-controls="collapseOne">
                                                        <div class="panel-heading" role="tab" id="headingOne">
                                                            <p style="font-size: 14px" class="panel-title">
                                                                B&Uacute;SQUEDA AVANZADA
                                                            </p>
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapseOne"
                                            <?php if($dataRequest['estado'] ||
                                                $dataRequest['idTecnico'] ||
                                                $dataRequest['requestFechainicioentrega'] ||
                                                $dataRequest['requestFechainicio'] ||
                                                $dataRequest['serial'] ||
                                                $dataRequest['nombres'] ||
                                                $dataRequest['numOrden'] ||
                                                $dataRequest['cedula']): ?> class="panel-collapse"
                                            <?php else: ?>
                                            class="panel-collapse collapse" <?php endif; ?>
                                            role="tabpanel" aria-expanded="false" aria-labelledby="headingOne">
                                            <div style="padding: 0px" class="panel-body">
                                                <div class="content">
                                                    <div class="row ">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">N° Orden</label>
                                                                <input type="number" id="numero_orden"
                                                                    name="numero_orden" class="number form-control"
                                                                    placeholder="N° Orden" autocomplete="off"
                                                                    <?php if($dataRequest['numOrden']): ?> focus value="<?php echo e($dataRequest['numOrden']); ?>" <?php endif; ?>>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 ">
                                                            <div class="form-group">
                                                                <label>Cedula Cliente</label>
                                                                <input type="number" class="numberCedula form-control"
                                                                    name="cedula_cliente" id="cedula_cliente"
                                                                    placeholder="Cedula Cliente" style="focus"
                                                                    <?php if($dataRequest['cedula']): ?> focus value="<?php echo e($dataRequest['cedula']); ?>" <?php endif; ?>
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 ">
                                                            <div class="form-group">
                                                                <label>Nombres Cliente</label>
                                                                <input type="text"
                                                                    <?php if($dataRequest['nombres']): ?> value="<?php echo e($dataRequest['nombres']); ?>" <?php endif; ?>
                                                                    class="nombreCliente form-control"
                                                                    name="nombre_cliente" id="nombre_cliente"
                                                                    placeholder="Nombre Cliente" required
                                                                    autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 ">
                                                            <div class="form-group">
                                                                <label>SERIAL EQUIPO</label>
                                                                <input
                                                                    <?php if($dataRequest['serial']): ?> value="<?php echo e($dataRequest['serial']); ?>" <?php endif; ?>
                                                                    type="text" class="serial form-control"
                                                                    name="serial" id="serial" placeholder="Serial"
                                                                    required autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row ">

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha de ingreso</label>
                                                                <input type="text" id="fecha_ingreso"
                                                                    name="fecha_ingreso"
                                                                    <?php if($dataRequest['requestFechafin']): ?> value="<?php echo e($dataRequest['requestFechainicio']); ?> - <?php echo e($dataRequest['requestFechafin']); ?>"
                                                                     <?php else: ?> style="display:none" value="<?php echo e(date('m/01/Y')); ?> - <?php echo e(date('m/01/Y')); ?>" <?php endif; ?>
                                                                    class="form-control" placeholder="Fecha de ingreso"
                                                                    autocomplete="off">
                                                                <input
                                                                    <?php if($dataRequest['requestFechafin']): ?> style="display:none" <?php endif; ?>
                                                                    onclick="clicklblfechaingreso()" type="text"
                                                                    id="fecha_ingreso_lbl"
                                                                    class="fecha_ingreso_lbl form-control"
                                                                    placeholder="Rango de fecha" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Fecha de entrega</label>
                                                                <input
                                                                    <?php if($dataRequest['requestFechainicioentrega']): ?> value="<?php echo e($dataRequest['requestFechainicioentrega']); ?> - <?php echo e($dataRequest['requestFechafinentrega']); ?>"
                                                                 <?php else: ?> style="display:none" value="<?php echo e(date('m/01/Y')); ?> - <?php echo e(date('m/01/Y')); ?>" <?php endif; ?>
                                                                    type="text" id="fecha_entrega"
                                                                    name="fecha_entrega" class="form-control"
                                                                    placeholder="Fecha de ingreso" autocomplete="off">
                                                                <input
                                                                    <?php if($dataRequest['requestFechafinentrega']): ?> style="display:none" <?php endif; ?>
                                                                    onclick="clicklblfechaentrega()" type="text"
                                                                    id="fecha_entrega_lbl"
                                                                    class="fecha_entrega_lbl form-control"
                                                                    placeholder="Rango de fecha" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Tecnico</label>
                                                                <select placeholder="Rango de fecha"
                                                                    class="js-example-basic js-states form-control"
                                                                    name="selectTecnico" id="selectTecnico">
                                                                    <option value=></option>
                                                                    <?php $__currentLoopData = $tecnico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($Tecnico->id); ?>"
                                                                            <?php if($dataRequest['idTecnico'] == $Tecnico->id): ?> selected <?php endif; ?>>
                                                                            <?php echo e($Tecnico->name); ?> </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select class="js-example-basic js-states form-control"
                                                                    name="selectEstado" id="selectEstado" required>
                                                                    <option value=''></option>
                                                                    <option
                                                                        <?php if($dataRequest['estado'] == '5'): ?> selected <?php endif; ?>
                                                                        value='5'>Reparacion</option>
                                                                    <option
                                                                        <?php if($dataRequest['estado'] == '1'): ?> selected <?php endif; ?>
                                                                        value='1'>Entregada</option>
                                                                    <option
                                                                        <?php if($dataRequest['estado'] == '2'): ?> selected <?php endif; ?>
                                                                        value='2'>Pendiente de facturar</option>
                                                                    <option
                                                                        <?php if($dataRequest['estado'] == '3'): ?> selected <?php endif; ?>
                                                                        value='3'>Lista Para Entregar</option>
                                                                    <option
                                                                        <?php if($dataRequest['estado'] == '4'): ?> selected <?php endif; ?>
                                                                        value='4'>Vencidas</option>
                                                                </select>
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
                    <div <?php if($dataRequest['estado'] ||
                            $dataRequest['idTecnico'] ||
                            $dataRequest['requestFechainicioentrega'] ||
                            $dataRequest['requestFechainicio'] ||
                            $dataRequest['serial'] ||
                            $dataRequest['nombres'] ||
                            $dataRequest['numOrden'] ||
                            $dataRequest['cedula']): ?>
                             style="display: block"
                        <?php else: ?> style="display: none"
                        <?php endif; ?>>
                        <div style="display: block ;background-color: #d1e7dd;color: #0c5460"
                            class="alert alert-primary" role="alert">
                            <label style="margin: 0%" for=""> <strong> <strong><?php echo e($totalCount); ?> </strong> Resultados de </strong>
                                <?php if($dataRequest['estado'] && $dataRequest['idTecnico']): ?>
                                    <br> Estado:
                                    <?php switch($dataRequest['estado']):
                                        case (1): ?>
                                            Entregada
                                        <?php break; ?>

                                        <?php case (2): ?>
                                            Pendiente de facturar
                                        <?php break; ?>

                                        <?php case (3): ?>
                                            Lista para entregar
                                        <?php break; ?>

                                        <?php case (4): ?>
                                            Vencidas
                                        <?php break; ?>

                                        <?php case (5): ?>
                                            Reparacion
                                        <?php break; ?>

                                        <?php default: ?>
                                    <?php endswitch; ?>
                                    </strong><br>Tecnico: </strong>
                                    <?php $__currentLoopData = $tecnico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($dataRequest['idTecnico'] == $Tecnico->id): ?>
                                            <?php echo e($Tecnico->name); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php elseif($dataRequest['estado']): ?>
                                    <br> Estado:
                                    <?php switch($dataRequest['estado']):
                                        case (1): ?>
                                            Entregada
                                        <?php break; ?>

                                        <?php case (2): ?>
                                            Pendiente de facturar
                                        <?php break; ?>

                                        <?php case (3): ?>
                                            Lista para entregar
                                        <?php break; ?>

                                        <?php case (4): ?>
                                            Vencidas
                                        <?php break; ?>

                                        <?php case (5): ?>
                                            Reparacion
                                        <?php break; ?>

                                        <?php default: ?>
                                    <?php endswitch; ?>
                                <?php elseif($dataRequest['idTecnico']): ?>
                                    </strong><br>Tecnico: </strong>
                                    <?php $__currentLoopData = $tecnico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tecnico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($dataRequest['idTecnico'] == $Tecnico->id): ?>
                                            <?php echo e($Tecnico->name); ?>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <?php if($dataRequest['requestFechainicioentrega']): ?>
                                    </strong><br>Fecha de Entrega: </strong>
                                    <?php echo e(date('d-M-Y', strtotime($dataRequest['requestFechainicioentrega']))); ?> - al -
                                    <?php echo e(date('d-M-Y', strtotime($dataRequest['requestFechafinentrega']))); ?>

                                <?php endif; ?>
                                <?php if($dataRequest['requestFechafin']): ?>
                                    </strong><br>Fecha de Ingreso: </strong>
                                    <?php echo e(date('d M Y', strtotime($dataRequest['requestFechainicio']))); ?> - al -
                                    <?php echo e(date('d M Y', strtotime($dataRequest['requestFechafin']))); ?>

                                <?php endif; ?>
                                <?php if($dataRequest['serial']): ?>
                                    </strong><br>Serial Equipo: </strong>
                                    <?php echo e($dataRequest['serial']); ?>

                                <?php endif; ?>
                                <?php if($dataRequest['nombres']): ?>
                                    </strong><br>Nombre Cliente: </strong>
                                    <?php echo e($dataRequest['nombres']); ?>

                                <?php endif; ?>
                                <?php if($dataRequest['cedula']): ?>
                                    </strong><br>Cedula Cliente: </strong>
                                    <?php echo e($dataRequest['cedula']); ?>

                                <?php endif; ?>

                                <?php if($dataRequest['numOrden']): ?>
                                    </strong><br>Numero de Orden: </strong>
                                    <?php echo e($dataRequest['numOrden']); ?>

                                <?php endif; ?>
                            </label>
                            <br>
                            <button onclick="limpiarFiltro()" style="text-align: right; padding: 5px" class="btn btn-primary">Limpiar</button>

                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-11">
                        </div>
                        <div class="col-md-1">
                           <button onclick="exportExcel('excel')" style="border-inline: none" data-toggle="tooltip" title="Exportar a Excel" class="btn btn-success"><i style="font-size: 20px; padding: 0px; margin: -3px" class="fas fa-file-excel"></i></button>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="col-md-8">
                            <label>Mostrar
                                <select style="width: 66px; display: inline-block; position: relative;"
                                    class="paginate form-control" name="paginate" id="paginate">
                                    <option <?php if($numpaginate == 10): ?> selected <?php endif; ?> value="10">10
                                    </option>
                                    <option <?php if($numpaginate == 20): ?> selected <?php endif; ?> value="20">20
                                    </option>
                                    <option <?php if($numpaginate == 50): ?> selected <?php endif; ?> value="50">50
                                    </option>
                                    <option <?php if($numpaginate == 100): ?> selected <?php endif; ?> value="100">100
                                    </option>
                                    <option <?php if($numpaginate > 100): ?> selected <?php endif; ?> value="all">
                                        Todos</option>

                                </select>
                                Registros
                            </label>

                        </div>
                        <div class="col-md-4">
                            <p style="text-align: right; font-size: 12px">
                                Mostrando <?php if($numpaginate < $totalCount): ?>
                                    <?php echo e($numpaginate); ?>

                                <?php else: ?>
                                    <?php echo e($totalCount); ?>

                                <?php endif; ?> de <strong><?php echo e($totalCount); ?> </strong>
                                registros</p>
                        </div>

                    </div>
                    <div class="col-md-12">

                        <div class="table-responsive-xl">
                            <table class="table table-hover"
                                style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="8%"
                                            style=" font-size: 12px ;font-weight:normal; text-align: center ">
                                            &nbsp;<strong>N° Orden </strong>

                                        </th>
                                        <th width="9%"
                                            style="font-size: 12px ; font-weight:normal;text-align: rigth">
                                            &nbsp;<strong>Fecha <br> Ingreso</strong>

                                        </th>

                                        <th width="10%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Cedula</strong>

                                        </th>
                                        <th width="24%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Cliente </strong>

                                        </th>
                                        <th width="20%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Equipo</strong>

                                        </th>
                                        <th width="20%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Tecnico</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 11px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Valor Servicio</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>IVA</strong>

                                        </th>
                                        <th width="8%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: rigth">
                                            &nbsp;<strong>Valor Total</strong>

                                        </th>
                                        <th width="3%"
                                        style="font-size: 10px ;font-weight:normal;  text-align: rigth">
                                        &nbsp;<strong>Numero <br> Factura</strong>

                                        </th>
                                        <th width="3%"
                                            style="font-size: 12px ;font-weight:normal;  text-align: left">
                                            <strong>Estado Orden</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $ordenServicio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $OrdenServicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr onclick="window.location.href='ordenGeneral/<?php echo e(encrypt($OrdenServicio->id_orden)); ?>'" style="cursor: pointer;background-color: #ffffff7e">
                                            


                                            <th
                                                style="height: 55px;font-size: 16px ; text-align: center ">
                                                <strong><?php echo e($OrdenServicio->id_orden); ?></strong>

                                            </th>
                                            <th
                                                style="font-size: 12px ; font-weight:normal;text-align: left">
                                                <strong><?php echo e(date('Y-m-d h:i:s a', strtotime($OrdenServicio->fecha_creacion_orden))); ?></strong>

                                            </th>

                                            <th
                                                style="font-size: 12px ;font-weight:normal; text-align: left ">
                                                <strong><?php echo e($OrdenServicio->cliente_documento); ?></strong>

                                            </th>

                                            <th
                                                style="font-size: 11px ; font-weight:normal;text-align: left">

                                                <strong><?php echo e($OrdenServicio->cliente_nombres); ?></strong>

                                            </th>
                                            <th
                                                style="font-size: 11px ;font-weight:normal;  text-align: left">
                                                <strong><?php echo e($OrdenServicio->equipo_tipo); ?>-
                                                    <?php echo e($OrdenServicio->equipo_marca); ?> -
                                                    <?php echo e($OrdenServicio->equipo_referencia); ?></strong>
                                            </th>
                                            <th
                                                style="font-size: 11px ;font-weight:normal; text-align: left ">
                                                <strong><?php echo e($OrdenServicio->name); ?></strong>
                                            </th>
                                            <th
                                                style="font-size: 14px ;font-weight:normal; text-align: left ">
                                                <strong>$<?php echo e(number_format($OrdenServicio->valor_servicio_orden, 0, ',', '.')); ?></strong>
                                            </th>
                                            <th
                                                style="font-size: 14px ; font-weight:normal;text-align: left">
                                                <strong>
                                                    $<?php echo e(number_format($OrdenServicio->iva_orden, 0, ',', '.')); ?></strong>

                                            </th>
                                            <th
                                                style="font-size: 14px ; font-weight:normal;text-align: left">
                                                <strong>$<?php echo e(number_format($OrdenServicio->valor_total_orden, 0, ',', '.')); ?></strong>
                                            </th>
                                            <th width="6%"
                                                style="font-size: 13px ; font-weight:normal;text-align: left">
                                                <strong><?php echo e($OrdenServicio->factura_numero_orden); ?></strong>
                                            </th>

                                            <th style="font-size: 12px ;font-weight:normal;  text-align: center">

                                                <?php if($OrdenServicio->fecha_estimada_orden <= date('Y-m-d H:i:s') && $OrdenServicio->estadoOrden == 1): ?>
                                                    
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-danger">Vencida</span>
                                                <?php elseif($OrdenServicio->estadoOrden == 1): ?>
                                                    
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-info">Reparacion</span>
                                                <?php elseif($OrdenServicio->estadoOrden == 2): ?>
                                                    
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-success">Lista Para
                                                        Entregar</span>
                                                <?php elseif($OrdenServicio->estadoOrden == 3 && $OrdenServicio->factura_numero_orden == null): ?>
                                                    
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-warning">Facturacion</span>
                                                <?php elseif($OrdenServicio->estadoOrden == 3): ?>
                                                    <span style="float: left;"
                                                        class="badge badge-pill badge-primary">Entregada</span>
                                                    
                                                <?php endif; ?>
                                            </th>

                                        <tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-5">
                            <p style="font-size: 12px">
                                Mostrando <?php if($numpaginate < $totalCount): ?>
                                    <?php echo e($numpaginate); ?>

                                <?php else: ?>
                                    <?php echo e($totalCount); ?>

                                <?php endif; ?> de <strong><?php echo e($totalCount); ?> </strong>
                                registros</p>
                        </div>
                        <div class="col-md-7">
                            <div style="align-content: center;margin: 0%" class="pagination pagination-sm">
                                <?php echo e($ordenServicio->withQueryString()->links()); ?>

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
    <script src="<?php echo url('js/ordenGeneralFiltro.js'); ?>"></script>
    <script src="<?php echo url('js/moment.min.js'); ?>"></script>
    <script src="<?php echo url('js/daterangepicker.min.js'); ?>"></script>
    <script>


    function exportExcel(btn){

    showpreloader();
    const exportar = btn
    var URLactual = window.location;
    var arrayUrl = URLactual.toString().split('&');
    var QuestionArrayUrl = URLactual.toString().split('?');
    posicion = arrayUrl.length - 1;
    questionpaginate = arrayUrl[posicion].toString().split('=');
    if (questionpaginate[0] == 'export') {
        var res = '';
        //Validacion para colocar paginate despues de un filtro
        for (i = 0; i < posicion; i++) {
            if (i > 0) {
                res = res + '&' + arrayUrl[i];
            } else {
                res = res + arrayUrl[i];
            }
        }
        location.href = res + '&export=' + exportar;

    } else if (QuestionArrayUrl.length == 1)  {
        location.href = '?export=' + exportar;
    }else{
    location.href = URLactual + '&export=' + exportar;
    }
    setTimeout(hidepreloader, 1500);

            // showpreloader();

    //     $.ajax({
    //         url: 'excellaravel',
    //         data: {
    //             btn : btn
    //         } ,
    //         type: 'POST',
    //         dataType: 'json',
    //     success: function (json) {
    //         if (json.mensaje === "ok") {
    //             if (json.data.length > 0) {


    //             }

    //         };
    //     },
    //     error: function (xhr, status) {
    //         alert('Disculpe, existió un problema en el servidor');
    //     },
    //     complete: function (xhr, status) {
    //     }
    // });
    }
    </script>
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/ordenServicio/orden_general.blade.php ENDPATH**/ ?>