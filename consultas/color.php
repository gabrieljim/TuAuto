<?php

if (!isset($_SESSION)) {
  session_start();
}


include("conex.php");

$consulta= "SELECT * FROM color";
$resultado_color = mysqli_query($conex, $consulta) or die (mysqli_error($conex));

$colores=array();
$idColores = array();
$i=1;
$opColores = '';

while($resultColor = mysqli_fetch_array($resultado_color)){

    $idColores[$i]= $resultColor['cod_color'];
    $colores[$i]= $resultColor['color'];
    $opColores .= "<option value='".$idColores[$i]."'>".$colores[$i]."</option>";

    $i++;

}

mysqli_close($conex);

?>



 
