<?php
    //sleep(5);
    //error_reporting(0);
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd

    $nombres=mysqli_real_escape_string($sqli, $_POST['nombres']);//Resivo por POST el nombre
    $apellidos=mysqli_real_escape_string($sqli, $_POST['apellidos']);//Recibo por POST el apellido
    $documento=mysqli_real_escape_string($sqli, $_POST['documento']);//Recibo por POST el documento
    $edad=mysqli_real_escape_string($sqli, $_POST['edad']);//Recibo por POST la edad
    $estado=mysqli_real_escape_string($sqli, $_POST['estado']);//Recibo por POST el estado
    $celular=mysqli_real_escape_string($sqli, $_POST['celular']);//Recibo por POST el número de celular
    $user=mysqli_real_escape_string($sqli, $_POST['user']);//Recibo por POST la el usuario

    if($estado=='Activo'){
        $seleccion='<option value="Activo">Activo</option>
                    <option value="Suspendido">Suspendido</option>';
    }
    else{
         $seleccion='<option value="Suspendido">Suspendido</option>
                    <option value="Activo">Activo</option>';
    }

    //Se hace la consulta SQL
    $sql="INSERT INTO users VALUES('$documento', '$nombres', '$apellidos', '$edad', '$celular', '$estado');";
    //echo $sql;
    //$result = $sqli->query($sql);
    $result=$sqli->query($sql);

    if($result){
        //echo "Usuario registrado con exito";
        //echo $sqli->affected_rows." fila(s) afectada(s). Informaci&oacute;n insertada correctamente";
        echo '
            <!--Cuerpo donde se muestran los usuarios-->
                        <article class="post-user margin-post">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="title-post" href=""><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> '.$nombres.' '.$apellidos.'</h3></a>
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
                                        <span class="password">*******</span>
                                        <a class="btn btn-default" href="">Update <span class="glyphicon glyphicon-refresh"></span></a>
                                        <a data-toggle="modal" data-id='.$documento.' class="delete-user btn btn-default" href="#delete-modal">Delete <span class="glyphicon glyphicon-ban-circle"></span></a>
                                        
                                    </form>
                                </div>
                            </div>
                        </article>
                        <!--End cuerpo donde se muestran los usuarios-->
        ';
    }
    else{
        echo "Ups al parecer sucedió un problema al intentar guardar el usuario en la base de datos, verifica los datos.";
    }
       
       
    
    
?>