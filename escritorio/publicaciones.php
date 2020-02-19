<?php

if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");

//mysql_select_db($bd_base, $con);

//consulta todos los empleados

$usuario=$_SESSION['usuario'];

//$query = "SELECT * FROM `vehiculo` WHERE vehiculo.usuario = '$usuario'";
//$query = "SELECT ano, marca, km, precio, modelo FROM ((( vehiculo INNER JOIN ano ON ano.cod_ano) INNER JOIN marca ON marca.cod_marca) INNER JOIN modelo ON modelo.cod_modelo) WHERE vehiculo.usuario = '$usuario'";
$query = "SELECT DISTINCT ano.ano, marca.marca, modelo.modelo, vehiculo.imagen1, vehiculo.precio, vehiculo.km, vehiculo.cod_vehiculo FROM ano,marca,modelo,vehiculo,usuario WHERE vehiculo.cod_ano=ano.cod_ano AND vehiculo.cod_marca=marca.cod_marca AND vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.usuario='$usuario'";
$publi = mysqli_query($conex,$query);
// $publi=mysqli_query($conex, "SELECT DISTINCT ano.cod_ano, ano.ano, marca.cod_marca, marca.marca, modelo.cod_modelo, modelo.modelo, tipo.cod_tipo, tipo.tipo, vehiculo.imagen1, vehiculo.precio, vehiculo.km, vehiculo.cod_vehiculo FROM ano,marca,modelo,tipo,vehiculo, usuario WHERE vehiculo.cod_ano=ano.cod_ano AND vehiculo.cod_marca=marca.cod_marca AND vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_tipo=tipo.cod_tipo AND vehiculo.usuario='$usuario'") or die (mysqli_error($conex));

mysqli_close($conex);
?>
