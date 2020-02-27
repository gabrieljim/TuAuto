<?php

/**
 * Created by PhpStorm.
 * User: valen
 * Date: 2/7/2019
 * Time: 17:46
 */
if (!isset($_SESSION)) {
    session_start();
}

include("consultas/conex.php");


#funcion para redimencionar la imagen 
function redimensionarImagen($origin, $destino, $newWidth, $newHeight, $jpgQuality = 100)
{
    // getimagesize devuelve un array con: anchura,altura,tipo,cadena de 
    // texto con el valor correcto height="yyy" width="xxx"
    $datos = getimagesize($origin);
    // comprobamos que la imagen sea superior a los tamaños de la nueva imagen
    if ($datos[0] > $newWidth || $datos[1] > $newHeight) {

        // creamos una nueva imagen desde el original dependiendo del tipo
        if ($datos[2] == 1)
            $img = imagecreatefromjpg($origin);
        if ($datos[2] == 2)
            $img = imagecreatefromjpeg($origin);
        if ($datos[2] == 3)
            $img = imagecreatefrompng($origin);

        // Redimensionamos proporcionalmente
        if (rad2deg(atan($datos[0] / $datos[1])) > rad2deg(atan($newWidth / $newHeight))) {
            $anchura = $newWidth;
            $altura = round(($datos[1] * $newWidth) / $datos[0]);
        } else {
            $altura = $newHeight;
            $anchura = round(($datos[0] * $newHeight) / $datos[1]);
        }

        // creamos la imagen nueva
        $newImage = imagecreatetruecolor($anchura, $altura);

        // redimensiona la imagen original copiandola en la imagen
        imagecopyresampled($newImage, $img, 0, 0, 0, 0, $anchura, $altura, $datos[0], $datos[1]);

        // guardar la nueva imagen redimensionada donde indica $destino
        if ($datos[2] == 1)
            imagejpg($newImage, $destino);
        if ($datos[2] == 2)
            imagejpeg($newImage, $destino, $jpgQuality);
        if ($datos[2] == 3)
            imagepng($newImage, $destino);

        // eliminamos la imagen temporal
        imagedestroy($newImage);

        return true;
    }
    return false;
}



$usuario = $_SESSION['usuario'];
//los valores vienen en string, se cambian a int con settype
$pais =         (int) $_SESSION['pais'];
$estado =       (int) $_POST['estado'];
$marca =        (int) $_POST['marca'];
$modelo =       (int) $_POST['modelo'];
$combust =      (int) $_POST['combust'];
$puertas =      (int) $_POST['puertas'];
$tipodirec =    (int) $_POST['tipodirec'];
$ano =          (int) $_POST['ano'];
$tipovehi =     (int) $_POST['tipovehi'];
$color =        (int) $_POST['color'];
$transm =       (int) $_POST['transm'];
$condic =       (int) $_POST['condic'];
$descrip =      $_POST['descrip'];
$km =           (int) $_POST['km'];
$precio =       (float) $_POST['precio'];
$finan =        (int) $_POST['finan'];
$activo =       (int) $_POST['activo'];
$negociable =   (int) $_POST['negociable'];
$tipo_publicacion =   (int) $_POST['publicationType'];


$destination_path = getcwd() . DIRECTORY_SEPARATOR;
$dir_subida = 'fotos' . DIRECTORY_SEPARATOR . 'vehi' . DIRECTORY_SEPARATOR . $usuario . DIRECTORY_SEPARATOR;
$dir_image = "fotos/vehi/$usuario/";

if (!file_exists($dir_subida)) {
    mkdir($dir_subida, 0777, true);
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"][0])) {
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"][0] == "image/jpeg" || $_FILES["userfile"]["type"][0] == "image/pjpeg" || $_FILES["userfile"]["type"][0] == "image/gif" || $_FILES["userfile"]["type"][0] == "image/bmp" || $_FILES["userfile"]["type"][0] == "image/png") {
        $origin = $_FILES["userfile"]["tmp_name"][0];
        $destinoTemporal = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][0]);
        //$destino = move_uploaded_file($origin, $destinoTemporal);
        $imagen1 = $dir_image . basename($_FILES["userfile"]["name"][0]);
        move_uploaded_file($origin, $destinoTemporal);
    }
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"][1])) {
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"][1] == "image/jpeg" || $_FILES["userfile"]["type"][1] == "image/pjpeg" || $_FILES["userfile"]["type"][1] == "image/gif" || $_FILES["userfile"]["type"][1] == "image/bmp" || $_FILES["userfile"]["type"][1] == "image/png") {
        $tmp_name = $_FILES["userfile"]["tmp_name"][1];
        $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][1]);
        $imagen2 = $dir_image . basename($_FILES["userfile"]["name"][1]);
        move_uploaded_file($tmp_name, $name);
    }
} else {
    $imagen2 = "";
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"][2])) {
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"][2] == "image/jpeg" || $_FILES["userfile"]["type"][2] == "image/pjpeg" || $_FILES["userfile"]["type"][2] == "image/gif" || $_FILES["userfile"]["type"][2] == "image/bmp" || $_FILES["userfile"]["type"][2] == "image/png") {
        $tmp_name = $_FILES["userfile"]["tmp_name"][2];
        $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][2]);
        $imagen3 = $dir_image . basename($_FILES["userfile"]["name"][2]);
        move_uploaded_file($tmp_name, $name);
    }
} else {
    $imagen3 = "";
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"][3])) {
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"][3] == "image/jpeg" || $_FILES["userfile"]["type"][3] == "image/pjpeg" || $_FILES["userfile"]["type"][3] == "image/gif" || $_FILES["userfile"]["type"][3] == "image/bmp" || $_FILES["userfile"]["type"][3] == "image/png") {
        $tmp_name = $_FILES["userfile"]["tmp_name"][3];
        $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][3]);
        $imagen4 = $dir_image . basename($_FILES["userfile"]["name"][3]);
        move_uploaded_file($tmp_name, $name);
    }
} else {
    $imagen4 = "";
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"][4])) {
    # verificamos el formato de la imagen
    if ($_FILES["userfile"]["type"][4] == "image/jpeg" || $_FILES["userfile"]["type"][4] == "image/pjpeg" || $_FILES["userfile"]["type"][4] == "image/gif" || $_FILES["userfile"]["type"][4] == "image/bmp" || $_FILES["userfile"]["type"][4] == "image/png") {
        $tmp_name = $_FILES["userfile"]["tmp_name"][4];
        $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][4]);
        $imagen5 = $dir_image . basename($_FILES["userfile"]["name"][4]);
        move_uploaded_file($tmp_name, $name);
    }
} else {
    $imagen5 = "";
}


# Agregamos la imagen a la base de datos
$sql = "INSERT INTO `vehiculo` (`cod_vehiculo`, `usuario`, `cod_marca`, `cod_modelo`, `cod_combustible`, `cod_puertas`, `cod_ano`, `cod_tipo`, `cod_color`, `cod_transmision`, `cod_tipov`, `cod_pais`, `cod_estado`, `cod_provincia`, `cod_dir`, `km`, `precio`, `descripcion`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `activo`, `premiun`, `financiamiento`, `negociable`, `tipo_publicacion`) VALUES (null,'$usuario', '$marca', '$modelo', '$combust', '$puertas', '$ano', '$condic', '$color', '$transm', '$tipovehi', '$pais', '$estado', 1, '$tipodirec', '$km', '$precio', '$descrip', '$imagen1', '$imagen2', '$imagen3', '$imagen4', '$imagen5', '$activo', 1, '$finan', '$negociable', $tipo_publicacion)";
mysqli_query($conex, $sql) or die(mysqli_error($conex));

header('Location: /escritorio.php');
mysqli_close($conex);
