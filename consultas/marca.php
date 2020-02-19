<?php
if (!isset($_SESSION)) {
  session_start();
}

include("conex.php");

$pais=$_SESSION['pais'];
$marca= "SELECT * FROM marca WHERE cod_pais=$pais"; 

$resultadoMarca= mysqli_query($conex, $marca) or die (mysqli_error($conex));

$marcas=array();
$idMarcas = array();
$i=1;
$opMarcas = '';

while($resultMarcas = mysqli_fetch_array($resultadoMarca)){
  //$codMarcas = $resultMarcas['cod_marca'];
  //$marcas = $resultMarcas['marca'];
	
  	$idMarcas[$i]= $resultMarcas['cod_marca']; 
  	$marcas[$i]= $resultMarcas['marca'];	
	$opMarcas .= "<option value='".$idMarcas[$i]."'>".$marcas[$i]."</option>";

	$i++;
	
} 


mysqli_close($conex);
?>