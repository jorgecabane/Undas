<?php

require_once dirname(__FILE__) . "/../dompdf/dompdf_config.inc.php";

$idCentro = $_POST['idCentro'];
$centro = $_POST['centro'];

function doPDF($path='',$content='',$body=false,$style='',$mode=false,$paper_1='a4',$paper_2='portrait')
{
    if( $body!=true and $body!=false ) $body=false;
    if( $mode!=true and $mode!=false ) $mode=false;

    if( $body == true )
    {
        $content='
        <!doctype html>
        <html>
        <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <link rel="stylesheet" href="'.$style.'" type="text/css" />
        </head>
        <body>'
            .$content.
        '</body>
        </html>';
    }

    if( $content!='' )
    {
        //Añadimos la extensión del archivo. Si está vacío el nombre lo creamos
        $path!='' ? $path .='.pdf' : $path = crearNombre(10);

        //Las opciones del papel del PDF. Si no existen se asignan las siguientes:[*]
        if( $paper_1=='' ) $paper_1='a4';
        if( $paper_2=='' ) $paper_2='portrait';

        $dompdf =  new DOMPDF();
        $dompdf -> set_paper($paper_1,$paper_2);
        $dompdf -> load_html(utf8_encode($content));
        //ini_set("memory_limit","32M"); //opcional
        $dompdf -> render();

        //Creamos el pdf
        if($mode==false)
            $dompdf->stream($path);

        //Lo guardamos en un directorio y lo mostramos
        if($mode==true)
            if( file_put_contents($path, $dompdf->output()) ) header('Location: '.$path);
    }
}

if (isset($_POST['pdf'])) {
    $html = utf8_decode($_POST['pdf']);

    //echo "<script>window.location = '../calendario.php?idCentro=$idCentro&centro=$centro';</script>";

    doPDF($centro,$html,true,'../../css/bootstrap.css');


} else {
    echo '0';
}
?>
