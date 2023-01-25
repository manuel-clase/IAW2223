<?php

session_start();

if (array_key_exists("id",$_COOKIE)) {
  $_SESSION['id'] = $_COOKIE['id'];
}
if (array_key_exists("id",$_SESSION))
{ 

  $servidor = "shareddb-y.hosting.stackcp.net";
  $bd = "proyectoManuel-313539e15e";
  $usuario = "pacomaestre";
  $password = "Usuario1/";

// Crea la conexión
$enlace = mysqli_connect($servidor, $usuario, $password, $bd);
}
else {
    echo "<script>window.location.href = 'https://iawmanuelarcos-com.stackstaging.com/proyecto/loginproyecto.php';</script>";
  }
?>