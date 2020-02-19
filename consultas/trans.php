<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

$consulta= "SELECT * FROM transmision";
$resultado_trans = mysqli_query($conex,$consulta) or die (mysqli_error($conex));

$transmision=array();
$idTransm = array();
$i=1;
$opTransm = '';

while($transm = mysqli_fetch_array($resultado_trans)){

    $idTransm[$i]= $transm['cod_transmision'];
    $transmision[$i]= $transm['transmision'];
    $opTransm .= "<option value='".$idTransm[$i]."'>".$transmision[$i]."</option>";

    $i++;

}

mysqli_close($conex);


?>