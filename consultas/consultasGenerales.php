<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

/*Consultamos tipo vehiculo*/

            //mysql_select_db($database_conex, $conex);
            $query_tipo = sprintf("select * from tipo_vehiculo");
            $tipo = mysqli_query($conex,$query_tipo) or die(mysqli_error());
            $row_tipo = mysqli_fetch_assoc($tipo);
            $totalRows_tipo = mysqli_num_rows($tipo);



            $query_ultimos = sprintf("select * from vehiculo, ano, marca, modelo WHERE vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_pais=".$_SESSION['pais']." ORDER BY vehiculo.cod_vehiculo DESC LIMIT 8");
            $ultimos = mysqli_query($conex, $query_ultimos) or die(mysqli_error());
            //$row_ultimos = mysql_fetch_assoc($ultimos);
            $totalRows_ultimos = mysqli_num_rows($ultimos);


            $query_po = sprintf("select * from vehiculo, ano, marca, modelo WHERE vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_ano=ano.cod_ano and vehiculo.premiun=1 and vehiculo.cod_pais=".$_SESSION['pais']." ORDER BY vehiculo.cod_vehiculo DESC LIMIT 8");
            $po = mysqli_query($conex, $query_po) or die(mysqli_error());
            //$row_po = mysql_fetch_array($po);
            $totalRows_po = mysqli_num_rows($po);


?>
