<?php

if (!isset($_SESSION)) {
    session_start();
    include_once dirname(dirname(__FILE__)) . "/conexionLocal.php";
    include_once dirname(__FILE__) . "/insertLog.php";
    include_once dirname(__FILE__) . "/getEmpresaRut.php";
    include_once dirname(__FILE__) . "/getTMRut.php";
    $user = $_POST['user'];
    $password = $_POST['password'];

    $rec = mysql_query("SELECT idTM FROM tm WHERE Rut = '$user' AND Password = '" . md5($password) . "'") or die(mysql_error());
    if (mysql_affected_rows() == 1) {
        insertLog('login', dirname(__FILE__) . '?&user=' . $user . '&IP=' . $_SERVER['REMOTE_ADDR']);
        $resultado = getTMRut($user);
        //var_dump($resultado34);
        $_SESSION['idusuario'] = $resultado['idTM'];
        $_SESSION["usuario"] = $resultado['Nombre'];
        $_SESSION["context"] = "tm";
        //header("location:index.php");
        //var_dump($user1);
        echo "Tm";
    }

    $rec2 = mysql_query("SELECT * FROM empresa WHERE Rut = '$user' AND Password = '" . md5($password) . "'") or die(mysql_error());
    if (mysql_affected_rows() == 1) {
        //se inserta log de ingreso
        insertLog('login', dirname(__FILE__) . '?&user=' . $user . '&IP=' . $_SERVER['REMOTE_ADDR']);

        //se buscan los datos del a empresa
        $resultado34 = getEmpresaRut($user);
        if ($resultado34) {
            $_SESSION['idusuario'] = $resultado34['idEmpresa'];
            $_SESSION["usuario"] = $resultado34['Nombre'];
            $_SESSION["context"] = "empresa";
            //header("location:centros/index.php");
            echo "Empresa";
        } else {
            echo 0;
        }
    }
} else {
    echo 0;
}
?>