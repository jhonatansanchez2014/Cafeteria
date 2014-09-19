<?php
	function passwordRandom(){
		//Se define una cadena de caractares.
		$cadena="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		//Obtenemos la longitud de la cadena de caracteres
		$longitudCadena=strlen($cadena);
		//Se define la variable que va a contener la contraseña
		$password="";
		//Se define la longitud de la contraseña, para este caso 7
		$longitudPassword=7;
		//Creamos la contraseña
		for($i=1; $i<=$longitudPassword; $i++){
			//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
			$pos=rand(0,$longitudCadena-1);
			//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
			$password.=substr($cadena,$pos,1);
		}
			return $password;
	}
?>