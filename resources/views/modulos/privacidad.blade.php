@extends('plantilla')
@section('content')

@section('css')
<link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/>

@endsection
<div class="wrapper">

    <div class="main-panel">

        <div class="content" style="font-family: Verdana, sans-serif">

                <div class="card "  >
                    <div class="header" style="background-color: #06419f">
                        <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>CREAR USUARIO</strong></h3>
                    </div>
                </div>
                <div class="container-fluid" >

                <div class="row" >
                    <div class="col-md-12"  >

                                    <div class="card"  >
                                        <div class="content" >

                                            <div class="card-body" >

                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <div class="form-group row">
                                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NOMBRE COMPLETO') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('CORREO ELECTRONICO') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete= "off">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('CELULAR') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="number" minlength="5" class="form-control" name="celular" value="{{ old('celular') }}" required autocomplete="off">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('CARGO') }}</label>

                                                        <div class="col-md-6">
                                                            {{-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="off"> --}}
                                                            <select class="js-example-basic js-states form-control" value="{{ old('rol') }}" name="rol" id="rol" required>
                                                                <option value="" >Seleccionar...</option>
                                                                <option  value="TECNICO">TECNICO</option>
                                                                <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
                                                                <option value="COORDINADOR TECNICO">COORDINADOR TECNICO</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" minlength="6" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete= "off">

                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <p style="margin: 0%; font-size: 11px; color: rgba(109, 108, 108, 0.747)" >Contraseña con minimo 6 caracteres</p>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" minlength="6" type="password" class="form-control" name="password_confirmation" required autocomplete= "off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('REGISTRAR') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <table id="clients" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                   font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                   <thead class="thead-light">
                                       <tr style="font-size: 50px;">

                                           <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                               <strong>NOMBRE</strong></th>
                                           <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                               <strong>CORREO</strong></th>
                                           <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                               <strong>TELEFONO</strong></th>
                                           <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                               <strong>CARGO</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>REGISTRADO</strong></th>
                                            <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                                <strong>ESTADO</strong></th>
                                           <th scope="col" class="text-center"  style="font-size: 15px;color:#16172C"><strong>ULTIMO LOGIN</strong></th>
                                           <th scope="col" class="text-center"  style="font-size: 15px;color:#16172C"></th>

                                       </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($usuario as $usuarios)
                                           <tr style="height: 50px">
                                               <td width="20%" class="text-center">{{$usuarios->name}}</td>
                                               <td width="20%" class="text-center">{{$usuarios->email}}
                                               </td>
                                               <td width="7%" class="text-center">{{$usuarios->telefono}}</td>
                                               <td width="10%" class="text-center">{{$usuarios->rol}}</td>
                                               <td width="10%" class="text-center">{{$usuarios->created_at}}</td>
                                               @if($usuarios->state == 1)
                                               <td width="10%" class="text-center">ACTIVO</td>
                                               @else
                                               <td width="10%" class="text-center">INACTIVO</td>
                                               @endif

                                               <td width="10%" class="text-center">{{$usuarios->last_login}}</td>

                                               <td width="5%">

                                                   <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de equipo" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill btn-round  pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >
                                                       <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-circle box-info pull-left"></i>
                                                   </button>
                                               </td>
                                           </tr>
                                       @endforeach
                                   </tbody>
                               </table>
                                </div>
                            </div>
                        </div> -
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>

@endsection
