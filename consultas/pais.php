<?php

if (!isset($_SESSION)) {
  session_start();
}
 
//require_once ("conex.php");

include("conex.php");

//mysql_select_db($bd_base, $conex); 

/*echo '<select name="modelo" id="mod" onchange="showselect4(this.value)">';*/

/*$consulta= "SELECT * FROM vehiculo, modelo WHERE vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_pais=".$_SESSION['pais']."";*/

$consulta= "SELECT * FROM pais";
$resultado_pais = mysqli_query($conex,$consulta) or die (mysqli_error());

/*echo '<option value="">MODELO</option>';

while($fila = mysqli_fetch_array($resultado)){	
		if($fila['cod_marca'] == $_GET['c']){
			echo "<option value='".$fila['cod_modelo']."'>".strtoupper($fila['modelo'])."</option>";
		}
	}*/
//mysqli_close($conex);
/*echo '</select>'*/;
?>