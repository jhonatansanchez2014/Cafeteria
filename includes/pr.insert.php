<?php
	include_once'connect.php';
	$msg = "";
	$table = "";
	$estado = false;

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
    	$msg = 'Proveedor registrado';
    	$table = '
			<tr>
		    	<td>'.$nit.'</td>
		    	<td>'.$empresa.'</td>
		    	<td>'.$telefono.'</td>
		    	<td>'.$direccion.'</td>
		    	<td class="center-plus"><a href="" data-toggle="tooltip" data-placement="left" title="Ver mas información sobre la empresa."><span class="glyphicon glyphicon-plus"></span></a></td>
		    	<td class="center-plus"><a href="" data-toggle="tooltip" data-placement="left" title="Editar datos de este proveedor."><span class="glyphicon glyphicon-edit"></span></a></td>
		    	<td class="center-plus"><a href="" data-toggle="tooltip" data-placement="left" title="Eliminar este proveedor."><span class="glyphicon glyphicon-trash"></span></a></td>
		    </tr>
    	';
    }
    else{
    	$msg = 'Ha ocurrido un error al intentar guardar el proveedor, intenta más tarde';
    }
    // Armamos array para convertir a JSON
    $msgJson = array('mensaje' => $msg, 'table' => $table, 'estado' => $estado);
    //Envio resultados en formato JSON
    echo json_encode($msgJson);
?>