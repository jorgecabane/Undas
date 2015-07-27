/*filtro de TMs para agregar al calendario
Al input hay que agregarle el id="search"
y cada una de las opciones a esconder debe tener la clase "fc-event"*/
$('#search').keyup(function(){
    $('.fc-event').hide();
    var txt = $('#search').val();
    $('.fc-event').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).show();
       }
    });
});