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
    
    //Asignación de variables
    $nit_n = mysqli_real_escape_string($sqli, $_POST['nit_up']);//Resivo por POST
    $nit = mysqli_real_escape_string($sqli, $_POST['nit_up_oc']);//Resivo por POST
    $empresa = mysqli_real_escape_string($sqli, $_POST['empresa_up']);//Recibo por POST
    $telefono = mysqli_real_escape_string($sqli, $_POST['telefono_up']);//Recibo por POST
    $direccion = mysqli_real_escape_string($sqli, $_POST['direccion_up']);//Recibo por POST
    $nombre = mysqli_real_escape_string($sqli, $_POST['repa_up']);//Recibo por POST
    $apellido = mysqli_real_escape_string($sqli, $_POST['repap_up']);//Recibo por POST
    $tel_rep = mysqli_real_escape_string($sqli, $_POST['reptel_up']);//Recibo por POST
    $mail = mysqli_real_escape_string($sqli, $_POST['repmail_up']);//Recibo por POST

    //update
    $sql = "UPDATE proveedor SET nit_em ='nit_n', nombre_em = '$empresa', tel_em = '$telefono',
                                dir_em = '$direccion', nombre_rep = '$nombre', apellido_rem = '$apellido',
                                tel_rep = 'tel_rep', mail_rem = '$mail' WHERE nit_em = '$nit'";

    //me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio
    $result = $sqli->query($sql);

    if($result){
        $aux = true;
        $res = consulProveedor($sqli);
        $mensaje = '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> Proveedor actualizado con éxito.
            </div>
        ';
    }

    //En caso de que pase algún error
    else{
        $aux = false;
        $mensaje = '
             <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> Ha ocurrido un error al actualizar el proveedor, por favor intenta más tarde.
            </div>
        ';
    }

    //se ingresa las variables con su contenito en un array
    $Json = array('res' => $res, 'msg' => $mensaje, 'aux' => $aux);

    //Se pasa el array a formato JSON, para así ser enviado
    echo json_encode($Json);
?>

