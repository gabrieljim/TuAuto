<?php


if (!isset($_SESSION)) {
  session_start();
}
 
//require_once ("conex.php");
include("conex.php");

//mysql_select_db($bd_base, $conex); 

//echo '<select name="ubicacion" id="ubicacion">';

$consulta= "SELECT DISTINCT estados.cod_estado, estados.estado  FROM estados, vehiculo WHERE vehiculo.cod_estado=estados.cod_estado AND vehiculo.cod_pais=".$_SESSION['pais'].""; 
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());


while($fila = mysqli_fetch_array($resultado)){	
		
	echo "<option value='".$fila['cod_estado']."'>".mb_strtoupper($fila['estado'], 'UTF-8')."</option>";
		
	}

mysqli_close($conex);
?>