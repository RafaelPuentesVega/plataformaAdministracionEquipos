{{-- <aside class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">



    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                MENU ADMINISTRATIVO
            </a>
        </div>

        <ul class="nav">

            <li>
                <a href="{{ url('crear_orden_servicio') }}">
                    <i class="pe-7s-note2"></i>
                    <p>CREAR ORDEN DE SERVICIO</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-users"></i>
                    <p>CLIENTES</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-monitor"></i>
                    <p>EQUIPOS</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-search"></i>
                    <p>BUSCAR ORDEN</p>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="pe-7s-tools"></i>
                    <p>SERVICIOS</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-note"></i>
                    <p>REQUERIMIENTO INTERNO</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-news-paper"></i>
                    <p>INFORMES</p>
                </a>
            </li>
            <li>
                <a href="">
                    <i class="pe-7s-lock"></i>
                    <p>PRIVACIDAD</p>
                </a>
            </li>

        </ul>
    </div>
</aside>
 --}}
 @section('css')
 <link href="http://192.168.1.10/plataforma/public/assets/css/bootstrap.min.css" rel="stylesheet" />
 <link href="http://192.168.1.10/plataforma/public/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

 <link href="http://192.168.1.10/plataforma/public/assets/css/animate.min.css" rel="stylesheet"/>
 <link href='http://192.168.1.10/plataforma/public/assets/css/pe-icon-7-stroke.css' rel='stylesheet' type='text/css'>


 @endsection






 <aside class="sidebar" data-color="azure" data-image="http://192.168.1.10/plataforma/public/assets/img/sidebar-5.jpg">


     <div class="sidebar-wrapper" >
         <div class="logo">
             <a href="{{url('inicio')}}" class="simple-text">
                 <img src="http://192.168.1.10/plataforma/public/assets/img/logo.png"  width="140" height="60" >
             </a>
         </div>

         <ul class="nav">
             <li @if (Request::url() == route('home')) class="active" @endif >
                 <a href="{{url('inicio')}}">
                     <i class="pe-7s-mail"></i>
                     <p>BANDEJA DE ENTRADA</p>
                 </a>
             </li>
             <li  @if (Request::url() == route('orden')) class="active" @endif>
                 <a href="{{ url('crear_orden_servicio') }}">
                     <i class="pe-7s-note2"></i>
                     <p>CREAR ORDEN</p>
                 </a>
             </li>
             <li @if (Request::url() == route('clientes')) class="active" @endif>
                 <a href="{{ url('clientes') }}">
                     <i class="pe-7s-users"></i>
                     <p>CLIENTES</p>
                 </a>
             </li>
             <li @if (Request::url() == route('equipos')) class="active" @endif>
                 <a href="{{ url('equipos') }}">
                     <i class="pe-7s-monitor"></i>
                     <p>EQUIPOS</p>
                 </a>
             </li>
             <li @if (Request::url() == route('searchOrden')) class="active" @endif>
                 <a href="{{ url('orden_salida') }}">
                     <i class="pe-7s-search"></i>
                     <p>Orden General</p>
                 </a>
             </li>
             <li @if (Request::url() == route('requerimientos')) class="active" @endif>
                 <a href="{{ url('requerimiento') }}">
                     <i class="pe-7s-note"></i>
                     <p>REQUERIMIENTO INTERNO</p>
                 </a>
             </li>
             <li @if (Request::url() == route('parametros')) class="active" @endif>
                 <a href="{{ url('parametros') }}">
                     <i class="pe-7s-tools"></i>
                     <p>SERVICIOS</p>
                 </a>
             </li>
             <li>
                <a href="">
                    <i class="pe-7s-news-paper"></i>
                    <p>INFORMES</p>
                </a>
            </li>

             <br><br>
             <li>
               <a href="{{route('logout')}}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"  class="btn btn-danger btn-fill  btn-flat" style="" > Cerrar Sesion </a>
                     <form method="POST" id="logout-form" action="{{route('logout')}}">
                      @csrf

                     </form>
                 </a>
                 <span style="font-size: 12px"><strong>{{auth()->user()->name }}</strong></span>
                 <span style="font-size: 12px"><strong>{{auth()->user()->rol }}</strong></span>


             </li>

         </ul>
     </div>
 </aside>

