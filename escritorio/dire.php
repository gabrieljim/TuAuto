<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$ano= "SELECT * FROM dirvolante"; 

$resultadoAno= mysqli_query($conex, $ano) or die (mysqli_error($conex));


while($fila = mysqli_fetch_array($resultadoAno)){	
		
			
			echo "<option value='".$fila['cod_dire']."'>".$fila['dirvolante']."</option>";
		
	}

mysqli_close($conex);
