/*
 * @param {type} event
 * @param {type} element
 * @returns {guarda el evento en la bbdd}
 */
var saveBD = function(event) {
    if (event.start.hasTime()) {
        start = event.start.format();
        end = event.end.format();
    } else { //si el evento ha sido creado desde la vista mensual o no tiene horario por error
        var inicio = prompt('Debe ingresar un inicio para el evento (ej. 8.00)');
        var fin = prompt('Debe ingresar un termino al evento (ej. 11.30)');
        //console.log();
        start = event.start.format() + 'T' + inicio.replace('.', ':') + ':00';
        end = event.start.format() + 'T' + fin.replace('.', ':') + ':00';
    }
    idTM = event.idTM;
    idEco = event.idEco;

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