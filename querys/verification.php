<?php 
include_once "../conexionLocal.php";
$user='123';
$password='admin123';
    $rec = mysql_query("SELECT * FROM tm WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());

    if ($rec) {
        return "TM";
        var_dump($rec);
    	$rec = mysql_query("SELECT * FROM empresa WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());
    	if ($rec) {
    		return "Empresa";
    		var_dump($rec);
    	} else {
    		echo "cago";
        return 0;
    }

}

?>