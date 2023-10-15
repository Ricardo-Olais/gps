<?php

$logFile = fopen("log.txt", 'a') or die("Error creando archivo");

//$vars = get_defined_vars();  

foreach($_POST as $campo => $valor){
  $dato= "- ". $campo ." = ". $valor;

  fwrite($logFile, "\n".date("d/m/Y H:i:s")." llegando petición ".$dato) or die("Error escribiendo en el archivo");fclose($logFile);
}

 

?>