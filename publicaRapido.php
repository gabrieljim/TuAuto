<?php

if (!isset($_SESSION)) {
    session_start();
}
try {


    include("consultas/conex.php");

    //guardar los datos del usuario que se esta registrando
    $correo     = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $pais       = (int) $_SESSION['pais'];
    $direccion  = $_POST['direccion'];
    $telefono   = $_POST['nroTelefono'];


    $insertSQL = "INSERT INTO `usuario` (`correo`, `razon`, `nombre`, `apellido`, `clave`, `telefono1`, `telefono2`, `rif`, `cedula`, `direccion`, `cod_ciudad`, `cod_pais`, `cod_estado`, `tipo_merca`, `foto`, `valido`, `activo`, `tipo_usuario`) VALUES ('$correo', '', '', '', '$contrasena', '$telefono', '', '', '', '$direccion', 1, '$pais', 1, 1, '', 1, 1, 3)";
    $result1 = mysqli_query($conex, $insertSQL) or die(mysqli_error($conex));

    /*Enviamos correo para validaión de email el usuario*/

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "no_contestar@tuautoweb.com";
    $to = $correo;
    $subject = "Checking PHP mail";
    $message = "https://tuautoweb.com/usuario/validacion.php?correo=" . $correo;
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);


    //guardar los datos del carro en la base de datos 
    $marca      = (int) $_POST['marca'];
    $modelo     = (int) $_POST['modelo'];
    $ano        = (int) $_POST['ano'];
    $km         = (int) $_POST['km'];
    $precio     = (float) $_POST['precio'];
    $matricula  = $_POST['mtr'];
    $observaciones = $_POST['observaciones'];

    //Funcion para guardar las fotos del carro
    $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    $dir_subida = 'fotos' . DIRECTORY_SEPARATOR . 'vehi' . DIRECTORY_SEPARATOR . $correo . DIRECTORY_SEPARATOR;
    $dir_image = "fotos/vehi/$correo/";

    if (!file_exists($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    }

    if (is_uploaded_file($_FILES["photosCar"]["tmp_name"][0])) {
        # verificamos el formato de la imagen
        if ($_FILES["photosCar"]["type"][0] == "image/jpeg" || $_FILES["photosCar"]["type"][0] == "image/pjpeg" || $_FILES["photosCar"]["type"][0] == "image/gif" || $_FILES["photosCar"]["type"][0] == "image/bmp" || $_FILES["photosCar"]["type"][0] == "image/png") {
            $origin = $_FILES["photosCar"]["tmp_name"][0];
            $destinoTemporal = $destination_path . $dir_subida . basename($_FILES["photosCar"]["name"][0]);
            //$destino = move_uploaded_file($origin, $destinoTemporal);
            $imagen1 = $dir_image . basename($_FILES["photosCar"]["name"][0]);
            move_uploaded_file($origin, $destinoTemporal);
        }
    }

    if (!empty($_FILES["photosCar"]["tmp_name"][1])) {
        # verificamos el formato de la imagen
        if ($_FILES["photosCar"]["type"][1] == "image/jpeg" || $_FILES["photosCar"]["type"][1] == "image/pjpeg" || $_FILES["photosCar"]["type"][1] == "image/gif" || $_FILES["photosCar"]["type"][1] == "image/bmp" || $_FILES["photosCar"]["type"][1] == "image/png") {
            $tmp_name = $_FILES["photosCar"]["tmp_name"][1];
            $name = $destination_path . $dir_subida . basename($_FILES["photosCar"]["name"][1]);
            $imagen2 = $dir_image . basename($_FILES["photosCar"]["name"][1]);
            move_uploaded_file($tmp_name, $name);
        }
    } else {
        $imagen2 = "";
    }

    if (!empty($_FILES["photosCar"]["tmp_name"][2])) {
        # verificamos el formato de la imagen
        if ($_FILES["photosCar"]["type"][2] == "image/jpeg" || $_FILES["photosCar"]["type"][2] == "image/pjpeg" || $_FILES["photosCar"]["type"][2] == "image/gif" || $_FILES["photosCar"]["type"][2] == "image/bmp" || $_FILES["photosCar"]["type"][2] == "image/png") {
            $tmp_name = $_FILES["photosCar"]["tmp_name"][2];
            $name = $destination_path . $dir_subida . basename($_FILES["photosCar"]["name"][2]);
            $imagen3 = $dir_image . basename($_FILES["photosCar"]["name"][2]);
            move_uploaded_file($tmp_name, $name);
        }
    } else {
        $imagen3 = "";
    }

    if (!empty($_FILES["photosCar"]["tmp_name"][3])) {
        # verificamos el formato de la imagen
        if ($_FILES["photosCar"]["type"][3] == "image/jpeg" || $_FILES["photosCar"]["type"][3] == "image/pjpeg" || $_FILES["photosCar"]["type"][3] == "image/gif" || $_FILES["photosCar"]["type"][3] == "image/bmp" || $_FILES["photosCar"]["type"][3] == "image/png") {
            $tmp_name = $_FILES["photosCar"]["tmp_name"][3];
            $name = $destination_path . $dir_subida . basename($_FILES["photosCar"]["name"][3]);
            $imagen4 = $dir_image . basename($_FILES["photosCar"]["name"][3]);
            move_uploaded_file($tmp_name, $name);
        }
    } else {
        $imagen4 = "";
    }

    if (!empty($_FILES["photosCar"]["tmp_name"][4])) {
        # verificamos el formato de la imagen
        if ($_FILES["photosCar"]["type"][4] == "image/jpeg" || $_FILES["photosCar"]["type"][4] == "image/pjpeg" || $_FILES["photosCar"]["type"][4] == "image/gif" || $_FILES["photosCar"]["type"][4] == "image/bmp" || $_FILES["photosCar"]["type"][4] == "image/png") {
            $tmp_name = $_FILES["photosCar"]["tmp_name"][4];
            $name = $destination_path . $dir_subida . basename($_FILES["photosCar"]["name"][4]);
            $imagen5 = $dir_image . basename($_FILES["photosCar"]["name"][4]);
            move_uploaded_file($tmp_name, $name);
        }
    } else {
        $imagen5 = "";
    }



    # Agregamos la imagen y los demas datos a la base de datos
    $sql = "INSERT INTO `vehiculo` (`cod_vehiculo`, `usuario`, `cod_marca`, `cod_modelo`, `cod_combustible`, `cod_puertas`, `cod_ano`, `cod_tipo`, `cod_color`, `cod_transmision`, `cod_tipov`, `cod_pais`, `cod_estado`, `cod_provincia`, `cod_dir`, `matricula`, `observaciones`, `km`, `precio`, `descripcion`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `activo`, `premiun`, `financiamiento`, `negociable`) VALUES (null,'$correo', '$marca', '$modelo', 1, 2, '$ano', 1, 1, 1, 1, '$pais', 1, 1, 1,'$matricula', '$km', '$precio', '', '$imagen1', '$imagen2', '$imagen3', '$imagen4', '$imagen5', 1, 1, 1, 1)";
    $result1 = mysqli_query($conex, $sql) or die(mysqli_error($conex));
} catch (Exception $e) {
    echo 'asdaskldj' . $e;
}

header('Location: /index.php');
