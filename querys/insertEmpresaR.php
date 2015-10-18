<?php
include_once "../conexionLocal.php";
$nombre = trim($_POST['nombre']);
$rut = trim($_POST['rut']);
$giro = trim($_POST['giro']);
$direccion = trim($_POST['direccion']);
$comuna = trim($_POST['comuna']);
$ciudad = trim($_POST['ciudad']);
$razon = trim($_POST['razon']);


$query = "insert into empresa values (null,'$nombre','$rut','$giro','$direccion','$comuna','$ciudad','$razon')";
$queryAccesoEmpresa = mysql_query("insert into tm values (null,'$nombre',NULL,'$rut',NULL,NULL,'1234',0,NULL,NULL,0,NULL,1)");
$resultado = mysql_query($query);
if ($resultado) {
    //success
    echo"Agregado con exito, redireccionando";
    ?><meta http-equiv="Refresh" content="1;url=../agregarEmpresaR.php">;
    <?php
} else {
    //failure
    echo " Error el rut o giro ya existe intente otro, redireccionando";
    ?>

    <meta http-equiv="Refresh" content="1;url=../agregarEmpresaR.php">;
    <?php
}
?>
