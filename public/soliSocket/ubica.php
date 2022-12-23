<?php



require __DIR__ . '/vendor/autoload.php';

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

$latitud=$_REQUEST['latitud'];
$longitud=$_REQUEST['longitud'];
$imei=$_REQUEST['imei'];
$pila=$_REQUEST['pila'];
$direccion=$_REQUEST['direccion'];
$fecha=$_REQUEST['fecha'];
$alias=$_REQUEST['alias'];
$conductor=$_REQUEST['conductor'];

$client = new Client(new Version2X('http://localhost:3000'));
$client->initialize();
$client->emit('send-ubicacion', [
    'email' => 'r.hernandez@lidcorp.mx',
    'latitud' => $latitud,
    'longitud'=> $longitud,
    'imei'=>$imei,
    'pila'=>$pila,
    'direccion'=>$direccion,
    'fecha'=>$fecha,
    'alias'=>$alias,
    'conductor'=>$conductor
]);
$client->close();

?>