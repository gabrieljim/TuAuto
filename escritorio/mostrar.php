<?php

if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");

$vehiculo=$_GET['c'];
//$vehiculo=1;	

$vehi= "SELECT * FROM vehiculo WHERE cod_vehiculo='$vehiculo'"; 

$resultadoVehi= mysqli_query($conex, $vehi) or die (mysqli_error());

$filaV = mysqli_fetch_array($resultadoVehi);
var_dump($filaV);

//print json_encode($filaV);

//echo $filaV['descripcion'];

//while($fila = mysqli_fetch_array($resultadoVehi)){	
		
	/*echo'		
	
	

	
	/*';*/

		


mysqli_close($conex);
	
//}

?>
