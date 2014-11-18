<?php
    //sleep(5);
    session_start();
    include_once'password.php';
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    //Se genera un password aleatorio
    $password=passwordRandom();

    $mensaje = '';
    $contenido = '';
    $e = false;
    $u = false;
    $d = false;

    //Asignación de variables
    $nombres=mysqli_real_escape_string($sqli, $_POST['nombres']);//Resivo por POST el nombre
    $apellidos=mysqli_real_escape_string($sqli, $_POST['apellidos']);//Recibo por POST el apellido
    $documento=mysqli_real_escape_string($sqli, $_POST['documento']);//Recibo por POST el documento
    $edad=mysqli_real_escape_string($sqli, $_POST['edad']);//Recibo por POST la edad
    $estado=mysqli_real_escape_string($sqli, $_POST['estado']);//Recibo por POST el estado
    $celular=mysqli_real_escape_string($sqli, $_POST['celular']);//Recibo por POST el número de celular
    $user=mysqli_real_escape_string($sqli, $_POST['user']);//Recibo por POST la el usuario
    //Select de html, escoger por defecto la opción que se manda desde el HTML por el metodo AJAX
    if($estado=='Activo'){
        $seleccion='<option value="Activo">Activo</option>
                    <option value="Suspendido">Suspendido</option>';
    }
    else{
         $seleccion='<option value="Suspendido">Suspendido</option>
                    <option value="Activo">Activo</option>';
    }
    //$sql = $linkbd->query("SELECT * FROM users INNER JOIN login ON users.documento=login.documento WHERE login.user = '$user' AND login.rol = 'Administrador'");
    
    //$sql = $sqli->query("SELECT * FROM login INNER JOIN users ON login.documento=users.documento WHERE login.user = '$user' AND users.documento = '$documento'");
    $sql = $sqli->query("SELECT user, documento FROM login WHERE user = '$user'");
    $sqlu = $sqli->query("SELECT documento FROM users WHERE documento = '$documento'");

    if($sql->num_rows == 0 && $sqlu->num_rows == 0){
        //Se hace la consulta SQL
        $sql="INSERT INTO users VALUES('$documento', '$nombres', '$apellidos', '$edad', '$celular', '$estado');";
        //Se ejecuta el Query
        $result=$sqli->query($sql);

        //Insertar en la tabla de login
        $sqlLogin="INSERT INTO login VALUES('$user', '$password', 'Trabajador', '$documento');";
        //Se ejecuta el Query
        $insertData=$sqli->query($sqlLogin);
        
        //Si hay cambios o se afecto alguna taba de la base de datos
        if($result && $insertData){
            //echo "Usuario registrado con exito";
            //echo $sqli->affected_rows." fila(s) afectada(s). Informaci&oacute;n insertada correctamente";
            $contenido = '
                <!--Cuerpo donde se muestran los usuarios-->
                <article class="post-user margin-post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="title-post"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> '.$nombres.' '.$apellidos.'</h3></a>
                        </div>
                        <div class="panel-body">
                            <form>
                                <input value='.$documento.' type="hidden">
                                <label class="n-label">Documento</label>
                                <input value='.$documento.' type="text" class="form-control" placeholder="Documento" disabled>
                                <label class="n-label">Edad</label>
                                <input value='.$edad.' type="text" class="form-control" placeholder="Edad" disabled>
                                <label class="n-label">Estado</label>
                                <select class="form-control" disabled>
                                    '.$seleccion.'
                                </select>
                                <label class="n-label">Número de celular</label>
                                <input value='.$celular.' type="text" class="form-control" placeholder="Número de celular" disabled>
                                <label class="n-label">User name</label>
                                <span class="password">'.$user.'</span>
                                <label class="n-label">Password</label>
                                <span class="password password-hidde">'.$password.'</span>
                                <a onclick="_datos_user();" data-toggle="modal" data-id='.$documento.' class="doc-user btn btn-default" href="#user-edit">Editar <span class="glyphicon glyphicon-pencil"></span></a>
                                <a data-toggle="modal" data-id='.$documento.' class="delete-user btn btn-default" href="#delete-modal">Eliminar <span class="glyphicon glyphicon-ban-circle"></span></a>
                            </form>
                        </div>
                    </div>
                </article>
                <!--End cuerpo donde se muestran los usuarios-->
            ';
            $mensaje = '
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        Usuario registrado con éxito.
                    </div>
            ';
            $e = true;
        }
        else{
            $mensaje = '
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        El usuario que está intentando de ingresar ya existe.
                    </di>
            ';
            $d = true;
        }
    }
    else{
        $mensaje = '
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        El nombre de usuario o documento que está intentando de ingresar ya existe.
                    </di>
        ';
        $u = true;
    }

    $json = array('mensaje' => $mensaje, 'contenido' => $contenido, 'e' => $e, 'u' => $u, 'd' => $d);
    echo json_encode($json);
//End code php
?>