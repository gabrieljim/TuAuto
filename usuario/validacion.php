<?php 
if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");


/*Buscamos el correo dentro de la base de datos para proceder a validar el correo electrónico*/


$query_correo = sprintf("select * from usuario WHERE correo=%s", GetSQLValueString($_GET['correo'], "text"));
            $correo = mysqli_query($conex, $query_correo) or die(mysqli_error());
            $totalRows_correo = mysqli_num_rows($correo);

            if($totalRows_correo==0){
				
			echo "no se consiguió el registro";
				
			 mysqli_close($conex);	
			
			}else{
			
			/*Si el correo es validado cambiamos el codigo de validación dentro de la base de datos*/
	
	                     $updateSQL = sprintf("UPDATE usuario SET valido=%s WHERE correo=%s",
                       
					     GetSQLValueString(1, "int"),
						 GetSQLValueString($_GET['correo'], "text"));

  
                         $Result1 = mysqli_query($conex, $updateSQL) or die(mysqli_error());

                         header('Location: ../index.php?validado=true');
	 
				mysqli_close($conex);
			
			
			}
			



	
	




?>