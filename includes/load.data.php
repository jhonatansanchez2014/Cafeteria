<?php
    include_once'connect.php';
    // Función para extraer el listado de usurios
    function consulProducts($linkbd){
        $consult='';
        $sql=$linkbd->query("SELECT * FROM productos ORDER BY fecha_ingreso_pro ASC");
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
                    <td>'.$list['precio_pro'].'</td>
                    <td>'.$list['fecha_vence_pro'].'</td>
                    <td>'.$list['fecha_ingreso_pro'].'</td>
                    <td>'.$list['proveedor_pro'].'</td>
                    <td>'.$list['repartidor_pro'].'</td>
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
?>