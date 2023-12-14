<?php
  // Receive HTTP POST request body
  $json_string = file_get_contents('php://input');

 
  $file_handle = fopen('messages.json', 'w');
  fwrite($file_handle, $json_string); // Write received messages to file
  fclose($file_handle);

$datos=json_decode($json_string);

date_default_timezone_set("America/Mexico_City");

  $headers = array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_string), // Abajo podríamos agregar más encabezados
        'Personalizado: ¡Hola mundo!', # Un encabezado personalizado
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://localizaminave.com.mx:8080/api/flespi");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST,false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$datos); 

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$string = curl_exec($ch);


http_response_code(200);
?>