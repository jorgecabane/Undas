<?php
if (!isset($_SESSION)) {
    session_start();
    include_once dirname(dirname(__FILE__)) . "/conexionLocal.php";
    include_once dirname(__FILE__) . "/insertLog.php";
    include_once dirname(__FILE__) . "/admin.php";
    $user = $_POST['user'];
    $password = $_POST['password'];

    $rec = mysql_query("SELECT * FROM admin WHERE Rut='$user' AND Password = '". md5($password) ."'") or die(mysql_error());
    if (mysql_affected_rows() == 1) {
        insertLog('login', dirname(__FILE__) . '?&user=' . $user . '&IP=' . $_SERVER['REMOTE_ADDR']);
        $resultado = admin($user);
        //var_dump($resultado34);
        $_SESSION['idusuario'] = $resultado['id'];
        $_SESSION["usuario"] = $resultado['Nombre'];
        $_SESSION['super'] = 1;
        $_SESSION['context'] = "super";
        //header("location:index.php");
        //var_dump($user1);
        echo "1";
    }

 else {
    echo "0";
}
}
else{
	echo "0";
	}
?>