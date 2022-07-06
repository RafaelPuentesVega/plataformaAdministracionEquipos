@extends('plantilla')
@section('content')
@section('css')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.11.3/datatables.min.css') !!}"/> --}}
{{-- <link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/> --}}
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') !!}"/> --}}
{{-- <link rel="stylesheet" type="text/css" href="{!! url('fontawesome/css/fontawesome.min.css') !!}"/> --}}

{{-- <link href="{!! url('iniciocss/bootstrap.css') !!}" rel="stylesheet" /> --}}
<link href="{!! url('assets/js/toastr.min.css') !!}" rel="stylesheet" />
{{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}" /> --}}
<link href="{!! url('bootstrap/bootstrap.css') !!}" rel="stylesheet"/>

<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

@endsection

<div class="wrapper">

    <div class="main-panel">

        <div class="content">
            <div class="card "  >
                <div class="header" style="background-color: #06419f">
                    <h3 class="title text-center" style="color: #ffffff ; padding-bottom :8px;"><strong>CLIENTES</strong></h3>
                </div>
            </div>


            <div class="container-fluid">

                <div class="row ">
                    <div class="col-md-12">


                            <div class="table-responsive-xl">
                                <table id="clients" class="table table-striped table-hover"
                                    style="webkit-font-smoothing: antialiased;
                                    font-family: Roboto,Helvetica Neue,Arial,sans-serif;">
                                    <thead class="thead-light">
                                        <tr  >
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CLIENTE</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>Documento</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>NOMBRES</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CORREO</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>CELULAR</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"><strong>TELEFONO</strong></th>
                                                <th scope="col" class="text-center" style="color:#16172C"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clientes as $cliente)



                                            <tr style="font-size: 12px;height: 50px">


                                            <td class="text-center"><strong>{{ $cliente->cliente_tipo}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_documento}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_nombres}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_correo}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_celular}}</strong></td>
                                            <td class="text-center"><strong>{{ $cliente->cliente_telefono}}</strong></td>
                                            <td>
                                                <a href="{{ url('clienteEdit', encrypt($cliente->cliente_id) ) }}">
                                                <button style="border: none; outline:none; text-decoration: none; margin: 0%" type="button" title="Datos de cliente" data-toggle="tooltip" data-placement="left"  class="btn btn-info btn-fill  pull-right " id="btnGuardarCliente"  >
                                                    <i style="color: #ffffff; font-size: 20px; margin: -5px" class="bi bi-person-lines-fill box-info pull-left"></i>
                                                </button>
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                </div>
            </div>
         </div>
    </div>
</div>


@section('js')

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="{!! url('js/jquery.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
    <script src="{!! url('js/cliente.js') !!}"></script>
    <script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

      })
    </script>





    <script>
        $(document).ready(function() {
             $('#clients').DataTable({
                 responsive: true,
                 autoWidth: false,
                 lengthMenu:[[10,50,100,5,-1],[10,50,100,5,"Todos"]],
                 "language": idioma_espanol

             });
             $('.dataTables_filter input[type="search"]').
            attr('class','form-control').
            css({'width':'340px','display':'inline-block','position':'left'});
            $('.dataTables_length select').
            attr('class','form-control').
            css({'width':'54px','display':'inline-block','position':'relative'});
        } );

        var idioma_espanol = {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "%d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        },
                        "rows": {
                            "1": "1 fila seleccionada",
                            "_": "%d filas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "AM",
                            "PM"
                        ],
                        "months": {
                            "0": "Enero",
                            "1": "Febrero",
                            "10": "Noviembre",
                            "11": "Diciembre",
                            "2": "Marzo",
                            "3": "Abril",
                            "4": "Mayo",
                            "5": "Junio",
                            "6": "Julio",
                            "7": "Agosto",
                            "8": "Septiembre",
                            "9": "Octubre"
                        },
                        "weekdays": [
                            "Dom",
                            "Lun",
                            "Mar",
                            "Mie",
                            "Jue",
                            "Vie",
                            "Sab"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros"
                }

    </script>

@endsection
@endsection



