<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
//include("../funciones.php");

$usuario=$_POST['correo'];
$clave=md5($_POST['contra']);

/*Revisamos que el correo y la clave sean correctas*/


$sql= "SELECT * FROM usuario WHERE correo='$usuario' AND clave='$clave'";

$resultado= mysqli_query($conex,$sql);


if($row= mysqli_fetch_array($resultado)){

/*Si los datos son correctos*/
	

	/*Verificamos si el usuario valido el correo electrónico*/
	
	if($row['valido']==2){
		
	header('Location: ../index.php?valido="true"');	
		
	}else{
		
	/*Verificamos si el usuario está activo en el sistema*/	
		  if($row['activo']==2){
		
	         header('Location: ../index.php?activo="true"');	
		
	      }else{
		
	         /*Si todo esta bien le damos entrada al sistema*/
			 
			 /*creamos las variables de sesión*/		

			       $_SESSION["usuario"]= $row["correo"];
                   $_SESSION["nivel"]= $row["tipo_usuario"];
			       $_SESSION["imagen"]= $row["foto"];
			       $_SESSION["rellenado"]= $row["rellenado"];
	
             /*redireccionamos al dashboard*/
	
                   header('Location: ../escritorio.php');	
		
	      }
	
		
	}

	
}else{

/*Si los datos no son los correctos*/

	header('Location: ../index.php?invalid="true"');
 
}
