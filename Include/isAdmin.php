<?php

function isAdmin($a,$context) {
	require_once dirname(dirname(__FILE__)). "/conexionLocal.php";
// suponiendo que me va a llegar la id de usuario ( en session )
if($context == "tm"){
    $sql = mysql_query("SELECT * FROM tm WHERE idTM = $a") or die(mysql_error());

    while ($row = mysql_fetch_assoc($sql)) {
        if ($row['Admin'] == 1) {
            $admin = 1;
        } else {
            $admin = 0;
        }
    }
    
}
if($context == "super"){
    $sqladmin = mysql_query("SELECT count(*) AS recuento FROM admin WHERE id = $a") or die(mysql_error());
   	$result = mysql_fetch_assoc($sqladmin);
   	if($result['recuento']==1){
   		$admin = 1;
   	}

	}
	return $admin;
}
?>