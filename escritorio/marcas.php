<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");


$pais = $_SESSION['pais'];
var_dump($pais);

$marca= "SELECT * FROM marca WHERE cod_pais=$pais"; 

$resultadoMarca= mysqli_query($conex, $marca) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultadoMarca)){	
		
			
		echo "<option name='marca' value='".$fila['cod_marca']."'>".$fila['marca']."</option>";
		
	}

mysqli_close($conex);

?>
