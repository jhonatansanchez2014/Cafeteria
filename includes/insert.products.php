<?php
    //sleep(5);
    session_start();
    $user = $_SESSION['usuario'];

    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd

    $error = false;

    //Asignación de variables
    $cod_pro=mysqli_real_escape_string($sqli, $_POST['codigo']);//Resivo por POST el codigo
    $nombre_pro=mysqli_real_escape_string($sqli, $_POST['producto']);//Recibo por POST el nombre
    $categoria_pro=mysqli_real_escape_string($sqli, $_POST['categoria']);//Recibo por POST la categoria
    $cantidad_pro=mysqli_real_escape_string($sqli, $_POST['cantidad']);//Recibo por POST la cantidad
    $cantidad_pro_uni=mysqli_real_escape_string($sqli, $_POST['medida']);//Recibo por POST la cantidad 2
    $precio_pro=mysqli_real_escape_string($sqli, $_POST['precio']);//Recibo por POST el número el precio
    $fecha_vence_pro=mysqli_real_escape_string($sqli, $_POST['fVence']);//Recibo por POST la fecha vencimiento.
    $proveedor_pro=mysqli_real_escape_string($sqli, $_POST['proveedor']);//Recibo por POST la el proveedor
    $repartidor_pro=mysqli_real_escape_string($sqli, $_POST['reparte']);//Recibo por POST el repartidor

    //Fecha actual
    date_default_timezone_set('America/Bogota');
    $fecha_ingreso_pro = date("Y-m-d");

    //Se hace la consulta SQL
    $sql="INSERT INTO productos(cod_pro, nombre_pro, categoria_pro, cantidad_pro, cantidad_pro_uni, precio_pro, fecha_vence_pro, fecha_ingreso_pro, proveedor_pro, repartidor_pro, user) VALUES('$cod_pro', '$nombre_pro', '$categoria_pro', '$cantidad_pro', '$cantidad_pro_uni', '$precio_pro', '$fecha_vence_pro', '$fecha_ingreso_pro', '$proveedor_pro', '$repartidor_pro', '$user');";
    //Se ejecuta el Query
    $result=$sqli->query($sql);

    //Si hay cambios o se afecto alguna taba de la base de datos
    if($result==true){
        $mensaje='
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Producto registrado con éxito.
                </div>
        ';
        $error=false;
        $contenido='
            <tr>
                <td>'.$cod_pro.'</td>
                <td>'.$nombre_pro.'</td>
                <td>'.$categoria_pro.'</td>
                <td>'.$cantidad_pro.'</td>
                <td>'.$cantidad_pro_uni.'</td>
                <td>'.'$ '.$precio_pro.'</td>
                <td>'.$fecha_vence_pro.'</td>
                <td>'.$fecha_ingreso_pro.'</td>
                <td>'.$proveedor_pro.'</td>
                <td>'.$repartidor_pro.'</td>
                <td>'.$user.'</td>
            <tr>
        ';
    }
    else{
        $mensaje= '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Ha ocurrido un error al intentar guardar el proveedor, verifica los datos ingresados.
            </div>
        ';
        $error=true;
    }
    include_once('load.data.php');
    $valor_total=valorTotal($sqli);
    // Armamos array para convertir a JSON
    $Json=array("mensaje"=>$mensaje,
                "error_date"=>$error,
                "contenido"=>$contenido,
                "total"=>$valor_total);
    //Envio resultados en formato JSON
    echo json_encode($Json);
?>