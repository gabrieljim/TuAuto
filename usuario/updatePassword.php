<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
//include("funciones.php");



/*Tomamos todas las variables*/


$nueva=md5($_POST['repetir2']);
$usuario=$_SESSION['usuario'];

/*Actualizamos los datos*/


  
  mysqli_query($conex,"UPDATE usuario SET clave = '$nueva' WHERE correo = '$usuario'");
  
  mysqli_close($conex);

  header('Location: ../usuario.php?actualizo=true');
    
    

?>