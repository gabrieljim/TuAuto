<?php 

if (!isset($_SESSION)) {
  session_start();
}

$_SESSION['pais']=$_POST['p'];


header('Location: index.php');



?> 


