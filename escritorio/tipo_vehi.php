<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$tipo= "SELECT * FROM tipo_vehiculo"; 

$resultadoTipo= mysqli_query($conex, $tipo) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoTipo)){	
		
			
			echo "<option value='".$fila['cod_tipov']."'>".$fila['tipov']."</option>";
		
	}

mysqli_close($conex);

?>
