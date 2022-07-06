numeroOrden = '';
function facturaNumero(id) {
    showModal();
    $.ajax({
        url: '../facturaNumero',
        data: {
            id: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {
                //Datos Equipo
                $("#equipoRepuesto").html(json.dataFactura[0].equipo_tipo);
                $("#equipoMarca").html(json.dataFactura[0].equipo_marca);
                $("#equipoReferencia").html(json.dataFactura[0].equipo_referencia);
                $("#equipoSerial").html(json.dataFactura[0].equipo_serial);
                //Datos Cliente
                $("#clienteTipo").html(json.dataFactura[0].cliente_tipo);
                $("#clienteDocumento").html(json.dataFactura[0].cliente_documento);
                $("#clienteNombre").html(json.dataFactura[0].cliente_nombres);
                $("#valorTotalOrden").val(json.dataFactura[0].valor_total_orden);
                numeroOrden = json.dataFactura[0].id_orden;

            //REPUESTOS FOR
            control = json.dataRepuestoFactura.length;
            var output = "";
            if (control != 0) {
                output += '<table  id="repuesto" class="table table-striped" >'
                output += '<thead style="background:#aed6f18a" class="thead">'
                output += '<tr >'
                output += '<th scope="col" class="text-center" style="color:#16172C"><strong>CANTIDAD</strong></th>'
                output += '<th scope="col" class="text-center" style="color:#16172C"><strong>REPUESTO</strong></th>'
                output += '<th scope="col" class="text-center" style="color:#16172C"><strong>PRECIO TOTAL</strong></th>'
                output += '</tr>'
                output += '</thead>'
                output += '<tbody>'
                for (let i = 0; i < control; i++) {
                    cantidad = json.dataRepuestoFactura[i].cantidad_repuesto;
                    repuesto = json.dataRepuestoFactura[i].nombre_repuesto ;
                    precio = json.dataRepuestoFactura[i].valor_total_repuesto;
                    output += '<tr>'
                    output += '<th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">' + cantidad + '</td>'
                    output += '<th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid">' + repuesto + '</td>'
                    output += '<th id="equipoRepuesto" width="25%" style="font-size: 12px ;font-weight:normal;  text-align: left; border: rgba(0, 0, 0, 0.089) 1.5px solid"> $ ' + precio + '</td>'
                    output += '</tr>'
                }
                output += '</tbody>'
                output += '<table>'
                $("#repuestoFactura").html(output);
            } else {
                $("#repuestoFactura").html(output);
            }

                showModal();
            }
        },
        error: function (xhr, status) {

            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}

function guardarNumeroFactura() {

    numeroFactura = $('#numeroFactura').val();

    if(numeroFactura.length  < 1) {
        toastr["warning"]("<h6>Digitar numero de factura</h6>")
        $("#numeroFactura").focus();
        return;
    }

    $.ajax({
        url: '../guardarNumeroFactura',
        data: {
            numeroOrden:numeroOrden,
            numeroFactura:numeroFactura
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {

                toastr["success"]("<h6>Se guardo correctamente</h6>")
                CloseModal()
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            }

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
        }
    });

}
function showModal() {
    $('#md-facturaNumero').modal('show'); // abrir
}
function CloseModal() {
    $('#md-facturaNumero').modal('hide'); // abrir

}
