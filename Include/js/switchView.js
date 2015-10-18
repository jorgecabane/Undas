/*
 * @param {type} view
 * @returns {habilita y deshabilita elementos al cambiar de vista}
 */
var switchView = function(view) {
    switch (view.name) {
        case 'month':
            $('#repeatWeek, #deleteWeek').addClass('disabled');
            break;
        case 'agendaWeek':
            $('#repeatWeek, #deleteWeek').removeClass('disabled');
            break;
        case 'agendaDay':
            $('#repeatWeek, #deleteWeek, #deleteMonth').addClass('disabled');
    }
};
