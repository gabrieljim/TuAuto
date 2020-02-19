<?php


if (!isset($_SESSION)) {
  session_start();
}
 
include("conex.php");

$pais=$_SESSION['pais'];

$consulta= "SELECT * FROM marca WHERE cod_pais=$pais";
$resultado= mysqli_query($conex, $consulta) or die (mysqli_error());

echo '<select name="ma" id="ma" onchange="showModelo(this.value)"><option value="">MARCA</option>';
while($fila = mysqli_fetch_array($resultado)){	
		
			echo "<option value='".$fila['cod_marca']."'>".mb_strtoupper($fila['marca'], 'UTF-8')."</option>";
		
	}

	echo '</select>';
?>