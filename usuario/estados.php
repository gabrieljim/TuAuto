<?php

if (!isset($_SESSION)) {
  session_start();
}
 
//require_once ("consultas/conex.php");

include("consultas/conex.php");

$pais=$_SESSION['pais'];


$sql_esta= "SELECT * FROM estados WHERE cod_pais=$pais";

$esta= mysqli_query($conex,$sql_esta);


while($fila = mysqli_fetch_array($esta)){	
		
			echo "<option value='".$fila['cod_estado']."'>".$fila['estado']."</option>";
		
	}

mysqli_close($conex);


?>