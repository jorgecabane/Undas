<?php

function isAdmin($a) {
// suponiendo que me va a llegar la id de usuario ( en session )

    $sql = mysql_query("SELECT * FROM tm WHERE idTM = $a") or die(mysql_error());

    while ($row = mysql_fetch_assoc($sql)) {
        if ($row['Admin'] == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
?>