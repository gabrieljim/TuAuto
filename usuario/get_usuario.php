<?php 


include("../consultas/conex.php");
include("funciones.php");



/*Consultamos si el correo existe*/

    

            $query_correo = sprintf("select * from usuario WHERE correo=%s", GetSQLValueString($_GET['c'], "text"));
            $correo = mysqli_query($conex, $query_correo) or die(mysqli_error());
            $totalRows_correo = mysqli_num_rows($correo);

  /*Validamos si existe $get a que es el swiche de la validación para verificar que no existe ningun correo con esos datos para recuperar la contraseña*/

         if(isset($_GET['a'])){
			 
			 if($totalRows_correo==0){
			
				echo '<p style="color:red">Este correo no está asociado a una cuenta en nuestro sistema, para cualquier información adicional comuniquese con nosotros</p>';
				
			}else{
				
			    echo '<p style="color:green">Cuenta de correo correcta</p>';
							
						
			}
		 
		 
		 }else{
			
			/*Validamos en el caso contrario para el registro de usuarios*/ 
			 
			 if($totalRows_correo==0){
			
				
				
			}else{
				
			
				echo '<p style="color:red">Este correo ya está asociado a una cuenta, por favor intente con otro</p>';
			
						
			}
			 
			 
		 }

            
            
       


          mysqli_close($conex);

          


?>


