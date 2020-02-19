<?php 

if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

/*Encriptamos la clave con MD5*/

$clave= MD5($_GET['c']);

/*Consultamos si la clave existe*/

    

            $query_correo = sprintf("select * from usuario WHERE clave=%s AND correo=%s", GetSQLValueString($clave,"text"),GetSQLValueString($_SESSION['usuario'],"text"));
            $correo = mysqli_query($conex, $query_correo) or die(mysqli_error());
            //$row_correo = mysql_fetch_assoc($correo);
            $totalRows_correo = mysqli_num_rows($correo);

            if($totalRows_correo==0){
				
			  echo '<p style="color:red">La clave actual no es correcta</p>';
				
			}else{
				
			//echo "<script type=\'text/javascript\'>alert(\'Fotos guardadas\');</script>";
				
			}
            
       


          mysqli_close($conex);

          


?>


