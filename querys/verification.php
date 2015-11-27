<?php 
include_once dirname(dirname(__FILE__)) . "/conexionLocal.php";
function verificar_login($user, $password) {
	
    $rec = mysql_query("SELECT idTM FROM tm WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());

      if (mysql_num_rows($rec) ==1) {
        return "TM";
    } 
    
    	$rec2 = mysql_query("SELECT * FROM empresa WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());
    	if (mysql_num_rows($rec2) ==1) {
    		return "Empresa";
    	}
    	
    	if($rec == NULL && $rec2 == NULL){
    		return 0;
    	}

}