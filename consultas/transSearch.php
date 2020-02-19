<?php


if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

$consulta= "SELECT * FROM transmision";
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());

echo '<select name="tr" id="tr">
<option value="">TRANSMISIÓN</option>';
while($fila = mysqli_fetch_array($resultado)){	
		
	echo "<option value='".$fila['cod_transmision']."'>".mb_strtoupper($fila['transmision'], 'UTF-8')."</option>";
		
	}

mysqli_close($conex);

echo '</select>';
?>