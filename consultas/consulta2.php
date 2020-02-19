<?php

if (!isset($_SESSION)) {
  session_start();
}
//Desarrollado por Jesus Li��n
//ribosomatic.com
//Puedes hacer lo que quieras con el c�digo
//pero visita la web cuando te acuerdes

$buscar = $_POST['b'];

      if(!empty($buscar)) {
            buscar($buscar);
      }

      function buscar($b) {
            //$con = mysqli_connect('localhost','root', '','tuauto');
            //mysql_select_db('tuauto', $con);
            //Configuracion de la conexion a base de datos
            include("conex.php");

            $sql = mysqli_query($conex, "SELECT * FROM vehiculo INNER JOIN marca INNER JOIN modelo INNER JOIN ano ON vehiculo.cod_marca=marca.cod_marca AND vehiculo.cod_modelo=modelo.cod_modelo AND vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_pais=".$_SESSION['pais']." WHERE marca.marca LIKE '%".$b."%' OR modelo.modelo LIKE '%".$b."%' OR ano.ano LIKE '%".$b."%' ");

            $contar = mysqli_num_rows($sql);

            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
				  
            }else{
                  while($row=mysqli_fetch_array($sql)){
  
					  
				  
					  
				   echo  "<div class='card' style='width: 18rem;'>\n";
					  
				   echo  "<img class='im' src='".$row['imagen1']."'>\n";
					  
				   echo  "<div class='card-body'>\n";
					  
				   echo  "<strong class='card-title tam'>".number_format($row['precio'],2, ",", ".")." USD</strong>\n";
					  
				   echo  "<p>".$row['ano']." | ".number_format($row['km'],0, ".", ".")." Km</p>\n";
					  
				   echo  "<p>".$row['marca']." ".$row['modelo']."</p>\n";
					  
				   echo  "<p>".$row['tipo']."</p>\n";
					  
				   echo  "<button class=' col-md-8 fuentebold' style='' onclick='abre(".$row['cod_vehiculo'].")' >Mostrar</button></a>\n";
					  
				   echo  "</div>\n";
					  
				   echo  "</div>\n";
					  
				  
					  

					  
                  }
            }
      }


//consulta todos los empleados

/*$sql=mysql_query("SELECT * FROM ano,marca,modelo,tipo,vehiculo where vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_tipo=tipo.cod_tipo",$con);*/




?>
