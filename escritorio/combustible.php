<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$comb= "SELECT * FROM combustible"; 

$resultadoComb= mysqli_query($conex, $comb) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoComb)){	
		
			
			echo "<option value='".$fila['cod_combustible']."'>".$fila['combustible']."</option>";
		
	}

mysqli_close($conex);

?>
