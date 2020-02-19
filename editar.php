<?php 

if (!isset($_SESSION)) {
    session_start();
}

include("consultas/conex.php");
//los valores vienen en string, se cambian a int con settype
//var_dump($_POST);

$vehiculo =     (int) $_POST['vehiculo'];
$usuario =       $_SESSION['usuario'];
$pais =         (int) $_SESSION['pais'];
$estado =       (int) $_POST['estado'];
$marca =        (int) $_POST['marca'];
$modelo =       (int) $_POST['modelo'];
$combust =      (int) $_POST['combust'];
$puertas =      (int) $_POST['puertas'];
$tipodirec =    (int) $_POST['tipodirec'];
$ano =          (int) $_POST['ano'];
$tipovehi =     (int) $_POST['tipovehi'];
$estadovehi =   (int) $_POST['estado'];
$color =        (int) $_POST['color'];
$transm =       (int) $_POST['transm'];
$condic =       (int) $_POST['condic'];
$descrip =      $_POST['descrip'];
$km =           (int) $_POST['km'];
$precio =       (float) $_POST['precio'];
$finan =        (int) $_POST['finan'];
$activo =       (int) $_POST['activo'];
$negociable =   (int) $_POST['negociable'];


//saber cuando se subio una imagen 

if(empty($_FILES["userfile"]) == true){

    $destination_path = getcwd().DIRECTORY_SEPARATOR;
    $dir_subida = 'fotos'.DIRECTORY_SEPARATOR.'vehi'. DIRECTORY_SEPARATOR. $usuario . DIRECTORY_SEPARATOR;            
    $dir_image = "fotos/vehi/$usuario/";
    if (!file_exists($dir_subida)) {
        mkdir($dir_subida, 0777, true);
    } 

    if (is_uploaded_file($_FILES["userfile"]["tmp_name"][0]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"][0]=="image/jpeg" || $_FILES["userfile"]["type"][0]=="image/pjpeg" || $_FILES["userfile"]["type"][0]=="image/gif" || $_FILES["userfile"]["type"][0]=="image/bmp" || $_FILES["userfile"]["type"][0]=="image/png")
        {
            $origin = $_FILES["userfile"]["tmp_name"][0];
            $destinoTemporal = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][0]);
            //$destino = move_uploaded_file($origin, $destinoTemporal);
            $imagen1 = $dir_image . basename($_FILES["userfile"]["name"][1]);
            move_uploaded_file($origin, $destinoTemporal);

        }
    }

    if (is_uploaded_file($_FILES["userfile"]["tmp_name"][1]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"][1]=="image/jpeg" || $_FILES["userfile"]["type"][1]=="image/pjpeg" || $_FILES["userfile"]["type"][1]=="image/gif" || $_FILES["userfile"]["type"][1]=="image/bmp" || $_FILES["userfile"]["type"][1]=="image/png")
        {       
            $tmp_name = $_FILES["userfile"]["tmp_name"][1];
            $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][1]);
            $imagen2 = $dir_image . basename($_FILES["userfile"]["name"][1]);
            move_uploaded_file($tmp_name, $name);
        }
    }

    if (is_uploaded_file($_FILES["userfile"]["tmp_name"][2]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"][2]=="image/jpeg" || $_FILES["userfile"]["type"][2]=="image/pjpeg" || $_FILES["userfile"]["type"][2]=="image/gif" || $_FILES["userfile"]["type"][2]=="image/bmp" || $_FILES["userfile"]["type"][2]=="image/png")
        {
            $tmp_name = $_FILES["userfile"]["tmp_name"][2];
            $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][2]);
            $imagen3 = $dir_image . basename($_FILES["userfile"]["name"][2]);
            move_uploaded_file($tmp_name, $name);
        }
    }

    if (is_uploaded_file($_FILES["userfile"]["tmp_name"][3]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"][3]=="image/jpeg" || $_FILES["userfile"]["type"][3]=="image/pjpeg" || $_FILES["userfile"]["type"][3]=="image/gif" || $_FILES["userfile"]["type"][3]=="image/bmp" || $_FILES["userfile"]["type"][3]=="image/png")
        {
            $tmp_name = $_FILES["userfile"]["tmp_name"][3];
            $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][3]);
            $imagen4 = $dir_image . basename($_FILES["userfile"]["name"][3]);
            move_uploaded_file($tmp_name, $name);
        }
    }

    if (is_uploaded_file($_FILES["userfile"]["tmp_name"][4]))
    {
        # verificamos el formato de la imagen
        if ($_FILES["userfile"]["type"][4]=="image/jpeg" || $_FILES["userfile"]["type"][4]=="image/pjpeg" || $_FILES["userfile"]["type"][4]=="image/gif" || $_FILES["userfile"]["type"][4]=="image/bmp" || $_FILES["userfile"]["type"][4]=="image/png")
        {
            $tmp_name = $_FILES["userfile"]["tmp_name"][4];
            $name = $destination_path . $dir_subida . basename($_FILES["userfile"]["name"][4]);
            $imagen5 = $dir_image . basename($_FILES["userfile"]["name"][4]);
            move_uploaded_file($tmp_name, $name);
        }
    }
}else{
    $imagen1 =      $_POST['imagen1'];
    $imagen2 =      $_POST['imagen2'];
    $imagen3 =      $_POST['imagen3'];
    $imagen4 =      $_POST['imagen4'];
    $imagen5 =      $_POST['imagen5'];
}

# Actualizamos los datos en la base de datos
$sql= "UPDATE `vehiculo` SET `cod_marca` =  $marca, `cod_modelo` = $modelo, `cod_combustible` = $combust, `cod_puertas` = $puertas, `cod_ano` = $ano, `cod_tipo` = $estadovehi, `cod_color` = $color, `cod_transmision` = $transm, `cod_tipov` = $tipovehi, `cod_pais` = $pais, `cod_estado` = $estado, `cod_provincia` = 1, `cod_dir` = $tipodirec, `km` = $km, `precio` = $precio, `descripcion` = '$descrip', `imagen1` = '$imagen1', `imagen2` = '$imagen2', `imagen3` = '$imagen3', `imagen4` = '$imagen4', `imagen5` = '$imagen5', `activo` = $activo, `premiun` = 1, `financiamiento` = $finan, `negociable` = $negociable WHERE vehiculo.cod_vehiculo = $vehiculo";
mysqli_query($conex,$sql) or die (mysqli_error($conex));

header('Location: /escritorio.php');
mysqli_close($conex);

?>