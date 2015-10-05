/*
 * @param {type} view
 * @returns {habilita y deshabilita elementos al cambiar de vista}
 */
var switchView = function(view) {
    switch (view.name) {
        case 'month':
            $('#repeatWeek, #deleteWeek').addClass('disabled');
            $('#repeatMonth, #deleteMonth').removeClass('disabled');
            break;
        case 'agendaWeek':
            $('#repeatWeek, #deleteWeek').removeClass('disabled');
            $('#repeatMonth, #deleteMonth').addClass('disabled');
            break;
        case 'agendaDay':
            $('#repeatWeek, #repeatMonth, #deleteWeek, #deleteMonth').addClass('disabled');
    }
};
