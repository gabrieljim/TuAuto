<?php

if (!isset($_SESSION)) {
  session_start();
}
//Desarrollado por Jesus Li��n
//ribosomatic.com
//Puedes hacer lo que quieras con el c�digo
//pero visita la web cuando te acuerdes

//Configuracion de la conexion a base de datos
include("conex.php");

//mysql_select_db($bd_base, $con); 

//consulta todos los empleados

$codMarca = (int) $_GET['m'];
$pais = $_SESSION['pais'];

$sql=mysqli_query($conex, "SELECT * FROM ano,marca,modelo,tipo,vehiculo where vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_tipo=tipo.cod_tipo and vehiculo.cod_pais='$pais' and vehiculo.cod_marca='$codMarca'");

//muestra los datos consultados

if(mysqli_fetch_array($sql)==null){
	
	echo "<h3 style='margin:auto; text-aling:center; margin-top:250px'>No existen autos con esta marca</h3>\n";
	
}else{
    
    while($row = mysqli_fetch_array($sql)){

        echo "<div class='col-12 mt-5 gray-border my-5 p-3'> \n";

        echo "<div class='row show-grid w-100'> \n";


        echo "<div class='col-md-6 col-md-push-6 w-100'>\n";

        echo "<img class='w-100' src='".$row['imagen1']."'\n";

        echo "</div> \n"; echo "</div> \n";

        echo "<div class='col-md-6 col-md-pull-6 w-100'>\n";

        echo "<h5>".$row['marca']." ".$row['modelo']." ".$row['ano']."</h5>\n";

        echo "<h5>".number_format($row['km'],0, ".", ".")." Km</h5>\n";

        echo "<h4>".number_format($row['precio'],2, ",", ".")." USD</h4>\n";

        echo "<h5>".$row['tipo']."</h5>\n";

        echo "<button class='mt-8' onclick='abre(".$row['cod_vehiculo'].")' >Mostrar</button></a>\n";

        echo "</div>\n";
                                                
        echo "</div>\n";

        echo "</div>\n";

      }
}
?>