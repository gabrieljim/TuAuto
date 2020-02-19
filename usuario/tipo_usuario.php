<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");




$sql_tipo= "SELECT * FROM tipo_usuario";

$tipo_usuario= mysqli_query($conex,$sql_tipo);


while($fila = mysqli_fetch_array($tipo_usuario)){	
		
			echo "<option value='".$fila['cod']."'>".$fila['tipo']."</option>";
		
	}

mysqli_close($conex);




?>