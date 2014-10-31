<?php
    include_once'connect.php';

    // Función para extraer el listado de usurios
    function consulProducts($linkbd){
        $consult='';
        $sql=$linkbd->query("SELECT * FROM productos ORDER BY cod DESC");
        if($sql->num_rows!=0){
            // convertimos el objeto
            while($list=$sql->fetch_assoc()){
                $consult .= '
                <tr>
                    <td>'.$list['cod_pro'].'</td>
                    <td>'.$list['nombre_pro'].'</td>
                    <td>'.$list['categoria_pro'].'</td>
                    <td>'.$list['cantidad_pro'].'</td>
                    <td>'.$list['cantidad_pro_uni'].'</td>
                    <td>'.'$ '.$list['precio_pro'].'</td>
                    <td>'.$list['fecha_vence_pro'].'</td>
                    <td>'.$list['fecha_ingreso_pro'].'</td>
                    <td>'.$list['proveedor_pro'].'</td>
                    <td>'.$list['repartidor_pro'].'</td>
                    <td class="center-plus"><a href="" data-toggle="tooltip" data-placement="left" title="Editar producto."><span class="glyphicon glyphicon-edit"></span></a></td>
                <tr>
                ';
            }
        }
        else{
            $consult = '
                <tr class="data-not">
                    <td colspan="10">¡Ups! aún no existen registros en la base de datos <img src="../images/triste.gif"></td>
                </tr>
            ';
        }
        return $consult;
    }

    // Función para extraer el listado de proveedores
    function consulProveedor($linkbd){
        $pro='';
        $sql=$linkbd->query("SELECT * FROM proveedor ORDER BY nombre_em DESC");
        if($sql->num_rows!=0){
            // convertimos el objeto
            while($list=$sql->fetch_assoc()){
                $pro .= '
                    <tr>
                        <td>'.$list['nit_em'].'</td>
                        <td>'.$list['nombre_em'].'</td>
                        <td>'.$list['tel_em'].'</td>
                        <td>'.$list['dir_em'].'</td>
                        <td class="center-plus"><a class="nit-em" data-id='.$list['nit_em'].' data-toggle="modal" href="#pr-plus"><span data-toggle="tooltip" data-placement="left" title="Ver más información sobre la empresa." class="glyphicon glyphicon-plus"></span></a></td>
                        <td class="center-plus"><a class="nit-em" data-id='.$list['nit_em'].' data-toggle="modal" href="#"><span data-toggle="tooltip" data-placement="left" title="Editar datos de este proveedor." class="glyphicon glyphicon-edit"></span></a></td>
                        <td class="center-plus"><a class="nit-em" data-id='.$list['nit_em'].' data-toggle="modal" href="#pr-delete"><span data-toggle="tooltip" data-placement="left" title="Eliminar este proveedor." class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                ';
            }
        }
        else{
            $pro = '
                <tr class="data-not">
                    <td colspan="7">Aún no existen registros en la base de datos</td>
                </tr>
            ';
        }
        return $pro;
    }

    //busqueda por productos
    function valorTotal($linkbd){
        $total=0;
        $aux=0;
        $sql=$linkbd->query("SELECT precio_pro FROM productos");
        if($sql->num_rows!=0){
            // convertimos el objeto
            while($list=$sql->fetch_assoc()){
                $aux=str_replace('.','',$list['precio_pro']);
                $total=$aux+$total;
            }
        }
        else{
            $total = 0;
        }
        $cad='$ '.number_format($total);
        return $cad;
    }

    if(isset($_POST['dd'])){
        $contenido="";
        $search=mysqli_real_escape_string($sqli, $_POST['dd']);//Resivo por POST la busqueda a realizar
    //--select * from profesor where nombres like '%ria%'
    $sql=$sqli->query("SELECT * FROM productos WHERE nombre_pro LIKE '%$search%' ORDER BY cod DESC");
    //Se ejecuta el Query
    //$result=$sqli->query($sql);
    if($sql->num_rows!=0){
        while($list=$sql->fetch_assoc()){
            $contenido.='
                <tr>
                    <td>'.$list['cod_pro'].'</td>
                    <td>'.$list['nombre_pro'].'</td>
                    <td>'.$list['categoria_pro'].'</td>
                    <td>'.$list['cantidad_pro'].'</td>
                    <td>'.$list['cantidad_pro_uni'].'</td>
                    <td>'.'$ '.$list['precio_pro'].'</td>
                    <td>'.$list['fecha_vence_pro'].'</td>
                    <td>'.$list['fecha_ingreso_pro'].'</td>
                    <td>'.$list['proveedor_pro'].'</td>
                    <td>'.$list['repartidor_pro'].'</td>
                <tr>
            ';
        }
    }
    else{
        $contenido='
                <tr class="data-not">
                    <td colspan="10">¡Ups! aún no existen registros con el nombre de  <strong>'.$search.'</strong> <img src="../images/triste.gif"></td>
                </tr>
        ';
    }

    // Armamos array para convertir a JSON
    $Json=array("contenido"=>$contenido);
    //Envio resultados en formato JSON
    echo json_encode($Json);
    //echo $search;
    }

    //busqueda por fechas
    if(isset($_POST['fini'])&&isset($_POST['ffin'])){
        $contenido="";
        $fini=mysqli_real_escape_string($sqli, $_POST['fini']);//Resivo por POST la busqueda a realizar
        $ffin=mysqli_real_escape_string($sqli, $_POST['ffin']);//Resivo por POST la busqueda a realizar
    //--select * from profesor where nombres like '%ria%'
    $sql=$sqli->query("SELECT * FROM productos WHERE fecha_ingreso_pro >= '$fini' AND fecha_ingreso_pro <= '$ffin' ORDER BY cod DESC");
    //Se ejecuta el Query
    //$result=$sqli->query($sql);
    if($sql->num_rows!=0){
        while($list=$sql->fetch_assoc()){
            $contenido.='
                <tr>
                    <td>'.$list['cod_pro'].'</td>
                    <td>'.$list['nombre_pro'].'</td>
                    <td>'.$list['categoria_pro'].'</td>
                    <td>'.$list['cantidad_pro'].'</td>
                    <td>'.$list['cantidad_pro_uni'].'</td>
                    <td>'.'$ '.$list['precio_pro'].'</td>
                    <td>'.$list['fecha_vence_pro'].'</td>
                    <td>'.$list['fecha_ingreso_pro'].'</td>
                    <td>'.$list['proveedor_pro'].'</td>
                    <td>'.$list['repartidor_pro'].'</td>
                    <td class="center-plus"><a href="" data-toggle="tooltip" data-placement="left" title="Editar datos de este proveedor."><span class="glyphicon glyphicon-edit"></span></a></td>
                <tr>
            ';
        }
    }
    else{
        $contenido='
                <tr class="data-not">
                    <td colspan="10">¡Ups! aún no existen registros relacionados con las fechas ingresadas <img src="../images/triste.gif"></td>
                </tr>
        ';
    }

   // Armamos array para convertir a JSON
    $Json=array("cont"=>$contenido);
    //Envio resultados en formato JSON
    echo json_encode($Json);
    //echo $search;
    }

    if(isset($_POST['nit'])){
        $nit_con = "";
        $nombre = "";
        $produc = "";
        $nit=mysqli_real_escape_string($sqli, $_POST['nit']);//Resivo por POST la busqueda a realizar
        $sql=$sqli->query("SELECT nombre_em, nombre_rep, apellido_rem, tel_rep, mail_rem FROM proveedor WHERE nit_em = '$nit'");
        if($sql->num_rows!=0){
            $list=$sql->fetch_assoc();
            $nombre = $list['nombre_em'];
            $nit_con ='
                <tr>
                    <td>'.$list['nombre_rep'].'</td>
                    <td>'.$list['apellido_rem'].'</td>
                    <td>'.$list['tel_rep'].'</td>
                    <td>'.$list['mail_rem'].'</td>
                </tr>
            ';
        }
        $sqlp=$sqli->query("SELECT nombre_pro, fecha_ingreso_pro, repartidor_pro FROM productos WHERE proveedor_pro = '$nombre' ORDER BY cod DESC LIMIT 10");
        if($sqlp->num_rows!=0){
            while($lis=$sqlp->fetch_assoc()){
                $produc.='
                    <tr>
                        <td>'.$lis['nombre_pro'].'</td>
                        <td>'.$lis['fecha_ingreso_pro'].'</td>
                        <td>'.$lis['repartidor_pro'].'</td>
                    <tr>
                ';
            }
        }
        else{
            $produc='
                <tr class="data-not">
                    <td colspan="3">Aún no hay productos relacionados con este proveedor</td>
                </tr>
            ';
        }

        // Armamos array para convertir a JSON
        $nit_Json=array("tableCon" => $nit_con, "nombre" => $nombre, "producto" => $produc);
        //Envio resultados en formato JSON
        echo json_encode($nit_Json);
    }
?>