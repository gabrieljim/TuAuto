<?php

if (!isset($_SESSION)) {
  session_start();
}
 
//require_once ("conex.php");
include("conex.php");

//mysql_select_db($bd_base, $conex); 

//echo '<select name="puertas" id="puertas" onchange="showselect5(this.value)">';

/*$consulta= "SELECT DISTINCT vehiculo.cod_puertas, puertas.cod_puertas, puertas.puertas, vehiculo.cod_transmision FROM vehiculo, puertas WHERE vehiculo.cod_puertas=puertas.cod_puertas AND vehiculo.cod_pais=".$_SESSION['pais'].""; */

$consulta= "SELECT * FROM puertas";
$resultadoPuertas = mysqli_query($conex, $consulta) or die (mysqli_error());

$puertas=array();
$idPuertas = array();
$i=1;
$opPuertas = '';

while($resultPuertas = mysqli_fetch_array($resultadoPuertas)){
    //$codMarcas = $resultMarcas['cod_marca'];
    //$marcas = $resultMarcas['marca'];

    $idPuertas[$i]= $resultPuertas['cod_puertas'];
    $puertas[$i]= $resultPuertas['puertas'];
    $opPuertas .= "<option value='".$idPuertas[$i]."'>".$puertas[$i]."</option>";

    $i++;

}

mysqli_close($conex);
?>