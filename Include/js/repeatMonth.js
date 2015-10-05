$(document).ready(function() {
    $('#repeatMonth').click(function() {
        cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a repetir
        if (cantidad !== 0) {
            $('#calendar').slideUp('slow'); //oculto el calendario
            $('.progress').slideDown('slow').children('.progress-bar').css('width', '0%'); //barra de progreso
            $('#horarioContent').text('Espere mientras se repiten los eventos...').slideDown('slow'); //mensaje

            count = 0;//contador de repeticiones

            $('#calendar').fullCalendar('clientEvents', function(evento) {//array con los eventos del calendario
                month = $('#calendar').fullCalendar('getView').intervalStart.format('M');

                if (evento.start.format('M') === month) {
                    start = evento.start.add(1, 'M').format(); //el horario mas mes
                    end = evento.end.add(1, 'M').format(); //el horario mas un mes
                    idEco = evento.idEco; //en que eco se esta ejecutando
                    idTM = evento.idTM; //que tm es el evento
                    console.log('idEco:' + idEco + ' idTM:' + idTM + ' start:' + start + ' end:' + end);
                    $.ajax({
                        url: 'Include/insertarEvento.php',
                        async: false,
                        data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                        method: 'POST',
                        success: function(output) {
                            console.log('idEvento:' + output);
                            if (output !== '0') {
                                count++; //contador cuando un evento se inserta
                                avance = (count / cantidad) * 100; //se calcula el % de avance
                                if (avance === 100) { //si se termino de insertar todos (100%)
                                    $('.progress-bar').css('width', avance + '%'); //se aumenta la barra
                                    $('.progress').slideUp('slow'); //se esconde
                                    $('#horarioContent').slideUp('slow'); //se esconde
                                    $('#calendar').slideDown('slow'); //se muestra el calendario

                                } else {
                                    $('.progress-bar').css('width', avance + '%'); // cambia el % de avance
                                }
                            }//if
                        }//success
                    });//ajax */
                }//si corresponde al mismo mes
            });//"foreach" eventos del calendario

        }//if
    });//click
});//ready


