<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

$pais=$_SESSION['pais'];


$sql_pais= "SELECT * FROM pais WHERE cod_pais=".$pais;

$pais= mysqli_query($conex,$sql_pais);



while($fila = mysqli_fetch_array($pais)){	
		
			echo "<option value='".$fila['cod_pais']."'>".$fila['pais']."</option>";
		
	}

mysqli_close($conex);




?>