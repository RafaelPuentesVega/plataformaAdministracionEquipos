function entregarOrden() {

    let idOrden = $("#idOrden").val();
    checkSinIva = document.getElementById('checkTipoEquipo');
    let sinIva = '';
    if(checkSinIva.checked){
        sinIva = 'SI';
    }else{
        sinIva = 'NO';
    }

    $.ajax({
        url: 'http://localhost/plataforma/public/entregarOrden',
        data: {
            sinIva: sinIva,
            idOrden : idOrden
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.mensaje === "ok") {
                toastr["success"]("<h6>Se guardo correctamente</h6>", "GUARDADO")
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
