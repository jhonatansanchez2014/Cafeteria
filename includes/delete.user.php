<?php
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    $respuestaHtml="";
    $mensaje = "";
    //Se elimina el usuario
    $docum=mysqli_real_escape_string($sqli, $_POST['documento']);//Resivo por POST el Usuario
    //delete from prog_apto_docentes where Documento=".$documento
    $sql="DELETE FROM users WHERE documento ='$docum'";
    //$result = $sqli->query($sql);
    $result=$sqli->query($sql);//me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio

    if($result){
        $doc = "";
    $sql=$sqli->query("SELECT documento FROM login WHERE rol = 'Administrador'");
    if($sql->num_rows!=0){
        $list=$sql->fetch_assoc();
        $doc = $list['documento'];
    }

    //cadena sql consulta de los datos de usuario
    $sql="SELECT * FROM users WHERE documento <>'$doc' ORDER BY documento ASC";
    //se ejecuta la consulta
    $result=$sqli->query($sql);
    //se optienen el numero de filas extraidos de la base de datos
    $numfile=$result->num_rows;

    //cadena sql consulta de nombre de usuario y contraseña
    $sql="SELECT user, password FROM login WHERE documento <>'$doc' ORDER BY documento ASC";
    //se ejecuta la consulta
    $resultLogin=$sqli->query($sql);
    //se optienen el numero de filas extraidos de la base de datos
    $numfileLogin=$resultLogin->num_rows;
    //$i=0;

    //con el ciclo enviamos todos los datos extraidos de la base de datos $fila->ISBN
    for($x=0; $x<$numfile; $x++){
        $i=0;
        $fila=$result->fetch_object();
        for($i; $i<1; $i++){
            $filaL=$resultLogin->fetch_object();
            if($fila->estado=='Activo'){
                $seleccion='<option value="Activo">Activo</option>
                            <option value="Suspendido">Suspendido</option>';
            }
            else{
                $seleccion='<option value="Suspendido">Suspendido</option>
                            <option value="Activo">Activo</option>';
            }
            $respuestaHtml.= '
                <!--Cuerpo donde se muestran los usuarios-->
                <article class="post-user margin-post">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="title-post"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> '.$fila->nombres.' '.$fila->apellidos.'</h3></a>
                        </div>
                        <div class="panel-body">
                            <form>
                                <label class="n-label">Documento</label>
                                <input value='.$fila->documento.' type="text" class="form-control" placeholder="Documento" disabled>
                                <label class="n-label">Edad</label>
                                <input value='.$fila->edad.' type="text" class="form-control" placeholder="Edad" disabled>
                                <label class="n-label">Estado</label>
                                <select class="form-control" disabled>
                                    '.$seleccion.'
                                </select>
                                <label class="n-label">Número de celular</label>
                                <input value='.$fila->celular.' type="text" class="form-control" placeholder="Número de celular" disabled>
                                <label class="n-label">User name</label>
                                <span class="password">'.$filaL->user.'</span>
                                <label class="n-label">Password</label>
                                <span class="password password-hidde">'.$filaL->password.'</span>
                                <a data-toggle="modal" class="btn btn-default" href="#Ups">Editar <span class="glyphicon glyphicon-pencil"></span></a>
                                <a data-toggle="modal" data-id='.$fila->documento.' class="delete-user btn btn-default" href="#delete-modal">Eliminar <span class="glyphicon glyphicon-ban-circle"></span></a>
                            </form>
                        </div>
                    </div>
                </article>
                <!--End cuerpo donde se muestran los usuarios-->
            ';
        }
    }
        $mensaje = '
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Usuario eliminado con éxito.
                </div>
        ';
    }
    //En caso de que pase algún error
    else{
        $mensaje = '
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Ha ocurrido un error y no se ha podido eliminar el usuario.
                </div>
        ';
    }

    $mensajeJson = array('respuesta' => $respuestaHtml, 'mensaje' => $mensaje);
    echo json_encode($mensajeJson);
?>