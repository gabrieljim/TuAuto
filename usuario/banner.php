<?php
if (!isset($_SESSION)) {
    session_start();
}

include("../consultas/conex.php");
include("funciones.php");

$usuario = $_SESSION['usuario'];

if (file_exists("../imagenes/banner/" . $_FILES["fileBanner"]["name"])) {
    echo $_FILES["fileBanner"]["name"] . " <span id='invalid'><b>Archivo ya existe.</b></span> ";
} else {
    $sourcePath = $_FILES['fileBanner']['tmp_name']; // Ruta del fichero
    $targetPath = "../imagenes/banner/" . $_FILES['fileBanner']['name']; // Destino de la imagen cargada
    move_uploaded_file($sourcePath, $targetPath); // Mover el fichero a destino

    /*echo "<span id='success'>Imagen subida satisfactoriamente...!!</span><br/>";
echo "<br/><b>Arhivo:</b> " . $_FILES["file"]["name"] . "<br>";
echo "<b>Tipo:</b> " . $_FILES["file"]["type"] . "<br>";
echo "<b>Tamaño:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "<b>Archivo temporal:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/
}

/*creamos las variables necesarias*/

$foto = "imagenes/banner/" . $_FILES['fileBanner']['name'];
/*Actualizamos la ruta de la imagen en la base de datos*/


mysqli_query($conex, "UPDATE usuario SET foto_banner='$foto' WHERE correo = '$usuario'");

mysqli_close($conex);

$_SESSION['banner'] = $foto;

header('Location: ../usuario.php');
