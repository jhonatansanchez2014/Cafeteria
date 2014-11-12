<?php
	session_start();//Inicia sesión
	$user = $_SESSION["usuario"];
	$password = $_SESSION["password"];

	//Incluimos el archivo
	include_once'connect.php';

	//Declaración de variables
	$error = false;
	$mensaje = "";

	//Asignación de variables
    $passwordold = mysqli_real_escape_string($sqli, $_POST['passold']);//Resivo por POST
    $passwordnew = mysqli_real_escape_string($sqli, $_POST['pass']);//Recibo por POST
    $rpasswordnew = mysqli_real_escape_string($sqli, $_POST['rpass']);//Recibo por POST

    //Se comparan los password para verificar que sean iguales
    if(($passwordnew == $rpasswordnew) && ($passwordold == $password)){
    	//$sql = "UPDATE login SET password ='$passwordnew' WHERE password = '$user'";

    	$mensaje = "Contraseña cambiado con éxito";
    	$error = true;
    }
    else{
    	$mensaje = "Las contraseñas ingresadoas no coinciden, por favor verificalas e intenta de nuevo";
    	$error = false;
    }

    $passJson = array('mensaje' => $mensaje);
    echo json_encode($passJson);

   /* */
?>