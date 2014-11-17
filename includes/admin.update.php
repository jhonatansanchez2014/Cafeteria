<?php
    session_start();
    $usuario = $_SESSION['usuario'];
    $contrasena = $_SESSION['password'];

    //Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    include_once'connect.php';

    //variable que se manda por Json
    $res = "";
    $mensaje = "";
    $aux = false;
    
    //Asignación de variables
    $nombre = mysqli_real_escape_string($sqli, $_POST['nombre']);//Resivo por POST
    $apellido = mysqli_real_escape_string($sqli, $_POST['apellido']);//Resivo por POST
    $documento = mysqli_real_escape_string($sqli, $_POST['documento']);//Recibo por POST
    $documentoh = mysqli_real_escape_string($sqli, $_POST['documentoHidden']);//Recibo por POST
    $edad = mysqli_real_escape_string($sqli, $_POST['edad']);//Recibo por POST
    $celular = mysqli_real_escape_string($sqli, $_POST['celular']);//Recibo por POST
    $user = mysqli_real_escape_string($sqli, $_POST['user']);//Recibo por POST
    $password = mysqli_real_escape_string($sqli, $_POST['password']);//Recibo por POST

    //Se verifica que la contraseña ingresada sea valida
    if($contrasena == $password){
        //update datos usuario
        $sql = "UPDATE users SET documento ='$documento', nombres = '$nombre', apellidos = '$apellido',
                                edad = '$edad', celular = '$celular' WHERE documento = '$documentoh'";
        //me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio
        $result = $sqli->query($sql);

        //update datos de acceso nombre de usuario
        $sql = "UPDATE login SET user ='$user' WHERE user = '$usuario'";
        //me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio
        $resultL = $sqli->query($sql);

        if($result && $resultL){
            $mensaje = '
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Datos actualizados con éxito.
                </div>
            ';
            $_SESSION["usuario"]=$user;
        }else{
            $mensaje = '
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Al parecer sucedió un error al intentar actualizar los datos del administrador, actualiza la página he intenta de nuevo.
                </div>
            ';
        }
    }else{
        $mensaje = '
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                La contraseña ingresada no es valida.
            </div>
        ';
    }
    //se ingresa las variables con su contenito en un array
    $Json = array('mensaje' => $mensaje);
    //Se pasa el array a formato JSON, para así ser enviado
    echo json_encode($Json);
?>