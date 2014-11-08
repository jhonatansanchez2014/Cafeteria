<?php
	include_once'connect.php';
    //Incluimos el archivo
    include_once'load.data.php';

	$msg = "";
	$table = "";
	$estado = false;

	//Asignación de variables
    $nit=mysqli_real_escape_string($sqli, $_POST['_nit']);//Resivo por POST
    $empresa=mysqli_real_escape_string($sqli, $_POST['empresa']);//Recibo por POST
    $telefono=mysqli_real_escape_string($sqli, $_POST['telefono']);//Recibo por POST
    $direccion=mysqli_real_escape_string($sqli, $_POST['direccion']);//Recibo por POST
    $nombre=mysqli_real_escape_string($sqli, $_POST['repn']);//Recibo por POST
    $apellido=mysqli_real_escape_string($sqli, $_POST['repa']);//Recibo por POST
    $tel_rep=mysqli_real_escape_string($sqli, $_POST['reptel']);//Recibo por POST
    $mail=mysqli_real_escape_string($sqli, $_POST['repmail']);//Recibo por POST

    //Se hace la consulta SQL
    $sql="INSERT INTO proveedor VALUES('$nit', '$empresa', '$telefono', '$direccion', '$nombre', '$apellido', '$tel_rep', '$mail')";
    //Se ejecuta el Query
    $result=$sqli->query($sql);
    //Si hay cambios o se afecto alguna taba de la base de datos
    if($result){
        $estado = true;
    	$table = consulProveedor($sqli);
    	$msg = '
			<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Proveedor registrado con éxito.
            </div>
    	';
    }
    else{
    	$estado = false;
    	$msg = '
			<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Ha ocurrido un error al intentar guardar el proveedor, verifica los datos ingresados.
            </div>
    	';
    }
    // Armamos array para convertir a JSON
    $msgJson = array('mensaje' => $msg, 'table' => $table, 'estado' => $estado);
    //Envio resultados en formato JSON
    echo json_encode($msgJson);
?>