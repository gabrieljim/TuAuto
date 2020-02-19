<?php

if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");


$consulta= "SELECT * FROM dirvolante";
$resultadoDireccion = mysqli_query($conex,$consulta) or die (mysqli_error($conex));

$direccion=array();
$idDireccion = array();
$i=1;
$opDireccion = '';

while($resultDireccion = mysqli_fetch_array($resultadoDireccion)){

    $idDireccion[$i]= $resultDireccion['cod_dire'];
    $direccion[$i]= $resultDireccion['dirvolante'];
    $opDireccion .= "<option value='".$idDireccion[$i]."'>".$direccion[$i]."</option>";

    $i++;

}
mysqli_close($conex);
?>