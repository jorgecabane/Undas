/*
 * Acccion del boton eliminar mes completo
 */
$(document).ready(function() {
    $('#deleteMonth').click(function() {
        var confirmar = confirm('Está seguro que quiere eliminar todos los eventos de este mes?');
        if (confirmar) {
            $('#calendar').fullCalendar('clientEvents', function(evento) {//each evento en el cliente
                month = $('#calendar').fullCalendar('getView').intervalStart.format('M');//la semana que se esta viendo
                if (evento.start.format('M') === month && !evento.feriado) { //si los eventos son del mismo mes
                    $('#calendar').fullCalendar('removeEvents', evento._id);
                    $.ajax({
                        url: 'Include/eliminarEvento.php',
                        async: true,
                        data: {"idEvento": evento.id},
                        method: 'POST',
                        success: function(output) {
                            if (output !== '1') {
                                alert('Hubo un error al eliminar algun evento, se recargará la página...');
                                location.reload();
                                getCupos();
                            }//si se borro de la base de datos
                        }//success
                    });//ajax */
                }//si los eventos son del a semana
            });
        } else {

        }
    });//click #deleteWeek
});//ready