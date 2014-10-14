<?php
    //sleep(5);
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd

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

    //fecha actual
    date_default_timezone_set('UTC');
    $fecha_ingreso_pro=date("d-m-Y");

    //Se hace la consulta SQL
    $sql="INSERT INTO productos VALUES('$documento', '$nombres', '$apellidos', '$edad', '$celular', '$estado');";
    //Se ejecuta el Query
    $result=$sqli->query($sql);