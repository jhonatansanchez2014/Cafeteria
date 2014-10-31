<?php
    session_start();
    //Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    include_once'connect.php';
    //Incluimos el archivo
    include_once('./load.data.php');
    //variable que se manda por Json
    $res = "";
    $mensaje = "";
    $aux = false;
    //Se elimina el proveedor
    $dl = mysqli_real_escape_string($sqli, $_POST['nit']);//Resivo por POST
    //delete
    $sql = "DELETE FROM proveedor WHERE nit_em ='$dl'";
    //me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio
    $result = $sqli->query($sql);

    if($result){
        $res = consulProveedor($sqli);
        $mensaje = 'El proveedor con nit '.$nit.', se ha eliminado con éxito.';
        $aux = true;
    }
    //En caso de que pase algún error
    else{
        $mensaje = 'Ha ocurrido un error al intentar eliminar el proveedor con nit '.$dl.', por favor intenta más tarde. ';
        $aux = false;
    }

    $Json = array('res' => $res, 'msg' => $mensaje, 'aux' => $aux);
    echo json_encode($Json);
?>