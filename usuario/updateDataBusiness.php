<?php
session_start();
include('../consultas/conex.php');

extract($_POST);

$correo = $_SESSION['usuario'];

//para tipo_cliente, 0 es usuario, 1 es empresa
$query = "UPDATE usuario SET 
        nombre='$name', 
        rut='$rut', 
        local='$local', 
        telefono1='$telefono1', 
        telefono2='$telefono2', 
        direccion='$address', 
        nombre_fantasia='$nombrefantasia',
        rellenado=1, 
        tipo_cliente=1 
    WHERE correo='$correo'";

$result = mysqli_query($conex, $query) or die(mysqli_error($conex));
if ($result) {
    $_SESSION['rellenado'] = 1;
    $_SESSION["tipo_cliente"] = 'Empresa';
}

header('Location: /escritorio.php');
die();
