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

$clima=$_REQUEST['clima'];
$ultimap=$_REQUEST['ultimap'];
$diasdetenido=$_REQUEST['diasdetenido'];

$banderaMin=$_REQUEST['banderaMin'];
$voltaje=$_REQUEST['voltaje'];

$satelites=$_REQUEST['satelites'];
$kilometros=$_REQUEST['kilometros'];
/*$urlT = 'http://api.mymemory.translated.net/get';
$query_array = array (
                    'q' =>$clima,
                    'langpair' =>'en|es'
                    
                );
$query = http_build_query($query_array);
$json = file_get_contents($urlT . '?' . $query);

$obj = json_decode($json);
$clima= $obj->responseData->translatedText;*/





$temperatura=$_REQUEST['temperatura'];


$msjalerta2=$_REQUEST['msjalerta2'];

$client = new Client(new Version2X('https://localizaminave.com.mx:3000'));
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
    "velocidad"=>$velocidad,
    "clima"=>$clima,
    "temperatura"=>$temperatura,
    "ultimap"=>$ultimap,
    "diasdetenido"=>$diasdetenido,
    "banderaMin"=>$banderaMin,
    "voltaje"=>$voltaje,
    "satelites"=>$satelites,
    "kilometros"=>$kilometros

]);
$client->close();

?>