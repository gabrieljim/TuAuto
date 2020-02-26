<?php
session_start();
include('../consultas/conex.php');

extract($_POST);

$sql = "UPDATE usuario SET rellenado=0 WHERE correo='$user'";
$result = mysqli_query($conex, $sql) or die(mysqli_error($conex));

$_SESSION['rellenado'] = 0;

echo $result;
