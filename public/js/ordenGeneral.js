function reporteTecnicoEdit() {
    reporteTecnicoDiv = document.getElementById("reporteTecnicoDiv");
    reporteTecnicoInput = document.getElementById("editReporte");
    btnEdit = document.getElementById("btneditarReporte");
    btnSave = document.getElementById("btnsaveReporte");

    reporteTecnicoDiv.style.display = 'none';
    reporteTecnicoInput.style.display = 'block';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'block';

}

function reporteTecnicoSave() {
    btnSave = document.getElementById('btnsaveReporte');
    let editReporte = $("#editReporte").val();
    let idOrden = $("#idOrden").val();
    if (editReporte.length < 1) {
        toastr["warning"]("<h6>Diligenciar Reporte tecnico </h6>")
        $("#editReporte").focus();
        return;
    }
    $.ajax({
        url: '../editarReporteTecnico',
        data: {
            editReporte: editReporte,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "update") {
                toastr["success"]("<h6>Se actualizo correctamente</h6>", "ACTUALIZADO")
              //  btnSave.disabled = true;
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
function valorServicioEdit() {
    ValorServicioDiv = document.getElementById("labelValorServicio");
    ValorServicioInput = document.getElementById("valorservicio");
    btnEdit = document.getElementById("btneditvalorServicio");
    btnSave = document.getElementById("btnsavevalorServicio");
    btnTerminarOrden = document.getElementById("btnTerminarOrden");
    checkSinIva = document.getElementById("checkSinIva");


    ValorServicioDiv.style.display = 'none';
    ValorServicioInput.style.display = 'block';
    btnEdit.style.display = 'none';
    btnSave.style.display = 'block';
    btnTerminarOrden.style.display = 'none';
    checkSinIva.disabled = false;
}
