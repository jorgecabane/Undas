var eventReceive = function(event) {
    if(event.start.hasTime()){
        saveBD(event);
    }
    else{
        $('#modalEvento').modal('show');
    }
};


