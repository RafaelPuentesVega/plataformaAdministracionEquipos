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
            
            <li <?php if(Request::url() == route('privacidad')): ?> class="active" <?php endif; ?>>
                <a href="<?php echo e(url('privacidad')); ?>">
                    <i class="pe-7s-add-user"></i>
                    <p>EMPLEADOS</p>
                </a>
            </li>
            <br><br>
            <li>
              <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"  class="btn btn-danger btn-fill  btn-flat" style="" > Cerrar Sesion </a>
                    <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                     <?php echo csrf_field(); ?>

                    </form>
                </a>
                <span style="font-size: 12px"><strong><?php echo e(auth()->user()->name); ?></strong></span>
                <span style="font-size: 12px"><strong><?php echo e(auth()->user()->rol); ?></strong></span>


            </li>

        </ul>
    </div>
</aside>

<?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/modulos/rol/menutecnico.blade.php ENDPATH**/ ?>