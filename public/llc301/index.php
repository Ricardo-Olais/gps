<?php
  // Receive HTTP POST request body
 $json_string = file_get_contents('php://input');

  $file_handle = fopen('messages.json', 'w');
  fwrite($file_handle, $json_string); // Write received messages to file
  fclose($file_handle);


$datos=json_decode($json_string);

//$json_string=json_encode($datos[0]);


date_default_timezone_set("America/Mexico_City");

 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://localizaminave.com.mx:8080/api/flespi");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_POST,true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_string); 

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$string = curl_exec($ch);




http_response_code(200);
?>