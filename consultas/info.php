<?php

if (!isset($_SESSION)) {
  session_start();
}

if (!function_exists("GetSQLValueString")) {

  function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")

  {

    if (PHP_VERSION < 6) {

      $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
    }



    //$theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conex,$theValue) : mysqli_real_escape_string($conex,$theValue);



    switch ($theType) {

      case "text":

        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

        break;

      case "long":

      case "int":

        $theValue = ($theValue != "") ? intval($theValue) : "NULL";

        break;

      case "double":

        $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";

        break;

      case "date":

        $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";

        break;

      case "defined":

        $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;

        break;
    }

    return $theValue;
  }
}

//Desarrollado por Jesus Li��n
//ribosomatic.com
//Puedes hacer lo que quieras con el c�digo
//pero visita la web cuando te acuerdes

//Configuracion de la conexion a base de datos
include("conex.php");

//mysqli_select_db($con, $bd_base); 

//consulta todos los empleados

$query_ve = sprintf("select * from vehiculo, ano, marca, modelo, combustible, color, estados, transmision, usuario, pais WHERE vehiculo.cod_pais=pais.cod_pais and vehiculo.usuario=usuario.correo AND vehiculo.cod_transmision=transmision.cod_transmision and vehiculo.cod_color=color.cod_color and vehiculo.cod_combustible=combustible.cod_combustible and vehiculo.cod_modelo=modelo.cod_modelo and vehiculo.cod_marca=marca.cod_marca and vehiculo.cod_ano=ano.cod_ano and vehiculo.cod_estado=estados.cod_estado and vehiculo.usuario=usuario.correo and cod_vehiculo=%s", GetSQLValueString($_GET['c'], "int"));

$ve = mysqli_query($conex, $query_ve) or die(mysqli_error($conex));

$row_ve = mysqli_fetch_assoc($ve);

$totalRows_ve = mysqli_num_rows($ve);

//while($row = mysql_fetch_array($sql)){


echo "<div class='col-6 mt-5 fuentebold'>\n";

echo "<img id='imp' class='w-100 fuentebold' src='" . $row_ve['imagen1'] . "'>\n";

echo "<div class='row car-photos my-3 fuentebold'>\n";

echo "<div class='col-3 fuentebold'><img id='im1' onclick='galeria(1)' style='cursor:pointer' src='" . $row_ve['imagen2'] . "'></div>\n";

echo "<div class='col-3 fuentebold'><img id='im2' onclick='galeria(2)' style='cursor:pointer' src='" . $row_ve['imagen3'] . "'></div>\n";

echo "<div class='col-3 fuentebold'><img id='im3' onclick='galeria(3)' style='cursor:pointer' src='" . $row_ve['imagen4'] . "'></div>\n";

echo "<div class='col-3 fuentebold'><img id='im4' onclick='galeria(4)' style='cursor:pointer' src='" . $row_ve['imagen5'] . "'></div>\n";

echo "</div>\n";

echo "<h4><strong class 'fuentebold'>" . $row_ve['marca'] . " " . $row_ve['modelo'] . " " . $row_ve['ano'] . "</strong></h4>\n";

echo "<h4><strong>Notas del Vendedor</strong></h4>\n";

echo " ";

echo "<h5>" . $row_ve['observaciones'] . "</h5>\n";

echo "<h4><strong>Informaci&oacuten B&aacutesica</strong></h4>\n";

echo "<h5><strong>Combustible:</strong> " . $row_ve['combustible'] . "</h5>\n";

echo "<h5><strong>Transmisi&oacuten:</strong> " . $row_ve['transmision'] . "</h5>\n";

echo "<h5><strong>Color:</strong> " . $row_ve['color'] . "</h5>\n";

echo "<h5><strong>Kilometraje:</strong> " . number_format($row_ve['km'], 0, ".", ".") . " km</h5>\n";

echo "</div>\n";

echo "<div class='col-6 mb-5 fuentebold'>\n";

echo "<div class='gray-border my-5 p-3 fuentebold'>\n";

echo "<h5><strong>" . $row_ve['marca'] . " " . $row_ve['modelo'] . " " . $row_ve['ano'] . "</strong></h5>\n";

echo "<h5>" . number_format($row_ve['km'], 0, ".", ".") . " Km</h5>\n";

echo "<h4><strong>" . number_format($row_ve['precio'], 0, ".", ".") . " USD</strong></h4>\n";

echo "<h5>Pais: " . $row_ve['pais'] . "</h5>\n";
echo "<h5>Estado: " . $row_ve['estado'] . "</h5>\n";
//     echo "<h5>".$row_ve['pais']." ".$row_ve['estado']." ".$row_ve['provincia']."</h5>\n";

echo "</div>\n";

echo "<h4><strong>INFORMACI&OacuteN DEL VENDEDOR</strong></h4>\n";

echo "<div class='gray-border mb-5 pt-3 px-5 fuentebold'>\n";

echo "<h5>" . $row_ve['nombre'] . " " . $row_ve['apellido'] . "</h5>\n";

echo "<h5>" . $row_ve['direccion'] . "</h5>\n";

echo "<h5>" . $row_ve['telefono1'] . "</h5>\n";

echo "<h5>" . $row_ve['telefono2'] . "</h5>\n";

echo "<h5>" . $row_ve['correo'] . "</h5>\n";

echo "<input id='corr' type='hidden' value='" . $row_ve['correo'] . "'>";

echo "</div>\n";

echo "<h4><strong>PREGUNTAR AL VENDEDOR</strong></h4>\n";

echo "<textarea placeholder='Recuerda colocar tus datos de contacto para que el vendedor pueda contactarte' class='gray-border' name='ms' id='ms' cols='40' rows='5'>\n";

echo "</textarea>\n";

echo "<h5 id='error' style='color:red; display: none'>Debe escribir informaci&oacuten</h5>\n";

echo "<div id='exito'></div>\n";

echo "<button class='loat-right mt-3' onclick='envio()'>Enviar</button>\n";

echo "</div>\n";

echo "<div class='col-12'>\n";

echo "<p class='float-right'>  </p>\n";

echo "</div>\n";

//}*
