<?php

if (!isset($_SESSION)) {
  session_start();
}

$hostname_conex = "localhost";

$database_conex = "tuauto";

$username_conex = "root";

$password_conex = "";

// $hostname_conex = "localhost";

// $database_conex = "tecnofep_tuauto";

// $username_conex = "tecnofep";

// $password_conex = "zS1757Zsbj";

$conex = mysqli_connect($hostname_conex, $username_conex, $password_conex, $database_conex) or trigger_error(mysqli_error($conex), E_USER_ERROR);

mysqli_set_charset($conex, 'utf8');
