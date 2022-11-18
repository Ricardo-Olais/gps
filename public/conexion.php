<?php


//para conectarse a la Base de Datos    
$host = 'localhost';//servidor
$user = 'root';//usuario
$pass = '06670258BaseGps1';//contraseña
$db   = "gps";//nombre de la base de datos 
$conexion = mysqli_connect( $host, $user, $pass, $db );
  if ($conexion == false) {
     echo 'Error al conectar a db';
     die();
  }

?>