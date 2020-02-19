<?php

if (!isset($_SESSION)) {
  session_start();
}

error_reporting(0);

$mail = $_GET['c'];
$mensaje = $_GET['m'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Buenas noticias, este mensaje fue enviado desde tu autoweb.com porque alguién está interesado en tu publicación\r\n";
$mensaje .= "\r\n";
$mensaje .= "Mensaje: " . $mensaje . " \r\n";
$mensaje .= "\r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = $mail;
$asunto = 'TUATOWEB:COM/Alguién está interesado en tu publicación';

mail($para, $asunto, utf8_decode($mensaje), $header);


echo "<h5 style='color:green'>Tu mensaje ha sido enviado</h5>\n";


?>
