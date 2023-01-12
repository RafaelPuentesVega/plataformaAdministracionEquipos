@extends('plantilla')
@section('content')
@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card "  >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>EQUIPOS</strong></h3>
                </div>
            </div>

            <div class="container-fluid">


                <div class="row ">
                    <div class="col-md-15">

                        <form action="" method="post">
                            @csrf

                            <div class="card " style="border: #ffffff">


                                <div class="header">
                                    <h3 class="title text-center"><strong>CREAR EQUIPO</strong></h3>
                                </div>
                                <div class="content">

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>TIPO EQUIPO</label>
                                                <input type="text" class="form-control" name="equipo_tipo"
                                                    placeholder="Equipo" required>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>MARCA</label>
                                                <input type="text" class="form-control" name="equipo_marca"
                                                    placeholder="Marca" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>REFERENCIA</label>
                                                <input type="text" class="form-control" name="equipo_referencia"
                                                    placeholder="Referencia" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>SERIAL</label>
                                                <input type="text" class="form-control" name="equipo_serial"
                                                    placeholder="Serial" required>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label for="">BYG</label>
                                                <select class="js-example-basic-multiple js-states form-control"
                                                    name="equipo_byg" required>
                                                    <option value="NO">NO</option>
                                                    <option value="SI">SI</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" style="margin: 10px"
                                        class="btn btn-success btn-fill pull-right btn-round">CREAR</button>
                                    <div class="clearfix"></div>
                                </div> <br>

                            </div>
                            {{-- <table  id="clients" class="table" border bordercolor="#CDCDD8"> --}}
                            <table id="equipo" class="table table-striped table-hover"
                            style="webkit-font-smoothing: antialiased;
                                font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                <thead class="thead-light">
                                    <tr style="font-size: 50px;">

                                        <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                            <strong>EQUIPO</strong></th>
                                        <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                            <strong>MARCA</strong></th>
                                        <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                            <strong>REFERENCIA</strong></th>
                                        <th scope="col" class="text-center" style="font-size: 15px;color:#16172C">
                                            <strong>SERIAL</strong></th>
                                        <th scope="col" class="text-center"  style="font-size: 15px;color:#16172C"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipo)
                                        <tr style="height: 50px">
                                            <td width="24%" class="text-center"><strong>{{ $equipo->equipo_tipo }}</strong></td>
                                            <td width="24%" class="text-center"><strong>{{ $equipo->equipo_marca }}</strong>
                                            </td>
                                            <td width="24%" class="text-center">
                                                <strong>{{ $equipo->equipo_referencia }}</strong></td>
                                            <td width="24%" class="text-center"><strong>{{ $equipo->equipo_serial }}</strong>
                                            </td>
                                            <td width="4%">

                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de equipo" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente" onclick="guardarCliente()" >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-pc-display-horizontal box-info pull-left"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{!! url('js/jquery.min.js') !!}"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>





    <script>
        $(document).ready(function() {

        $('[data-toggle="tooltip"]').tooltip()



            $('#clients').DataTable({
                responsive: true,
                autoWidth: false,
                lengthMenu: [
                    [10, 20, 50, -1],
                    [10, 20, 50, "Todos"]
                ],
                "language": idioma_espanol

                  //  $('ul.pagination').addClass("pagination-sm");


            });
            $('.dataTables_filter input[type="search"]').
            attr('class','form-control').
            css({'width':'595px','display':'inline-block','position':'relative',});
        });
    </script>
@endsection

@endsection
