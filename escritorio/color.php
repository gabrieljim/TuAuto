<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$ano= "SELECT * FROM color"; 

$resultadoAno= mysqli_query($conex, $ano) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoAno)){	
		
			
			echo "<option value='".$fila['cod_color']."'>".$fila['color']."</option>";
		
	}

mysqli_close($conex);

?>
