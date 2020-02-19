<?php

if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");


$marca=$_GET['c'];

$consulta= "SELECT * FROM modelo WHERE cod_marca='$marca'"; 
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultado)){	
		
			
			echo "<option value='".$fila['cod_modelo']."'>".$fila['modelo']."</option>";
		
	}

mysqli_close($conex);

?>


