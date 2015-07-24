<?php
include_once "../conexionLocal.php";
$id=$_POST['id'];
$nombre=$_POST['Nombre'];
$apellido=$_POST['Apellido'];
$rut=$_POST['Rut'];
$mail=$_POST['Mail'];
$celular=$_POST['Celular'];

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

