/*
 * @param {type} event
 * @param {type} element
 * @returns {setea el popover para eventos}
 */
var renderEvent = function(event, element) {
    if (event.start.hasTime()) {
        //se agrega la descripcion al evento
        element.find('.fc-title').append("<br/>" + event.description);
        //al hacer click se puede ver el detalle
        element.popover({
            title: 'Detalles del Evento (' + event.id +')',
            content: '<div><b>Eco: </b>' + event.title + '<br>\n\
                             <b>TM: </b>' + event.description + '<br>\n\
                             <b>Fecha: </b>' + event.start.format('LL') + '<br>\n\
                             <b>Inicio: </b>' + event.start.format("HH:mm") + '<br>\n\
                             <b>Termino: </b>' + event.end.format("HH:mm") + '\n\
                             </div>',
            html: true,
            animation: true,
            placement: 'auto'
        });//popover
    } else {
        if (!event.feriado) {
            return false;// si el evento no tiene hora que no se incluya en el calendar
        }
    }
};