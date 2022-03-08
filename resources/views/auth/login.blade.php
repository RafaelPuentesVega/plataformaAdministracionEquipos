{{-- @extends('plantilla')
@section('contenido')

<div class="login-box">
    <div class="login-logo">
        <b>Clinica Medica</b>

    </div>

    <div class="login-box-body">
        <p class="login-box-msg"> Ingresar al Sistema</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Usuario" required="" value="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" required="" placeholder="Contraseña" value="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @error('email')
                <br>
                <div class="alert alert-error">Ingresar correctamente el correo</div>

                @enderror

            </div>

            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat ">Ingresar</button>


                </div>

            </div>
        </form>

    </div>

</div>

@endsection --}}


@extends('plantilla')
@section('css')
<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/css/util.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/plataforma/public/login1/css/main.css">


<!--===============================================================================================-->

@endsection
@section('contenido')

<div class="container-login100" style="background-image: url('http://localhost/plataforma/public/login1/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
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
            @error('email') <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>Correo no registrado</strong> </h3> </li> </ul><br></div> @enderror
            @error('password') <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>Contraseña incorrecta</strong> </h3> </li> </ul><br></div> @enderror
            @error('state') <div style="color: brown ; text-align: center"> <ul> <li> <h3> <strong>USUARIO INACTIVO</strong> </h3> </li> </ul><br></div> @enderror


            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Iniciar Sesion
                </button>
            </div>



        </form>


    </div>
</div>


@endsection

@section('js')

<!--===============================================================================================-->
<script src="http://localhost/plataforma/public/login1/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/vendor/bootstrap/js/popper.js"></script>
	<script src="http://localhost/plataforma/public/login1/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/vendor/daterangepicker/moment.min.js"></script>
	<script src="http://localhost/plataforma/public/login1/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="http://localhost/plataforma/public/login1/js/main.js"></script>


@endsection

