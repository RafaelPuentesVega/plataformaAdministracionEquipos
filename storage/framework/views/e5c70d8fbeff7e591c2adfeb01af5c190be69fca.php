<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
<link href="<?php echo url('bootstrap/bootstrap.css'); ?>" rel="stylesheet"/>
<link href="<?php echo url('assets/js/toastr.min.css'); ?>" rel="stylesheet"/>
<?php $__env->stopSection(); ?>

<div class="wrapper">
    <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-md-15">
                                <div class="card "  >
                                    <div class="header" style="background-color: #06419f">
                                        <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>REPUESTOS PENDIENTES DE AUTORIZACION</strong></h3>
                                    </div>
                                </div>

                                <table id="clients" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr style="font-size: 50px;">

                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>CANTIDAD</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>REPUESTO</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>N° ORDEN</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>TECNICO</strong></th>
                                            <th scope="col" class="text-center"  style="font-size: 15px;color:#16172C"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $repuestoAutorizar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $repuestoAutoriza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="height: 50px">
                                                <td width="10%" class="text-center"><?php echo e($repuestoAutoriza->cantidad_repuesto); ?><strong></strong></td>
                                                <td width="50%" class="text-center"><?php echo e($repuestoAutoriza->nombre_repuesto); ?><strong></strong></td>
                                                <td width="10%" class="text-center" style="font-size: 20px"><strong><?php echo e($repuestoAutoriza->id_orden_servicio_repuesto); ?></strong></td>
                                                <td width="25%" class="text-center"><?php echo e($repuestoAutoriza->user_creation_repuesto); ?><strong></strong></td>

                                                <td width="5%">
                                                    <button  title="AGREGAR PRECIO" data-toggle="tooltip" data-placement="left" style="border: none; outline:none; text-decoration: none; margin: 0px" type="submits" class="btn btn-warning btn-fill  pull-right " id="btnGuardarCliente" onclick="editarRepuesto('<?php echo e($repuestoAutoriza->id_repuesto); ?>')" >
                                                        <i style="color: #ffffff; font-size: 18px; margin: -5px" class="bi bi-currency-dollar box-info pull-left"></i>
                                                    </button>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>


                        </div>
                    </div>
                </div>
         </div>
    </div>
</div>

<?php echo $__env->make('modulos.requerimiento.modalAutorizar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo url('js/requerimiento.js'); ?>"></script>
    <script src="<?php echo url('assets/js/toastr.min.js'); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/requerimiento/requerimientointerno.blade.php ENDPATH**/ ?>