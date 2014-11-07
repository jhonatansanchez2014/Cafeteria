<?php
	include_once'connect.php';
	$msg = "";
	$table = "";
	$estado = false;
	$estado2 = false;

	//Asignación de variables
    $nit=mysqli_real_escape_string($sqli, $_POST['nit']);//Resivo por POST
    $empresa=mysqli_real_escape_string($sqli, $_POST['empresa']);//Recibo por POST
    $telefono=mysqli_real_escape_string($sqli, $_POST['telefono']);//Recibo por POST
    $direccion=mysqli_real_escape_string($sqli, $_POST['direccion']);//Recibo por POST
    $nombre=mysqli_real_escape_string($sqli, $_POST['repn']);//Recibo por POST
    $apellido=mysqli_real_escape_string($sqli, $_POST['repa']);//Recibo por POST
    $tel_rep=mysqli_real_escape_string($sqli, $_POST['reptel']);//Recibo por POST
    $mail=mysqli_real_escape_string($sqli, $_POST['repmail']);//Recibo por POST

    $sqls=$sqli->query("SELECT * FROM proveedor");
    if($sqls->num_rows!=0){
    	$estado = true;
 	}
 	else{
 		$estado = false;
 	}
    //Se hace la consulta SQL
    $sql="INSERT INTO proveedor VALUES('$nit', '$empresa', '$telefono', '$direccion', '$nombre', '$apellido', '$tel_rep', '$mail')";
    //Se ejecuta el Query
    $result=$sqli->query($sql);
    //Si hay cambios o se afecto alguna taba de la base de datos
    if($result){
    	$estado2 = true;
    	$msg = '
			<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> Proveedor registrado con éxito.
            </div>
    	';
    	$table = '
			<tr>
		    	<td>'.$nit.'</td>
		    	<td>'.$empresa.'</td>
		    	<td>'.$telefono.'</td>
		    	<td>'.$direccion.'</td>
		    	<td class="center-plus"><a class="nit-em" data-id='.$nit.' data-toggle="modal" href="#pr-plus"><span data-toggle="tooltip" data-placement="left" title="Ver más información sobre la empresa." class="glyphicon glyphicon-plus"></span></a></td>
                <td class="center-plus"><a class="nit-em" data-id='.$nit.' data-toggle="modal" href="#"><span data-toggle="tooltip" data-placement="left" title="Editar datos de este proveedor." class="glyphicon glyphicon-edit"></span></a></td>
                <td class="center-plus"><a class="nit-em" data-id='.$nit.' data-toggle="modal" href="#pr-delete"><span data-toggle="tooltip" data-placement="left" title="Eliminar este proveedor." class="glyphicon glyphicon-trash"></span></a></td>
		    </tr>
    	';
    }
    else{
    	$estado2 = false;
    	$msg = '
			<div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> Ha ocurrido un error al intentar guardar el proveedor, por favor intenta más tarde.
            </div>
    	';
    }
    // Armamos array para convertir a JSON
    $msgJson = array('mensaje' => $msg, 'table' => $table, 'estado' => $estado, 'esta2' => $estado2);
    echo json_encode($msgJson);
?>
    //Envio resultados en formato JSON