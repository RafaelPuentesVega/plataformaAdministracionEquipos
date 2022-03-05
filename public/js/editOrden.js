function guardarDiagnostico() {
    btnguardar = document.getElementById('btnDiagnostico');
    btnTerminarOrden = document.getElementById('btnTerminarOrden');
    textArea = document.getElementById('diagnostico');
    let diagnostico = $("#diagnostico").val();
    let idOrden = $("#idOrden").val();
    if (diagnostico.length < 1) {
        toastr["warning"]("<h6>Diligenciar Diagnostico </h6>")
        $("#diagnostico").focus();
        return;
    }
    $.ajax({
        url: 'http://192.168.1.10/plataforma/public/guardarObservacion',
        data: {
            diagnostico: diagnostico,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                textArea.disabled = true;
                btnguardar.style.display = "none";
                $('#fecha_diagnostico').val(json.dataOrden)
                setTimeout(function(){
                    window.location.reload();
                }, 800);

            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function guardarAnotacion() {
    btnguardar = document.getElementById('btnAnotacion');
    let anotacion = $("#anotacion").val();
    let idOrden = $("#idOrden").val();
    if (anotacion.length < 1) {
        toastr["warning"]("<h6>Diligenciar un Comentario </h6>")
        $("#anotacion").focus();
        return;
    }
    $.ajax({
        url: 'http://192.168.1.10/plataforma/public/guardarAnotacion',
        data: {
            anotacion: anotacion,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                window.location.reload();
                }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });
}
function guardarRepuesto() {
    btnguardar = document.getElementById('btnAgregarRepuesto');
    areaTr   = document.getElementById('repuestoIngresado');
    let repuesto = $("#descripcionRepuesto").val();
    let cantidad = $("#cantidadRepuesto").val();
    let idOrden = $("#idOrden").val();
    if (cantidad.length < 1) {
        toastr["warning"]("<h6>Digitar Cantidad</h6>")
        $("#cantidadRepuesto").focus();
        return;
    }
    if (cantidad  < 1) {
        toastr["warning"]("<h6>Ingresar valor correcto</h6>")
        $("#cantidadRepuesto").focus();
        return;
    }
    if (repuesto.length < 1) {
        toastr["warning"]("<h6>Digitar repuesto</h6>")
        $("#descripcionRepuesto").focus();
        return;
    }
    $.ajax({
        url: 'http://192.168.1.10/plataforma/public/guardarRepuesto',
        data: {
            repuesto: repuesto,
            idOrden : idOrden,
            cantidad : cantidad
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "save") {
                toastr["success"]("<h6>Se agrego correctamente</h6>", "GUARDADO")
                btnguardar.disabled = true;
                setTimeout(function(){
                    window.location.reload();
                }, 800);
            }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
    function terminarOrden() {
        btnguardar = document.getElementById('btnAnotacion');
        let reporteTecnico = $("#reporteTecnico").val();
        let idOrden = $("#idOrden").val();
        let valorservicio = $("#valorservicio").val();
        let valorTotalRepuesto = $('#totalValorFinal').val();
        if (reporteTecnico.length < 1) {
            toastr["warning"]("<h6>Diligenciar Reporte Tecnico </h6>")
            $("#reporteTecnico").focus();
            return;
        }
        if (valorservicio.length < 1) {
            toastr["warning"]("<h6>Diligenciar el Valor del servicio </h6>")
            $("#valorservicio").focus();
            return;
        }
        $.ajax({
            url: 'http://192.168.1.10/plataforma/public/termirnarOrden',
            data: {
                reporteTecnico: reporteTecnico,
                idOrden : idOrden,
                valorservicio : valorservicio,
                valorTotalRepuesto : valorTotalRepuesto
            },
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                if (json.mensaje === "save") {

                    btnguardar.disabled = true;
                    setTimeout( toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO"), 20000)
                    window.location.href = 'http://192.168.1.10/plataforma/public/inicio';
                    // window.open('http://192.168.1.10/plataforma/public/OrdenEntrada/'+id);
                    }
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
            },
            complete: function (xhr, status) {
            }
        });

}
$(function () {
    $('[data-toggle="tooltip"]').tooltip()

  })

function sinIva() {

    checkSinIva = document.getElementById('checkTipoEquipo');

    if (checkSinIva.checked) {
        let valorservicio = $("#valorservicio").val();
        totalValor = $('#totalValorFinal').val();

        totalServicio = valorservicio;
        totalServicio = parseInt(totalServicio);
        totalValor = parseInt(totalValor);
        TotalValorFinal = totalServicio + totalValor;


        $('#valorTotal').val('$'+TotalValorFinal);
        document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(0);
       // document.getElementById('valorTotalOrden').innerHTML = new Intl.NumberFormat('es-MX').format(TotalValorFinal);
    }
    else {
    let valorservicio = $("#valorservicio").val();
    totalValor = $('#totalValorFinal').val();

    iva = valorservicio * 0.19 ;
    totalServicio = valorservicio * 1.19;
    totalServicio = parseInt(totalServicio);
    totalValor = parseInt(totalValor);
    TotalValorFinal = totalServicio + totalValor;


    document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(iva);
    //document.getElementById('valorTotalOrden').innerHTML = new Intl.NumberFormat('es-MX').format(TotalValorFinal);

    }

}

document.getElementById('valorservicio').addEventListener('keydown', inputCharacters);

function inputCharacters(event) {


if (event.keyCode == 13) {
let valorservicio = $("#valorservicio").val();
totalValor = $('#totalValorFinal').val();

iva = valorservicio * 0.19 ;
totalServicio = valorservicio * 1.19;
totalServicio = parseInt(totalServicio);
totalValor = parseInt(totalValor);
TotalValorFinal = totalServicio + totalValor;


$('#valorTotal').val('$'+TotalValorFinal);
document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(iva);
}
$( "#valorservicio" ).blur(function() {
    let valorservicio = $("#valorservicio").val();
    totalValor = $('#totalValorFinal').val();

    iva = valorservicio * 0.19 ;
    totalServicio = valorservicio * 1.19;
    totalServicio = parseInt(totalServicio);
    totalValor = parseInt(totalValor);
    TotalValorFinal = totalServicio + totalValor;


    $('#valorTotal').val('$'+ TotalValorFinal);
    document.getElementById('iva').innerHTML = new Intl.NumberFormat('es-MX').format(iva);

});

}

