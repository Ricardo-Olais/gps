<?php

//generamos el cliente 
$curl2 = curl_init();

curl_setopt_array($curl2, [
  CURLOPT_URL => "https://graph.facebook.com/v15.0/100121256285990/messages",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{ \"messaging_product\": \"whatsapp\", \"to\": \"525586779297\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" } } }",
  CURLOPT_HTTPHEADER => [
    
    "Authorization: Bearer EAAnZBdItmzEMBADo4RTeM8GfJvrnDrhcakFBZCswsuNuderZBbXOgrrSMnu97n8ZC0GIubU5redWtez7SjLZAxCprYWAFeNEZAlmrsHZCtiOw3SovZBZCAZA4jPmEnjtSIut3WUOo8PVRNN2U1PrEua6hknPudShGXi9pQVLsPg8lTU9bQLaAZBHvUctzrlYdTFX1qJS3qPQw8LmwZDZD",
    "Content-Type: application/json"
  ],
]);

$response2 = curl_exec($curl2);

print_r($response2);


curl_close($curl2);

$valoresCliente=json_decode($response2);


?>