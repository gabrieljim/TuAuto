<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

$consulta= "SELECT * FROM tipo";
$resultado_condicion = mysqli_query($conex, $consulta) or die (mysqli_error($conex));

$codicion=array();
$idCondicion = array();
$i=1;
$opCodicion = '';

while($condiciones = mysqli_fetch_array($resultado_condicion)){

    $idCondicion[$i]= $condiciones['cod_tipo'];
    $codicion[$i]= $condiciones['tipo'];
    $opCodicion .= "<option value='".$idCondicion[$i]."'>".$codicion[$i]."</option>";

    $i++;

}

//mysqli_close($conex);

?>



 
