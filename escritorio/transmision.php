<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$trans= "SELECT * FROM transmision"; 

$resultadoTrans= mysqli_query($conex, $trans) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoTrans)){	
		
			
			echo "<option value='".$fila['cod_transmision']."'>".$fila['transmision']."</option>";
		
	}

mysqli_close($conex);

?>
