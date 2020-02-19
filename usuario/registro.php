<?php
if (!isset($_SESSION)) {
    session_start();
}

include("../consultas/conex.php");
include("funciones.php");

/*Revisamos si el registro es realiado por un usuario desde el site o si lo realiza un administrador*/

if (isset($_GET['admin'])) {

    /*Generamos una nueva clave*/

    function generar_clave($longitud)
    {
        $cadena = "[^A-Z0-9]";
        return substr(eregi_replace($cadena, "", rand()) .
            eregi_replace($cadena, "", rand()) .
            eregi_replace($cadena, "", rand()),
            0, $longitud);
    }

    $claven = (generar_clave(6));

    /*Registramos los datos en la base de datos*/

    $insertSQL = sprintf("INSERT INTO usuario (correo, razon, nombre, apellido, clave, telefono1, telefono2, rif, direccion, cod_ciudad, cod_estado, tipo_merca, valido, activo, tipo_usuario) VALUES (%s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",

        GetSQLValueString($_POST['correo'], "text"),
        GetSQLValueString($_POST['razon'], "text"),
        GetSQLValueString($_POST['nombre'], "text"),
        GetSQLValueString($_POST['apellido'], "text"),
        GetSQLValueString(md5($claven), "text"),
        GetSQLValueString($_POST['telefono1'], "text"),
        GetSQLValueString($_POST['telefono2'], "text"),
        GetSQLValueString($_POST['rif'], "text"),
        GetSQLValueString($_POST['direccion'], "text"),
        GetSQLValueString($_POST['ciudad'], "int"),
        GetSQLValueString($_POST['estado'], "estado"),
        GetSQLValueString($_POST['merca'], "int"),
        GetSQLValueString(2, "int"),
        GetSQLValueString(1, "int"),
        GetSQLValueString($_POST['tipo_usuario'], "int"));


    $Result1 = mysqli_query($conex, $insertSQL) or die(mysqli_error($conex));
    mysqli_close($conex);

    $correo = $_POST['correo'];

    /*Enviamos al correo del usuario la información para validaión de email el usuario*/

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "no_contestar@chexpress.com";
    $to = $correo;
    $subject = "Checking PHP mail";
    $message = "Un administrador del sistema ha creado una cuenta para que pueda acceder a nuestro sistema con los siguientes datos: usuario " . $_POST['correo'] . " y contraseña: " . $claven . " por favor entra a este link para que puedas confirmar tu correo electrónico https://tecnofep.com.ve/ch/system/usuario/validacion.php?correo=" . $_POST['correo'];
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);


    header('Location: ../index.php?creado=true');


} else {

    /*Registramos los datos en la base de datos*/

    $insertSQL = sprintf("INSERT INTO usuario (correo, razon, clave, cod_pais, cod_ciudad, cod_estado, tipo_merca, valido, activo, tipo_usuario) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",

        GetSQLValueString($_POST['correo'], "text"),
        GetSQLValueString($_POST['nombre_apellido'], "text"),
        GetSQLValueString(md5($_POST['clave']), "text"),
        GetSQLValueString($_SESSION['pais'], "int"),
        GetSQLValueString(1, "int"),
        GetSQLValueString(1, "int"),
        GetSQLValueString(1, "int"),
        GetSQLValueString(2, "int"),
        GetSQLValueString(1, "int"),
        GetSQLValueString(3, "int"));


    $Result1 = mysqli_query($conex, $insertSQL) or die(mysqli_error($conex));
    mysqli_close($conex);

    $correo = $_POST['correo'];

    /*Enviamos correo para validaión de email el usuario*/

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "no_contestar@tuautoweb.com";
    $to = $correo;
    $subject = "Checking PHP mail";
    $message = "https://tuautoweb.com/usuario/validacion.php?correo=" . $correo;
    $headers = "From:" . $from;
    mail($to, $subject, $message, $headers);


    header('Location: ../index.php?registro=true');

}

?>