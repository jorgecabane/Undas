<?php function verificar_login($user, $password) {
    $rec = mysql_query("SELECT * FROM empresa WHERE Rut='$user' AND Password = '". md5($password) ."'") or die(mysql_error());

    if (mysql_affected_rows() == 1) {
        return 1;
    } else {
        return 0;
    }
}
?>