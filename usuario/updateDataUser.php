<?php
session_start();
include('../consultas/conex.php');

extract($_POST);

$correo = $_SESSION['usuario'];

//para tipo_cliente, 0 es usuario, 1 es empresa
$query = "UPDATE usuario SET 
        nombre='$name', 
        apellido='$lastname', 
        telefono2='$cellphone', 
        cedula='$document', 
        direccion='$address', 
        rellenado=1, 
        tipo_cliente=0 
    WHERE correo='$correo'";

$result = mysqli_query($conex, $query) or die(mysqli_error($conex));
if ($result) {
    $_SESSION['rellenado'] = 1;
}

header('Location: /escritorio.php');
die();
