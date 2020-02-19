<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

$pais = $_SESSION['pais'];

$consulta= "SELECT * FROM estados WHERE cod_pais=$pais";
$resultadoEstados = mysqli_query($conex,$consulta) or die (mysqli_error($conex));

$estados=array();
$idEstados = array();
$i=1;
$opEstados = '';

while($resultEstados = mysqli_fetch_array($resultadoEstados)){

    $idEstados[$i]= $resultEstados['cod_estado'];
    $estados[$i]= $resultEstados['estado'];
    $opEstados .= "<option value='".$idEstados[$i]."'>".$estados[$i]."</option>";

    $i++;

}


mysqli_close($conex);
?>