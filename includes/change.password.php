<?php
	session_start();//Inicia sesión
	$user = $_SESSION["usuario"];
	$password = $_SESSION["password"];

	//Incluimos el archivo
	include_once'connect.php';

	//Declaración de variables
	$pw1 = false;
	$pw2 = false;
	$cambio = false;
	$mensaje = "";

	//Asignación de variables
    $passwordold = mysqli_real_escape_string($sqli, $_POST['passold']);//Resivo por POST
    $passwordnew = mysqli_real_escape_string($sqli, $_POST['pass']);//Recibo por POST
    $rpasswordnew = mysqli_real_escape_string($sqli, $_POST['rpass']);//Recibo por POST

    //Se comparan los password para verificar que sean iguales
    if($passwordnew == $rpasswordnew && $passwordold == $password){
    	$aux = strlen($passwordnew);
    	if($aux >= 6 || $aux == 10){
    		$sql = "UPDATE login SET password ='$passwordnew' WHERE user = '$user'";
    		$result = $sqli->query($sql);

    		$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		Contraseña cambiada con éxito.
            		</div>
            ';
    		$cambio = true;
    		$_SESSION["password"] = $passwordnew;
    	}
    	else{
    		$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		La nueva contraseña ingresada debe tener como máximo 10 caracteres y como mínimo 6.
            		</div>
            ';
    	}
    }
    else if($passwordold != $password){
    	$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		La contraseña actual no es valida.
            		</div>
            	';
    	$pw1 = true;
    }
    else if($passwordnew != $rpasswordnew){
    	$mensaje = '<div class="alert alert-warning alert-dismissible" role="alert">
                		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                		Las contraseñas ingresadoas no coinciden, por favor verificalas e intenta de nuevo.
            		</div>
            	';
    	$pw2 = true;
    }

    $passJson = array('mensaje' => $mensaje, 'pwold' => $pw1, 'pwnew' => $pw2, 'cambio' => $cambio);
    echo json_encode($passJson);

   /* */
?>