<!DOCTYPE html>
<html lang="es">
    <head>
        <style>

        @media only screen and (max-width: 575px){
            .orden-blanco{
                display: none !important;
            }
            .nav-cargo{
                display: none !important;
            }
            .responsive-cel{
                display: block !important;
            }

        }
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Plataforma</title>
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

            <link href="{!! url('fontawesome/css/all.css') !!}" rel="stylesheet"/>
            <link rel="shortcut icon" href="{!! url('assets/img/logo.ico') !!}" type="image/x-icon">

            <link href="{!! url('css/sb-admin-2.css') !!}" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/> --}}
        {{-- <link rel="stylesheet" href="{!! url('sweetalert2/sweetalert2.min.css') !!}"> --}}
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.22/sweetalert2.css"/> --}}
        <link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet" />
        <link href="{!! url('bootstrap/preloader.css') !!}" rel="stylesheet" />
        <link href="{!! url('assets/css/light-bootstrap-dashboard.css?v=1.4.0') !!}" rel="stylesheet"/>
        <link href="{!! url('assets/css/animate.min.css') !!}" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

        {{-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'> --}}
        <link href="{!! url('assets/css/pe-icon-7-stroke.css') !!}" rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="{!! url('assets/css/bootstrap-extended.min.css') !!}">


        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
                <!-- Script de Select2 - buscar en menu delpegable-->
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') !!}" rel="stylesheet" /> --}}
        <!-- DataTables -->
        {{-- <link href="{!! url('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> --}}
        {{-- <link href="{!! url('assets/css/pe-icon-7-stroke.css') !!}" rel="stylesheet" /> --}}
        {{-- <link href="{!! url('assets/css/demo.css') !!}" rel="stylesheet" /> --}}
        {{-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') !!}" rel="stylesheet"> --}}

        @yield('css')






    </head>


    <body class="hold-transition skin-blue sidebar-mini login-page">

        <div class="wrapper">
        </div>

    @include('modulos.rol.roles')


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

            <script src="{!! url('bower_components/jquery/dist/jquery.min.js') !!}"></script>

            <script src="{!! url('bower_components/jquery-ui/jquery-ui.min.js') !!}"></script>
            <script> $.widget.bridge('uibutton', $.ui.button);</script>
            {{-- <script src="{!! url('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script> --}}

            <script src="{!! url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}"></script>
            <script src="{!! url('bower_components/fastclick/lib/fastclick.js') !!}"></script>
            <script src="{!! url('dist/js/adminlte.min.js') !!}"></script>
            @yield('js')
           <script src="{!! url('assets/js/light-bootstrap-dashboard.js?v=1.4.0') !!}"></script>
            <script src="{!! url('assets/js/demo.js') !!}"></script>
            <script src="{!! url('js/preloader.js') !!}"></script>
            <script src="{!! url('js/global.js') !!}"></script>
            <script src="{!! url('assets/js/bootstrap.min.js" type="text/javascript') !!}"></script>
            <script src="{!! url('sweetalert2/sweetalert2.js" type="text/javascript') !!}"></script>
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script> --}}
            {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.23/sweetalert2.all.js" integrity="sha512-LfOY+aB6HZ6FbLZlt2S4c+/aa0HHvh7noXwDm9wFPIzYZzeudQ/mGwDTASYfzf0lHDBOr5HB2/Zzau08kX5HmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

            @if (!!!Auth::guest())
            <script src="{!! url('js/sesionInactividad.js') !!}"></script>
            @endif
            {{-- <script src="{!! url('assets/js/bootstrap-notify.js') !!}"></script> --}}
            {{-- <script src="{!! url('assets/js/jquery.3.2.1.min.js" type="text/javascript') !!}"></script> funciona --}}
            {{-- <script src="{!! url('assets/js/chartist.min.js') !!}"></script> --}}
            {{-- <script src="{!! url('dist/js/demo.js') !!}"></script> --}}
            {{-- <script src="{!! url('dist/js/pages/dashboard.js') !!}"></script> --}}

            {{-- Graficas de torta- Barras --}}
            {{-- <script src="{!! url('bower_components/jquery-knob/dist/jquery.knob.min.js') !!}"></script>
            <script src="{!! url('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}"></script>
            <script src="{!! url('bower_components/morris.js/morris.min.js') !!}"></script>
            <script src="{!! url('bower_components/raphael/raphael.min.js') !!}"></script> --}}

            {{-- Fechas Calendar .js --}}
                {{-- <script src="{!! url('bower_components/moment/min/moment.min.js') !!}"></script>
                <script src="{!! url('bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
                <script src="{!! url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}"></script> --}}


            <script>  $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
              });</script>

    </body>
</html>
