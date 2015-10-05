$(document).ready(function() {
    $('#repeatWeek').click(function() {
        cantidad = $('#calendar .fc-event').size(); //cantidad de eventos a repetir
        if (cantidad !== 0) {// si hay
            if (confirm('Verifique que no está repitiendo eventos!, desea continuar?')) {
                var weeks = prompt('Cuantas semanas?'); //se pregunta cuantas semanas ahead
                weeks = parseInt(weeks); //transforma en num

                if (Math.floor(weeks) === weeks && $.isNumeric(weeks)) { //si el valor es entero
                    $('#calendar').slideUp('slow'); //oculto el calendario
                    $('.progress').slideDown('slow').children('.progress-bar').css('width', '0%'); //barra de progreso
                    $('#horarioContent').text('Espere mientras se repiten los eventos...').slideDown(); //mensaje

                    count = 0;//contador de repeticiones

                    $('#calendar').fullCalendar('clientEvents', function(evento) {//array con los eventos del calendario
                        week = $('#calendar').fullCalendar('getView').intervalStart.format('w');//la semana que se esta viendo
                        if (evento.start.format('w') === week) { //si los eventos son de la semana
                            for (i = 0; i < weeks; i++) {
                                start = evento.start.add(1, 'week').format(); //el horario mas una semana
                                end = evento.end.add(1, 'week').format(); //el horario mas una semana
                                idEco = evento.idEco; //en que eco se esta ejecutando
                                idTM = evento.idTM; //que tm es el evento

                                $.ajax({
                                    url: 'Include/insertarEvento.php',
                                    async: true,
                                    data: {"idTM": idTM, "idEco": idEco, "start": start, "end": end},
                                    method: 'POST',
                                    success: function(output) {
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
                            }//for
                        }//solo para los eventos de la semana en curso
                    });//clientEvents callback
                }//si el valor ingresado es numero
                else {
                    alert('Debe ingresar un valor numerico');
                }
            }//si confirma
        }//si hay eventos
        else {
            alert('No hay eventos que repetir!');
        }
    });//click
});//ready