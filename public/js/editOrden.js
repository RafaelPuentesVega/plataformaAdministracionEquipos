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
    showpreloader();
    $.ajax({
        url: '../guardarObservacion',
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
                    hidepreloader()

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
    showpreloader();

    $.ajax({
        url: '../guardarAnotacion',
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

                setTimeout(function(){
                    hidepreloader()
                    window.location.reload();
                }, 1000);
                }
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
            hidepreloader();
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
    showpreloader()

    $.ajax({
        url: '../guardarRepuesto',
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
                    hidepreloader()
                    window.location.reload();
                }, 1000);
            }
        },
        error: function (xhr, status) {
            hidepreloader()
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
        let valorTotalRepuesto = $('#totalValorRepuestos').val();


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
        if (document.getElementById('checkSinIva').checked) {
            iva = 'NO';
        }else{
            iva = 'SI' ;
        }
        valorservicio = parseInt(valorservicio.replace(/,/g, ""));
        hidepreloader()
        $.ajax({
            url: '../termirnarOrden',
            data: {
                reporteTecnico: reporteTecnico,
                idOrden : idOrden,
                valorservicio : valorservicio,
                valorTotalRepuesto : valorTotalRepuesto,
                iva : iva
            },
            type: 'POST',
            dataType: 'json',
            success: function (json) {
                if (json.mensaje === "save") {

                    btnguardar.disabled = true;
                    setTimeout( toastr["success"]("<h6>Se registro correctamente</h6>", "GUARDADO"), 20000)
                    window.location.href = '../inicio';
                    // window.open('http://localhost/plataforma/public/OrdenEntrada/'+id);
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

function sinIiva() {

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

function calcularValores(){

let valorservicio = $("#valorservicio").val();
totalValorRepuestos = $('#totalValorRepuestos').val();
valorservicio = parseInt(valorservicio.replace(/,/g, ""));
if (document.getElementById('checkSinIva').checked) {
    iva = 0 ;
    totalValorRepuestos = parseInt(totalValorRepuestos);
    TotalValorFinal = valorservicio + totalValorRepuestos;
    //$('#valorTotalOrde').val('$'+TotalValorFinal);
    document.getElementById('valorTotalOrde').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(TotalValorFinal));
    document.getElementById('iva').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(iva));
   // alert(totalServicio);
}else{
    iva = valorservicio * 0.19 ;
    totalServicio = valorservicio * 1.19;
    var totalServicio = parseInt(totalServicio);
    totalValorRepuestos = parseInt(totalValorRepuestos);
    TotalValorFinal = totalServicio + totalValorRepuestos;
    //$('#valorTotalOrde').val('$'+TotalValorFinal);
    document.getElementById('valorTotalOrde').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(TotalValorFinal));
    document.getElementById('iva').innerHTML = '$ ' + (new Intl.NumberFormat('es-MX').format(iva));
}
}
function changePrice() {
    let valorservicio = $("#valorservicio").val();
    totalValorRepuestos = $('#totalValorRepuestos').val();

    let idOrden = $("#idOrden").val();
    if (document.getElementById('checkSinIva').checked) {
        iva = 'NO';
    }else{
        iva = 'SI' ;
    }
    if(valorservicio.length < 1){
        toastr["warning"]("<h6>Diligenciar el Valor del servicio</h6>")
        $("#valorservicio").focus();
        return;
    }
    valorservicio = parseInt(valorservicio.replace(/,/g, ""));
    showpreloader()
    $.ajax({
        url: '../changePrice',
        data: {
            valorservicio: valorservicio,
            iva : iva,
            totalValorRepuestos : totalValorRepuestos,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {
                toastr["success"]("<h6>Se actualizo correctamente</h6>");
                hidepreloader();
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

document.getElementById('valorservicio').addEventListener('keydown', inputCharacters);

function inputCharacters(event) {
if (event.keyCode == 13 ){
    calcularValores();
}
$( "#valorservicio" ).blur(function() {
    calcularValores();

});
}

function calcularValoresTecnico(){

 }
// function inputCharactersTecnico(event) {
//     if (event.keyCode == 13 ){
//         calcularValoresTecnico();
//     }
//     $( "#valorservicio" ).blur(function() {
//         calcularValoresTecnico();

//     });

// }
$('input.number').keyup(function(event) {

    // skip for arrow keys
    if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
    }

    $(this).val(function(index, value) {
    return value
        .replace(/\D/g, "")
        .replace(/([0-9])([0-9]{0})$/, '$1$2')
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",")    ;
    });
    calcularValores();
    });

