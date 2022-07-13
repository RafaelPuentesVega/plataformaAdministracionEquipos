<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.11.3/datatables.min.css"/>


<link href="<?php echo url('bootstrap/bootstrap.css'); ?>" rel="stylesheet"/>
<link href="<?php echo url('fontawesome/css/all.css'); ?>" rel="stylesheet"/>

<style type="text/css">
    table { border-color: #CDCDD8; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px}
    .card label { color: rgba(0, 0, 0, 0.416); font-weight: bold}

    </style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>
<link href="<?php echo url('assets/js/toastr.min.css'); ?>" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<div class="wrapper" >

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">
            <body style="background-color: rgba(233, 233, 233, 0.295)">
            

            <div class="container-fluid">


                <div class="row ">
                    <div class="col-md-15">

                        <div class="card "  >
                            <div class="header" style="background-color: #06419f">
                                <h3 class="title text-center" style="font-size: 20px; color: #ffffff ; padding-bottom :8px;"><strong>CREAR ORDEN DE SERVICIO</strong></h3>
                            </div>
                            </div>
                            <div class="card " >


                                <div class="header" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1">
                                    <p  style="font-size: 15px; font-family: Verdana, Geneva, Tahoma, sans-serif; color: #1C2833; text-align: center; font-size: 14px"> <strong> CLIENTE </strong></p>
                                </div>
                                <div class="content" >
                                    

                                        <div class="row" required>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">TIPO CLIENTE</label>
                                                    <select style="appearance:none;"  class="js-example-basic js-states form-control" name="cliente_tipo" onchange="change(this)" id="tipocliente" required>
                                                        <option value=  >Seleccionar...</option>
                                                        <option  value="PERSONA">PERSONA</option>
                                                        <option value="EMPRESA">EMPRESA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Cedula / Nit</label>
                                                    <input type="number" id="cliente_documento" name="cliente_documento" class="form-control" placeholder="Numero Documento" autocomplete="off" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >Nombres</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i style="color: #242424; font-size: 22px; margin: -5px" class="bi bi-person-fill box-info pull-left"></i>
                                                        </span>
                                                    <input type="text" class="form-control" name="cliente_nombres" id="cliente_nombres" placeholder="Nombres"  required autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label >CORREO</label>
                                                    <div class="input-group">

                                                        <span class="input-group-addon" id="basic-addon1"><i class="fa-solid fa-at"></i></span>
                                                        <input type="email" class="form-control" name="cliente_correo" id="cliente_correo" placeholder="Correo Electronico" required autocomplete="off">

                                                      </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DIRECCION</label>
                                                    <input type="text" class="form-control" name="cliente_direccion" id="cliente_direccion" placeholder="Dirección" required autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label >CELULAR</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            
                                                            <i style="font-size: 19px" class="fa-solid fa-mobile-screen-button"></i>
                                                        </span>
                                                    <input type="phone" maxlength="10" class="form-control"  name="cliente_celular" id="cliente_celular" placeholder="Celular" required autocomplete="off" >
                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">TELEFONO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i style="color: #242424; font-size: 17px; margin: -5px" class="bi bi-telephone-fill box-info pull-left"></i>
                                                        </span>
                                                    <input type="text" class="form-control" maxlength="10" name="cliente_telefono" id="cliente_telefono" placeholder="Telefono" autocomplete="off">
                                                </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">DEPARTAMENTO</label>
                                                    <select class="js-example-basic js-states form-control" name="departamento_id" onclick="consultarMunicipio()" id="departamentoSelect" autocomplete="off">
                                                        <option value="13">HUILA</option>
                                                        <?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($departamento->departamento_id); ?>"><?php echo e($departamento->departamento_nombre); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </select>
                                                </div>



                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="">MUNICIPIO</label>
                                                    <div id="response-container">
                                                        <select class="js-example-basic js-states form-control"   name="municipio_id" id="municipioSelect" autocomplete="off">
                                                            <option value= "" > Seleccionar..</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                                 <!-- Button  modal -->
                                                 <button title="BUSCAR" data-toggle="tooltip" data-placement="bottom" style=" border: none;  margin: 10px" type="button" class="btn btn-secondary btn-fill  pull-right " data-toggle="modal" data-target="#md-buscaCliente" onclick="showModal()"  >
                                                    
                                                    <i style="font-size: 19px" class="fa-solid fa-magnifying-glass"></i>
                                                    <span  style="font-size: 16px">Buscar Cliente</span>
                                                 </button>

                                                 <div id="btn-update">
                                                    <button title="GUARDAR" data-toggle="tooltip" data-placement="bottom" style="border: none; margin: 10px" type="button" class="btn btn-info btn-fill pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >
                                                        
                                                        <i style="font-size: 20px" class="fas fa-save"></i>
                                                        
                                                        <span style="font-size: 16px" > Guardar Cliente</span>
                                                    </button>
                                                </div>

                                                <div class="clearfix"></div>

                                        <div class="row"  id="empresas" hidden >
                                            <hr style=" border: none; border-bottom: 1px solid rgba(161, 156, 156, 0.473); font-size: 1%">

                                            <div class="col-md-12" id="ClienteEmpresa" >


                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>DEPENDENCIA</label>
                                                    <input type="text" class="form-control" name="cliente_dependencia_empresa" id="cliente_dependencia_empresa" placeholder="Dependencia" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>USUARIO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i style="color: #242424; font-size: 22px; margin: -5px" class="bi bi-person-fill box-info pull-left"></i>
                                                        </span>
                                                    <input type="text" class="form-control" name="cliente_usuario_empresa" id="cliente_usuario_empresa" placeholder="Usuario Encargado" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>CELULAR USUARIO</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon" id="basic-addon1">
                                                            <i style="color: #242424; font-size: 22px; margin: -5px" class="bi bi-phone box-info pull-left"></i>
                                                        </span>
                                                    <input type="text" class="form-control" maxlength="10" name="cliente_celular_usuario" id="cliente_celular_usuario" placeholder="Celular Usuario" autocomplete="off" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group">
                                                    <label style="margin-bottom: 12px" >Agregar</label>
                                                    <div class="btn-save">
                                                        <div class="btnUpdate">

                                                        </div>
                                                        <button title="AGREGAR DEPENDENCIA" data-toggle="tooltip" data-placement="bottom"  style="margin-left: 15%; margin: -5px; border: none; outline:none; text-decoration: none" type="submits" class="btn btn-success btn-fill " id="btnGuardarUsuarioEmpresa" onclick="guardarUsuarioEmpresa()" >
                                                            
                                                            <i style="font-size: 16px" class="fa-solid fa-user-plus"></i>

                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                            </div>

                             <div class="card">

                                <div class="header" style="border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem;background-color: #AED6F1">
                                    <p  style="font-size: 15px; font-family: Verdana, Geneva, Tahoma, sans-serif; color: #1C2833; text-align: center; font-size: 14px"> <strong> DATOS EQUIPO </strong></p>
                                </div>


                                <div class="content">


                                        <div id="consultarEquipo" hidden>

                                        <!-- lISTA DE LOS EQUIPOS -->
                                        </div>
                                        <div class="row" >
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input style="width: 15px; height: 15px" title="CREAR EQUIPO" data-toggle="tooltip" data-placement="top"  class="form-check-input" type="checkbox" value="" id="checkTipoEquipo" onchange="javascript:tipoEquipo()" autocomplete="off">
                                                <label for="checkTipoEquipo">EQUIPO</label>
                                                <div id="selectEquipo">

                                                    <select class="js-example-basic-multiple js-states xl-form form-control" id="tipoEquipoSelect" >
                                                        <option  value="">-SELECCIONAR-</option>
                                                        <?php $__currentLoopData = $tipoEquipo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoEquipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($tipoEquipo->nombre_tipo_equipo); ?>"><?php echo e($tipoEquipo->nombre_tipo_equipo); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <input  type="text" class="form-control" id="equipo_tipo" placeholder="CREAR EQUIPO"  required autocomplete="off" style="text-transform: uppercase; display: none" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                         </div>

                                            <div class="col-md-2">
                                            <div class="form-group">
                                                    <label>MARCA</label>
                                                        <input type="text" class="form-control" id="equipo_marca" placeholder="Marca"  required autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>RFERENCIA</label>
                                                        <input type="text" class="form-control" id="equipo_referencia" placeholder="Referencia" required autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                                                </div>
                                            </div>

                                             <div class="col-md-2">
                                                <div class="form-group">
                                                        <label>SERIAL</label>
                                                            <input type="text" maxlength="6" class="form-control"  id="equipo_serial" placeholder="Serial" required autocomplete="off" >
                                                </div>
                                             </div>

                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">VERI. FUNC</label>
                                                        <select class="js-example-basic js-states form-control" id="verificacion_funcionamiento" required >
                                                            <option value="" >Seleccione..</option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO" >NO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                        <label id="saveequi" >Save</label>
                                                               <button id="btnGuardarEquipo" class="btn btn-info btn-fill" onclick="guardarEquipoOrden()">Guardar </button>
                                                    </div>
                                                 </div>

                                        </div>
                                        <h4 class="title text-dark">ACCESORIOS</h4>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-1" style="width: 121px">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input title="AGREGAR ADAPTADOR" data-toggle="tooltip" data-placement="top" class="form-check-input" style="width: 15px; height: 15px; margin-right: -4px" type="checkbox" value="" id="checkadaptador" onchange="javascript:showContent()" autocomplete="off">
                                                        <label class="form-check-label" style="font-size: 12px" for="checkadaptador">
                                                            ADAPTADOR
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2" hidden id="serial">
                                                <div class="form-group" >
                                                    <div class="form-check">
                                                        <input type="text" class="form-control" maxlength="6" placeholder="Serial" id="serialAdaptador" required  autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <textarea rows="2" id="accesorios" class="form-control" maxlength="240" placeholder="Otros Accesorios" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>
                                                </div>
                                            </div>

                                        </div>

                                         <div class="card " required>

                                            <div class="header">
                                            <h4 class="title text-dark">DATOS TECNICOS</h4>
                                            </div>
                                            <div class="content">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">SERVICIOS</label>
                                                            
                                                                
                                                                <select class="js-example-basic-multiple js-states xl-form form-control" id="servicio" name="states[]" multiple="multiple">
                                                                    <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($servicio->nombre_servicio); ?>"><?php echo e($servicio->nombre_servicio); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>CARACTERISTICAS DEL EQUIPO</label>
                                                    <textarea rows="3" id="caracteristicas_equipo" maxlength="240" class="form-control" placeholder="Caracteristicas Fisicas del equipo" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>DESCRIPCION DEL DAÑO</label>
                                                    <textarea rows="3" id="descripcion_dano" maxlength="240" class="form-control" placeholder="Daño del equipo" autocomplete="off" style="text-transform: uppercase" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="float: right">
                                            <input class="form-check-input" type="checkbox" value="" id="checkcontrato" style=" width: 19px; height: 19px">
                                            <label class="form-check-label" for="checkcontrato">
                                            Contrato
                                            </label>

                                            <input class="form-check-input" type="checkbox" value="" id="checkgarantia" style="width: 19px; height: 19px">
                                            <label class="form-check-label" for="checkgarantia" >
                                            GARANTIA
                                            </label>


                                        </div>
                                        <br>


                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">TECNICO</label>
                                                        <select class="js-example-basic js-states form-control" id="tecnicoSelect" required>
                                                                    <option value="">-SELECCIONAR-</option>
                                                                    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                     <option value="<?php echo e($users->id); ?>"><?php echo e($users->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                                </div>


                        </div>
                    </div>
                    <button  class="btn btn-success btn-fill pull-right" onclick="guardarOrdenServicio()"><strong style="font-size: 15px">GUARDAR Y ENVIAR</strong></button>
                                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('modulos.ordenServicio.modal.modal_buscar_cliente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('js'); ?>
    
    <script src="<?php echo url('js/jquery.min.js'); ?>""></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="<?php echo url('js/crearorden.js'); ?>""></script>
    <script src="<?php echo url('assets/js/toastr.min.js'); ?>""></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
<?php $__env->stopSection(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/ordenServicio/crearordenservicio.blade.php ENDPATH**/ ?>