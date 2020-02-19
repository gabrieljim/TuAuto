<?php


if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

//mysql_select_db($bd_base, $conex); 

//echo '<select name="ubicacion" id="ubicacion">';

/*$consulta= "SELECT * FROM vehiculo, combustible WHERE vehiculo.cod_combustible=combustible.cod_combustible AND vehiculo.cod_pais=".$_SESSION['pais']."";*/

$consulta= "SELECT * FROM combustible"; 
$resultadoCombustible = mysqli_query($conex, $consulta) or die (mysqli_error());

$combust=array();
$idCombust = array();
$i=1;
$opCombust = '';

while($combustible = mysqli_fetch_array($resultadoCombustible)){
    //$codMarcas = $resultMarcas['cod_marca'];
    //$marcas = $resultMarcas['marca'];

    $idCombust[$i]= $combustible['cod_combustible'];
    $combust[$i]= $combustible['combustible'];
    $opCombust .= "<option value='".$idCombust[$i]."'>".$combust[$i]."</option>";

    $i++;

}

mysqli_close($conex);
?>