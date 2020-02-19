<?php

if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

//mysql_select_db($bd_base, $conex); 

/*echo '<select name="modelo" id="mod" onchange="showselect4(this.value)">';*/

/*$consulta= "SELECT * FROM vehiculo, modelo WHERE vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_pais=".$_SESSION['pais']."";*/

$consulta= "SELECT * FROM ano";
$resultadoAnos = mysqli_query($conex,$consulta) or die (mysqli_error());

$anos=array();
$idAnos = array();
$i=1;
$opAnos = '';

while($resultAnos = mysqli_fetch_array($resultadoAnos)){
    //$codMarcas = $resultMarcas['cod_marca'];
    //$marcas = $resultMarcas['marca'];

    $idAnos[$i]= $resultAnos['cod_ano'];
    $anos[$i]= $resultAnos['ano'];
    $opAnos .= "<option value='".$idAnos[$i]."'>".$anos[$i]."</option>";

    $i++;

}

mysqli_close($conex);
?>