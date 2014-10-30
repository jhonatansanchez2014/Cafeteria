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
?>