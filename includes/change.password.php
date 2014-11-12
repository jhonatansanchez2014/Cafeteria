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
    if($passwordnew == $rpasswordnew && $passwordold == $password){
    	//$sql = "UPDATE login SET password ='$passwordnew' WHERE password = '$user'";

    	$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		Contraseña cambiado con éxito, tu sesión será finalizda para que inicies nuevamente.
            		</div>
            	';
    	$error = true;
    }
    else{
    	$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		Las contraseñas ingresadoas no coinciden, por favor verificalas e intenta de nuevo.
            		</div>
            	';
    	$error = false;
    }

    $passJson = array('mensaje' => $mensaje);
    echo json_encode($passJson);

   /* */
?>