<div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby=".modal-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Debe ingresar una duración!</h4>
            </div>
            <div class="modal-body">
                <center>
                    <div class="row">
                        <div id="eventTitle" class="col-sm-10 col-sm-offset-1 well well-titles">
                            <div class="alert alert-danger">No se ha seleccionado TM</div>
                        </div>
                        <div id="eventDate" class="col-sm-10 col-sm-offset-1 well well-titles">
                            <div class="alert alert-danger">No se ha seleccionado Fecha</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h4>De
                                <span id="rangoStart">8:30</span> a
                                <span id="rangoEnd">20:00</span>
                                Horas
                            </h4>
                            <div id="slider"></div>
                            <br>
                        </div>
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <div id="evento"></div>
                <button type="button" class="btn btn-info" id="asignTime">Aceptar</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    $(document).ready(function() {
        $("#slider").slider({
            range: true,
            min: 480,
            max: 1260,
            step: 15,
            values: [510, 1200],
            slide: function(e, ui) {
                var hours1 = Math.floor(ui.values[0] / 60);
                var minutes1 = ui.values[0] - (hours1 * 60);

                var hours2 = Math.floor(ui.values[1] / 60);
                var minutes2 = ui.values[1] - (hours2 * 60);

                if (hours1.toString().length === 1) {
                    hours1 = '0' + hours1;
                }
                if (minutes1.toString().length === 1) {
                    minutes1 = '0' + minutes1;
                }
                if (hours2.toString().length === 1) {
                    hours2 = '0' + hours2;
                }
                if (minutes2.toString().length === 1) {
                    minutes2 = '0' + minutes2;
                }

                $('#rangoStart').html(hours1 + ':' + minutes1);
                $('#rangoEnd').html(hours2 + ':' + minutes2);
            }
        });
    });
</script><!-- definicion del slider -->
<script>
    $(document).ready(function() {
        $('#asignTime').click(function() {
            /*
             * Funcion que se ejecuta la hacer click al boton aceptar del selector
             * de hora del modalEvento
             * recopila la informacion del evento que se arrojo y que no tenia hora
             * para generar un nuevo evento y renderearlo, guardarlo en la DB
             * y hacer las verificaciones pertinentes
             */
            var start = moment($('#eventDate').text() + ' ' + $('#rangoStart').text());
            var end = moment($('#eventDate').text() + ' ' + $('#rangoEnd').text());
            var idTM = $('#evento').attr('idtm');
            var idEco = $('#evento').attr('idEco');
            var color = $('#evento').attr('color');
            var title = $('#evento').attr('title');
            var description = $('#evento').attr('description');
            // se crea el evento con los elementos recopilados
            // el paso anteriro se puede reemplazar por la composicion del JSON inmediatamente
            var event = {
                "id": 0,
                "title": title,
                "idTM": idTM,
                "idEco": idEco,
                "color": color,
                "description": description,
                "fromBD": 0,
                "saved": 0,
                "start": start,
                "end": end
            };
            //se renderea el evento en la bbdd
            $('#calendar').fullCalendar('renderEvent', event);
            saveBD(event);
            $('#modalEvento').modal('hide');
            //console.log(event);
        });//click de aceptar el modal
    });
</script>