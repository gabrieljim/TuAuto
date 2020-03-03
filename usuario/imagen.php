<?php
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

if (file_exists("../imagenes/fotos/" . $_FILES["file"]["name"])) {
  echo $_FILES["file"]["name"] . " <span id='invalid'><b>Archivo ya existe.</b></span> ";
} else {
  $sourcePath = $_FILES['file']['tmp_name']; // Ruta del fichero
  $targetPath = "../imagenes/fotos/" . $_FILES['file']['name']; // Destino de la imagen cargada
  move_uploaded_file($sourcePath, $targetPath); // Mover el fichero a destino

  /*echo "<span id='success'>Imagen subida satisfactoriamente...!!</span><br/>";
echo "<br/><b>Arhivo:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Tipo:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Tamaño:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Archivo temporal:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/
}

/*creamos las variables necesarias*/

$foto = "imagenes/fotos/" . $_FILES['file']['name'];
$usuario = $_SESSION['usuario'];

/*Actualizamos la ruta de la imagen en la base de datos*/


mysqli_query($conex, "UPDATE usuario SET foto='$foto' WHERE correo = '$usuario'");

mysqli_close($conex);

$_SESSION['imagen'] = $foto;

header('Location: ../usuario.php');
