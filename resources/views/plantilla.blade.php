<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Plataforma</title>
        <link rel="shortcut icon" href="http://localhost/plataforma/public/assets/img/logo.ico" type="image/x-icon">
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">





        <link href="http://localhost/plataforma/public/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="http://localhost/plataforma/public/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
        <link href="http://localhost/plataforma/public/assets/css/animate.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        {{-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> --}}
        <link href='http://localhost/plataforma/public/assets/css/pe-icon-7-stroke.css' rel='stylesheet' type='text/css'>



        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
                <!-- Script de Select2 - buscar en menu delpegable-->
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
        <!-- DataTables -->
        {{-- <link href="http://localhost/plataforma/public/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> --}}
        {{-- <link href="http://localhost/plataforma/public/assets/css/pe-icon-7-stroke.css" rel="stylesheet" /> --}}
        {{-- <link href="http://localhost/plataforma/public/assets/css/demo.css" rel="stylesheet" /> --}}
        {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"> --}}

        @yield('css')






    </head>


    <body class="hold-transition skin-blue sidebar-mini login-page">

        <div class="wrapper">
        </div>

    @include('modulos.rol.roles')

{{--
        @if (Auth::user())
            @include('modulos.cabecera')
            @if(auth()->user()->rol == "TECNICO")
            @include('modulos.rol.menutecnico')
            @endif
            @if(auth()->user()->rol == "ADMINISTRATIVO")
            @include('modulos.menuadministrativo')
            @endif
            @if(auth()->user()->rol == "COORDINADOR TECNICO")
            @include('modulos.rol.menucordinadortecnico')
            @endif
            @if(auth()->user()->rol == "GERENTE")
            @include('modulos.rol.menugerente')
            @endif
            @yield('content')
        @else
        @yield('contenido')
        @endif --}}

            <script src="http://localhost/plataforma/public/bower_components/jquery/dist/jquery.min.js"></script>

            <script src="http://localhost/plataforma/public/bower_components/jquery-ui/jquery-ui.min.js"></script>
            <script> $.widget.bridge('uibutton', $.ui.button);</script>
            {{-- <script src="http://localhost/plataforma/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> --}}

            <script src="http://localhost/plataforma/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
            <script src="http://localhost/plataforma/public/bower_components/fastclick/lib/fastclick.js"></script>
            <script src="http://localhost/plataforma/public/dist/js/adminlte.min.js"></script>
            @yield('js')
           <script src="http://localhost/plataforma/public/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
            <script src="http://localhost/plataforma/public/assets/js/demo.js"></script>
            <script src="http://localhost/plataforma/public/assets/js/bootstrap.min.js" type="text/javascript"></script>

            {{-- <script src="http://localhost/plataforma/public/assets/js/bootstrap-notify.js"></script> --}}
            {{-- <script src="http://localhost/plataforma/public/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script> funciona --}}
            {{-- <script src="http://localhost/plataforma/public/assets/js/chartist.min.js"></script> --}}
            {{-- <script src="http://localhost/plataforma/public/dist/js/demo.js"></script> --}}
            {{-- <script src="http://localhost/plataforma/public/dist/js/pages/dashboard.js"></script> --}}

            {{-- Graficas de torta- Barras --}}
            {{-- <script src="http://localhost/plataforma/public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
            <script src="http://localhost/plataforma/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
            <script src="http://localhost/plataforma/public/bower_components/morris.js/morris.min.js"></script>
            <script src="http://localhost/plataforma/public/bower_components/raphael/raphael.min.js"></script> --}}

            {{-- Fechas Calendar .js --}}
                {{-- <script src="http://localhost/plataforma/public/bower_components/moment/min/moment.min.js"></script>
                <script src="http://localhost/plataforma/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
                <script src="http://localhost/plataforma/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}


            <script>  $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });</script>

    </body>
</html>
