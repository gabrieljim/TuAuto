<?php

if (!isset($_SESSION)) {
  session_start();
}
//Desarrollado por Jesus Li��n
//ribosomatic.com
//Puedes hacer lo que quieras con el c�digo
//pero visita la web cuando te acuerdes

//Configuracion de la conexion a base de datos
include("conex.php");

//mysql_select_db($bd_base, $con);

//Variables de busqueda

$ubicacion=$_GET['ubi'];
$tipo=$_GET['tipo'];
$marca=$_GET['marca'];
$modelo=$_GET['modelo'];
$transmision=$_GET['trans'];
$row = '';


$consulta = "SELECT * FROM vehiculo INNER JOIN marca  INNER JOIN modelo INNER JOIN ano ON vehiculo.cod_marca=marca.cod_marca AND vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_ano=ano.cod_ano  AND vehiculo.cod_pais=".$_SESSION['pais']." WHERE vehiculo.cod_estado=".$ubicacion." AND vehiculo.cod_tipov=".$tipo." AND vehiculo.cod_marca=".$marca." AND vehiculo.cod_modelo=".$modelo." AND vehiculo.cod_transmision=".$transmision."";
$sql = mysqli_query($conex,$consulta) or die (mysqli_error());

// var_dump($sql);
//muestra los datos consultados

while($row = mysqli_fetch_array($sql)){    
	
echo  "<div class='card-deck'>\n";
	
echo  "<div class='card huj mt-4 mb-2' style='width: 18rem;'>\n";
	
echo  "<img class='im' src='".$row['imagen1']."'>\n";
	
echo  "<div class='card-body'>\n";
	
echo  "<strong class='card-title tam'>".number_format($row['precio'],2, ",", ".")." USD</strong>\n";
	
echo  "<p>".$row['ano']." | ".number_format($row['km'],0, ".", ".")." Km</p>\n";
	
echo  "<p>".$row['marca']." ".$row['modelo']."</p>\n";
	
echo  "<button class='fuentebold' style='width: 60% !important' onclick='abre(".$row['cod_vehiculo'].")' >Mostrar</button></a>\n";
	
echo  "</div>\n";
	
echo  "</div>\n";
	
echo  "</div>\n";	

}


?>
