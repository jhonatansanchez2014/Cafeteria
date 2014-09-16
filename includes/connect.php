<?php
	define("server", "localhost");
    define("user_bd", "root");
    define("password", "");
    define("bd_name", "cafeteria");

    $sqli=new mysqli(server, user_bd, password, bd_name);
    if ($sqli->connect_errno){//Si la conexión con la bd falla
        //echo "Fallo al conectar a MySQL: (".$sqli->connect_errno.") ".$sqli->connect_error;
        echo "Ha ocurrido un error al intentar conectar con la base de datos, por favor intente mas tarde";
        exit();
    }
    @mysqli_query($sqli, "SET NAMES 'utf8'");//Para los acentos
?>