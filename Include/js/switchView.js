/*
 * @param {type} view
 * @returns {habilita y deshabilita elementos al cambiar de vista}
 */
var switchView = function(view) {
    switch (view.name) {
        case 'month':
            $('#repeatWeek, #deleteWeek').addClass('disabled');
            $('#deleteMonth').removeClass('disabled');
            break;
        case 'agendaWeek':
            $('#repeatWeek, #deleteWeek').removeClass('disabled');
            $('#deleteMonth').addClass('disabled');
            break;
        case 'agendaDay':
            $('#repeatWeek, #deleteMonth, #deleteWeek').addClass('disabled');
    }
    getCupos();
};
