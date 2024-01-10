<?php
  // Receive HTTP POST request body
  $json_string = file_get_contents('php://input');


  $json_string=json_decode($json_string);

  $device='device.id';


  $id=$json_string[0]->{$device};

  $file_handle = fopen('messages.json', 'w');
  fwrite($file_handle, $id); // Write received messages to file
  fclose($file_handle);




 


  //$id="5416447";

date_default_timezone_set("America/Mexico_City");

  $headers = array(
    'Content-Type:application/json',
    'Authorization: FlespiToken AoG0ACSt4Mz5arZ6AfaPWmmaScg6vEMUShIiJoBD1Zx1emYFsWic8ubPvfLOJmys'
   // <---
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://flespi.io/gw/devices/$id/messages?data=%7B%22count%22%3A1%2C%22reverse%22%3Atrue%2C%22fields%22%3A%22%22%2C%22filter%22%3A%22position.latitude%3E0%22%2C%22from%22%3A0%7D");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST,false);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$datos); 

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$string = curl_exec($ch);

//print_r($string);

$respuesta=json_decode($string);



//print_r($respuesta->result);

$longitude='position.longitude';
$ident='ident';
$direcion='position.direction';
$satelites='position.satellites';
$speed='position.speed';
$fecha='timestamp';
$text='position.latitude';
$kilometrosR='vehicle.mileage';

$key=0;

 

$latitud=$respuesta->result[$key]->{$text};
$longitud=$respuesta->result[$key]->{$longitude};
$imei=$respuesta->result[$key]->{$ident};
$bateria=$respuesta->result[$key]->{$direcion};
$satelites=$respuesta->result[$key]->{$satelites};
$velocidad=$respuesta->result[$key]->{$speed};
$mil = $respuesta->result[$key]->{$fecha}; 
$seconds = $mil; 
$fechaserver=date("Y-m-d H:i:s", $seconds);
$fechaSistema="Fecha actualización: ".date("d/m/Y H:i:s");

$kilometros=$respuesta->result[$key]->{$kilometrosR};



curl_setopt($ch, CURLOPT_URL, "https://flespi.io/gw/devices/$id/messages?data=%7B%22count%22%3A1%2C%22reverse%22%3Atrue%2C%22fields%22%3A%22%22%2C%22filter%22%3A%22battery.voltage%3E0%22%2C%22from%22%3A0%7D");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST,false);
//curl_setopt($ch, CURLOPT_POSTFIELDS,$datos); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

$string = curl_exec($ch);

$respuesta=json_decode($string);





$bate='battery.voltage';
$carga='battery.charging.status';

//battery.charging.status

$voltaje=(($respuesta->result[0]->{$bate})*100)/4.15;
$cargando=($respuesta->result[0]->{$carga}) ? 'Cargando...': "";

$voltaje=number_format($voltaje,2)."% ".$cargando;



  $datos=array(

        "latitud"=>$latitud,
        "longitud"=>$longitud,
        "imei"=>$imei,
        "pila"=>$bateria,
        "ultimaPosicion"=>$fechaserver,
        "velocidad"=>$velocidad,
        "voltaje"=>$voltaje,
        "satelites"=>$satelites,
        "kilometros"=>$kilometros
                    

      );




 $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "http://localizaminave.com.mx:8080/api/flespi");
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        curl_setopt($ch, CURLOPT_POST,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$datos); 

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);

        $string = curl_exec($ch);

     

  // NOTE: it's important to send HTTP 200 OK status
  // to acknowledge successful messages delivering
  http_response_code(200);
?>