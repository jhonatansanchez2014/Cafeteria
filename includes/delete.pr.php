<?php
    session_start();
    //Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    include_once'connect.php';
    //Incluimos el archivo
    include_once'load.data.php';
    //variable que se manda por Json
    $res = "";
    $mensaje = "";
    $aux = false;
    //Se elimina el proveedor
    $dl = mysqli_real_escape_string($sqli, $_POST['n']);//Resivo por POST
    //delete
    $sql = "DELETE FROM proveedor WHERE nit_em ='$dl'";
    //me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio
    $result = $sqli->query($sql);

    if($result){
        $aux = true;
        $res = consulProveedor($sqli);
        $mensaje = '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                El proveedor con <strong>nit '.$dl.'</strong>, se ha eliminado con éxito.
            </div>
        ';
    }
    //En caso de que pase algún error
    else{
        $aux = false;
        $mensaje = '
             <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                Ha ocurrido un error al intentar eliminar el proveedor <strong>nit '.$dl.'</strong>.
            </div>
        ';
    }

    $Json = array('res' => $res, 'msg' => $mensaje, 'aux' => $aux);
    echo json_encode($Json);
?>

