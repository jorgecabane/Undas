<?php function verificar_login($user, $password) {
    $rec = mysql_query("SELECT * FROM admin WHERE Rut='$user' AND Password = '$password'") or die(mysql_error());

    if (mysql_affected_rows() == 1) {
        return 1;
    } else {
        return 0;
    }
}
?>