<?php function verificar_login($user, $password) {
    $rec = mysql_query("SELECT * FROM tm WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());

    if (mysql_affected_rows() == 1) {
        return "TM";
    } else {
    	$rec = mysql_query("SELECT * FROM tm WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());
    	if (mysql_affected_rows() == 1) {
    		return "Empresa";
    	} else {
        return 0;
    }
}
}
?>