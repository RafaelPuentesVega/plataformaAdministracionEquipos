<?php $__env->startSection('css'); ?>
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/vendor/bootstrap/css/bootstrap.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/fonts/iconic/css/material-design-iconic-font.min.css'); ?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/vendor/animate/animate.css'); ?>">
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/vendor/animsition/css/animsition.min.css'); ?>">
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/css/util.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo url('login1/css/main.css'); ?>">


<!--===============================================================================================-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>

<div class="container-login100" style="background-image: url(' <?php echo url('login1/images/background.jpg'); ?> ');" >
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="POST" action="<?php echo e(route('login')); ?>">
        <?php echo csrf_field(); ?>
            <span class="login100-form-title p-b-37">
                INICIAR SESION
            </span>

            <div class="wrap-input100 validate-input m-b-20" data-validate="Ingresar Correo">
                <input class="input100" type="text" name="email" placeholder="Correo">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-25" data-validate = "Ingresar Contraseña">
                <input class="input100" type="password" name="password" placeholder="Contraseña">
                <span class="focus-input100"></span>
            </div>

            <br>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>Correo no registrado</strong> </h3> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>Contraseña incorrecta</strong> </h3> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>USUARIO INACTIVO</strong> </h3> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Iniciar Sesion
                </button>
            </div>



        </form>


    </div>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<!--===============================================================================================-->
<script src="<?php echo url('login1/vendor/jquery/jquery-3.2.1.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/vendor/animsition/js/animsition.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/vendor/bootstrap/js/popper.js'); ?>"></script>
	<script src="<?php echo url('login1/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/vendor/select2/select2.min.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/vendor/daterangepicker/moment.min.js'); ?>"></script>
	<script src="<?php echo url('login1/vendor/daterangepicker/daterangepicker.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/vendor/countdowntime/countdowntime.js'); ?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo url('login1/js/main.js'); ?>"></script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CpanelByg\resources\views/auth/login.blade.php ENDPATH**/ ?>