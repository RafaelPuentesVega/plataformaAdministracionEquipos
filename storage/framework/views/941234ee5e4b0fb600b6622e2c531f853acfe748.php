
 <?php $__env->startSection('css'); ?>
 <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
 <link href="<?php echo url('assets/css/light-bootstrap-dashboard.css?v=1.4.0'); ?>" rel="stylesheet"/>

 <link href="<?php echo url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
 <link href="<?php echo url('assets/css/pe-icon-7-stroke.css'); ?>" rel='stylesheet' type='text/css'>


 <?php $__env->stopSection(); ?>






 <aside class="sidebar" data-color="azure" data-image="<?php echo url('assets/img/sidebar-5.jpg'); ?>">


     <div class="sidebar-wrapper" >
         <div class="logo">
             <a href="<?php echo e(url('inicio')); ?>" class="simple-text">
                 <img src="<?php echo url('assets/img/logo.png'); ?>"  width="140" height="60" >
             </a>
         </div>

         <ul class="nav">
             <li <?php if(Request::url() == route('home')): ?> class="active" <?php endif; ?> >
                 <a href="<?php echo e(url('inicio')); ?>">
                     <i class="pe-7s-mail"></i>
                     <p>BANDEJA DE ENTRADA</p>
                 </a>
             </li>
             <li  <?php if(Request::url() == route('orden')): ?> class="active" <?php endif; ?>>
                 <a href="<?php echo e(url('crear_orden_servicio')); ?>">
                     <i class="pe-7s-note2"></i>
                     <p>CREAR ORDEN</p>
                 </a>
             </li>
             <li <?php if(Request::url() == route('clientes')): ?> class="active" <?php endif; ?>>
                 <a href="<?php echo e(url('clientes')); ?>">
                     <i class="pe-7s-users"></i>
                     <p>CLIENTES</p>
                 </a>
             </li>
             <li <?php if(Request::url() == route('equipos')): ?> class="active" <?php endif; ?>>
                 <a href="<?php echo e(url('equipos')); ?>">
                     <i class="pe-7s-monitor"></i>
                     <p>EQUIPOS</p>
                 </a>
             </li>
             <li <?php if(Request::url() == route('searchOrden')): ?> class="active" <?php endif; ?>>
                 <a href="<?php echo e(url('orden_salida')); ?>">
                     <i class="pe-7s-search"></i>
                     <p>Orden General</p>
                 </a>
             </li>
           <li <?php if(Request::url() == route('requerimientos')): ?> class="active" <?php endif; ?>>

                 <a href="<?php echo e(url('requerimiento')); ?>">
                     <i class="pe-7s-note"></i>
                     <p>
                    <?php if($countRequerimiento <> 0): ?>
                    <span style="float: right; font-size: 14px" class=" top-0 start-100 translate-middle badge rounded-pill badge-danger">
                        <?php echo e($countRequerimiento); ?>

                    </span>
                    <?php endif; ?>
                     REQUERIMIENTO INTERNO</p>
                 </a>
             </li>
             <li <?php if(Request::url() == route('parametros')): ?> class="active" <?php endif; ?>>
                 <a href="<?php echo e(url('parametros')); ?>">
                     <i class="pe-7s-config"></i>
                     <p>PARAMETROS</p>
                 </a>
             </li>
             <li <?php if(Request::url() == route('correos')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('correos')); ?>">
                    <i class="pe-7s-mail-open-file"></i>
                    <p>PLANTILLAS CORREO</p>
                </a>
            </li>
             <li <?php if(Request::url() == route('informes')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('informes')); ?>">
                    <i class="pe-7s-news-paper"></i>
                    <p>INFORMES</p>
                </a>
            </li>
            <li <?php if(Request::url() == route('privacidad')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('privacidad')); ?>">
                    <i class="pe-7s-add-user"></i>
                    <p>USUARIOS</p>
                </a>
            </li>



         </ul>
     </div>
 </aside>

<?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/rol/menuadministrativo.blade.php ENDPATH**/ ?>