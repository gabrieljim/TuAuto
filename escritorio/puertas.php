<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$puertas= "SELECT * FROM puertas"; 

$resultadoPuertas= mysqli_query($conex, $puertas) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoPuertas)){	
		
			
			echo "<option value='".$fila['cod_puertas']."'>".$fila['puertas']."</option>";
		
	}

mysqli_close($conex);

?>
