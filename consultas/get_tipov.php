<?php

            $con = mysqli_connect('localhost','root', '', 'tuauto');
            //mysqli_select_db('tuauto', $con);
		  
		         
            $sql = mysqli_query($con, "SELECT * FROM tipo_vehiculo");
             
            
               
                  //while($row=mysql_fetch_array($sql)){echo $row['tipov']}
    


//consulta todos los empleados

/*$sql=mysql_query("SELECT * FROM ano,marca,modelo,tipo,vehiculo where vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_tipo=tipo.cod_tipo",$con);*/


      
       
?>