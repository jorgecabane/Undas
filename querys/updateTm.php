<?php
include_once "../conexionLocal.php";
$id=$_REQUEST['id'];
$nombre=$_REQUEST['Nombre'];
$apellido=$_REQUEST['Apellido'];
$rut=$_REQUEST['Rut'];
$mail=$_REQUEST['Mail'];
$celular=$_REQUEST['Celular'];

$query="UPDATE TM SET Nombre=$nombre, Apellido=$apellido, Rut=$rut, Mail=$mail, Celular=$celular WHERE idTM=$id";
$resultado=mysql_query($query);
if($resultado) {
	//success
	echo"Actualizado con exito, redireccionando";
	?><meta http-equiv="Refresh" content="4;url=../Perfil.php">
        <?php
} else { 
    //failure
    echo " Se produjo un error en la actualizacion, redireccionando";
    ?>
        
    <meta http-equiv="Refresh" content="4;'url=editarGeneral.php?id=<?php echo $id; ?>">
    <?php
}   

