/*
 * @param {type} event
 * @param {type} element
 * @returns {guarda el evento en la bbdd}
 */
var saveBD = function(event) {
    start = event.start.format();
    end = event.end.format();
    idTM = event.idTM;
    idEco = event.idEco;

    verifyEvent(event);
    if (event.fromBD === 0) {
        if (event.saved === 0) {
            //si el evento no se encuentra guardado en la bbdd
            //armado de JSON para envio de datos
            $.ajax({
                url: 'Include/insertarEvento.php',
                async: true,
                data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                method: 'POST',
                beforeSend: function() {
                    $('.progress').slideDown();
                },
                success: function(output) {
                    if (output !== '0') {
                        //console.log(event.saved);
                        event.saved = 1;
                        event.id = output;
                        if ($('#calendar').fullCalendar('getView').name === 'month') {
                            //en la vista mensual se refrescan
                            $('#calendar').fullCalendar('refetchEvents');
                        }
                        else {
                            $('#calendar').fullCalendar('updateEvent', event);
                        }

                        $('.progress').slideUp();
                        //console.log(output);

                    }
                }//success
            });//ajax
        }//si ya se guardo previamente
    }// si el evento viene de la bbdd
};//function saveBD