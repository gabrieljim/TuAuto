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

//consulta todos los empleados

$sql=mysqli_query($conex, "SELECT * FROM ano,marca,modelo,tipo,vehiculo WHERE vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_tipo=tipo.cod_tipo and vehiculo.cod_pais=".$_SESSION['pais']."");

//muestra los datos consultados


while($row = mysqli_fetch_array($sql)){

	
echo  "<div class='card-deck fuentebold'>\n";
	
echo  "<div class='card huj mt-4 mb-2 fuentebold' style='width: 20rem;'>\n";
	
echo  "<img class='im'  src='".$row['imagen1']."'>\n";
	
echo  "<div class='card-body'>\n";
	
echo  "<strong class='card-title tam'>".number_format($row['precio'],2, ",", ".")." USD</strong>\n";
	
echo  "<p>".$row['ano']." | ".number_format($row['km'],0, ".", ".")." Km</p>\n";
	
echo  "<p>".$row['marca']." ".$row['modelo']."</p>\n";
	
echo  "<p>".$row['tipo']."</p>\n";
	
echo  "<button class=' col-md-8 fuentebold'  onclick='abre(".$row['cod_vehiculo'].")' >Mostrar</button></a>\n";
	
echo  "</div>\n";
	
echo  "</div>\n";
	
echo  "</div>\n";
	



}
?>
