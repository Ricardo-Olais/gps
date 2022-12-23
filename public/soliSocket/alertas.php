<?php



require __DIR__ . '/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$imei=$_REQUEST['imei'];
$tipo=$_REQUEST['tipo'];
$mensaje=$_REQUEST['mensaje'];

$client = new Client(new Version2X('http://localhost:3000'));
$client->initialize();
$client->emit('alerta', [
    'email' => 'r.hernandez@lidcorp.mx',
    'imei'=>$imei,
    'tipo'=>$tipo,
    'msj'=>$mensaje;
    
]);
$client->close();

?>