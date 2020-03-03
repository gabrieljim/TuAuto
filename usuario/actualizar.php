<?php
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

$usuario = $_SESSION['usuario'];

/*Acualización de datos de usuario*/
if ($_POST['cliente'] == "empresa") {
  extract($_POST);

  mysqli_query($conex, "UPDATE usuario SET nombre = '$nombre', nombre_fantasia = '$nombrefantasia', local=$local, telefono1='$telefono1', telefono2='$telefono2',  direccion='$direccion' WHERE correo='$usuario'") or die(mysqli_error($conex));

  mysqli_close($conex);

  header('Location: ../usuario.php?actualizo=true');
  die();
}

/*Tomamos todas las variables*/

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono1 = $_POST['telefono1'];
$telefono2 = $_POST['telefono2'];
$pais = $_POST['pais'];
$direccion = $_POST['direccion'];
$estado = $_POST['es'];


/*Actualizamos los datos*/


mysqli_query($conex, "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', telefono1='$telefono1', telefono2='$telefono2', cod_pais='$rif', direccion='$direccion', cod_estado='$estado' WHERE correo = '$usuario'");

mysqli_close($conex);

header('Location: ../usuario.php?actualizo=true');
