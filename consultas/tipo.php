<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

$consulta= "SELECT * FROM tipo_vehiculo";
$resultadoTipoVehi = mysqli_query($conex, $consulta) or die (mysqli_error($conex));


$tipoVehi=array();
$idTipoVehi = array();
$i=1;
$opTipoVehi = '';

while($resultTipo = mysqli_fetch_array($resultadoTipoVehi)){

    $idTipoVehi[$i]= $resultTipo['cod_tipov'];
    $tipoVehi[$i]= $resultTipo['tipov'];
    $opTipoVehi .= "<option value='".$idTipoVehi[$i]."'>".$tipoVehi[$i]."</option>";

    $i++;

}

mysqli_close($conex);

?>



 
