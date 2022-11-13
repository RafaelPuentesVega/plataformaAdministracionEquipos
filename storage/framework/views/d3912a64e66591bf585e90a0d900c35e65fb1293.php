<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Plataforma ByG</title>
    <link rel="shortcut icon" href="<?php echo url('assets/img/logo.ico'); ?>" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?php echo url('fontawesome/css/all.min.css" rel="stylesheet" type="text/css'); ?>">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo url('css/sb-admin-2.min.css" rel="stylesheet'); ?>">

</head>

<body class="" style="background: linear-gradient(39deg, rgba(42,41,144,1) 6%, rgba(91,144,222,1) 50%, rgba(31,37,131,1) 94%);">

    <?php if(Request::get('resetPassword') == 'true'): ?>
        <?php echo $__env->make('auth.reset-password', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div id="login" class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img style="width: 500px ; height: 600px;" src="<?php echo url('assets/img/fondo-inicio-sesion.png'); ?>" alt=""></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2"><strong>Bienvenido!</strong></h1>
                                    </div>
                                    <div class="text-center">
                                        <img style="width: 20%; margin: 3%" class="" src="<?php echo url('assets/img/iniciar-sesion.png'); ?>" alt="">
                                    </div>
                                    <br>
                                    <form class="user" method="POST" action="<?php echo e(route('login')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <input  type="email" value="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e(old('email')); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="email" class="form-control form-control-user"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Ingresar correo" required>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="none-password" type="password" name="password" id="password" class="form-control form-control-user"
                                                 placeholder="Contraseña" required>
                                        </div>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Correo no registrado</strong> </h6> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Contraseña incorrecta</strong> </h6> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div style="color: brown ; text-align: center"> <ul> <li style="list-style: none"> <h6> <strong>Usuario INACTIVO</strong> </h6> </li> </ul><br></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <br>
                                        <button type="submit" id="btn-ingresar" style="font-size: 14px" class="btn btn-primary btn-user btn-block">
                                            Ingresar
                                        </button>
                                    </form>
                                    <br>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login?resetPassword=true">Olvido su contraseña?</a>
                                    </div>
                                    <br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php endif; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo url('vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo url('js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\cpanelbyg\resources\views/auth/login.blade.php ENDPATH**/ ?>