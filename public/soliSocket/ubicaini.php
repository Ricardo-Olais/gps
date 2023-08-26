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
$fija=$_REQUEST['fija'];
$activaGeocerca=$_REQUEST['activaGeocerca'];
$msjalerta1=$_REQUEST['msjalerta1'];
$tipo=$_REQUEST['tipo'];
$latitud_geocerca=$_REQUEST['latitud_geocerca'];
$longitud_geocerca=$_REQUEST['longitud_geocerca'];
$geocerca=$_REQUEST['geocerca'];
$velocidad=$_REQUEST['velocidad'];


$msjalerta2=$_REQUEST['msjalerta2'];

$client = new Client(new Version2X('https://localizaminave.com:3000'));
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
    'conductor'=>$conductor,
    "fija"=>$fija,
    "activaGeocerca"=>$activaGeocerca,
    "msjalerta1"=>$msjalerta1,
    "tipo"=>$tipo,
    "msjalerta2"=>$msjalerta2,
    "latitud_geocerca"=>$latitud_geocerca,
    "longitud_geocerca"=>$longitud_geocerca,
    "geocerca"=>$geocerca,
    "velocidad"=>$velocidad

]);
$client->close();

?>