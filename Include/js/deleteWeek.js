/*
 * Acccion del boton eliminar semana completa
 */
$(document).ready(function() {
    $('#deleteWeek').click(function() {
        var confirmar = confirm('Está seguro que quiere eliminar todos los eventos de esta semana?');
        if (confirmar) {
            cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a borrar
            contador = 0; //contador para saber cuando cerrar el progressbar
            $('.progress').slideDown('slow');//progress bar
            $('#calendar').fullCalendar('clientEvents', function(evento) {//each evento en el cliente
                week = $('#calendar').fullCalendar('getView').intervalStart.format('w');//la semana que se esta viendo
                if (evento.start.format('w') === week) { //si los eventos son de la semana
                    $('#calendar').fullCalendar('removeEvents', evento._id);
                    $.ajax({
                        url: 'Include/eliminarEvento.php',
                        async: true,
                        data: {"idEvento": evento.id},
                        method: 'POST',
                        success: function(output) {
                            if (output === '1') {
                                contador++;
                                if (contador === cantidad) {
                                    $('.progress').slideUp();
                                    getCupos();
                                }

                            }//si se borro de la base de datos
                        }//success
                    });//ajax */
                }//si los eventos son del a semana
            });
        } else {

        }
    });//click #deleteWeek
});//ready


