<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");




$sql_mercancia= "SELECT * FROM mercancia";

$mercancia= mysqli_query($conex,$sql_mercancia);

//$row_mercancia= mysqli_fetch_array($mercancia);

while($fila = mysqli_fetch_array($mercancia)){	
		
			echo "<option value='".$fila['cod_mercancia']."'>".$fila['mercancia']."</option>";
		
	}

mysqli_close($conex);




?>