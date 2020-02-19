<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("consultas/conex.php");
include("usuario/funciones.php");


/*Consulta de todos los datos del usuario actualmente activo en sesion*/

$usuario=$_SESSION['usuario'];

$sql_usuario= "SELECT * FROM usuario, tipo_usuario, estados WHERE estados.cod_estado=usuario.cod_estado AND tipo_usuario.cod=usuario.tipo_usuario AND usuario.correo='$usuario'";

$resultado= mysqli_query($conex,$sql_usuario);

$row_user= mysqli_fetch_array($resultado);



mysqli_close($conex);




?>