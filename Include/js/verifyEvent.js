var verifyEvent = function(event) {
    //verificacion en la base de datos (si hay algun evento a la misma hora en el mismo lugar)
    // alert(event.idEco+' '+event.start.format());
    $.ajax({
        url: 'Include/verificaEco.php',
        async: true,
        data: {"idEco": event.idEco, "start": event.start.format()},
        method: 'POST',
        success: function(output) {
            if (output === 'false') {
                $("#myModal.modal-body").html('<div class="alert alert-danger">La Eco se encuentra asignada a otra persona, corrija el error.</div>');
                $("#myModal").modal('show');
            }
        }// success
    });//ajax

    $.ajax({
        url: 'Include/verificaTM.php',
        async: true,
        data: {"idTM": event.idTM, "start": event.start.format()},
        method: 'POST',
        success: function(output) {
            if (output) {

            }
        }// success
    });//ajax

    //se hacen las verificaciones del evento
    //se actualiza en la bbdd el elemento o se guarda si no existe
};