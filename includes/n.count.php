<?php
	include_once'connect.php';

	/***********Usuarios***************/
    $sql=mysqli_query($sqli, "SELECT * FROM login WHERE rol <> 'Administrador'");//Se hace la consulta SQL
    if(mysqli_num_rows($sql)>0){//Si existe algún dato en la base de datos con respecto a la consulta realizada
        $nuser=mysqli_num_rows($sql);//Se almacena en la variable el numero de usuarios existentes
    }
    else{//Si no hay registros
        $nuser=0;
    }
    /***********Productos***************/
    $sql=mysqli_query($sqli, "SELECT * FROM productos");//Se hace la consulta SQL
    if(mysqli_num_rows($sql)>0){//Si existe algún dato en la base de datos con respecto a la consulta realizada
        $nprod=mysqli_num_rows($sql);//Se almacena en la variable el numero de productos existentes
    }
    else{//Si no hay registros
        $nprod=0;
    }
    /***********Proveedores***************/
    $sql=mysqli_query($sqli, "SELECT * FROM proveedor");//Se hace la consulta SQL
    if(mysqli_num_rows($sql)>0){//Si existe algún dato en la base de datos con respecto a la consulta realizada
        $nprov=mysqli_num_rows($sql);//Se almacena en la variable el numero de productos existentes
    }
    else{//Si no hay registros
        $nprov=0;
    }
?>