<?php 


include("../consultas/conex.php");
include("funciones.php");


/*Enviamos correo para recuperar la clave en el sistema*/

/*Primero generamos una nueva clave*/

function generar_clave($longitud){ 
   $cadena="[^A-Z0-9]"; 
   return substr(eregi_replace($cadena, "", rand()) . 
   eregi_replace($cadena, "", rand()) . 
   eregi_replace($cadena, "", rand()), 
   0, $longitud); 
}

$claven=(generar_clave(6));

/*La encriptamos con md5*/

$clavenn=md5($claven);

/*tomamos el correo del usuario*/

$correo=$_POST['correo'];


/*La guardamos en la base de datos*/



mysqli_query($conex,"UPDATE usuario SET clave='$clavenn' WHERE correo = '$correo'");
    
mysqli_close($conex);


/*Enviamos la información de la nueva clave al correo electrónico del usuario*/

    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "recuperación_de_clave@tuautoweb.com";
    $to = $correo;
    $subject = "Checking PHP mail";
    $message = "Ha realizado el procedimieto para la actualización de su clave en nuestro sistema, su nueva clave es: ".$claven." inicie sesión utilizando su nueva contraseña, puede volver a cambiarla desde el panel de administración de nuestro sistema";
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
    


     header('Location: ../index.php?recupe=true');



?>