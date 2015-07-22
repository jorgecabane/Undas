<?php

session_start();
include_once "conexionLocal.php";
if(isset($_SESSION["fallaste"])){
	echo "<h1>";
	echo $_SESSION["fallaste"];
	echo "</h1>";
}
?>
<head>
   <!-- css -->
 <meta http-equiv="Content-Type" content="text/html"; charset=utf-8"/> 
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<?php
function verificar_login($user, $password, &$result) {
    $rec = mysql_query("SELECT * FROM TM WHERE Nombre = '$user' and Password = '$password'") or die(mysql_error());

    $count = 0;
    while ($row = mysql_fetch_object($rec)) {
        $count++;
        $result = $row;
    }
    if ($count == 1) {
        return 1;
    } else {
        return 0;
    }
}

 //$tipo = mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'") or die(mysql_error());
 //$resultadotipo=  mysql_fetch_assoc($tipo);
if (isset($_POST['login'])) {
    if (verificar_login($_POST['user'], $_POST['password'], $result) == 1) {
        $user1 = $_POST['user'];
        //$query = mysql_query("SELECT usuario FROM usuarios WHERE usuario = '$user'") or die(mysql_error());
//$row2 = mysql_fetch_assoc($query);
        $_SESSION["usuario"]=$user1;
        
        $queryoli = "Select idTM from TM where Nombre='$user1'";
        //echo $queryoli;
        $resultado33 = mysql_query($queryoli) or die(mysql_error());

        if ($resultado33) {
            $resultado34 = mysql_fetch_assoc($resultado33);
            if ($resultado34) {
                $_SESSION['idusuario']=$resultado34['idTM'];  
               // echo $_SESSION['idusuario'];
            }
        } else {
            echo "error con query";
        }

        header("location:index.php");
        echo "Has sido logueado correctamente " . $_SESSION['usuario'] . " ";
        
        
        
    } else {
        echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
    }
}
?>

<style type="text/css">
    *{
        font-size: 14px;
        font-family: sans-serif;
    }
    form.login {
        background: none repeat scroll 0 0 #F1F1F1;
        border: 1px solid #DDDDDD;
        margin: 0 auto;
        padding: 20px;
        width: 278px;
    }
    form.login div {
        margin-bottom: 15px;
        overflow: hidden;
    }
    form.login div label {
        display: block;
        float: left;
        line-height: 25px;
    }
    form.login div input[type="text"], form.login div input[type="password"] {
        border: 1px solid #DCDCDC;
        float: right;
        padding: 4px;
    }
    form.login div input[type="submit"] {
        background: none repeat scroll 0 0 #DEDEDE;
        border: 1px solid #C6C6C6;
        float: right;
        font-weight: bold;
        padding: 4px 20px;
    }
    .error{
        color: red;
        font-weight: bold;
        margin: 10px;
        text-align: center;
    }
</style>

<form action="" method="post" class="login">
    <div><label>Nombre	: </label><input id="call" name="user" type="text" ></div>
    <div><label>Contrase&ntilde;a: </label><input name="password" type="password" ></div>
    <div><input name="login" type="submit" value="login"></div>
</form>
<script>
$( document ).ready(function() {
 $("#call").focus(); }  
 );
</script>

<?php ?>