<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo url('fontawesome/css/all.css" rel="stylesheet'); ?>" />


    <link href="<?php echo url('assets/js/toastr.min.css" rel="stylesheet'); ?>" />
    <link href="<?php echo url('bootstrap/bootstrap.css" rel="stylesheet'); ?>" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <style type="text/css">
        .card label {
            color: black;
            font-weight: bold
        }
    </style>
<?php $__env->stopSection(); ?>

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
                <form action="<?php echo e(route('actualizarCliente', $dataCliente->cliente_id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-12">

                            <div class="content">


                                <div class="row" required>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label style="color: black; font-weight: bold" for="">TIPO
                                                CLIENTE</label>
                                            <select style="appearance:none;"
                                                class="js-example-basic js-states form-control" name="cliente_tipo"
                                                id="tipocliente" required>
                                                <option value="<?php echo e($dataCliente->cliente_tipo); ?>">
                                                    <?php echo e($dataCliente->cliente_tipo); ?></option>
                                                <?php if($dataCliente->cliente_tipo != 'EMPRESA'): ?>
                                                    <option value="EMPRESA">EMPRESA</option>
                                                <?php else: ?>
                                                    <option value="PERSONA">PERSONA</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Cedula / Nit</label>
                                            <input value="<?php echo e($dataCliente->cliente_documento); ?>" type="text"
                                                id="cliente_documento" name="cliente_documento" class="form-control"
                                                placeholder="Numero Documento" autocomplete="off" disabled required>
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
                                                <input type="text" value="<?php echo e($dataCliente->cliente_nombres); ?> "
                                                    class="form-control" name="cliente_nombres" id="cliente_nombres"
                                                    placeholder="Nombres" required autocomplete="off"
                                                    style="text-transform: uppercase"
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
                                                <input value="<?php echo e($dataCliente->cliente_correo); ?>" type="email"
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
                                            <input type="text" minlength="1" value="<?php echo e($dataCliente->cliente_direccion); ?>"
                                                class="form-control" name="cliente_direccion" id="cliente_direccion"
                                                placeholder="Dirección" required autocomplete="off"
                                                style="text-transform: uppercase"
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
                                                <input type="phone" minlength="10" maxlength="10"
                                                    value="<?php echo e($dataCliente->cliente_celular); ?>" class="form-control"
                                                    name="cliente_celular" id="cliente_celular" placeholder="Celular"
                                                    required autocomplete="off">
                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">TELEFONO</label>
                                            <div class="input-group">
                                                <span  class="input-group-addon" id="basic-addon1">
                                                    <i style="color: #242424; font-size: 17px; margin: -5px"
                                                        class="bi bi-telephone-fill box-info pull-left"></i>
                                                </span>
                                                <input type="text" class="form-control"
                                                    value="<?php echo e($dataCliente->cliente_telefono); ?>" minlength="7" maxlength="10"
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
                                                <option value="<?php echo e($dataCliente->departamento_id); ?>">
                                                    <?php echo e($dataCliente->departamento_nombre); ?></option>

                                            </select>
                                        </div>



                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">MUNICIPIO</label>
                                            <div id="response-container">
                                                <select class="js-example-basic js-states form-control"
                                                    name="municipio_id" id="municipioSelect" autocomplete="off">
                                                    <option value="<?php echo e($dataCliente->municipio_id); ?>">
                                                        <?php echo e($dataCliente->municipio_nombre); ?></option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                                <div id="btn-update">
                                    <button title="GUARDAR" data-toggle="tooltip" data-placement="bottom"
                                        style="padding: 5px;border: none; outline:none; text-decoration: none; margin: 10px"
                                        type="submit" class="btn btn-info  pull-right "
                                        id="btnGuardarCliente" >
                                        <i style="font-size: 19px" class="fa-solid fa-user-pen"></i>
                                        <span style="font-size: 16px; margin-block-start: 15%">Actualizar</span>
                                    </button>
                                </div>

                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                </form>
                </div>


                <div class="container-fluid">

                    <div class="row ">
                        <div class="col-md-12">



                            <div style="" class="btn-group btn-group-justified"
                                onchange="javascript:showContent()" role="group"
                                aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnradio" id="btnEquipo"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary arrays " for="btnEquipo"
                                    style="font-size: 14px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Equipos</label>

                                <input type="radio" class="btn-check" name="btnradio" id="btnOrden"
                                    autocomplete="off">
                                <label class="btn btn-outline-secondary arrays" for="btnOrden"
                                style="font-size: 14px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Orden de servicio</label>
                                <?php if($dataCliente->cliente_tipo == 'EMPRESA' || $dataCliente->cliente_tipo == 'empresa'): ?>
                                    <input type="radio" class="btn-check" name="btnradio" id="btnUsuarioEmpresa"
                                        autocomplete="off">
                                    <label class="btn  btn-outline-secondary arrays" for="btnUsuarioEmpresa"
                                    style="font-size: 14px;border: rgb(186, 186, 186) 1.5px solid;border-radius: 10px ;border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; ">Usuarios</label>
                                <?php endif; ?>

                            </div>
                            <hr>
                            <br><br>
                            

                            <div class="table-responsive-xl" id="ordenServicio" style="display: none">
                                <table id="tableOrdenServicio" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Orden
                                                    N°</strong></th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Fecha
                                                    Ingreso</strong></th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Fecha
                                                    Entrega</strong></th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Equipo</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Tecnico</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Valor
                                                    total</strong></th>
                                            <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $arrayOrden; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="font-size: 12px;height: 50px">


                                                <td class="text-center" style="font-size: 18px">
                                                    <strong><?php echo e($orden->id_orden); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($orden->fecha_creacion_orden); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($orden->fecha_entrega_orden); ?></strong>
                                                </td>
                                                <td class="text-center"><strong><?php echo e($orden->equipo_tipo); ?> -
                                                        <?php echo e($orden->equipo_marca); ?> -
                                                        <?php echo e($orden->equipo_referencia); ?></strong></td>
                                                <td class="text-center"><strong><?php echo e($orden->name); ?></strong></td>
                                                <td class="text-center">
                                                    <strong><?php echo e($orden->valor_total_orden); ?></strong>
                                                </td>
                                                <td>
                                                    <button
                                                        style="border: none; outline:none; text-decoration: none; margin: 0%"
                                                        type="button" title="Datos de cliente" data-toggle="tooltip"
                                                        data-placement="left"
                                                        class="btn btn-info btn-fill  pull-right "
                                                        id="btnGuardarCliente">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-person-lines-fill box-info pull-left"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            

                            <div class="table-responsive-xl" id="equipoCliente" style="display: none">
                                <table id="tableEquipoCliente" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Equipo</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Marca</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Referencia</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Serial</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $arrayEquipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="font-size: 12px;height: 50px">


                                                <td class="text-center"><strong><?php echo e($equipo->equipo_tipo); ?></strong>
                                                </td>
                                                <td class="text-center"><strong><?php echo e($equipo->equipo_marca); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($equipo->equipo_referencia); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($equipo->equipo_serial); ?></strong>
                                                </td>
                                                <td>
                                                    <button
                                                        style="border: none; outline:none; text-decoration: none; margin: 0%"
                                                        type="button" title="Datos de cliente" data-toggle="tooltip"
                                                        data-placement="left"
                                                        class="btn btn-info btn-fill  pull-right "
                                                        id="btnGuardarCliente">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-person-lines-fill box-info pull-left"></i>
                                                    </button>
                                                </td>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>

                            
                            <div class="table-responsive-xl" id="usuarioEmpresa" style="display: none">
                                <table id="tableUsuarioEmpresa" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Dependencia</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Usuario</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C">
                                                <strong>Celular</strong>
                                            </th>
                                            <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $arrayUsuarioEmpresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarioEmpresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="font-size: 12px;height: 50px">


                                                <td class="text-center">
                                                    <strong><?php echo e($usuarioEmpresa->usuario_dependencia); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($usuarioEmpresa->usuario_nombre); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?php echo e($usuarioEmpresa->usuario_celular); ?></strong>
                                                </td>
                                                <td>

                                                    <button
                                                        style="border: none; outline:none; text-decoration: none; margin: 0%"
                                                        type="button" title="Datos de cliente" data-toggle="tooltip"
                                                        data-placement="left"
                                                        class="btn btn-info btn-fill  pull-right "
                                                        id="btnGuardarCliente">
                                                        <i style="color: #ffffff; font-size: 20px; margin: -5px"
                                                            class="bi bi-person-lines-fill box-info pull-left"></i>
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

    </div>
</div>
</div>


<?php $__env->startSection('js'); ?>
    
    <script src="<?php echo url('js/jquery.min.js'); ?>"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="<?php echo url('js/editCliente.js'); ?>"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

        })
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/cliente/editarCliente.blade.php ENDPATH**/ ?>