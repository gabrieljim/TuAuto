<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

/*Revisamos si el llamado es de un admnistrador para cerrar cuenta de otro o del propio usuario*/

/*if(isset($_GET['ad'])){
	
	$usuario=$_POST['usu'];
    $desac=$_POST['sta'];

	
  /*Actualizamos los datos*/

 
  /*mysqli_query($conex,"UPDATE usuario SET activo ='$desac' WHERE correo = '$usuario'");
  
  mysqli_close($conex);

  header('Location: ../index.php?actualizo=true');*/
	
/*}else{*/



/*Tomamos todas las variables*/


$usuario=$_SESSION['usuario'];
$desac=2;

	/*Actualizamos los datos*/


  mysqli_query($conex,"UPDATE usuario SET activo = '$desac' WHERE correo = '$usuario'");
  
  mysqli_close($conex);

  session_start();

  session_unset();
 
  session_destroy();	

  header('Location: ../index.html');
    
/*}*/

?>