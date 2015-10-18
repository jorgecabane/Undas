<?php

/*
 * Este documento contiene un arreglo con los feriados del anio
 * es necesario repetir el mismo evento 2 veces para que se renderee en la
 * vista mensual (debe tener 2fechas) y en la vista semanal(debe contener horario)
 */
$feriados = array(
    array(
        'start' => '2015-10-12T08:00:00',
        'end' => '2015-10-12T21:00:00',
        'description' => 'Dia de la Raza',
        'feriado' => true
    ),
    array(
        'start' => '2015-10-12',
        'end' => '2015-10-13',
        'description' => 'Dia de la Raza',
        'feriado' => true
    ),
    array(
        'start' => '2015-11-01T8:00:00',
        'end' => '2015-11-01T21:00:00',
        'description' => 'Dia de Todos los Santos',
        'feriado' => true
    ),
    array(
        'start' => '2015-11-01',
        'end' => '2015-11-02',
        'description' => 'Dia de Todos los Santos',
        'feriado' => true
    )
);
echo json_encode($feriados);


//[{
//"title" : "Feriado",
//"description": "Dia de la Raza",
//"start": "2015-10-12T08:00:00",
//"end" : "2015-10-12T21:00:00"
//},
//{
//"title" : "Feriado",
//"description": "Dia de la Raza",
//"start": "2015-10-12",
//"end" : "2015-10-13"
//}]
?>