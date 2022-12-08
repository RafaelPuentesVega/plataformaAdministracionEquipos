var id = '';
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()

    $('#funcionarios').DataTable({
        responsive: true,
        autoWidth: false,
        lengthMenu: [
            [10, 50, 100, -1],
            [10, 50, 100,  "Todos"]
        ],
         "language": idioma_espanol

    });
    $('.dataTables_filter input[type="search"]').
    attr('class','form-control').
    css({'width':'350px','display':'inline-block','position':'relative',});
});


function consultarUsuario(idUser){
    id = idUser;
    showpreloader();
    $.ajax({
        url: 'consultarUsuario',
        data: {
            id: id
        },
        type: 'POST',
        dataType: 'json',
        success: function (json) {
                //Datos Equipo
                if(json.mensaje == 'ok'){
                    $("#mdid").val(json.data[0].id);
                    $("#mdname").val(json.data[0].name);
                    $("#mdemail").val(json.data[0].email);
                    $("#mdrol").val(json.data[0].rol);
                    $("#mdcelular").val(json.data[0].telefono);
                    if(json.data[0].state == 1){
                    $("#mdstate").val('ACTIVO');
                    }else{
                        $("#mdstate").val('INACTIVO');
                    }
                    //ABRE MODAL
                    $('#editarUsuario').modal('show');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Ocurrio un error al consultar al servidor',
                        footer: 'Recargue la pagina'
                      })
                }

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema en el servidor - Recargue la Pagina');
        },
        complete: function (xhr, status) {
            hidepreloader()
        }
    });
}
//Guardar datos

$(document).on("click",  "#update-user", function(){
    showpreloader();
});
$(document).on("click",  "#btn-registerUser", function(){
    showpreloader();
});
