<?php
    //sleep(3);
    //error_reporting(0);
    session_start();
    include_once 'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd

    $user = mysqli_real_escape_string($sqli, $_POST['user']);//Resivo por POST el Usuario
    $password = mysqli_real_escape_string($sqli, $_POST['password']);//Recibo por POST la Contraseña
    //$sql = $linkbd->query("SELECT * FROM users INNER JOIN login ON users.documento=login.documento WHERE login.user = '$user' AND login.rol = 'Administrador'");

    if ($user == null || $password == null){//Si los campos estan vacios
        echo 'Por favor complete todos los campos.';//Mensaje que se muestra en caso de que se recivan datos null o vacios
    }
    else{
        //Se hace una caonsulta para ver el estado y el rol de l usuario
        $sql = $sqli->query("SELECT * FROM login INNER JOIN users ON login.documento = users.documento WHERE login.user = '$user' AND login.password = '$password'");
        if($sql->num_rows != 0){
            // convertimos el objeto
            while($list=$sql->fetch_assoc()){
                $rol = $list['rol'];
                $estado = $list['estado'];
            }
            if($estado == 'Suspendido'){
                echo "Lo siento, este usuario está suspendido y no puede acceder a la plataforma";
            }
            else{
                $_SESSION["usuario"] = $user;//Se le asigna ala variable se sesión el nombre de usuario si la consulta es exitosa
                $_SESSION["password"] = $password;//Se le asigna ala variable se sesión el nombre de usuario si la consulta es exitosa
                $_SESSION['rol'] = $rol;
                echo '<script>location.href = "./templates/"</script>';//Se redirecciona a la página correspondiente
                //echo $_SESSION["usuario"]." Está conectado";
            }
        }
        else{//Mensaje que se envia si los datos incgresados son incorrectos
                echo 'El Usuario y/o Contraseña ingresado son incorrectos, vuelva a intentarlo.';
        }
        /*Se hace la consulta SQL
        $sql = mysqli_query($sqli, "SELECT user, password FROM login WHERE user = '$user' AND password = '$password'");
        */
    }
?>