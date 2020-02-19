<?php

include 'conex.php';

//pasamos id del país
if(!empty($_POST["id_pais"])) 
{
   $sql ="SELECT id, descripcion FROM ciudades WHERE id_pais = '" . $_POST["id_pais"] . "'";
   
   	$consulta_ciudades = $link->query($sql);
 
   //construimos lista nueva dependiente
   ?>
     <option value="">Seleccionar Ciudad</option>
   <?php
   
   while($ciudad= $consulta_ciudades->fetch_object())
   {
	   ?>
		  <option value="<?php echo $ciudad->id; ?>"><?php echo $ciudad->descripcion; ?></option>
	   <?php
   }
}
?>