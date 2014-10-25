<?php
    //sleep(5);
    //error_reporting(0);
    session_start();
    include_once'connect.php';//Incluimos el archivo connect.php, el cual es el encargado de realizar la conexión con la bd
    $respuestaHtml="";
    //Se elimina el usuario
    $doc=mysqli_real_escape_string($sqli, $_POST['documento']);//Resivo por POST el Usuario
    //delete from prog_apto_docentes where Documento=".$documento
    $sql="DELETE FROM users WHERE documento ='$doc'";
    //$result = $sqli->query($sql);
    $result=$sqli->query($sql);//me retorna un nimero de columnas o filas afectadas en la base de datos, así se que se realiza algun cambio

    if($result){
        $sql="SELECT * FROM users";
        //se ejecuta la consulta
        $result=$sqli->query($sql);
        //se optienen el numero de filas extraidos de la base de datos
        $numfile=$result->num_rows;

        //con el ciclo enviamos todos los datos extraidos de la base de datos $fila->ISBN
        for($x=0; $x<$numfile; $x++){
            $fila=$result->fetch_object();
            if($fila->estado=='Activo'){
                $seleccion='<option value="Activo">Activo</option>
                            <option value="Suspendido">Suspendido</option>';
            }
            else{
                $seleccion='<option value="Suspendido">Suspendido</option>
                            <option value="Activo">Activo</option>';
            }
            //Los datos que retorno al metodo Ajax, para que sean impresos en el documento .php respectivo
            echo '
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
                                <span class="password">phvillegas</span>
                                <label class="n-label">Password</label>
                                <span class="password">*******</span>
                                <a class="btn btn-default" href="">Actualizar <span class="glyphicon glyphicon-refresh"></span></a>
                                <a data-toggle="modal" data-id='.$fila->documento.' class="delete-user btn btn-default" href="#delete-modal">Elimina <span class="glyphicon glyphicon-ban-circle"></span></a>
                            </form>
                        </div>
                    </div>
                </article>
                <!--End cuerpo donde se muestran los usuarios-->
            ';
        }
    }
    //En caso de que pase algún error
    else{
        echo "Ups al parecer no se pudo eliminar el usuario";
    }
?>