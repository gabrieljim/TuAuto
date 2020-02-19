<?php 

if (!isset($_SESSION)) {
  session_start();
}

include("../consultas/conex.php");
include("funciones.php");

$nivel=$_SESSION['nivel'];
$usuario=$_SESSION['usuario'];

/*Dependiendo del tipo de usuario hacemos la consulta*/

   if($nivel==1){
	 
/*Usuario Super Admnistrador*/	   
	   
	   $sql_lista= "SELECT * FROM usuario, tipo_usuario WHERE tipo_usuario.cod=usuario.tipo_usuario AND correo !='$usuario'";

         $lista= mysqli_query($conex,$sql_lista);



while($fila = mysqli_fetch_array($lista)){	

	/*Reviso si el usuario está activo o no*/
	
	 if($fila['activo']==1){
		 
		 $activo='SI';
		 $des='Desactivar';
		 
	 }else{
		
		 $activo='NO';
		 $des='Activar';
		 
	 }
	
			echo "<tr><td>".$activo."</td><td>".$fila['correo']."</td>                                           <td>".$fila['tipo']."</td><td><button value='".$fila['correo']."' class='btn btn-edit' onClick='actuter(this.value)'>Editar</button>
            </td><td><button value='".$fila['correo']."'class='btn btn-trash' onClick='confirma(this.value,".$fila['activo'].")'>".$des."</button>
            </td></tr>";
		
	}
	   
	   
   }else{
	   
	   
	   /*Usuario Admnistrador*/	   
	   
	   $sql_lista= "SELECT * FROM usuario, tipo_usuario WHERE tipo_usuario.cod=usuario.tipo_usuario AND tipo_usuario = 3 AND correo !='$usuario'";

         $lista= mysqli_query($conex,$sql_lista);



while($fila = mysqli_fetch_array($lista)){	

	/*Reviso si el usuario está activo o no*/
	
	 if($fila['activo']==1){
		 
		 $activo='SI';
		 $des='Desactivar';
		 
	 }else{
		
		 $activo='NO';
		 $des='Activar';
		 
	 }
	
			echo "<tr><td>".$activo."</td><td>".$fila['correo']."</td>                                           <td>".$fila['tipo']."</td><td><button class='btn btn-edit'>Editar</button>
            </td><td><button  class='btn btn-trash'>".$des."</button>
            </td></tr>";
		
	}
	   
	   
	   
	   
   }

    

            

  

            
            
       


          mysqli_close($conex);

          


?>


