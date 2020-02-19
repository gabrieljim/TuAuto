<?php 

if (!isset($_SESSION)) {
    session_start();
}

include("consultas/conex.php"); 

$vehiculo = (int) $_POST['vehiculo'];

$sql= "DELETE FROM vehiculo WHERE cod_vehiculo=$vehiculo";
mysqli_query($conex,$sql) or die (mysqli_error($conex));

header('Location: escritorio.php');
mysqli_close($conex);

?>