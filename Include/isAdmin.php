<?php

function isAdmin($a) {
	include_once "/../conexionLocal.php";
// suponiendo que me va a llegar la id de usuario ( en session )
	if(is_numeric($a)) {
    $sql = mysql_query("SELECT * FROM tm WHERE idTM = $a") or die(mysql_error());

    while ($row = mysql_fetch_assoc($sql)) {
        if ($row['Admin'] == 1) {
            return 1;
        } else {
            return 0;
        }
    }
	}
	else
	{ 
		if($a == "Soy Super Admin"){
			return 1;
			} else {
				return 0;
			}
		
		}
	}
?>