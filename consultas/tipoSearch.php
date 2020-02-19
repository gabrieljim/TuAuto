<?php


if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

$consulta= "SELECT * FROM tipo_vehiculo";
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());

echo '<select name="ti" id="ti"><option value="">TIPO</option>';


while($fila = mysqli_fetch_array($resultado)){	
		
	echo "<option value='".$fila['cod_tipov']."'>".mb_strtoupper($fila['tipov'], 'UTF-8')."</option>";
		
	}

mysqli_close($conex);

echo '</select>';
?>