<?php


if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

$idMarca = $_GET['c'];

$consulta= "SELECT * FROM modelo WHERE cod_marca = '$idMarca' ";
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());

echo '<select name="mod" id="mod">';
while($fila = mysqli_fetch_array($resultado)){	
		
		echo "<option value='".$fila['cod_modelo']."'>".mb_strtoupper($fila['modelo'], 'UTF-8')."</option>";
		
	}

mysqli_close($conex);

echo '</select>';
?>