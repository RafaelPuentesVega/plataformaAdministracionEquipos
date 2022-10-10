<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <title>Plataforma</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

            <link href="<?php echo url('fontawesome/css/all.css'); ?>" rel="stylesheet"/>
            <link rel="shortcut icon" href="<?php echo url('assets/img/logo.ico'); ?>" type="image/x-icon">

            <link href="<?php echo url('css/sb-admin-2.css'); ?>" rel="stylesheet" />
        
        
        
        <link href="<?php echo url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <link href="<?php echo url('bootstrap/preloader.css'); ?>" rel="stylesheet" />
        <link href="<?php echo url('assets/css/light-bootstrap-dashboard.css?v=1.4.0'); ?>" rel="stylesheet"/>
        <link href="<?php echo url('assets/css/animate.min.css'); ?>" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        
        <link href="<?php echo url('assets/css/pe-icon-7-stroke.css'); ?>" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">


        
                <!-- Script de Select2 - buscar en menu delpegable-->
        
        <!-- DataTables -->
        
        
        
        

        <?php echo $__env->yieldContent('css'); ?>






    </head>


    <body class="hold-transition skin-blue sidebar-mini login-page">

        <div class="wrapper">
        </div>

    <?php echo $__env->make('modulos.rol.roles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div id="preloaderId" class="preloader" style="
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(20, 23, 26, 0.503);
    z-index: 9999;
    display:none;
">
<div id="preloader6" style="">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <p style="margin-top: 100%; margin-left: -50%; color: aliceblue">Procesando...</p>
</div>
</div>



            <script src="<?php echo url('bower_components/jquery/dist/jquery.min.js'); ?>"></script>

            <script src="<?php echo url('bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
            <script> $.widget.bridge('uibutton', $.ui.button);</script>
            

            <script src="<?php echo url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
            <script src="<?php echo url('bower_components/fastclick/lib/fastclick.js'); ?>"></script>
            <script src="<?php echo url('dist/js/adminlte.min.js'); ?>"></script>
            <?php echo $__env->yieldContent('js'); ?>
           <script src="<?php echo url('assets/js/light-bootstrap-dashboard.js?v=1.4.0'); ?>"></script>
            <script src="<?php echo url('assets/js/demo.js'); ?>"></script>
            <script src="<?php echo url('js/preloader.js'); ?>"></script>
            <script src="<?php echo url('js/global.js'); ?>"></script>
            <script src="<?php echo url('assets/js/bootstrap.min.js" type="text/javascript'); ?>"></script>
            <script src="<?php echo url('sweetalert2/sweetalert2.js" type="text/javascript'); ?>"></script>
            
            

            <?php if(!!!Auth::guest()): ?>
            <script src="<?php echo url('js/sesionInactividad.js'); ?>"></script>
            <?php endif; ?>
            
            
            
            
            

            
            

            
                


            <script>  $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });</script>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/plantilla.blade.php ENDPATH**/ ?>