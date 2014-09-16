<?php
    //sleep(5);
    //error_reporting(0);
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    //Se elimina el usuario
    $doc=mysqli_real_escape_string($sqli, $_POST['documento']);//Resivo por POST el Usuario
    //delete from prog_apto_docentes where Documento=".$documento
    $sql="DELETE FROM users WHERE documento ='$doc'";
    //$result = $sqli->query($sql);
    $result=$sqli->query($sql);

    if($result){
        echo "<script>location.href = './users.php';</script>";
    }
    else{
        echo "Ups al parecer no se pudo eliminar el usuario";
    }
?>