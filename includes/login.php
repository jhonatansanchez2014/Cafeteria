<?php
    sleep(3);
    //error_reporting(0);
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd

    $user=mysqli_real_escape_string($sqli, $_POST['user']);//Resivo por POST el Usuario
    $password=mysqli_real_escape_string($sqli, $_POST['password']);//Recibo por POST la Contraseña

    if ($user==null||$password==null){//Si los campos estan vacios
        echo 'Por favor complete todos los campos.';//Mensaje que se muestra en caso de que se recivan datos null o vacios
    }
    else{
        //Se hace la consulta SQL
        $sql=mysqli_query($sqli, "SELECT user, password FROM login WHERE user = '$user' AND password = '$password'");
        if(mysqli_num_rows($sql)>0){//Si existe algún dato en la base de datos con respecto a la consulta realizada
            $_SESSION["usuario"]=$user;//Se le asigna ala variable se sesión el nombre de usuario si la consulta es exitosa
            echo '<script>location.href = "./templates/"</script>';//Se redirecciona a la página correspondiente
            //echo $_SESSION["usuario"]." Está conectado";
        }
        else{//Mensaje que se envia si los datos incgresados son incorrectos
            echo 'El Usuario y/o Contraseña ingresado son incorrectos, vuelva a intentarlo.';
        }
    }
?>